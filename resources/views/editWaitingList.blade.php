@extends('layouts.app')

@section('content')
<div class="row justify-content-center" style="margin-top: 30px;">
    <div class="col-md-8">
        <div class="card">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
              </thead>
                @foreach ($users as $user)
                <tbody>
                    <tr>
                        <td>N° {{ $user->rank }}</td>
                        <td>{{ $user->lastName.' '.$user->firstName }}</td>
                        <td>Edit</td>
                        <td>
                            <a href="{{ route('waitingList.delete', $user->id)}}" style="width:0">
                                <button type="button" class="btn btn-outline-danger">
                                    Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                  </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
