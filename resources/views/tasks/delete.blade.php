@component('tasks.components._task_detail', [
        'form_class' => 'form-modal',
        'view_only' => true,
        'route' => route('tasks.destroy', $task->id),
        'method' => "delete",
        'task' => $task,
        'action' => 'Delete',
    ])

    <h2 class="text-center mt-3"> Are you sure to delete this task? </h2>
@endcomponent