<!-- resources/views/video/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-light">Create feeds</div>
                
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="vidio">Video</label>
                            <input type="file" name="vidio" class="form-control" accept="video/mp4" required>
                        </div>

                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <input type="text" name="caption" class="form-control" >
                        </div>

                        <div class="text-center"> 
                            <a href="{{ route('video.index') }}" class="btn btn-secondary">Back</a> 
                            <button type="submit" class="btn btn-primary mx-auto">create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
