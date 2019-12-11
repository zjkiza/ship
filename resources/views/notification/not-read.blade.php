@php $craw_id =  auth()->user()->craw->id @endphp

@extends('layouts.start')

@section('content')

    <div class="row">
        <h1>Notification</h1>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered users-table">
            <thead>
            <tr>

                <th scope="col">Id</th>
                <th scope="col">Message</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            @foreach($notifications as $notification)
                <tr>
                    <td>{{ $notification->id }}</td>
                    <td>{{ $notification->message }}</td>
                    <td>{{ $notification->created_at }}</td>
                    <td>
                        <form class="form-inline my-2 my-lg-0" action="{{ route('read.create') }}" method="POST">
                            @csrf
                            <input type="hidden" name="craw_id" value="{{ $craw_id }}">
                            <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">Read</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
