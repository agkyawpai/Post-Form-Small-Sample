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
            height: 100vh;
        }
    </style>
@endsection
@section('content')
    <div class="container-center">
    <div class="container col-lg-6 mt-3 pb-3" style="background-color: beige">
        <h1>အကြောင်းအရာ အသေးစိတ်</h1>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">ခေါင်းစဉ်: {{ $post->title }}</h5>
                <p class="card-text">အကြောင်းအရာ: {{ $post->description }}</p>
                <p class="card-text">ဖိုင်: {{ $post->file }}</p>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">ပြင်ဆင်ရန်</a>
                <a href="{{ route('post.create') }}" class="btn btn-secondary">နောက်သို့</a>
            </div>
        </div>
    </div>
</div>
</body>

</html>
