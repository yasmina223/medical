
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

            <div class="card p-3 ">
                    <div class="card-header">
                        <h3 class="text-center mb-3 text-dark"> Edit</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('doctors.update',$doctors->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="text-dark py-2 " for="inlineFormCustomSelectPref">Name</label>
                            <input type="text" name="name" value="{{$doctors->name}}" class="form-control form-control-lg mb-3" placeholder="Name">

                            <div class="form-group">
                                <label class="" for="inlineFormCustomSelectPref">Department</label>
                                <select name="depart_id" id="depart_id" class="form-control" required>
                                    <option value="" selected disabled>{{ $doctors->depart->title}}</option>
                                    @foreach ( $departs as $depart )
                                        <option value="{{ $depart->id }}">{{ $depart->title }}</option>
                                    @endforeach
                                </select>
                               </div>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="file" name="image" class="form-control form-control-lg mb-3">
                            @error('face')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                         <div class="form-group">
                            <label for="exampleInputEmail1">Facebook</label>
                            <input type="text" class="form-control" id="face" name="face" value="{{$doctors->face}}" >
                        </div>
                        @error('ansta')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                         <div class="form-group">
                            <label for="exampleInputEmail1">Instagram</label>
                            <input type="text" class="form-control" id="ansta" name="ansta" value="{{$doctors->ansta}}" >
                        </div>
                        @error('twitter')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                         <div class="form-group">
                            <label for="exampleInputEmail1">Twitter</label>
                            <input type="text" class="form-control" id="twitter" name="twitter" value="{{$doctors->twitter}}" >
                        </div>
                        @error('linkedin')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                         <div class="form-group">
                            <label for="exampleInputEmail1">linkedIn</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{$doctors->linkedin}}">
                         </div>

                         <div class="modal-footer">
                            <button type="submit" class="btn btn-primary "> Edit </button>
                          </div>
                      </form>
                    </div>


            </div><!-- card -->
         </div><!-- col 4 -->




@endsection
