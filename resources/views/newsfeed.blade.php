@extends('app')
@section('content')
    <div class="newsfeed">
        <div class="container-center">
            <div class="container col-lg-6 mt-3 pb-3 pt-3">
                @foreach ($posts->sortByDesc('created_at') as $post)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h1 class="card-title">{{ $post->title }}</h1>
                            <p class="card-text" style="color:rgb(255, 255, 255)">{{ $post->created_at->diffForHumans() }}</p>
                            <p class="card-text"><img src="{{ asset('upload/' . $post->file) }}" alt="Image" width="500px"
                                    height="500px"></p>
                            <p class="card-text">
                                @if (strlen($post->description) > 200)
                                    {{ substr($post->description, 0, 200) }}...
                                    <a href="#" class="see-more-link" style="color:rgb(35, 35, 47)"
                                        data-description="{{ $post->description }}">See More</a>
                                @else
                                    {{ $post->description }}
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
                <br>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let seeMoreLinks = document.getElementsByClassName('see-more-link');
            for (let i = 0; i < seeMoreLinks.length; i++) {
                seeMoreLinks[i].addEventListener('click', function(event) {
                    event.preventDefault();
                    let description = this.dataset.description;
                    this.parentElement.innerHTML = description;
                });
            }
        });
    </script>
     <script>

    </script>
@endsection
