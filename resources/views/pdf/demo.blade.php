<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PDF Demo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: blue;
        }
        p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
    <img src="{{ public_path('upload/').$post->file}}" style="width: 200px; height: 200px">
    {{-- <img src="{{asset('upload/' . $post->file)}}" alt="Image" width="50px" height="50px"> --}}
</body>
</html>
