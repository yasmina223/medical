
@extends('backend.admin_master')
@section('admin')

{{-- <div class="d-flex justify-content-between mb-1">
    <h3>Welcome : {{Auth::user()->name }} </h3>

</div> --}}

<div class="row mt-3">
    <div class="col-md-12">
        <h3 class="text-center mb-3 text-dark">
          Appoinment</h3>
 {{--
         <!-- alret for addition -->
        @if (session('success'))
        <h4  class="alert alert-success my-3"> {{session('success')}}</h4>
        @endif --}}



        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Date</th>
                    <th scope="col">Department</th>
                    <th scope="col">Doctor</th>

                </tr>
            </thead>

            <tbody>
        @php($i=1)
            @foreach ($appoinments as $appoinment)
            <tr>
                <td scope="row">{{$i++}}</td>
                <td>{{$appoinment->name}}</td>
                <td>{{$appoinment->email}}</td>
                <td>{{$appoinment->phone}}</td>
                <td>{{$appoinment->date}}</td>
                <td>{{$appoinment->depart->title}}</td>
                <td>{{$appoinment->doctor->name}}</td>

            </tr>
            @endforeach

            </tbody>
        </table>
{{-- <div>
    {{ $services->links() }}

</div> --}}

    </div><!-- col 8 -->



</div><!-- row -->

@endsection
