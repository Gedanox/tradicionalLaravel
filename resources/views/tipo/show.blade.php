@extends('app.base')

@section('content')
<div>
    @if(session()->has('user'))
    <div class="row" style="margin-top: 8px;">
        Type id#: {{ $tipo->id }}
    </div>
    <div class="row" style="margin-top: 8px;">
        Type name: {{ $tipo->tipo}}
    </div>
    <div class="row" style="margin-top: 8px;">
        Type description: {{ $tipo->descripcion }}
    </div>
    @endif
    <div class="row" style="margin-top: 8px;">
        <a href="{{ url()->previous() }}" class="btn btn-primary">back</a>
    </div>
</div>
@endsection