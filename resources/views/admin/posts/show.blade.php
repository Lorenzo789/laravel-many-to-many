@extends('layouts.app')

@section('content')
    <div class="card mb-3 mx-auto" style="max-width: 800px;">
        <div class="card-body p-5">
            <div class="card-title text-center">
                <h3 class="card-title">{{ $post->title }}</h3>
            </div>
            <div class="card-image text-center my-3">
                @if (filter_var($post->post_image, FILTER_VALIDATE_URL))
                    <img src="{{ $post->post_image }}" class="img-fluid rounded-start" alt="...">
                @else
                    <img src="{{ asset('storage/'. $post->post_image) }}" class="img-fluid rounded-start" alt="...">
                @endif
            </div>
            <div class="subtitle">
                <p class="card-text">{{ $post->post_content }}</p>
                <pre>{{ $post->user->name }} | {{ $post->post_date }}</pre>
                <span class="badge badge-pill">
                    @if ( isset($post->tags) )
                        @foreach ($post->tags as $tag)
                            {{ $tag->name }} -
                        @endforeach
                    @else
                        no tag selected for this post
                    @endif
                </span>
            </div>
        </div>
    </div>
@endsection