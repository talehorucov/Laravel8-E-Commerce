<x-app-layout>
    <x-slot name="header">Ana Səhifə</x-slot>

    <div class="row">
        <div class="col-md-8">
            <div class="list-group">
                @foreach ($quizzes as $quiz)
                    <a href="{{ route('quiz.detail', $quiz->slug) }}" class="list-group-item list-group-item-action mb-3 p-3"
                        aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $quiz->title }}</h5>
                            <small class="text-primary">Bitiş Tarixi: {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : null }}</small>
                        </div>
                        <p class="mb-1">{{ Str::limit($quiz->description, 100) }}</p>
                        <small>{{ $quiz->questions_count }} Sual</small>
                    </a>
                @endforeach
                <div class="mt-2">
                    {{ $quizzes->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    İmtahan Nəticələrim
                </div>
                <ul class="list-group list-group-flush">
                    @if ($results == '')
                        <div class="row justify-content-center align-self-center container text-danger mt-3 mb-3">İmtahanı bitirdikdən sonra nəticəniz burada göstəriləcək</div> 
                    @else
                        @foreach ($results as $result)
                            <li class="list-group-item">
                                <strong class="text-success">{{ $result->point }} Xal -</strong>
                                <a style="text-decoration:none"
                                    href="{{ route('quiz.detail', $result->quiz->slug) }}">{{ $result->quiz->title }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
