<x-app-layout>
    <x-slot name="header">İmtahanlar</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="card-title float-end">
                <a href="{{ route('quizzes.create') }}" class="btn btn-success mb-2"><i class="fa fa-plus"></i>
                    İmtahan Əlavə Et</a>
            </div>
            <form method="GET" action="">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="title" value="{{ request()->get('title') }}" class="form-control"
                            placeholder="İmtahan adı">
                    </div>
                    <div class="col-md-3">
                        <select name="status" onchange="this.form.submit()" class="form-control">
                            <option value="">Status Seçin</option>
                            <option @if (request()->get('status') == 'publish') selected @endif value="publish" value="">Aktiv</option>
                            <option @if (request()->get('status') == 'passive') selected @endif value="passive" value="">Deaktiv</option>
                            <option @if (request()->get('status') == 'draft') selected @endif value="draft" value="">Tamamlanmamış</option>
                        </select>
                    </div>
                    @if (request()->get('title') || request()->get('status'))
                        <div class="col-md-2">
                            <a href="{{ route('quizzes.index') }}" class="btn btn-danger">X</a>
                        </div>
                    @endif
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">İmtahan</th>
                        <th scope="col">Sual Sayı</th>
                        <th scope="col">Status</th>
                        <th scope="col">Bitmə vaxtı</th>
                        <th style="width: 160px" scope="col">Dəyişiklik</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)
                        <tr>
                            <td>{{ $quiz->title }}</td>
                            <td>{{ $quiz->questions_count }}</td>
                            <td>
                                @switch($quiz->status)
                                    @case('publish')
                                        @if (!$quiz->finished_at)
                                            <span class="badge bg-success">Aktiv</span>
                                        @elseif($quiz->finished_at > now())
                                            <span class="badge bg-success">Aktiv</span>
                                        @else
                                            <span class="badge bg-dark">Vaxtı Bitib</span>
                                        @endif
                                    @break
                                    @case('passive')
                                        <span class="badge bg-danger">Passiv</span>
                                    @break
                                    @case('draft')
                                        <span class="badge bg-warning">Tamamlanmamış</span>
                                    @break
                                @endswitch
                            </td>
                            <td>
                                <span title="{{ $quiz->finished_at }}">
                                    {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : 'Vaxt Təyin Edilməyib' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('quizzes.details', $quiz->id) }}" class="btn btn-info btn-sm"><i
                                        class="fas fa-question"></i></a>
                                <a href="{{ route('questions.index', $quiz->id) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-tasks"></i></a>
                                <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-pencil-alt"></i></a>
                                <a href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $quizzes->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>
