@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Tutti i posts</h1>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                    Crea nuovo post
                    </a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Slug</th>
                            <th class="text-center">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>
                                    <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}"
                                    class="btn btn-info btn-sm">Dettagli</a>
                                    <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}"
                                    class="btn btn-warning btn-sm">Modifica</a>
                                    <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}"
                                    method="post"
                                    class="d-inline-block">

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Elimina
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
