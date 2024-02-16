@extends('layout/main')

@section('container')
    <header>
        <h1>Selamat Datang</h1>
        <h3>di Website Cunsul</h3>
        <div class="subheader">
            <h4>Website Yang Menyediakan Penjualan </h4>
            <h2>WALLPAPER</h2>
        </div>

    </header>

    <div class="row">
        @forelse ($posts as $post)
        <?php
            $harga = $post->price 
        ?>
        <div class="card">
            <a href="{{ route('posts.show', $post->id) }}">
            <div class="image">
                <img width="250px" height="200px" src="{{ asset('storage/posts/'.$post->image) }}" alt="Wallpaper">
            </div>

            <div class="description">
                <p>{{ $post->title }}</p>
                <div class="harga">
                    <p><?= 'Rp ' . number_format($harga, 0, ',', '.'); ?></p>
                </div>
            </div>
            </a>
        </div>
        @empty
        <div class="alert alert-danger">
            Wallpaper Tidak Tersedia.
        </div>
        @endforelse

    </div>
        {{ $posts->links('vendor.pagination.simple-default') }}

@endsection