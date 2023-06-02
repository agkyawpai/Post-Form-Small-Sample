@extends('app')
@section('title')
    Create Post
@endsection

@section('content')
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        <div class="container col-lg-8 mt-5 pb-3" style="background-color:beige">
            <h1>အသစ်ဖြည့်ပါ</h1>
            @csrf
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block mt-3">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger col-lg-12">
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
                <input type="text" name="title" class="form-control" placeholder="Title">
                <label for="title">ခေါင်းစဉ်</label>
            </div>
            <div class="form-group col-lg-6"></div>
            <div class="form-group col-lg-6 mt-3">
                <label for="description">အကြောင်းအရာ</label>
                <textarea name="description" class="form-control" placeholder="Description" rows="6"></textarea>
            </div>
            <div class="form-group col-lg-6"></div>
            <div class="col-lg-6 mt-3">
                <label for="file" class="form-label">File ရွေးပါ</label>
                <input class="form-control form-control-sm" id="file" type="file" name="file">
            </div>
            <div class"form-flex col-lg-6"></div>
            <div class="form-group col-lg-6">
                <button type="submit" class="btn btn-success mt-3">သိမ်းမယ်</button>
            </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <h2>Posts</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ခေါင်းစဉ်</th>
                                <th>အကြောင်းအရာ</th>
                                <th>ဖိုင်</th>
                                <th>လုပ်ဆောင်မှု</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->file }}</td>
                                    <td>
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">ပြင်ဆင်ရန်</a>
                                        <a href="{{ route('post.detail', $post->id) }}" class="btn btn-info">အသေးစိတ်</a>
                                        <a href="{{ route('post.destroy', $post->id) }}" class="btn btn-danger">ဖျက်ရန်</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </form>

@endsection



{{--
<div class="col-lg-6 mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->file }}</td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-info">Detail</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}
