@extends('backend.admin_master')
@section('admin')

<div class="d-flex justify-content-between mb-1">
    <h3>Welcome : {{Auth::user()->name }} </h3>
</div>

<div class="row mt-1">
    <div class="col-md-12">
        {{-- <h3 class="text-center mb-3 text-dark">
          SETTING</h3> --}}

         <!-- alret for addition -->
        @if (session('success'))
        <h4  class="alert alert-success my-3"> {{session('success')}}</h4>
        @endif




{{-- <div>
    {{ $services->links() }}

</div> --}}

    </div><!-- col 8 -->


    <div class="col-md-12 mb-3">

        <div class="card p-3 text-center">
                <div class="card-header">
                    <h3 class="text-center mb-3 text-dark"> Update Setting </h3>
                </div>
                <div class="card-body text-left text-dark mt-3">
                    <form action="{{route('settings.update',$settings->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col">
                                <label for="name" class="control-label">Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $settings->name }}" id="name"
                                    >
                            </div>
                            <div class="col">
                                <label for="address" class="control-label">Address</label>
                                <input type="text" class="form-control" placeholder="Address" name="address" id="address" value="{{ $settings->address }}"
                                    >
                            </div>
                        </div>
                        {{-- 2 --}}
                        <div class="row mb-3">
                            <div class="col">
                                <label>Email</label>
                                <input class="form-control fc-datepicker" placeholder="Email" name="email" id="email" value="{{ $settings->email }}"
                                    type="text" >
                            </div>
                            <div class="col">
                                <label>Phone</label>
                                <input class="form-control fc-datepicker" placeholder="Phone" name="phone" id="phone" value="{{ $settings->phone }}"
                                    type="text" >
                            </div>
                            </div>
                        {{-- 3 --}}
                        <div class="row mb-3">
                            <div class="col">
                                <label>From_Day</label>
                                <input class="form-control fc-datepicker" placeholder="From_Day" name="from_day" id="from_day" value="{{$settings->from_day}}"
                                    type="text" >
                            </div>
                            <div class="col">
                                <label>To_Day</label>
                                <input class="form-control fc-datepicker" placeholder="To_Day" name="to_day" id="to_day" value="{{$settings->to_day}}"
                                    type="text" >
                            </div>
                            </div>
                        {{-- 4--}}
                        <div class="row mb-3">
                            <div class="col">
                                <label>From_Time</label>
                                <input class="form-control fc-datepicker" placeholder="From_Time" name="from_time" id="from_time" value="{{ $settings->from_time }}"
                                    type="text" >
                            </div>
                            <div class="col">
                                <label>To_Time</label>
                                <input class="form-control fc-datepicker" placeholder="To_Time" name="to_time" id="to_time" value="{{ $settings->to_time }}"
                                    type="text" >
                            </div>
                            </div>
                        {{-- 5 --}}
                        <div class="row mb-3">
                            <div class="col">
                                <label>Facebook</label>
                                <input class="form-control fc-datepicker" placeholder="Facebook" name="facebook" id="facebook" value="{{ $settings->facebook }}"
                                    type="text" >
                            </div>
                            <div class="col">
                                <label>Instgram</label>
                                <input class="form-control fc-datepicker" placeholder="Instgram" name="instagram" id="instagram" value="{{ $settings->instagram }}"
                                    type="text" >
                            </div>
                            </div>
                        {{-- 6--}}
                        <div class="row mb-3">
                            <div class="col">
                                <label>Twitter</label>
                                <input class="form-control fc-datepicker" placeholder="Twitter" name="twitter" id="twitter" value="{{ $settings->twitter }}"
                                    type="text" >
                            </div>
                            <div class="col">
                                <label>Linkedin</label>
                                <input class="form-control fc-datepicker" placeholder="Linkedin" name="linkedin" id="linkedin" value="{{ $settings->linkedin }}"
                                    type="text" >
                            </div>
                        </div>
                         {{-- 7--}}
                         <div class="row mb-3">
                            <div class="col">
                                <label>Skype</label>
                                <input class="form-control fc-datepicker" placeholder="Skype" name="skype" id="skype" value="{{ $settings->skype }}"
                                    type="text" >
                            </div>
                            </div>

                       <div class="text-center"> <button type="submit" class="btn btn-primary mt-3 btn-lg"> Update </button></div>
                  </form>
                </div>


        </div><!-- card -->
     </div><!-- col 4 -->
</div><!-- row -->

@endsection
