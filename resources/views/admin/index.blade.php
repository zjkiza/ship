@extends('layouts.base')

@section('content')

    <div class="row">
        <h1>All users</h1>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered users-table">
            <thead>
            <tr>

                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Sur name</th>
                <th scope="col">Rank</th>
                <th scope="col">Ship</th>
            </tr>
            </thead>

            @foreach($users as $user)
                <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->sur_name }}</td>
                    <td>{{ $user->rank_name }}</td>
                    <td>{{ $user->ship_name }}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
