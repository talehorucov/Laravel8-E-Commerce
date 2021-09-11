<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->my_rank)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Mənim Sıralamam
                            <span class="badge bg-success rounded-pill">{{ $quiz->my_rank }}</span>
                        </li>
                        @endif
                        @if ($quiz->my_result)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Xal
                                <span class="badge bg-primary rounded-pill">{{ $quiz->my_result->point }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Düzgün / Yanlış
                                <div class="float-right">
                                    <span class="badge bg-success rounded-pill">{{ $quiz->my_result->correct }}
                                        Düzgün</span>
                                    <span class="badge bg-danger rounded-pill">{{ $quiz->my_result->wrong }}
                                        Yanlış</span>
                                </div>
                            </li>
                        @endif
                        @if ($quiz->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                İmtahanın Bitmə Tarixi
                                <span title="{{ $quiz->finished_at }}"
                                    class="badge bg-secondary rounded-pill">{{ $quiz->finished_at->diffForHumans() }}</span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sual Sayı
                            <span class="badge bg-secondary rounded-pill">{{ $quiz->questions_count }}</span>
                        </li>
                        @if ($quiz->details)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                İştirakçıların Sayı
                                <span
                                    class="badge bg-secondary rounded-pill">{{ $quiz->details['join_count'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ortalama Xal
                                <span class="badge bg-secondary rounded-pill">{{ $quiz->details['average'] }}</span>
                            </li>
                        @endif
                    </ul>
                    @if (count($quiz->top_ten) > 0)
                        <div class="card mt-5">
                            <div class="card-body">
                                <h5 class="card-title">Top 10</h5>
                                <ul class="list-group">
                                    @foreach ($quiz->top_ten as $result)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong class="h5">{{ $loop->iteration }}.</strong>
                                            <img class="w-8 h-8 rounded-full"
                                                src="{{ $result->user->profile_photo_url }}">
                                            <span @if(auth()->user()->id == $result->user_id) @endif class="text-success">{{ $result->user->name }}</span>
                                            <span class="badge bg-success rounded-pill">{{ $result->point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="col-md-8">
                    {{ $quiz->description }}</p>
                    @if ($quiz->my_result)
                        <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-success">Nəticəmi Göstər</a>
                    @elseif($quiz->finished_at > now())
                        <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-primary">İmtahana Qoşul</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
