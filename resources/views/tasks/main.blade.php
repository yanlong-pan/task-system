@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Main</h1>

    <div class="row row-cols-1 row-cols-md-2 mt-3">
        @foreach ($tasks as $task)
        <div class="col mb-4">
            <div class="card">
                <div class="card-header">
                    {{ $task->title }}
                    <div class="float-right">
                        <img class="modal_trigger_icon" src="{{ asset('imgs/pen.svg') }}" alt="edit task">
                        <a href="{{ route('tasks.delete', $task->id) }}" data-target="#delete_task_modal" data-toggle="modal">
                            <img class="modal_trigger_icon" src="{{ asset('imgs/close.svg') }}" alt="delete task">
                        </a>
                        
                    </div>

                </div>
                <div class="card-body">
                    <p class="card-text">{{ $task->description }}</p>
                    <p class="card-text text-right"><small class="text-muted">{{ now()->diffForHumans($task->updated_at) }}</small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- <div class="modal fade" id="delete_task_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div> --}}

    <div class="modal fade" id="delete_task_modal" tabindex="-1" aria-labelledby="delete_task_modal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            {{-- <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
          </div>
        </div>
      </div>


    <div class="d-flex justify-content-end">
        {{ $tasks->links() }}
    </div>

</div>
@endsection

@section('js')
<script type="text/javascript">
    $('[data-toggle="modal"]').click(function(e){
        console.log($(this).attr('href'));
        $($(this).data("target")+' .modal-content').load($(this).attr('href'));
    })
</script>
@endsection
