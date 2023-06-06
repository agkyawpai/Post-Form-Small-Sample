@extends('app')
@section('title')
    Create Post
@endsection
@section('header')
    <style>
        .container-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
    </style>
@endsection
@section('content')
    <div class="container-center">
    <div class="container col-lg-6 pb-3 pt-3">
        <h1>အကြောင်းအရာ အသေးစိတ်</h1>
        <div class="card mt-3">
            <div class="card-body">
                <h3 class="card-title">{{ $post->title }}</h3>
                <p class="card-text">{{ $post->description }}</p>
                <p class="card-text"><img src="{{asset('upload/' . $post->file)}}" alt="Image" width="80px" height="80px"></p>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">ပြင်ဆင်ရန်</a>
                <a href="{{ route('post.index',['page' => $currentPage]) }}" class="btn btn-secondary">နောက်သို့</a>
                <a href="{{ route('post.download', $post->id) }}" class="btn btn-success">PDFဒေါင်းလုဒ်</a>
            </div>
        </div>
    </div>
</div>
@endsection
