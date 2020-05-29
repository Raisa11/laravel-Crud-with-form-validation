@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">



                <div class="card">
                    <div class="card-header">Details  of {{$profile->name}}
                        <a href="{{url('/profile')}}" class="btn btn-primary float-right"> Back</a>


                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name: </strong>
                                        {{$profile->name}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Address: </strong>
                                        {{$profile->address}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Image: </strong>
                                        <img src="{{asset($profile->image)}}" width="50">
                                    </div>
                                </div>

                            </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


