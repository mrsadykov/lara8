@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <a class="btn btn-primary" href="{{ route('post.create') }}">Add new post</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @foreach($posts as $post)
                    <div>
                        <a href="{{ route('post.show', $post->id) }}">
                            {{ $post->id }}. {{ $post->title }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
