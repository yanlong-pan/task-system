@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Main</h1>
    {{ $tasks[0]->created_at }}
    @php
        // dd($tasks[0]->created_at);
    @endphp
</div>
@endsection
