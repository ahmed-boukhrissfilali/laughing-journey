<?php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @include('layouts.libaries.styles')

    <style>
        /* Sidebar Styles */
        .sidebar {
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            padding-top: 2rem;
            background-color: #ffffff;
            color: #6c757d;
            width: 240px;
            transition: all 0.4s;
            font-family: 'Arial', sans-serif;
            border-right: 1px solid #dee2e6;
        }

        .sidebar .logo {
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            margin-bottom: 2rem;
        }

        .sidebar .logo img {
            height: 40px;
            margin-right: 0.5rem;
        }

        .sidebar .logo span {
            font-size: 1.25rem;
            font-weight: bold;
            color: #4b4b4b;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar .nav-link {
            color: #6c757d;
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            transition: background-color 0.3s, color 0.3s;
            font-size: 1rem;
            border-radius: 0.375rem;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #f8f9fa;
            color: #000;
        }

        .sidebar .nav-link i {
            margin-right: 0.75rem;
            font-size: 1.25rem;
        }

        .content {
            margin-left: 240px;
            transition: all 0.4s;
            padding: 2rem;
            font-family: 'Verdana', sans-serif;
            background-color: #f4f4f4;
            min-height: 100vh;
        }

        .navbar {
            background-color: #ffffff;
            color: #6c757d;
            border-bottom: 1px solid #dee2e6;
        }

        .navbar .navbar-brand {
            font-size: 1.25rem;
            color: #4b4b4b;
        }

        .navbar .nav-item .nav-link {
            color: #6c757d;
        }

        .navbar .dropdown-menu {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
        }

        .navbar .dropdown-menu .dropdown-item {
            color: #6c757d;
        }

        .navbar .dropdown-menu .dropdown-item:hover {
            color: #000;
            background-color: #f8f9fa;
        }

        .navbar-toggler {
            border: none;
            background-color: #6c757d;
            padding: 5px 10px;
        }

        .navbar-toggler:focus {
            outline: none;
        }

        .burger {
            cursor: pointer;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .burger span {
            background: #6c757d;
            height: 4px;
            border-radius: 2px;
        }
    </style>
</head>
<body>
<nav class="main-header navbar navbar-expand navbar-light fixed-top">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width: 120px; height: 25px;">
    </a>

    <ul class="navbar-nav ml-auto">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">{{ $user->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </ul>
</nav>
<div class="container-fluid" style="margin-top: 56px;">
    <div class="row flex-nowrap">
        <aside id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <span>DNX</span>
            </div>
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
                            <i class="nav-icon fa fa-home mr-1" aria-hidden="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('produit.create') }}" class="nav-link {{ Request::is('produit/create') ? 'active' : '' }}">
                            <i class="fa-solid fa-plus mr-1"></i>                            Add Product
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('produit.index') }}" class="nav-link {{ Request::is('produit') ? 'active' : '' }}">
                            <i class="fa-solid fa-list"></i>
                            Product list
                        </a>
                    </li>

                </ul>
            </div>
        </aside>
        <main class="content col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')
        </main>
    </div>
</div>
@include('layouts.libaries.scripts')
</body>
</html>
