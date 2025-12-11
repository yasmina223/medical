@
@extends('backend.admin_master')
@section('admin')

<div class="d-flex justify-content-between mb-1">
    <h3>Welcome : {{Auth::user()->name }} </h3>

</div>



         <!-- alret for addition -->
        @if (session('success'))
        <h4  class="alert alert-success my-3"> {{session('success')}}</h4>
        @endif




        <div class="col-md-12 my-3">

            <div class="card p-3 text-center">
                    <div class="card-header">
                        <h3 class="text-center mb-3 text-dark"> Edit </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('gallery.update',$gallery->id)}}" method="post" enctype="multipart/form-data">
                            @csrf

                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="file" name="image" class="form-control form-control-lg mb-3">

                            <button type="submit" class="btn btn-primary"> Edit </button>
                      </form>
                    </div>


            </div><!-- card -->
         </div><!-- col 4 -->




@endsection
