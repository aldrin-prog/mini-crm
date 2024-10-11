@extends('adminlte::page')

@section('title', 'Companies')

@section('content')
<div class="container-fluid ">
    <div class="row ">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Companies List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="companies-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Logo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through companies (this will be populated with dynamic data later) -->
                            <tr>
                                <td>Company A</td>
                                <td>admin@companya.com</td>
                                <td><a href="http://companya.com" target="_blank">www.companya.com</a></td>
                                <td><img src="{{ asset('storage/logos/companya.jpg') }}" alt="Company A Logo" width="100"></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            <!-- Add more rows dynamically -->
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
