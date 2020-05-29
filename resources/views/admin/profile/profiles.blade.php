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
                    <div class="card-header">Profiles
                        <a href="{{url('/profile/create')}}" class="btn btn-primary float-right"> add</a>

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
                                <th scope="col">Address</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Show</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($profile as $profile)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$profile->name}}</td>
                                <td>{{$profile->address}}</td>
                                <td><img src="{{$profile->image}}" width="50"></td>
                                <td>
                                    <a href="{{url('/profile/'.$profile->id.'/edit')}}" >Edit</a>
                                </td>
                                <td>
                                    <form action="{{url('/profile/'.$profile->id)}}" method="post" >
                                       @method('delete')
                                        @csrf
                                    <button class="btn badge badge-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                </td>
                                <td>
                                    <a href="{{url('/profile/'.$profile->id)}}">Show</a>
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

