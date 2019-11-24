@extends('layouts.base')

@section('content')
    <div class="row">
        <form class="col-md-6 offset-md-3" action="{{ route('admin.user.store') }}" method="post">

            @csrf

            <div class="card">
                <h5 class="card-header">Add new user</h5>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-md-right">User name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control {{ $errors->has('name') ? 'alert-danger' : '' }}"
                                   id="name" name="name" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-md-right">E-mail</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control {{ $errors->has('email') ? 'alert-danger' : '' }}"
                                   id="email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-md-right">Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control {{ $errors->has('password') ? 'alert-danger' : '' }}"
                                   id="password" name="password" value="{{ old('password') }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="role" class="col-sm-3 col-form-label text-md-right">Role</label>
                        <div class="col-sm-9">
                            <select id="role" name="role" class="form-control">

                                @foreach(\App\User::ROLE as $role)
                                <option value={{ $role }} {{ (int)old('role')===$role ? 'selected' : ''  }}>
                                    {{ $role }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="craw_name" class="col-sm-3 col-form-label text-md-right">First name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control {{ $errors->has('craw_name') ? 'alert-danger' : '' }}"
                                   id="craw_name" name="craw_name" value="{{ old('craw_name') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sur_name" class="col-sm-3 col-form-label text-md-right">Sur name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control {{ $errors->has('sur_name') ? 'alert-danger' : '' }}"
                                   id="sur_name" name="sur_name" value="{{ old('sur_name') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rank_id" class="col-sm-3 col-form-label text-md-right">Rank</label>
                        <div class="col-sm-9">
                            <select id="rank_id" name="rank_id" class="form-control">

                                @foreach($ranks as $rank)
                                    <option value={{ $rank->id }} {{ (int)old('rank_id')===$rank->id ? 'selected' : ''  }}>
                                        {{ $rank->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ship_id" class="col-sm-3 col-form-label text-md-right">Ship</label>
                        <div class="col-sm-9">
                            <select id="ship_id" name="ship_id" class="form-control">

                                @foreach($ships as $ship)
                                    <option value={{ $ship->serial_number }} {{ (int)old('ship_id')===$ship->serial_number ? 'selected' : ''  }}>
                                        {{ $ship->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group text-md-right">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>

                @include('layer.error')

            </div>
        </form>
    </div>
@endsection
