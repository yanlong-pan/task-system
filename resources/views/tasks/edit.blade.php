@component('tasks.components._task_form', [
        'view_only' => false,
        'task' => $task,
    ])
    @slot('form_header')
    <form action="{{ route('tasks.update', $task->id) }}" method="post" class="needs-validation form-modal" novalidate>
        @csrf
        @method('patch')
    @endslot
    @slot('form_footer')
        <div class="form-row">
            <div class="col-12 text-center">
                <button class="btn btn-primary btn-submit" type="submit">Update</button>
            </div>
        </div>
    @endslot
@endcomponent
