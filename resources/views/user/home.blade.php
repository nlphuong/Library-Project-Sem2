@extends('layout.appIndex')
@section('title','Home')
@section('body-class','home_page')
@section('main')

      @include('user.homePage.slideShow')    
      @include('user.homePage.aboutHome')
      @include('user.homePage.libraryHome')    
      @include('user.homePage.booksHome') 
      @include('user.homePage.contactHome')     
   
@endsection