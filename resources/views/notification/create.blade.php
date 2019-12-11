@extends('layouts.base')

@section('content')
    <div class="row">
        <form class="col-md-6 offset-md-3 py-2" action="{{ route('admin.notification.store') }}" method="post">

            @csrf

            <div class="card">
                <h5 class="card-header">Add new notification</h5>

                <div class="pt-2 pr-2">
                    <div class="form-group row">
                        <label for="message" class="col-sm-3 col-form-label text-md-right">Message</label>
                        <div class="col-sm-9">
                        <textarea type="text" class="form-control {{ $errors->has('message') ? 'alert-danger' : '' }}"
                                  id="message" name="message">{{ old('message') }}</textarea>
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
            </div>

            @include('layer.error')

        </form>
    </div>

@endsection
