
@extends('backend.admin_master')
@section('admin')

<div class="d-flex justify-content-between mb-1">
    <h3>Welcome : {{Auth::user()->name }} </h3>
    
</div>

<div class="row mt-3">
    <div class="col-md-8">
        <h3 class="text-center mb-3 text-dark">
            All Services</h3>

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
                    <th scope="col">Icon</th>
                    <th scope="col">Process</th>
                </tr>
            </thead>

            <tbody>
        @php($i=1)
            @foreach ( $services as $service)
            <tr>
                <td scope="row">{{$i++}}</td>
                <td>{{$service->title}}</td>
                <td>{{$service->description}}</td>
                {{-- <td><i class="{{$service->icon}}"></i></td> --}}
                <td><img src="{{$service->icone}}" style="width: 70px; "></td>
                <td class="text-center">
                    <a href="{{route('Services.edit', $service->id)}}" class="btn btn-success">Edit</a>
                    <a href="{{route('Services.destroy', $service->id)}}" class="btn btn-danger">Delete</a>
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
                    <h3 class="text-center mb-3 text-dark"> Add Services</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('Services.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="title" class="form-control form-control-lg mb-3" placeholder="title of service">

                        <textarea name="description" class="form-control form-control-lg mb-3" placeholder="description of service"></textarea>
                        @error('icon')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="file" name="icone" class="form-control form-control-lg mb-3" >

                        <button type="submit" class="btn btn-primary">Add Service</button>
                  </form>
                </div>


        </div><!-- card -->
     </div><!-- col 4 -->
</div><!-- row -->

@endsection
