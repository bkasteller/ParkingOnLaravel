@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Search an USER') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.search') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last-name" type="text" class="form-control" name="lastName" value="{{ empty($get_back) ? '' : $get_back['lastName'] }}" maxlength="255">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first-name" type="texte" class="form-control" name="firstName" value="{{ empty($get_back) ? '' : $get_back['firstName'] }}" maxlength="255">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="texte" class="form-control" name="email" value="{{ empty($get_back) ? '' : $get_back['email'] }}" maxlength="255">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</div>

                            <div class="col-md-6">
                                <label for="member" class="col-md-6 col-form-label text-md-right">{{ __('Member') }}</label>
                                <input type="checkbox" class="adm" name="type" value="member">

                                <label for="admin" class="col-md-6 col-form-label text-md-right">{{ __('Admin') }}</label>
                                <input type="checkbox" class="adad" name="type" value="admin">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</div>

                            <div class="col-md-6">
                              <label for="member" class="col-md-6 col-form-label text-md-right">{{ __('Deactivate') }}</label>
                              <input type="checkbox" class="add" name="activate" value="f">

                              <label for="admin" class="col-md-6 col-form-label text-md-right">{{ __('Activate') }}</label>
                              <input type="checkbox" class="ada" name="activate" value="t">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6" style="height:">
            <div class="card">
                @if ( !empty($users) )
                    @foreach ( $users as $user )
                        <div style="padding: 25px;">
                            Last Name : {{ $user->lastName }}
                            <br>
                            First Name : {{ $user->firstName }}
                            <br>
                            Email : {{ $user->email }}
                            <br>

                            <a href="{{ route('user.edit', $user) }}">
                                <button type="button" class="btn btn-outline-success">
                                    Update
                                </button>
                            </a>

                            <a href="{{ route('user.activate', $user->id) }}">
                                <button type="button" class="btn btn-outline-danger">
                                    {{ $user->activate ? 'Desactivate' : 'Activate' }}
                                </button>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div style="padding: 30px;">No users found.</div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">

$( document ).ready(function() {

    $('.adm').change(function() {
        console.log("adm");
        if(this.checked) {
            $('.adad').prop('checked', false); // Unchecks it
        }
    })
        $('.adad').change(function() {
        if(this.checked) {
            $('.adm').prop('checked', false); // Unchecks it
        }
    })


    $('.add').change(function() {
        if(this.checked) {
            $('.ada').prop('checked', false); // Unchecks it
        }
    })

        $('.ada').change(function() {
        if(this.checked) {
            $('.add').prop('checked', false); // Unchecks it
        }
    })

    });
</script>
@endsection
