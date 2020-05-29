@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{url('/profile/'.$profile->id)}}" method="post" enctype="multipart/form-data">
                           @method('put')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" value="{{$profile->name}}">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$profile->address}}">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label >Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="your photo">
                               <img src="{{asset($profile->image)}}" width="80">
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <button type="submit" class="btn btn-primary" name="btn">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



