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
    <div class="row">
        <div class="container col-lg-10 mt-3 mb-3 pt-3" style="border: 10px;">
            <h2>Posts</h2>
            <div class="col-lg-4">
                <form action="{{ route('post.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="ခေါင်းစဉ်...">&nbsp;
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="submit">ရှာ‌ဖွေ</button>
                            <a href="{{ route('post.index') }}" class="btn btn-outline-light">အားလုံး</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6"></div>
            <div class="col-lg-2"></div>
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <form action="{{ route('post.downloadExcel') }}">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-outline-light">Excelဒေါင်းလုဒ်</button>
                        <a href="{{ route('post.importform') }}" class="btn btn-outline-light">Excelသွင်းရန်</a>
                    </form>
                </div>
            </div>
            <table class="table table-bordered custom-table">
                <thead>
                    <tr>
                        <th>ခေါင်းစဉ်</th>
                        <th>အကြောင်းအရာ</th>
                        <th>ဖိုင်</th>
                        <th width=30%>လုပ်ဆောင်မှု</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>

                            <td>{{ \Illuminate\Support\Str::limit($post->description, 80, '...') }}
                                @if (strlen($post->description) > 80)
                                    <a href="{{ route('post.detail', ['id' => $post->id, 'page' => $currentPage]) }}" class="link-primary">See more</a>
                                @endif
                            </td>
                            <td>
                                @if ($post->file)
                                    <a href="{{ asset('upload/' . $post->file) }}" download class="link-primary">{{ $post->file }}</a>
                                @endif
                            </td>
                            <td>
                                <div style="text-align: center">
                                    <a href="{{ route('post.edit', ['id' => $post->id, 'page' => $currentPage]) }}"
                                        class="btn btn-primary ">ပြင်ဆင်ရန်</a>
                                    <a href="{{ route('post.detail', ['id' => $post->id, 'page' => $currentPage]) }}"
                                        class="btn btn-info">အသေးစိတ်</a>
                                    <a href="{{ route('post.destroy', $post->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this post?')">ဖျက်ရန်</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $posts->appends(request()->except('page'))->links() }}
        </div>
    </div>
    </div>
    </div>
@endsection
