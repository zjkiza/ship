@extends('layouts.start')

@section('content')

    <div class="row">
        <h1>Read notifications</h1>
    </div>

    @include('notification.table')

@endsection
