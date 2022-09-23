@extends('layouts.app')

@section('content')
    <div class="container">
        @forelse ($tags->posts as $post)
            <div class="card">
                <div class="card-body p-5">
                    <div class="card-title text-center">
                        <h3>{{ $post->title }}</h3>
                    </div>
                    <div class="card-image text-center my-3">
                        <img src="{{ $post->post_image }}" alt="" class="w-50">
                    </div>
                    <div class="subtitle">
                        <p>
                            Tags: 
                            <span class="badge badge-pill">
                                @if ( isset($post->tags) )
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('admin.tags.index') }}">
                                            {{ $tag->name }}-
                                        </a>
                                    @endforeach
                                @else
                                    no tag selected for this post
                                @endif
                            </span>
                        </p>
                        <p class="card-text">{{ $post->post_content }}</p>
                        <pre>{{ $post->user->name }} | {{ $post->post_date }}</pre>
                    </div>
                </div>
            </div>

            
        @empty
            
        @endforelse
    </div>
@endsection