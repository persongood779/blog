@extends('template')
@section('content1')
    <div class="card container mx-auto my-5 text-white bg-black" style="max-width: 50rem;">
        <div class="card-head text-center">
            <div class="card-title">
                <h2>{{ $data->title }}</h2>
            </div>
            <hr>
        </div>
        <div class="card-body">
            <div class="btn btn-success mb-2">
                #{{ $data->categorie }}
            </div>
            <img src="{{ $data->picture }}" alt="" style="max-width: 46rem;">
            <p>
                {!! $data->sinopsis !!}
            </p>
            <p>
                {!! $data->body !!}
            </p>
        </div>
    </div>

@endsection
