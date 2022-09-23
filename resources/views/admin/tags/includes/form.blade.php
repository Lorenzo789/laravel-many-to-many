<form action="{{ route($routeName, $data) }}" method="post">
    @csrf
    @method($methodName)
    <div class="container">
        <div class="mb-3">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name', $tag->name) }}">
        </div>

        <button class="btn btn-success" type="submit">
            Create
        </button>
    </div>
</form>