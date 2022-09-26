@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('created'))
            <div class="alert alert-success">
                <h1>{{ session('created') }} has created succesfully</h1>
            </div>
        @elseif (session('edited'))
            <div class="alert alert-success">
                <h1>{{ session('edited') }} has been modified succesfully</h1>
            </div>
        @endif
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Post Date</th>
                    <th>Tag</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($post as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->user->name }}</a></td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->post_date }}</td>
                        <td>            
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
                        </td>
                        <td>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-success">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        {{-- {{ $post->links() }} --}}
    </div>
@endsection
