@extends('admin.master')

@section('title', 'Thêm mới danh mục tin tức')

@section('content')
    <div class="container mt-4">
        <h1>Thêm danh mục</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Tên:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="description">Ghi chú:</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    value="{{ old('description') }}">
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
@endsection
