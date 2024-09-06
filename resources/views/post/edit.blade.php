@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('post.update', $post->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input name="title"
                               type="text"
                               class="form-control"
                               id="title"
                               value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content"
                                  id="content"
                                  class="form-control"
                                  id="content"
                                  rows="3">{{ $post->content }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input name="image"
                               type="text"
                               class="form-control"
                               value="{{ $post->image }}"
                               id="image">
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="category">Select category</label>
                        <select class="form-select" aria-label="Select category" id="category" name="category_id">
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ $category->id == $post->category->id ? ' selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="tags">Select tags</label>
                        <select class="form-select" multiple aria-label="Select tags" id="tags" name="tags[]">
                            @foreach($tags as $tag)
                                <option
                                    value="{{ $tag->id }}"
                                    @foreach($post->tags as $ptag)
                                        {{ $ptag->id == $tag->id ? ' selected' : '' }}
                                    @endforeach>
                                    {{ $tag->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
