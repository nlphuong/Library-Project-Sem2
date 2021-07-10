@extends('layout.indexDefault')
@section('title','Memorial Library')
@section('body-class','home_page')
@section('main')
@if(Session::has('loginSuccess'))
        <script>alert('{{Session::get("loginSuccess")}}')</script>
    @endif
      @include('user.homePage.slideShow')
      @include('user.homePage.aboutHome')
      @include('user.homePage.libraryHome')
      @include('user.homePage.booksHome')
      @include('user.homePage.contactHome')

@endsection
