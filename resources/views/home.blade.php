@extends('layouts.app')

@section('content')
<div class="container" style="color:black;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div>&nbsp;</div>
                    <div>
                        <td class="col-sm-2" style="text-align:right"><a href="/" class="btn btn-primary">Tilbage</a></td>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection