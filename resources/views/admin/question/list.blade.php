<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} Mövzusuna aid suallar</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-end">
                <a href="{{ route('questions.create',$quiz->id) }}" class="btn btn-success mb-2 mt-2"><i class="fa fa-plus"></i> Sual Əlavə Et</a>
            </h5>
            <h5 class="card-title">
                <a href="{{ route('quizzes.index') }}" class="btn btn-secondary mb-2 mt-2"><i class="fa fa-arrow-left"></i> İmtahanlar</a>
            </h5>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Sual</th>
                    <th scope="col">Şəkil</th>
                    <th scope="col">1. Cavab</th>
                    <th scope="col">2. Cavab</th>
                    <th scope="col">3. Cavab</th>
                    <th scope="col">4. Cavab</th>
                    <th scope="col">Düzgün Cavab</th>
                    <th style="width: 90px" scope="col">Dəyişiklik</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quest as $question)
                        <tr>
                            <td>{{ $question->question }}</td>
                            <td>
                                @if ($question->image)
                                    <a href="{{ asset($question->image) }}" target="_blank" class="btn btn-primary">Göstər</a>
                                @endif
                            </td>
                            <td>{{ $question->answer1 }}</td>
                            <td>{{ $question->answer2 }}</td>
                            <td>{{ $question->answer3 }}</td>
                            <td>{{ $question->answer4 }}</td>
                            <td class="text-success">{{ substr($question->correct_answer,-1)}}. Cavab</td>
                            <td>
                                <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i></a>
                                <a href="{{ route('questions.destroy', $question->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr> 
                    @endforeach  
                </tbody>
                </table>
                {{ $quest->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>
