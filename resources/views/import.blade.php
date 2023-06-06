@extends('app')

@section('content')
    <div class="container col-lg-6 mt-2 pb-3 pt-3">
        <h1>Excelသွင်းရန်</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('post.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Excel File</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary">သွင်းမည်</button>
            <a href="{{ route('post.index') }}" class="btn btn-secondary">နောက်သို့</a>
        </form>
    </div>
@endsection
