<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!--bootstrap icon引入時需要用到  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    @yield('css')
    <title>Document</title>
</head>

<body>

    <!-- bar -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand text-center col-1 " href="#">
                <img class="logo" src="./img/logo.svg" alt="">
                @if (Auth::check())

                {{Auth::user()->name}}，您好
                @else
                這邊事後台你怎麼進來的>>
                @endif

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <div class="form-inline my-2 my-lg-0 ml-auto">

                    <div class="collapse navbar-collapse d-flex align-items-center " id="navbarSupportedContent">
                        <ul class="navbar-nav ">
                            <li class="nav-item  ">
                                <a class="nav-link text-dark mt-2 mx-4" href="/blog">文章管理</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-dark mt-2 mx-4" href="/product">商品管理</a>
                            </li>

                            <li class="nav-item  dropdown ">
                                <a class="nav-link dropdown-toggle isize text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle "></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>

                                </div>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
        </div>

    </nav>
    <main>
        @yield('main')
    </main>
    <footer>
        <!-- 下方資訊 -->

            <div class="under-bar ">
                <div class="container  d-sm-flex justify-content-between">
                    <div class="trademark ">© 2022 Tailblocks — @knyttneve</div>
                    <div class="under-icon mx-auto mx-sm-0">
                        <span>
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="svg-size" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z">
                                </path>
                            </svg>
                        </span>
                        <span>
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="svg-size" viewBox="0 0 24 24">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </span>
                        <span>
                            <i class="bi bi-instagram"></i>
                        </span>
                        <span>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="svg-size" viewBox="0 0 24 24">
                                <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                                </path>
                                <circle cx="4" cy="4" r="2" stroke="none"></circle>
                            </svg>
                        </span>
                    </div>
                </div>

            </div>



        </section>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    @yield('js')
</body>

</html>
