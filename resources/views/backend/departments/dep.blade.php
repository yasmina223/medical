
@extends('backend.admin_master')
@section('admin')

<div class="d-flex justify-content-between mb-1">
    <h3>Welcome : {{Auth::user()->name }} </h3>
</div>

<div class="row mt-1">
    <div class="col-md-8">
        {{--
        <h3 class="text-center mb-3 text-dark">
          Departments</h3> --}}

         <!-- alret for addition -->
        @if (session('success'))
        <h4  class="alert alert-success my-3"> {{session('success')}}</h4>
        @endif



        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Brief_Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Process</th>
                </tr>
            </thead>

            <tbody>
        @php($i=1)
            @foreach ( $departs as $depart)
            <tr>
                <td scope="row">{{$i++}}</td>
                <td>{{$depart->title}}</td>
                <td>{{$depart->description}}</td>
                <td>{{$depart->brief_description}}</td>
                <td><img src="{{$depart->image}}" style="width: 70px; "></td>
                <td class="text-center">
                    <a href="{{route('Departments.edit',$depart->id)}}" class="btn btn-success">Edit</a>
                    <a href="{{route('Departments.destroy',$depart->id)}}" class="btn btn-danger">Delete</a>
                </td>

            </tr>
            @endforeach

            </tbody>
        </table>
{{-- <div>
    {{ $services->links() }}

</div> --}}

    </div><!-- col 8 -->


    <div class="col-md-4">

        <div class="card p-3 text-center">
                <div class="card-header">
                    <h3 class="text-center mb-3 text-dark"> Add Departments </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('Departments.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="title" class="form-control form-control-lg mb-3" placeholder="title">

                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        <textarea name="description" class="form-control form-control-lg mb-3" placeholder="description"></textarea>

                        @error('brief_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        <textarea name="brief_description" class="form-control form-control-lg mb-3" placeholder="brief description"></textarea>

                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="file" name="image" class="form-control form-control-lg mb-3">

                        <button type="submit" class="btn btn-primary"> Add </button>
                  </form>
                </div>


        </div><!-- card -->
     </div><!-- col 4 -->
</div><!-- row -->

@endsection
