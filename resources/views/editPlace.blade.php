@extends('layouts.app')

@section('content')

    <div class="row justify-content-center" style="margin-top: 30px;">
        <div class="col-md-5" >
            <div class="card-header" >{{ __('Place N°').$place->id }}  

            </div>

            <div class="card justify-content-center" style="height: 200px;overflow:auto;text-align: center;">
                @if ( $place->occupied() )
                   <p> Actually assigned to {{ $place->user()->lastName.' '.$place->user()->firstName  }} for {{ $place->booking()->remainingDays() }} days remaining.</p>
                   
                      
                <a href="{{ route('booking.delete', $place->booking()) }}" style="float: right;">
                        <button type="button" class="btn btn-outline-danger">
                            End this Booking
                        </button>
                    </a>
                
                @else
                    <p>No user is assigned to this place.</p>
                    <br>
                    @if ( $place->user() )
                        <P>The last user is : {{ $place->user()->lastName.' '.$place->user()->firstName }}</P>
                    @endif
                @endif
            </div>
          
        </div>
    

    
        <div class="col-md-5" >
            <div class="card-header">{{ __('Historic') }}</div>

            <div class="card" style="height: 500px;overflow:auto">
                <ul>
                @foreach( $place->bookings as $booking )
                
                    <li style="border-top:1px solid rgba(0,0,0,.125)">
                        <p>From {{ toDate($booking->created_at) }} to {{ $booking->lastDay() }} ------------------</p>
                          <p>Assigned to {{ $booking->user->lastName.' '.$booking->user->firstName  }} for {{ $booking->duration ? $booking->duration : '∞' }} days (Booking N°{{ $booking->id }})</p>
                    </li>
                  
                @endforeach
            </ul>
            </div>
        </div>
    </div>
@endsection
