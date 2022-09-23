<form action="{{ route($routeName, $data) }}" method="post">
    @csrf
    @method($methodName)
    <div class="container">
        <div class="mb-3">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" value="{{ old('title', $post->title) }}">
            @include('admin.posts.includes.errors', [
                'errorType' => 'title',
            ])
        </div>

        <div class="mb-3">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" id="post_content">
                {{ old('post_content', $post->post_content) }}
            </textarea>
            @include('admin.posts.includes.errors', [
                'errorType' => 'post_content',
            ])
        </div>

        @foreach ($tags as $tag)
            <div class="mb-3">
                <label for="tags" class="px-4">{{ $tag->name }}</label>
            @if ($errors->any())
                <input type="checkbox" name="tags[]" id="input-tags" class="form-check-input" 
                    value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
            @else
                <input type="checkbox" name="tags[]" id="input-tags" class="form-check-input" 
                    value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
            @endif
            </div>
        @endforeach
                @include('admin.posts.includes.errors', [
                    'errorType' => 'tags',
                ])  

        <div class="mb-3">
            <label for="post_image">Post Image</label>
            <input class="form-control" type="text" name="post_image"
                value="{{ old('post_image', $post->post_image) }}">
            @include('admin.posts.includes.errors', [
                'errorType' => 'post_image',
            ])
        </div>

        <button class="btn btn-success" type="submit">
            Create
        </button>
    </div>
</form>
