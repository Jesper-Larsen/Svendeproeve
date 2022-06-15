@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Opret opslag</h1>
        <form action="{{ route('posts.store') }}" class="form" method="post">
            {{ csrf_field() }}
            <div>&nbsp;</div>
            <div class="form-group @if($errors->has('title')) has-error @endif">
                <label>Titel</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                <span class="text-danger">{{ $errors->first('title') }}</span>
            </div>
            <div class="form-group @if($errors->has('content')) has-error @endif">
                <label>Indhold</label>
                <textarea class="form-control" name="content" cols="3" rows="5">{{ old('content') }}</textarea>
                <span class="text-danger">{{ $errors->first('content') }}</span>
            </div>
            <div>&nbsp;</div>
            <div class="form-group">
                <td class="col-sm-2"><a href="/posts" class="btn btn-primary btn-danger">Tilbage</a></td>
                <button class="btn btn-primary">Opret</button>
            </div>
        </form>
    </div>
</div>
@endsection