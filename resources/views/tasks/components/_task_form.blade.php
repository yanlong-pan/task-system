{{ $slot }}

    {{ $form_header }}

    @if(!$view_only)
        <div class="form-row">
            <div class="col-8 mx-auto d-flex justify-content-end">
                <div class="content-text text-center indication"><span class="text-danger">&#42;</span>{{ __('indicates required') }}</div>
            </div>
        </div>
    @endif

    <div class="form-row">
        <div class="col-8 mx-auto">
            <div class="form-group">
                <label for="title">
                    {{ __('Title') }}
                    <span class="text-danger">&#42;</span>
                </label>
                <input type="text" class="{{ $view_only ? 'form-control-plaintext' : 'form-control'}}" name="title" id="title" placeholder="Enter task title" value="{{ $task ? $task->title : old('title') }}" required>
                <small class="invalid-feedback form-text text-danger"><img src="{{ asset('imgs/error-icon.svg') }}" alt="invalid-feedback-icon"> {{ __('Please enter a title.') }}</small>
            </div>
        </div>
    </div>


    <div class="form-row">
        <div class="col-8 mx-auto">
            <div class="form-group">
                <label for="description">{{ __('Task Description') }}</span></label>
                <textarea class="{{ $view_only ? 'form-control-plaintext' : 'form-control'}}" name="description" id="description" rows="6">{{ $task ? $task->description : old('description') }}</textarea>
            </div>
        </div>
    </div>

    {{ $form_footer }}

</form>
