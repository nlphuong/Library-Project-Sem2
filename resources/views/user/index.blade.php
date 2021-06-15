@extends('layout.indexDefault')
@section('title','Memorial Library')
@section('body-class','home_page')
@section('main')

      @include('user.homePage.slideShow')    
      @include('user.homePage.aboutHome')
      @include('user.homePage.libraryHome')    
      @include('user.homePage.booksHome') 
      @include('user.homePage.contactHome')     
   
@endsection