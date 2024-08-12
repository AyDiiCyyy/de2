@extends('layout');
@section('title', 'Thêm')
@section('content')
    <form method="POST" action="{{ route('musician.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh</label>
            <input type="file" name="profile_picture" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày sinh</label>
            <input type="date" name="birth_date" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <input type="text" name="instrument" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">bio</label>
            <textarea name="biography" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
