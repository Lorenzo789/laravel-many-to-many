@extends('layouts.app')

@section('content')
    <div class="card mb-3 mx-auto" style="max-width: 800px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $post->post_image }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body text-center">
                    <h3 class="card-title">{{ $post->title }}</h3>
                    <p class="card-text">{{ $post->post_content }}</p>
                    <pre>{{ $post->user->name }} | {{ $post->post_date }}</pre>
                </div>
            </div>
        </div>
    </div>
@endsection