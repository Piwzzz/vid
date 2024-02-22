@extends('layouts.app')

@section('content')
<div class="text-center text-bold" style="font-size: 2rem">
    <strong>Feeds</strong>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4">
                <a class="btn btn-primary" href="{{ route('video.create') }}">
                    <i class="bi bi-plus"></i>  Tambah Feeds
                </a>
            </div>

            @foreach ($videos as $video)
            <div class="card mb-4">
                <div class="card-body position-relative">
                    <form class="delete-form" action="{{ route('video.destroy', $video->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm position-absolute top-0 end-0" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash3-fill" style="font-size: 1.5rem;"></i>
                        </button>
                    </form>

                    <video controls class="img-thumbnail" style="width: 100%;">
                        <source src="{{ asset('storage/' . $video->vidio) }}" type="video/mp4">
                    </video>

                    <div class="mt-2">
                        <i class="bi bi-person-fill"></i>    {{ Auth::user()->name }}
                    </div>
                    <div style="font-size: 1.3rem">{{ $video->caption }}</div>
                    <div class="mt-1">{{ $video->created_at }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="pagination-links d-flex justify-content-center">
    {{ $videos->onEachSide(1)->withQueryString()->fragment('videos')->links('pagination::bootstrap-4') }}
</div>
@endsection