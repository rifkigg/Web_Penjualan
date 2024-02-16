@extends('layout/admin')

@section('container')
                <div class="judul-admin">
                    <h3>Stok Wallpaper</h3>       
                    <hr>
                </div>
                <div class="wrap">
                    <div class="card-body">
                        <a href="{{ route('posts.create') }}" class="hijau">TAMBAH WALLPAPER</a>
                        <table border="1">
                            <thead>
                              <tr>
                                <th>GAMBAR</th>
                                <th>TITLE</th>
                                <th>CONTENT</th>
                                <th>HARGA</th>
                                <th>AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($posts as $post)
                                <?php
                                    $harga = $post->price 
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/posts/'.$post->image) }}" style="width: 150px">
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! $post->content !!}</td>
                                    <td><?= 'Rp ' . number_format($harga, 0, ',', '.'); ?></td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            <a href="{{ route('posts.show', $post->id) }}" class="biru">SHOW</a>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="kuning">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="merah">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert-blomada">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $posts->links('vendor.pagination.simple-default') }}
                    </div>
                </div>
@endsection 