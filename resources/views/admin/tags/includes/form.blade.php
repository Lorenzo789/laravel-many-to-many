<form action="{{ route($routeName, $data) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method($methodName)
    <div class="container">
        <div class="mb-3">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name', $tag->name) }}">
            @include('admin.tags.includes.errors', [
                'errorType' => 'name'
            ])
        </div>

        <button class="btn btn-success" type="submit">
            Create
        </button>
    </div>
</form>