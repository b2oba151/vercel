<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"></head>
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">

    @yield('page-css')
@livewireStyles

</head>
    <body>
@php
    $route=request()->route()->getName();
@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">IBOK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a @class(['nav-link','active' => str_contains($route, 'hom')]) aria-current="page"  href="{{route('home')}}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link','active' => str_contains($route, 'dgfghf')]) href="{{ route('dgfghfgfdg') }}">Transactions</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/countries">Pays</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/users">Utilisateurs</a>
                </li> --}}
                <li class="nav-item">
                    <a @class(['nav-link','active' => str_contains($route, 'adm')]) href="{{ route('dashboard') }}">Administration</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <div class="nav-item">
                        <li class="nav-link">
                            <a href="{{ route('logout') }}" class="nav-link btn btn-secondary">{{ Auth::user()->name.' '.Auth::user()->firstname }}</a>
                        </li>
                    </div>
                    <div class="nav-item">
                        <li class="nav-link">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="nav-link btn btn-danger" >Se déconnecter</button>
                            </form>
                        </li>
                    </div>
                @endauth
                @guest
                    {{-- <li class="nav-item">

                        <a class="nav-link" href="#">Invite</a>
                    </li> --}}
                    <div class="nav-link">vous n etes pas connecter</div>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="{{ route('login') }}">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-info" href="{{ route('register') }}">S'inscrire</a>
                    </li>
                @endguest


            </ul>
        </div>
    </div>
</nav>

<div class="container my-2">
    @if($errors->all())
        <div class="alert alert-danger">
            <ul class="my-0">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- @dd(Auth::user()->id) --}}
    @yield('content')
</div>

<div class=" m-2">

    {{-- @dd(Auth::user()->id) --}}
    @yield('content-full')
</div>


        {{-- common js --}} <script src="{{ asset('assets/js/common-bundle-script.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script></body>
@yield('bottom-js')

        <script src="{{ asset('assets/js/script.js') }}"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script> --}}
        <script src="{{ asset('assets/js/notyf.min.js') }}"></script>
        @if (session()->has('success'))
        <script>
            var notyf = new Notyf({dismissible: true, position: 'top right',})
            notyf.success('{{ session('success') }}')
        </script>
        @endif
@yield('scripts')
@yield('page-js')
@livewireScripts

</body>
</html>
