<html>
    <head>
        <title>@yield('title')</title>
        <link
            href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
            rel="stylesheet"/>
        <link
            href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
            rel="stylesheet"
        />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis..com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>
        <nav>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#">Laravel</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/welcome">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="/contact" tabindex="-1" aria-disabled="true">Contact</a>
                            </li>
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                            @endguest
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="/auth/logout">Logout</a>
                                </li>
                            @endauth

{{--                            <li class="nav-item dropdown">--}}
{{--                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    Dropdown--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                    <li><hr class="dropdown-divider"></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}


                        </ul>

                    </div>
                </div>
            </nav>
        </nav>
            <div class="content">
                @yield('content')
            </div>
        <footer>
            footer

        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
         <script src="{{asset('js/main.js')}}"></script>
    </body>
</html>
