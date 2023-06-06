<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>
        @yield('title')
    </title>
    <style>
        @media (max-width: 480px) {
            .title {
                font-size: 16px;
                font-weight: bold;
                padding-top: 10px;
                padding-left: 30px;
            }
        }

        body{
            background-color: #007bff;
        }

        .navbar-custom {
            background-color: #007bff;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-nav .nav-link {
            color: #fff;
        }

        a:link {
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        label,
        p {
            color: white;
        }

        .container {
            background-color: #007BFF;
        }

        .table-container {
            background-color: #f8f9fa; /* Light gray background color */
            padding: 20px;
        }


        th {
            text-align: center;
        }

        .custom-table {
            background-color: #f8f9fa; /* Light gray background color */
            color: #212529; /* Dark text color */
        }

        .custom-table thead th {
            text-decoration-color: #212529
            color: #fff; /* White text color */
        }

        .custom-table tbody td {
            background-color: #ffffff; /* White background color */
        }

        .card {
            background-color: #2d56c8; /* Replace with your desired color */
        }
    </style>
    @yield('header')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('post.index') }}">စာရင်းအားလုံး</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.create') }}">အသစ်လုပ်ရန်</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.newsfeed') }}">NewsFeed</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    @yield('scripts')
    @yield('footer')
</body>

</html>
