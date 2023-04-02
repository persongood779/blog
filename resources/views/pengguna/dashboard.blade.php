@extends('template')
@section('content1')
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Web Blogsku</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <form action={{ url('/logout') }} method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            Logout
                        </button>
                    </form>
                    <form action="{{ url('/loginAdmin') }}" class="mx-3" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Login Admin
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <h1 class="text-center my-3">Dashboard Web Blogskus</h1>
    <div class="container mx-auto d-flex">
        <button type="button" class="btn btn-success">
            <a href="/pengguna" style="text-decoration: none;" class="text-white"> Semua Blog </a>
        </button>
        @foreach ($kategori as $item)
            <form action={{ url('kategori/' . $item->kategori) }} method="get">
                @csrf
                <button type="submit" class="btn btn-primary mx-2">
                    #{{ $item->id }}.{{ $item->kategori }}
                </button>
            </form>
        @endforeach
    </div>
    <section class="container mx-auto row my-5">
        @foreach ($data as $item)
            <div class="col card mx-1" style="max-width: 24rem;">
                <div class="card-head text-center">
                    <a href={{ url('blog/' . $item->id) }} style="text-decoration: none;">
                        <h3>{{ $item->title }}</h3>
                    </a>
                </div>
                <div class="card-body">
                    <img src="{{ $item->picture }}" alt="" style="max-width: 20rem;">
                    <p class="p-2">
                        {!! $item->sinopsis !!}
                    </p>
                    <br>
                    <div class="btn btn-success">
                        #{{ $item->categorie }}
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
