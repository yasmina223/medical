
@extends('backend.admin_master')
@section('admin')

<div class="d-flex justify-content-between mb-1">
    <h3>Welcome : {{Auth::user()->name }} </h3>

</div>



         <!-- alret for addition -->
        @if (session('success'))
        <h4  class="alert alert-success my-3"> {{session('success')}}</h4>
        @endif






    <div class="col-md-12 my-5">

        <div class="card p-3 text-center">
                <div class="card-header">
                    <h3 class="text-center mb-3 text-dark"> Edit Services</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('Services.update',$services->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="title"  value="{{$services->title}}" class="form-control form-control-lg mb-3" placeholder="title of service">

                        <textarea name="description"  class="form-control form-control-lg mb-3" placeholder="description of service">{{$services->description}}</textarea>
                        @error('icone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="file" name="icone" class="form-control form-control-lg mb-3" placeholder="icone of service">

                        <button type="submit" class="btn btn-primary">Edit Service</button>
                  </form>
                </div>






@endsection
