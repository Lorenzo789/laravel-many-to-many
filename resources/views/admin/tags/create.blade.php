@extends('layouts.app')

@section('content')
    @include('admin.tags.includes.form', [
        'routeName' => 'admin.tags.store',
        'data' => $tag,
        'methodName' => 'POST',
    ])
@endsection
