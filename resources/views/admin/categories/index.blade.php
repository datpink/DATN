@extends('admin.master')

@section('title', 'Thêm mới danh mục tin tức')

@section('content')
    <div class="main-admin">
        <div class="container mt-4">
            <h1>Danh sách danh mục</h1>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('errors'))
                <div class="alert alert-danger">{{ session('errors') }}</div>
            @endif

            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Thêm danh mục</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ghi chú</th>
                        <th>Ngày tạo</th>
                        <th>Lớp menu</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description ?? 'Trống' }}</td>
                            <td>{{ $category->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $category->parent_id }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                if (confirm('Xóa danh mục và cả các bài viết liên quan?')) {
                    this.submit();
                }
            });
        });
    </script>

@endsection
