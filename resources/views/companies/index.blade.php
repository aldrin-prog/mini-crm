@extends('adminlte::page')

@section('title', 'Companies')

@section('content')
<div class="container-fluid ">
    <div class="row ">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-center">
                    <h3 class="card-title">Companies List</h3>
                    <a href="{{route('companies.create')}}" class="btn btn-sm btn-primary"> Add new company</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="companiesTable" class="table table-bordered table-hover">
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
                            @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td><a href="<?=$company->website?>" target="_blank">{{$company->website}}</a></td>
                                <td>
                                    @if ($company->logo)
                                        <img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }} Logo" style="width: 100px;">
                                    @else
                                        No Logo
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('companies.show', $company->id) }}" class="btn btn-sm w-100 mb-2 btn-info">Show</a>
                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm w-100 mb-2 btn-primary">Edit</a>
                                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sn w-100" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <!-- Add more rows dynamically -->
                        </tbody>
                    </table>
                    
                </div>
                <div class="card-footer">
                    {{ $companies->links('pagination::bootstrap-4') }}
                </div>
                <!-- /.card-body -->
            </div>
            
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection


