@extends('template')
@section('content1')
<div class="card container mx-auto my-5" style="max-width: 50rem;">
    <div class="card-head text-center">
        <h1>Edit Blog</h1>
    </div>
    <div class="card-body">
        <form action="{{ url('admin/'.$data->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="m-2">
                <label for="title" class="form-label">Judul Blog</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $data->title }}">
            </div>
            <div class="m-2">
                <label for="picture" class="form-label">Gambar Blog</label>
                <input type="text" name="picture" id="picture" class="form-control" value="{{ $data->picture }}">
            </div>
            <div class="m-2">
                <label for="sinopsis" class="form-label">Sinopsis Blog</label>
                <textarea name="sinopsis" id="sinopsis" cols="30" rows="10" class="form-control">
                    {{ $data->sinopsis }}
                </textarea>
            </div>
            <div class="m-2">
                <label for="body" class="form-label">Isi Blog</label>
                <textarea name="body" id="body" cols="60" rows="20" class="form-control">
                    {{ $data->body }}
                </textarea>
            </div>
            <div class="m-2">
                <label for="categorie" class="form-label">Kategori</label>
                <select name="categorie" id="categorie" class="form-control">
                    <option value="{{ $data->categorie }}">{{ $data->categorie }}</option>
                    @foreach ($categorie as $kategori)
                        <option value={{ $kategori->kategori }}>{{ $kategori->kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="m-2 text-center">
                <button type="submit" class="btn btn-primary">
                    Kirim
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
