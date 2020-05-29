@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{url('/edit/'.$info->id)}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$info->name}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$info->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" name="address" value="{{$info->address}}">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                    <input type="text" class="form-control" name="city" value="{{$info->city}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">State</label>
                                    <select name="state" class="form-control">
                                        <option selected>Choose...</option>
                                        <option value="1" {{$info->state == 1 ? 'selected' : ''}}>Dhaka</option>
                                        <option value="2" {{$info->state == 2 ? 'selected' : ''}}>Comilla</option>
                                        <option value="3" {{$info->state == 3 ? 'selected' : ''}}>Barisal</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Zip</label>
                                    <input type="text" name="zip" class="form-control" value="{{$info->zip}}">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" name="btn">Update Information</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


