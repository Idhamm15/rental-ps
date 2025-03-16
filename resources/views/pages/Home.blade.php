@extends('layout.app')

@section('title', 'Beranda')

@section('content')

    @include('components.content.feature')
    @include('components.content.products', ['title' => 'Produk Saya'])

@endsection