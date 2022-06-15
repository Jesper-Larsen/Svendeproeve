@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(Session::has('errorMessage'))
        <div class="alert alert-danger">
            {{ Session::get('errorMessage') }}
        </div>
        @endif
        <h1>Opslagsliste</h1>
        <div class="row justify-content-center">
            <td><a class="btn btn-sm btn-primary" href="/posts/create">{{ __('Opret post') }}</a></td>
        </div>
        <table class="table" style="color:white;">
            <thead>
                <tr>
                    <th>Oprettet af</th>
                    <th>Titel</th>
                    <th>Indhold</th>
                    <th>Rediger</th>
                    <th>Slet</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->user->name }}</td>
                    <td><a href="{{ $post->url }}" class="btn btn-sm btn-primary">{{ $post->title }}</a></td>
                    <td>{{ $post->excerpt }}</td>
                    <td><a href="{{ $post->edit_url }}" class="btn btn-sm btn-primary">Rediger</a></td>
                    <td class="col-sm-2"><a href="{{ route('posts.delete', $post->slug) }}" class="btn btn-sm btn-danger">Slet opslag</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $posts->links() !!}
    </div>
</div>
@endsection