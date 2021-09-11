<x-app-layout>
    <x-slot name="header">İmtahan Əlavə Et</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('quizzes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>İmtahan Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div><br>
                <div class="form-group">
                    <label>Açıqlama</label>
                    <textarea name="description" class="form-control" rows="4"> {{ old('description') }}</textarea>
                </div><br>
                <div class="form-group">
                    <label>Bitiş Tarixi Olsun ?</label>
                    <input class="ml-2" id="isFinished" {{ old('finished_at')?'checked' :''}} type="checkbox">
                </div><br>
                <div id="finishedDiv" @if(!old('finished_at')) style="display:none" @endif class="form-group">
                    <label>Bitiş Tarixi</label>
                    <input type="datetime-local" id="finished_at" name="finished_at" value="{{ old('finished_at') }}" class="form-control">
                </div><br>
                <div class="form-group d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-success btn-block">Əlavə Et</button>
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
                    $('#inputaVerilenID').val(null)
                }
            });
        </script>
    </x-slot>
</x-app-layout>