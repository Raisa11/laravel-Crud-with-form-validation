@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @if(Session::get('message'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            <div class="card">
                <div class="card-header">Dashboard
                    <a href="{{url('/insert')}}" class="btn btn-primary float-right"> add</a>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">sl</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">State</th>
                                <th scope="col">Zip</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($infos as $info)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$info->name}}</td>
                                <td>{{$info->email}}</td>
                                <td>{{$info->address}}</td>
                                <td>{{$info->city}}</td>
                                <td> @if($info->state == 1)
                                         Dhaka
                                    @elseif($info->state == 2)
                                    comilla
                                    @elseif($info->state == 3)
                                    Barisal
                                    @endif
                                </td>
                                <td>{{$info->zip}}</td>
                                <td>
                                    <a href="{{url('/edit/'.$info->id)}}">Edit</a>
                                    <a href="{{url('/delete/'.$info->id)}}" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
