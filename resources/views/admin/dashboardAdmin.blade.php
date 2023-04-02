@extends('template')
@section('content1')
    <section class="text-center">
        <h1>Selamat Datang di Web {{ session('role') }}</h1>
        <form action={{ url('/logout') }} method="post">
            @csrf
            <button type="submit" class="btn btn-danger">
                Logout
            </button>
        </form>
        <div class="card container mx-auto my-5 bg-light" style="max-width: 48rem;">
            <div class="card-head">
                <div class="card-title">
                    <h2>Tambah Blog</h2>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin') }}" method="post">
                    @csrf
                    <div class="m-2">
                        <label for="title" class="form-label">Judul Blog</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="m-2">
                        <label for="picture" class="form-label">Gambar Blog</label>
                        <input type="text" name="picture" id="picture" class="form-control">
                    </div>
                    <div class="m-2">
                        <label for="sinopsis" class="form-label">Sinopsis Blog</label>
                        <textarea name="sinopsis" id="sinopsis" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="m-2">
                        <label for="body" class="form-label">Isi Blog</label>
                        <textarea name="body" id="body" cols="60" rows="20" class="form-control"></textarea>
                    </div>
                    <div class="m-2">
                        <label for="categorie" class="form-label">Kategori</label>
                        <select name="categorie" id="categorie" class="form-control">
                            <option value="tdkada">-- pilih opsi --</option>
                            @foreach ($categorie as $kategori)
                                <option value={{ $kategori->kategori }}>{{ $kategori->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="m-2">
                        <button type="submit" class="btn btn-primary">
                            Kirim
                        </button>
                    </div>
                </form>
                <form action="{{ url('/tambahkategori') }}" method="post">
                    @csrf
                    <div class="m-2">
                        <label for="categorie" class="form-label">Kategori Tambahan</label>
                        <input type="text" name="kategori" id="categorie" class="form-control">
                    </div>
                    <div class="m-2">
                        <button type="submit" class="btn btn-primary">
                            Tambah Kategori
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Judul Blog</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Update</th>
                            <th scope="col">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->categorie }}</td>
                                <td>
                                    <form action="{{ url('admin/'.$item->id.'/edit') }}" method="GET">
                                        @csrf
                                        <textarea style="display: none;" name="sinopsis" id="sinopsis">{{ $item->sinopsis }}</textarea>
                                        <textarea style="display: none;" name="body" id="body">{{ $item->body }}</textarea>
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ url('admin/' . $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        {{ $data->links('pagination::bootstrap-5') }}
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
