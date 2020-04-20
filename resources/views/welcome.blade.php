@extends('layouts.main')
@section('content')

    <div class="container">
        
        <h1>Home Page</h1>
        @if (session('successMsg'))
             <div class="alert alert-success" role="alert">
                {{session('successMsg')}}
            </div>
        @endif

        <table class="table">
            <thead class="black white-text">
              <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($student as $students)
                    <tr>
                        <th scope="row">{{$students->id}}</th>
                        <td>{{$students->first_name}}</td>
                        <td>{{$students->last_name}}</td>
                        <td>{{$students->email}}</td>
                        <td>{{$students->phone}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('edit', $students->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                             ||
                            <form 
                                action="{{ route('delete', $students->id) }}" 
                                method="POST" class="d-inline"
                                onclick="return confirm('are you sure to delete this data ?')">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                              </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection