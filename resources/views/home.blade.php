@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                         @if (!$user->rank)
                        <button type="button" class="btn btn-outline-success" onclick="event.preventDefault(); document.getElementById('request').submit();">
                            Place request
                        </button>

                        <form id="request" action="{{ route('booking.create') }}" method="POST" style="display:none;" >
                            @csrf
                            <input type="hidden" name="user" value="{{ $user->id }}">
                        </form>
                        @endif

                        <button type="button" class="btn btn-outline-danger" onclick="event.preventDefault(); document.getElementById('cancel').submit();">
                            Cancel the request
                        </button>

                        <form id="cancel" action="{{ route('booking.cancel') }}" method="POST" style="display:none;" >
                            @csrf
                            <input type="hidden" name="user" value="{{ $user->id }}">
                        </form>

                        @if ($user->rank)

                         <p>waiting Placement: {{ $user->rank }}</p>                      
                         @endif

                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>




@endsection
