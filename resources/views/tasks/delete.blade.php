@component('tasks.components._task_form', [
        'view_only' => true,
        'task' => $task,
    ])
    @slot('form_header')
    <form action="{{ route('tasks.destroy', $task->id) }}" method="post" class="needs-validation form-modal">
        @csrf
        @method('delete')
    @endslot
    @slot('form_footer')
        <div class="form-row">
            <div class="col-12 text-center">
                <button class="btn btn-danger btn-submit" type="submit">Delete</button>
            </div>
        </div>
    @endslot
    <h2 class="text-center mt-3 d-block mx-auto w-75"> Are you sure to delete this task? </h2>
@endcomponent