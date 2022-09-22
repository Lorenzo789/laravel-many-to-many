@extends('layouts.app')

@section('content')
    @include('admin.posts.includes.form', [
        'routeName' => 'admin.posts.update',
        'data' => $post->id,
        'methodName' => 'PUT',
    ])
@endsection
