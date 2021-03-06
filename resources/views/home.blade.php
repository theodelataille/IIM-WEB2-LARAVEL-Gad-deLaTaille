@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Accueil</div>

                <div class="panel-body">
                    @if(Auth::check())
                        <h2>Bonjour, {{Auth::user()->name}}</h2>
                    @else
                        <h2>Bonjour invité</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
