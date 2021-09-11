<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['question','answer1','answer2','answer3','answer4','image','correct_answer'];

    protected $appends = ['true_percent'];

    public function getTruePercentAttribute(){
        $answer_count = $this->answers()->count();
        $true_answer = $this->answers()->where('answer',$this->correct_answer)->count();
    
        return round((100 / $answer_count) * $true_answer).'%';
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function my_answer(){
        return $this->hasOne(Answer::class)->where('user_id',auth()->user()->id);
    }
}
