<x-app-layout>
    <x-slot name="header">Düzəliş Et</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('quizzes.update',$quiz->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>İmtahan Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{ $quiz->title }}">
                </div><br>
                <div class="form-group">
                    <label>Açıqlama</label>
                    <textarea name="description" class="form-control" rows="4"> {{ $quiz->description }}</textarea>
                </div><br>
                <div class="form-group">
                    <label>İmtahan Statusu</label>
                    <select name="status" class="form-control">
                        <option @if($quiz->questions_count < 4) disabled @endif @if ($quiz->status == 'publish') selected @endif value="publish">Aktiv</option>
                        <option @if ($quiz->status == 'passive') selected @endif value="passive">Deaktiv</option>
                        <option @if ($quiz->status == 'draft') selected @endif value="draft">Tamamlanmamış</option>
                    </select>
                </div><br>
                <div class="form-group">
                    <label>Bitiş Tarixi Olsun ?</label>
                    <input class="ml-2" id="isFinished" {{ $quiz->finished_at?'checked' :''}} type="checkbox">
                </div><br>
                <div id="finishedDiv" @if(!$quiz->finished_at) style="display:none" @endif class="form-group">
                    <label>Bitiş Tarixi</label>
                    <input type="datetime-local" id="finished_at" name="finished_at" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at )) }}" @endif class="form-control">
                </div><br>
                <div class="form-group d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-success btn-block">Düzəliş Et</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="jquery">
        <script>
            $('#isFinished').change(function(){
                if($('#isFinished').is(':checked')){
                    $('#finishedDiv').show();
                }
                else{
                    $('#finishedDiv').hide();
                    $('#finished_at').val(null);
                }
            });
        </script>
    </x-slot>
</x-app-layout>