@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('created'))
            <div class="alert alert-success">
                <h1>{{ session('created') }} has created succesfully</h1>
            </div>
        @elseif (session('deleted'))
            <div class="alert alert-danger">
                <h1>{{ session('deleted') }} has deleted succesfully</h1>
            </div>
        @endif

        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th class="text-right">
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.tags.create') }}">
                            Add a tag
                        </a>
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse ($tags as $tag)
                    <tr>
                        <td>
                            {{ $tag->id }}
                        </td>
                        <td>
                            <a href="{{ route('admin.tags.show', $tag->id) }}">
                                {{ $tag->name }}
                            </a>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-success">
                                Edit
                            </a>
                            <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" class="d-inline px-2">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    there are no tag
                @endforelse
            </tbody>
        </table>
    </div>
@endsection