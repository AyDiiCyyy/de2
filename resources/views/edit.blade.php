@extends('layout');
@section('title', 'Thêm')
@section('content')
    <form method="POST" action="{{ route('musician.update',$musician) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="name" class="form-control" value="{{$musician->name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh</label>
            <input type="file" name="profile_picture" class="form-control">
            <img src="{{ asset('storage') }}/{{$musician->profile_picture}}" alt="" width="100">
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày sinh</label>
            <input type="date" name="birth_date" class="form-control" value="{{$musician->birth_date}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <input type="text" name="instrument" class="form-control" value="{{$musician->instrument}}">
        </div>
        <div class="mb-3">
            <label class="form-label">bio</label>
            <textarea name="biography" id="" cols="30" rows="10" class="form-control">{{$musician->biography}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
@endsection
