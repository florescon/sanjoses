@extends('frontend.layouts.app3')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

    @include('frontend.includes3.hero')

    @include('frontend.includes3.logos')


@endsection
