@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('School') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a href="{{route('school.create')}}" class="btn btn-success">Create</a>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>

                                </tr>
                                </thead>
                                <tbody>

                                    @forelse($school as $row)
                                        <tr>
                                    <th scope="row">{{$row->id}}</th>
                                    <td>{{$row->name}}</td>
                                    <td>
                                        <a href="{{route('school.edit',$row->id)}}" class="btn btn-info">Edit</a>
                                        </td>
                                            <td>
                                        <form action="{{ route('school.destroy',$row->id) }}" method="Post">
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
                </div>
            </div>
        </div>
        {{$school->links()}}
    </div>
@endsection
