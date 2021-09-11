<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>
    
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('quiz.result',$quiz->slug) }}">
                @csrf
                @foreach ($quiz->questions as $question)
                    @if ($question->image)
                        <img src="{{ asset($question->image) }}" style="width: 200px" class="img-fluid mb-2">
                    @endif
                    <strong> {{ $loop->iteration }}.</strong> {{ $question->question }}
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}" id="quiz{{ $question->id }}1" value="answer1" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}1">
                        {{ $question->answer1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}" id="quiz{{ $question->id }}2" value="answer2" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}2">
                        {{ $question->answer2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}" id="quiz{{ $question->id }}3" value="answer3" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}3">
                        {{ $question->answer3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}" id="quiz{{ $question->id }}4" value="answer4" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}4">
                        {{ $question->answer4 }}
                        </label>
                    </div>
                    <hr>
                @endforeach
                <div class="form-group d-grid gap-2 col-6 mx-auto mt-3">
                    <button type="submit" class="btn btn-success btn-block">İmtahanı Sonlandır</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
