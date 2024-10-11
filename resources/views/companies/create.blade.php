@extends('adminlte::page')

@section('title', 'New Company')
@section('content')
<h1>Create New Company</h1>
    
    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf {{-- Add CSRF token for security --}}
        
        <div class="form-group">
            <label for="name">Company Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="website">Company Website:</label>
            <input type="url" class="form-control" id="website" name="website" required>
        </div>

        <div class="form-group">
            <label for="logo">Logo:</label>
            <input type="file" class="form-control-file" id="logo" name="logo" accept="image/*" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Create Company</button>
        <a href="{{ route('companies.index') }}" type="submit" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
