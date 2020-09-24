@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Create new Task</h1>
    {{-- <form action="{{ route('tasks.store') }}" method="post" class="needs-validation form-main" novalidate>
        @csrf
        <div class="form-row">
            <div class="col-8 mx-auto d-flex justify-content-end">
                <div class="content-text text-center indication"><span class="text-danger">&#42;</span>indicates required</div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-8 mx-auto">
                <div class="form-group">
                    <label for="title">Title<span class="text-danger">&#42;</span></label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter task title" required>
                    <small class="invalid-feedback form-text text-danger"><img src="{{ asset('imgs/error-icon.svg') }}" alt="invalid-feedback-icon"> Please enter a title.</small>
                </div>
            </div>
        </div>


        <div class="form-row">
            <div class="col-8 mx-auto">
                <div class="form-group">
                    <label for="description">Task Description</span></label>
                    <textarea class="form-control" name="description" id="description" rows="6"></textarea>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-12 text-center">
                <button class="btn btn-primary btn-submit" type="submit">Create</button>
            </div>
        </div>

    </form> --}}
    @component('tasks.components._task_detail', [
            'form_class' => 'form-main',
            'view_only' => false,
            'route' => route('tasks.store'),
            'method' => '',
            'task' => '',
            'action' => 'Create',
        ])
    @endcomponent
</div>
@endsection

@section('js')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
</script>
@endsection
