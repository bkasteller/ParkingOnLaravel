@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 30px;">
    <div class="col-md-8">
        <div class="card" style="height:600px;overflow: auto">
            
            <table class="table" >
                              <th>Place    
                    <a href="{{ route('place.create') }}" style="float: right;right: 0">
                    <button type="button" class="btn">
                        + Add one place
                    </button>
                </a></th>
                

   
        @foreach ($places as $place)
         <tr>
       <td>
        
                    <p>
                        <B>Place N°{{ $place->id }}</B>
                        <br>
                        @if ( $place->occupied() )
                            Assigned to : {{ $place->user()->lastName.' '.$place->user()->firstName }}
                        @else
                            No user is assigned to this place.
                        @endif
                        <br>
                        Place status :
                        @if ( $place->available )
                            <font color="green">Open</font>
                        @else
                            <font color="red">Close</font>
                        @endif
                        <br>

                        <a href="{{ route('place.edit', $place) }}">
                            <button type="button" class="btn btn-outline-success">
                                Edit
                            </button>
                        </a>

                        <a href="{{ route('place.available', $place) }}">
                            <button type="button" class="btn">
                                @if ( $place->available )
                                    Close
                                @else
                                    Open
                                @endif
                            </button>
                        </a>
                    </p>
               
            </td>
            </tr>
                @endforeach
                

               
              
            </table>
        </div>
    </div>
</div>


</div>
@endsection
