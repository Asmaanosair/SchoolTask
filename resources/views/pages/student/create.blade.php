@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Student') }}</div>
                    @if(session('success'))
                        <div class="alert alert-success mb-1 mt-1">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('student.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="disabledSelect" class="col-md-4 col-form-label text-md-end">{{ __('School') }}</label>
                                <div class="col-md-6">
                                <select id="disabledSelect" class="form-control @error('school_id') is-invalid @enderror" name="school_id"  required autocomplete="school_id" autofocus>
                                    @forelse($school as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @empty
                                        <option value="">No Data</option>
                                    @endforelse
                                </select>
                                    @error('school_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
