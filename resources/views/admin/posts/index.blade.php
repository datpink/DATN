@extends('admin.master')

@section('title', 'Thêm mới danh mục tin tức')

@section('content')
<div class="container mt-4">
    <h1>Danh sách Bài viết</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('errors'))
        <div class="alert alert-errors">{{ session('errors') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Tóm tắt</th>
                <th>Danh mục</th>
                <th>Ảnh</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td class="title-column">{{ $post->title }}</td>
                    <td class="title-column">{{ $post->summary }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                        @php
                            $partWithImage = $post->parts->where('type', 'image')->first();
                        @endphp

                        @if ($partWithImage && $partWithImage->image && \Storage::exists($partWithImage->image))
                            @php
                                $image = $partWithImage->image;
                            @endphp
                            <img src="{{ \Storage::url($image) }}" alt="{{ $post->title }}" width="100">
                        @else
                            <?php
                                // dd($partWithImage);
                            ?>
                        @endif

                    </td>
                    <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">
                            Sửa</a>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">
                            Chi tiết
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                            class="d-inline-block"
                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
