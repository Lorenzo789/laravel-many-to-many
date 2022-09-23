@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group">
            @forelse ($tags as $tag)
                <li class="list-group-item">
                    <a href="{{ route('admin.tags.show') }}">
                        {{ $tag->name }}
                    </a>
                </li>
            @empty
                
            @endforelse
        </ul>
    </div>
@endsection