@extends('layouts.main')
@section('main')
    <h4>New notes today</h4>
    <div class="row me-0">
        @foreach ($notes as $note)
        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="note card m-1 mb-3 h-100" >
                <div class="card-body h-100  d-flex flex-column">
                    <h5 class="card-title">{{ $note->title }}</h5>
                    @if(strlen(strip_tags($note->description)) > 80)
                        <p>{!! substr(strip_tags($note->description), 0, 80) . '...' !!}</p>
                    @else
                        <p>{!! strip_tags($note->description) !!}</p>
                    @endif
                    <a id="view" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" onclick="getNote({{ $note->id }})" class="btn btn-primary w-50">View Note</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
@section('js')
    <script>
        CKEDITOR.replace('descriptionView');
        $('p').addClass('card-text flex-fill');
        function getNote(id){
            $.ajax({
                url: 'notes/getnote',
                method: 'GET',
                data:{id: id},
                success: function(response) {
                    CKEDITOR.instances.descriptionView.setData(response.note.description);
                    $('#titleView').val(response.note.title);
                }
            });
        }
    </script>
@endsection