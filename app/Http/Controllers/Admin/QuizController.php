<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::withCount('questions')->orderBy('status');
        if(request()->get('title') && request()->get('status') == null){
            $quizzes = $quizzes->where('title','LIKE',"%".request()->get('title')."%");
        }
        else if (request()->get('status') && request()->get('title') == null) {
            $quizzes = $quizzes->where('status',request()->get('status'));
        }
        else if(request()->get('title') !== null && request()->get('status') !== null){
            $quizzes = $quizzes->where('title','LIKE',"%".request()->get('title')."%")->where('status',request()->get('status'));
        }

        $quizzes = $quizzes->paginate(5);
        return view('admin.quiz.list', compact('quizzes'));
    }

    public function create()
    {
        return view('admin.quiz.create');
    }

    public function store(QuizCreateRequest $request)
    {
        Quiz::create($request->post());
        return redirect()->route('quizzes.index')->withSuccess('Sual Uğurla Əlavə Edildi');
    }

    public function show($id)
    {
        $quiz = Quiz::with('top_ten.user','results.user')->withCount('questions')->findOrFail($id);
        
        return view('admin.quiz.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        return view('admin.quiz.edit', compact('quiz'));
    }

    public function update(QuizUpdateRequest $request,Quiz $quiz)
    {
        $quiz->update($request->except(['_method','_token']));
        return redirect()->route('quizzes.index')->withSuccess('İmtahan müvəffəqiyyətlə güncəlləndi');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return back()->withSuccess('Sual müvəffəqiyyətlə silindi');
    }
}
