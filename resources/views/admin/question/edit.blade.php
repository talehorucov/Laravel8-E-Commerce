<x-app-layout>
    <x-slot name="header">{{ $question->question }} Dəyişiklik Et</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('questions.update', $question->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Sual</label>
                    <textarea name="question" class="form-control" rows="4"> {{ $question->question }}</textarea>
                </div><br>
                <div class="form-group">
                    <label>Şəkil</label>
                    @if ($question->image)
                        <a href="{{ asset($question->image) }}" target="_blank">
                            <img src="{{ asset($question->image) }}" class="img-responsive" style="width: 150px;">
                        </a>
                    @endif                    
                    <input type="file" name="image" class="form-control">
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1. Cavab</label>
                            <textarea name="answer1" class="form-control" rows="2"> {{ $question->answer1 }}</textarea>
                        </div><br>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2. Cavab</label>
                            <textarea name="answer2" class="form-control" rows="2"> {{ $question->answer2 }}</textarea>
                        </div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3. Cavab</label>
                            <textarea name="answer3" class="form-control" rows="2"> {{ $question->answer3 }}</textarea>
                        </div><br>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4. Cavab</label>
                            <textarea name="answer4" class="form-control" rows="2"> {{ $question->answer4 }}</textarea>
                        </div><br>
                    </div>
                </div>
                <div class="form-group">
                    <label>Düzgün Cavab</label>
                    <select name="correct_answer" class="form-control">
                        <option @if ($question->correct_answer=='answer1') selected @endif value="answer1">1. Cavab</option>
                        <option @if ($question->correct_answer=='answer2') selected @endif value="answer2">2. Cavab</option>
                        <option @if ($question->correct_answer=='answer3') selected @endif value="answer3">3. Cavab</option>
                        <option @if ($question->correct_answer=='answer4') selected @endif value="answer4">4. Cavab</option>
                    </select>
                </div><br>
                <div class="form-group d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-success btn-block">Dayişiklik Et</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>