@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">{{ __('Create new Task') }}</h1>
    @component('tasks.components._task_form', [
            'view_only' => false,
            'task' => '',
        ])
    @slot('form_header')
        <form action="{{ route('tasks.store') }}" method="post" class="needs-validation form-main" novalidate>
            @csrf
    @endslot
    @slot('form_footer')
        <div class="form-row">
            <div class="col-12 text-center">
                <button class="btn btn-primary btn-submit" type="submit">{{ __('Create') }}</button>
            </div>
        </div>
    @endslot
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
