@
@extends('backend.admin_master')
@section('admin')

{{-- <div class="d-flex justify-content-between mb-1">
    <h3>Welcome : {{Auth::user()->name }} </h3>

</div> --}}

<div class="row mt-3">
    <div class="col-md-12">
        <h3 class="text-center mb-3 text-dark">
           Contact Us</h3>
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
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>

                </tr>
            </thead>

            <tbody>
        @php($i=1)
            @foreach ($contacts as $c)
            <tr>
                <td scope="row">{{$i++}}</td>
                <td>{{$c->name}}</td>
                <td>{{$c->email}}</td>
                <td>{{$c->subject}}</td>
                <td>{{$c->message}}</td>

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
