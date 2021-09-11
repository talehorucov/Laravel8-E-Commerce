<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;

class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status', 'publish')->where(function($query){
            $query->whereNull('finished_at')->orWhere('finished_at','>',now());
        })->withCount('questions')->paginate(5);
        $results = auth()->user()->results;
        return view('dashboard', compact('quizzes','results'));
    }

    public function quiz_detail($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('my_result', 'top_ten.user')->withCount('questions')->firstOrFail();
        return view('quiz_detail', compact('quiz'));
    }

    public function quiz($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions.my_answer','my_result')->firstOrFail();
        
        if ($quiz->my_result) {
            return view('quiz_result',compact('quiz'));
        }

        return view('quiz', compact('quiz'));
    }

    public function result(Request $request, $slug)
    {
        $quiz = Quiz::with('questions')->whereSlug($slug)->firstOrFail();
        $correct = 0;
        $wrong = 0;
        if ($quiz->my_result) {
            return redirect('errors.404');
        }
        foreach ($quiz->questions as $question) {
            Answer::create([
                'user_id' => auth()->user()->id,
                'question_id' => $question->id,
                'answer' => $request->post($question->id),
            ]);

            if ($question->correct_answer === $request->post($question->id)) {
                $correct += 1;
            }
        }

        $point = round((100 / count($quiz->questions)) * $correct);
        $wrong = count($quiz->questions) - $correct;

        Result::create([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong
        ]);

        return redirect()->route('quiz.detail', $quiz->slug)->withSuccess('İmtahan bitdi. Toplam xalın: ' . $point);
    }
}
