@extends('adminlte::page')

@section('title', 'Company Details')

@section('content_header')
    <h1>Company Details</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $company->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5><strong>Email:</strong> {{ $company->email }}</h5>
                                <h5>
                                    <strong>Website:</strong> 
                                    <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                                </h5>
                            </div>
                            <div class="col-md-6 text-center">
                                <h5><strong>Logo:</strong></h5>
                                @if ($company->logo)
                                    <img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }} Logo" class="img-fluid" style="max-width: 200px;">
                                @else
                                    <p>No Logo Available</p>
                                @endif
                            </div>
                        </div>

                        <hr>
                        <h4>Employees:</h4>
                        @if($company->employees->isEmpty())
                            <p>No employees found for this company.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($company->employees as $employee)
                                        <tr>
                                            <td>{{ $employee->first_name }}</td>
                                            <td>{{ $employee->last_name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        <hr>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                            </form>
                            <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
    </style>
@stop
