<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class QuestionController extends Controller
{
    public function index($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        $quest = $quiz->questions()->paginate(5);
        return view('admin.question.list', compact('quiz', 'quest'));
    }

    public function create($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('admin.question.create', compact('quiz'));
    }

    public function store(QuestionCreateRequest $request, $id)
    {
        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->question) . '.' . $request->image->getClientOriginalName();
            $fileNameWithUpload = 'uploads/' . $fileName;
            $request->image->move(public_path('uploads'), $fileName);
            $request->merge([
                'image' => $fileNameWithUpload
            ]);
        }
        Quiz::findOrFail($id)->questions()->create($request->post());
        return redirect()->route('questions.index', $id)->withSuccess('Sual Müvəffəqiyyətlə Əlavə Olundu');
    }

    public function show($quiz_id, $id)
    {
        return redirect('errors.404');
    }

    public function edit(Question $question)
    {
        return view('admin.question.edit', compact('question'));
    }

    public function update(QuestionUpdateRequest $request, Question $question)
    {
        if ($request->hasFile('image')) {
            $deleteImage = $question->image;
            File::delete(public_path($deleteImage));
            $fileName = Str::slug($request->question) . '.' . $request->image->getClientOriginalName();
            $fileNameWithUpload = 'uploads/' . $fileName;
            $request->image->move(public_path('uploads'), $fileName);
            $request->merge([
                'image' => $fileNameWithUpload
            ]);
        }

        $question->update($request->post());

        return back()->withSuccess('Sual Müvəffəqiyyətlə Güncəlləndi');
    }


    public function destroy(Question $question)
    {
        if ($question->image !== null) {
            File::delete(public_path($question->image));
        }
        $question->delete();
        return back()->withSuccess('Sual Müvəffəqiyyətlə Silindi');
    }
}
