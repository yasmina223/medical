
@extends('backend.admin_master')
@section('admin')

<div class="d-flex justify-content-between mb-1">
    <h3>Welcome : {{Auth::user()->name }} </h3>
</div>

<!-- alret for addition -->
@if (session('success'))
<h4  class="alert alert-success my-3"> {{session('success')}}</h4>
@endif

<div class="row mt-1">
            <div class="col-md-12 my-3">
                <h3 class="text-center mb-3 text-dark">
                Doctors</h3>


     <div class="col-sm-6 col-md-4 col-xl-3 mb-3">
        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">Add </a>
      </div>


        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Department_Name</th>
                    <th scope="col">Instgrame</th>
                    <th scope="col">Facebook</th>
                    <th scope="col">Twitter</th>
                    <th scope="col">LinkedIn</th>
                    <th scope="col">Process</th>
                </tr>
            </thead>

            <tbody>
        @php($i=1)
            @foreach ( $doctors as $doc)
            <tr>
                <td scope="row">{{$i++}}</td>
                <td>{{$doc->name}}</td>
                <td><img src="{{$doc->image}}" style="width: 70px; "></td>
                <td>{{$doc->depart->title}}</td>
                <td>{{$doc->ansta}}</td>
                <td>{{$doc->face}}</td>
                <td>{{$doc->twitter}}</td>
                <td>{{$doc->linkedin}}</td>
                <td class="text-center">
                    <a href="{{route('doctors.edit',$doc->id)}}" class="btn btn-success">Edit</a>
                    <a href="{{route('doctors.destroy',$doc->id)}}" class="btn btn-danger">Delete</a>

                </td>

            </tr>
            @endforeach

        </tbody>
    </table>

             <!-- add -->
             <div class="modal fade" id="modaldemo8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="modaldemo8">Add</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <form action="{{ route('doctors.store')}}" method="post" enctype="multipart/form-data">
                         {{ csrf_field() }}
                         <div class="modal-body">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Name</label>
                                 <input type="text" class="form-control" id="name" name="name" required>
                             </div>

                             <div class="form-group">
                             <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Department</label>
                             <select name="depart_id" id="depart_id" class="form-control" required>
                                 <option value="" selected disabled> --choose depart--</option>
                                 @foreach ( $departs as $depart )
                                     <option value="{{ $depart->id }}">{{ $depart->title }}</option>
                                 @endforeach
                             </select>
                            </div>

                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                             <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" class="form-control" id="image" name="image" >
                            </div>
                            @error('face')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                             <div class="form-group">
                                <label for="exampleInputEmail1">Facebook</label>
                                <input type="text" class="form-control" id="face" name="face" >
                            </div>
                            @error('ansta')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                             <div class="form-group">
                                <label for="exampleInputEmail1">Instagram</label>
                                <input type="text" class="form-control" id="ansta" name="ansta" >
                            </div>
                            @error('twitter')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                             <div class="form-group">
                                <label for="exampleInputEmail1">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" >
                            </div>
                            @error('linkedin')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                             <div class="form-group">
                                <label for="exampleInputEmail1">linkedIn</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin" >
                             </div>

                         </div>
                         <div class="modal-footer">
                             <button type="submit" class="btn btn-success">submit</button>
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>


{{-- <div>
    {{ $services->links() }}

</div> --}}

    </div><!-- col 8 -->



</div><!-- row -->

@endsection
