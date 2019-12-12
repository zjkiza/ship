@extends('layouts.base')

@section('content')

    <div class="row">
        <h1>All notifications</h1>
    </div>

    @include('notification.table')

@endsection
