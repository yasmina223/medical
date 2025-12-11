
@extends('backend.admin_master')
@section('admin')

<div class="d-flex justify-content-between mb-1">
    <h3>Welcome : {{Auth::user()->name }} </h3>
</div>

<div class="row mt-1">
    <div class="col-md-8">
        <h3 class="text-center mb-3 text-dark">
         Questiones</h3>

         <!-- alret for addition -->
        @if (session('success'))
        <h4  class="alert alert-success my-3"> {{session('success')}}</h4>
        @endif



        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Process</th>
                </tr>
            </thead>

            <tbody>
        @php($i=1)
            @foreach ( $questiones as $q)
            <tr>
                <td scope="row">{{$i++}}</td>
                <td>{{$q->question}}</td>
                <td>{{$q->answer}}</td>

                <td class="text-center">
                    <a href="{{route('questiones.edit',$q->id)}}" class="btn btn-success">Edit</a>
                    <a href="{{route('questiones.destroy',$q->id)}}" class="btn btn-danger">Delete</a>
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
                    <h3 class="text-center mb-3 text-dark"> Add </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('questiones.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="question" class="form-control form-control-lg mb-3" placeholder="Question">
                        @error('question')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <input type="text" name="answer" class="form-control form-control-lg mb-3" placeholder="Answer">
                        @error('answer')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary"> Add </button>
                  </form>
                </div>


        </div><!-- card -->
     </div><!-- col 4 -->
</div><!-- row -->

@endsection
