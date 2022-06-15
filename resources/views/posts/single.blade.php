@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>{{ $post->title }}</h1>
        <div>
            <p>{{ $post->content }}</p>
        </div>
        <div>
            <p>Oprettet af: {{ $post->user->name }}</p>
        </div>
        <div class="form-group">
            <td class="col-sm-2"><a href="/posts" class="btn btn-primary btn-primary">Tilbage</a></td>
        </div>
    </div>
</div>
@endsection