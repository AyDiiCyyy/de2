@extends('layout');
@section('title','Danh sách')
@section('content')
<a href="{{ route('musician.create') }}" class="btn btn-primary">Thêm</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Ngày sinh</th>
        <th scope="col">Nhạc cụ</th>
        <th scope="col">Mô tả</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($musician as $data )
        <tr>
            <th scope="row">{{$data->id}}</th>
            <td>{{$data->name}}</td>
            <td><img src="{{ asset('storage') }}/{{$data->profile_picture}}" alt="" width="100"></td>
            <td>{{$data->birth_date}}</td>
            <td>{{$data->instrument}}</td>
            <td>{{$data->biography}}</td>
            <td>
                <a href="{{ route('musician.edit', $data) }}" class="btn btn-primary">Sửa</a>
                <form action="{{ route('musician.destroy', $data) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
                </form>
            </td>
    
            
          </tr>
        @endforeach
      
    </tbody>
  </table>

@endsection