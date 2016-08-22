<!-- resources/views/common/errors.blade.php -->

@if (count($errors) > 0)
    {{-- form error list --}}
    <div class="alert alert-danger">
        <strong>Woops! something went wrong</strong>
        <br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif