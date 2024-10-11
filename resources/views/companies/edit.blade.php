@extends('adminlte::page')

@section('title', 'Edit Company')

@section('content')
<div class="container-fluid ">
    <div class="row ">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">Edit Company</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $company->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $company->email }}">
                        </div>

                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" class="form-control" name="website" value="{{ $company->website }}">
                        </div>

                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" name="logo" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Company</button>
                        <a href="{{ route('companies.index') }}" type="submit" class="btn btn-secondary">Back to List</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
