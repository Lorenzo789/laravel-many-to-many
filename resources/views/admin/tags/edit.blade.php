@extends('layouts.app')

@section('content')
    @include('admin.tags.includes.form', [
        'routeName' => 'admin.tags.update',
        'data' => $tag->id,
        'methodName' => 'PUT',
    ])
@endsection