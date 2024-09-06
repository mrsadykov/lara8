@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>{{ $post->id }}. {{ $post->title }}</div>
                <div>{{ $post->content }}</div>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-2">
                <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Edit</a>
            </div>

            <div class="col-2">
                <form action="{{ route('post.delete', $post->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div><a href="{{ route('post.index') }}">Back to posts</a></div>
            </div>
        </div>
    </div>
@endsection
