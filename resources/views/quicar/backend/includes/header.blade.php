<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Quicar - @yield('title')</title>
    <link href="{{ asset('quicar/backend/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('quicar/backend/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('quicar/backend/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('quicar/backend/css/dashforge.css') }}" rel="stylesheet">
    <link href="{{ asset('quicar/backend/css/dashforge.dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('quicar/backend/css/skin.charcoal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('quicar/frontend/css/jquery.datetimepicker.min.css') }}">
    <link href="{{ asset('quicar/backend/css/toastr.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
