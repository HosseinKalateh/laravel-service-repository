<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>@Lang('words.simple_cms')</title>

    <!-- Styles -->
    <link href="{{ asset('Front/assets/css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Front/assets/css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('Front/assets/img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('Front/assets/img/favicon.png') }}">
</head>

<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <a class="navbar-brand" href="{{ route('front.post.index') }}">
                <img class="logo-dark" src="{{ asset('Front/assets/img/logo-dark.png') }}" alt="logo">
                <img class="logo-light" src="{{ asset('Front/assets/img/logo-light.png') }}" alt="logo">
            </a>
        </div>

    </div>
</nav><!-- /.navbar -->


<!-- Header -->
<header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
    <div class="container">

        <div class="row">
            <div class="col-md-8 mx-auto">

                <h1>@Lang('texts.latest_blog_posts')</h1>
                <p class="lead-2 opacity-90 mt-6">@Lang('texts.read_and_get_update_on_how_we_progress')</p>

            </div>
        </div>

    </div>
</header><!-- /.header -->


<!-- Main Content -->
<main class="main-content">
    <div class="section bg-gray">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-xl-9">
                    <div class="row gap-y">
                        @if (isset($posts))
                            @foreach($posts as $post)
                                <div class="col-md-6">
                                    <div class="card border hover-shadow-6 mb-6 d-block">
                                        <a href="{{ route('front.post.show', $post->id) }}"><img class="card-img-top" src="{{ asset($post->image) }}" alt="Card image cap" width="500" height="500"></a>
                                        <div class="p-6 text-center">
                                            <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="{{ route('front.post.category-post', $post->category->id) }}">{{ $post->category->name ?? '' }}</a></p>
                                            <h5 class="mb-0"><p class="text-dark">{{ $post->description }}</p></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    {{ $posts->links() }}
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="sidebar px-4 py-md-0">
                        <h6 class="sidebar-title">@Lang('words.categories')</h6>
                        <div class="row link-color-default fs-14 lh-24">
                            @if (isset($categories))
                                @foreach($categories as $category)
                                    <div class="col-6"><a href="{{ route('front.post.category-post', $category->id) }}">{{ $category->name }}</a></div>
                                @endforeach
                            @endif
                        </div>

                        <hr>

                        <h6 class="sidebar-title">@Lang('words.tags')</h6>
                        <div class="gap-multiline-items-1">
                            @if (isset($tags))
                                @foreach($tags as $tag)
                                    <a class="badge badge-secondary" href="{{ route('front.post.tag-posts', $tag->id) }}">{{ $tag->name }}</a>
                                @endforeach
                            @endif
                        </div>

                        <hr>

                        <h6 class="sidebar-title">@Lang('words.about')</h6>
                        <p class="small-3">@Lang('texts.developed_by_hossein_kalateh')</p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</main>


<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center d-flex justify-content-between">

            <div class="col-6 col-lg-3">
                <a href="{{ route('front.post.index') }}"><img src="{{ asset('Front/assets/img/logo-dark.png') }}" alt="logo"></a>
            </div>

            <div class="col-6 col-lg-3 text-right order-lg-last">
                <div class="social">
                    <a class="social-facebook" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="social-twitter" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="social-instagram" href="https://www.instagram.com/hosseinkalateh77/"><i class="fa fa-instagram"></i></a>
                    <a class="social-dribbble" href=#"><i class="fa fa-dribbble"></i></a>
                </div>
            </div>

        </div>
    </div>
</footer><!-- /.footer -->


<!-- Scripts -->
<script src="{{ asset('front/assets/js/page.min.js') }}"></script>
<script src="{{ asset('front/assets/js/script.js') }}"></script>

</body>
</html>
