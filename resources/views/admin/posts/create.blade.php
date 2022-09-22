@extends('layouts.app')

@section('content')
    @include('admin.posts.includes.form', [
        'routeName' => 'admin.posts.store',
        'data' => $post,
        'methodName' => 'POST',
    ])
@endsection
