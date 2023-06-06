@extends('app')
@section('title')
    Create Post
@endsection
@section('header')
    <style>
        th {
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        <div class="container col-lg-10 mt-3 mb-3 pt-3" style="border: 10px;">
            <h1>အသစ်ဖြည့်ပါ</h1>
            @csrf
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block mt-4">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger col-lg-12 mt-4">
                    <ul>
                        <ol>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="form-floating col-lg-6 mt-3">
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                    <label for="title" style="color: rgb(79, 78, 78)">ခေါင်းစဉ်</label>
                </div>
                <div class="form-group col-lg-6"></div>
                <div class="form-group col-lg-6 mt-3">
                    <label for="description">အကြောင်းအရာ</label>
                    <textarea name="description" class="form-control mt-1" placeholder="အကြောင်းအရာ" rows="6">{{ old('description') }}</textarea>
                </div>
                <div class="form-group col-lg-6"></div>
                <div class="col-lg-6 mt-3">
                    <label for="file" class="form-label">ဖိုင်</label>
                    <input class="form-control form-control-sm" id="file" type="file" name="file" value="{{ old('file') }}">
                </div>
                <div class"form-flex col-lg-6"></div>
                <div class="form-group col-lg-6">
                    <button type="submit" class="btn btn-success mt-3">သိမ်းမယ်</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">နောက်သို့</a>
                </div>
            </div>
            <hr>
    </form>
@endsection
