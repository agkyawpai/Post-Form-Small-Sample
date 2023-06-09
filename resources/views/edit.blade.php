@extends('app')
@section('title')
    Edit Post
@endsection

@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        <div class="container col-lg-8 mt-5 pb-3 pt-3">
            @csrf
            @method('PUT')
            <h1>ပြင်ဆင်ရန်</h1>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger col-lg-12 mt-3">
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
                <div class="form-group col-lg-6 mt-3">
                    <label for="title">ခေါင်းစဉ်</label>
                    <input type="text" name="title" class="form-control mt-2" value="{{ old('title', $post->title) }}">

                </div>
                <div class="form-group col-lg-6"></div>
                <div class="form-group col-lg-6 mt-3">
                    <label for="description">အကြောင်းအရာ</label>
                    <textarea name="description" class="form-control mt-2" rows="6">{{ old('title', $post->description) }}</textarea>
                </div>
                <div class="form-group col-lg-6"></div>
                <div class="col-lg-6 mt-3">
                    <label for="file" class="form-label">File ရွေးပါ</label>
                    <input class="form-control form-control-sm" id="file" type="file" name="file">
                    @if ($post->file)
                        <p class="mt-2">Previous File: {{ $post->file }}</p>
                    @else
                        <p class="mt-2">No previous file chosen</p>
                    @endif
                </div>
                <div class"form-flex col-lg-6"></div>
                <div class="form-group col-lg-6">
                    <button type="submit" class="btn btn-success mt-3">သိမ်းမယ်</button>
                    <a href="{{ route('post.index',['page' => $currentPage])}}" class="btn btn-secondary mt-3">နောက်သို့</a>
                </div>

                </div>
        </div>
    </form>
@endsection
