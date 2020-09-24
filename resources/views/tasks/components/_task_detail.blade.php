{{ $slot }}
<form action="{{ $route }}" method="POST" class="{{ $view_only ? 'needs-validation' : ''}} {{ $form_class }}" novalidate>
    @csrf
    @if ($method)
        @method($method)
    @endif
    {{-- @method("delete") --}}
    <div class="form-row">
        <div class="col-8 mx-auto d-flex justify-content-end">
            <div class="content-text text-center indication"><span class="text-danger">&#42;</span>indicates required</div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-8 mx-auto">
            <div class="form-group">
                <label for="title">Title<span class="text-danger">&#42;</span></label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter task title" value="{{ $task ? $task->title : old('title') }}" {{ $view_only ? 'disabled' : ''}} required>
                <small class="invalid-feedback form-text text-danger"><img src="{{ asset('imgs/error-icon.svg') }}" alt="invalid-feedback-icon"> Please enter a title.</small>
            </div>
        </div>
    </div>


    <div class="form-row">
        <div class="col-8 mx-auto">
            <div class="form-group">
                <label for="description">Task Description</span></label>
                <textarea class="form-control" name="description" id="description" rows="6" value="{{ $task ? $task->description : old('description') }}" {{ $view_only ? 'disabled' : ''}}></textarea>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-12 text-center">
            <button class="btn btn-primary btn-submit" type="submit">{{ $action }}</button>
        </div>
    </div>

</form>
