@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
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
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>
@endsection