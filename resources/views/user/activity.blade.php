@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="card">
                <div class="card-header"><h5>User <b>{{ $user->name }}</b> activity</h5></div>
                <div class="card-body">
                    @foreach($activities as $activity)

                        @include("admin.activities.{$activity->type}")

                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
