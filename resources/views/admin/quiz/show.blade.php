<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('quizzes.index') }}" class="btn btn-secondary mb-2 mt-2"><i class="fa fa-arrow-left"></i> İmtahanlar</a>
            </h5>
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Son Qatılma Tarixi
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
                                            <span @if (auth()->user()->id == $result->user_id) @endif
                                                class="text-success">{{ $result->user->name }}</span>
                                            <span class="badge bg-success rounded-pill">{{ $result->point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">Xal</th>
                                <th scope="col">Doğru</th>
                                <th scope="col">Yanlış</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quiz->results as $result)
                                <tr>
                                    <td>{{ $result->user->name }}</td>
                                    <td>{{ $result->point }}</td>
                                    <td>{{ $result->correct }}</td>
                                    <td>{{ $result->wrong }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
