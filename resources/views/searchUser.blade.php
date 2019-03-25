@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card"  style="overflow: auto;height: 500px">
                <div class="card-header">{{ __('Search') }}</div>

                <div class="card-body">

                            

                    <form method="POST" action="{{ route('user.search') }}">
                        @csrf

                  <div class="col-md-12" style="margin-bottom:30px">
                                <input id="searchx" type="text" class="form-control " name="searchx" placeholder="Search" maxlength="255">
                            </div>

                                   <div class="col-sm-12">
                          <div class="form-group">
                              <select class="selectpicker form-control" id="selectBox" >
                                  <option value="all"  selected >All</option>
                                  <option value="member" >member</option>
                                <option value="admin"  >admin</option>
         
                              </select>
                          </div>
                        </div>

                </div>
            </div>
        </div>

        <div class="col-md-6" >

            <div class="card"  style="overflow: auto;height: 500px">
                 <div class="card-header ">{{ __('User') }}</div>
                @if ( !empty($users) )
                    @foreach ( $users as $user )
                        <div class="searchblock {{ $user->type }} " style="padding: 25px;">
                            Last Name : {{ $user->lastName }}
                            <br>
                            First Name : {{ $user->firstName }}
                            <br>
                            Email : {{ $user->email }}
                            <br>
                             Type : {{ $user->type }}
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



      $("#selectBox").on("change", function() {
        var selectBox = document.getElementById("selectBox");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
       categ(selectedValue);



       function categ(categ) {
    
        console.log("searching process...");
        var tr, td, i, txtValue;
        tr = $(".searchblock");
            if ( categ != "all" ) {
        for (i = 0; i < tr.length; i++) {
      
               td = tr[i];
               txtValue = td.textContent.toLowerCase() || td.innerText.toLowerCase();
            if (txtValue.indexOf(categ) > -1) {
                $(td).css( "display", "unset" );
                 $(td).removeClass("categx");
            } else {
                $(td).css( "display", "none" );
                $(td).addClass("categx");
            }
          }
      
        } else{
            $(".searchblock").show();
 $(".searchblock").removeClass("categx");
            }
       }


    })
  

    $("#searchx").on("keyup", function() {
         //$('#selectBox option').removeAttr('selected').filter('[value=all]').attr('selected', true)
        console.log("searching process...");
    var tr, td, i, txtValue;
  var searchVal = $(this).val().toLowerCase();
    tr = $(".searchblock");
        if ( searchVal != '' ) {
    for (i = 0; i < tr.length; i++) {
  
           td = tr[i];
           txtValue = td.textContent.toLowerCase() || td.innerText.toLowerCase();
        if (txtValue.indexOf(searchVal) > -1) {
            if ( !$(td).hasClass("categx") ) {
            $(td).css( "display", "unset" );
            }
        } else {
            $(td).css( "display", "none" );
        }
      }
  
    } else{
        $(".searchblock:not(.categx)").show();
        }
    })
  
  
  
 
  
    });
</script>
@endsection
