@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Student') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a href="{{route('student.create')}}" class="btn btn-success">Create</a>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">School</th>
                                    <th scope="col">Order Num</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>

                                </tr>
                                </thead>
                                <tbody>

                                    @forelse($student as $row)
                                        <tr>
                                    <th scope="row">{{$row->id}}</th>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->school->name}}</td>
                                    <td>{{$row->order}}</td>
                                    <td>
                                        <a href="{{route('student.edit',$row->id)}}" class="btn btn-info">Edit</a>
                                        </td>
                                            <td>
                                        <form action="{{ route('student.destroy',$row->id) }}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                        </tr>
                                    @empty
                                        <tr>
                                        No Data
                                        </tr>
                                    @endforelse


                                </tbody>
                            </table>

                    </div>
                    {{$student->links()}}
                </div>
            </div>
        </div>

    </div>
@endsection
