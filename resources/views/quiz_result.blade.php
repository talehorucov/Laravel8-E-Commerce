<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} Nəticəsi</x-slot>

    <div class="card">
        <div class="card-body">

            <h3>Topladığınız Xal: {{ $quiz->my_result->point }}</h3>
            <div class="alert alert-secondary">
                <i class="fas fa-times-circle text-danger"></i> Seçdiyin Cavab <br>
                <i class="fa fa-check text-success"></i> Düzgün Cavab <br>
                <i class="fa fa-times text-danger"></i> Yanlış Cavab <br>
            </div>

            @foreach ($quiz->questions as $question)
                @if ($question->correct_answer == $question->my_answer->answer)
                    <i class="fa fa-check text-success"></i>
                @else
                    <i class="fa fa-times text-danger"></i>
                @endif
                @if ($question->image)
                    <img src="{{ asset($question->image) }}" style="width: 200px" class="img-fluid mb-2">
                @endif
                <strong> {{ $loop->iteration }}.</strong> {{ $question->question }}

                <div class="text-success">
                    {{ $question->true_percent }} Bu Suala Düzgün Cavab Verib.
                </div>
                <div class="form-check mt-1">
                    @if ('answer1' == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer1' == $question->my_answer->answer)
                        <i class="fas fa-times-circle text-danger"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{ $question->id }}1">
                        {{ $question->answer1 }}
                    </label>
                </div>
                <div class="form-check">
                    @if ('answer2' == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer2' == $question->my_answer->answer)
                        <i class="fas fa-times-circle text-danger"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{ $question->id }}2">
                        {{ $question->answer2 }}
                    </label>
                </div>
                <div class="form-check">
                    @if ('answer3' == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer3' == $question->my_answer->answer)
                        <i class="fas fa-times-circle text-danger"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{ $question->id }}3">
                        {{ $question->answer3 }}
                    </label>
                </div>
                <div class="form-check">
                    @if ('answer4' == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer4' == $question->my_answer->answer)
                        <i class="fas fa-times-circle text-danger"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{ $question->id }}4">
                        {{ $question->answer4 }}
                    </label>
                </div>
                @if (!$loop->last)
                    <hr>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
