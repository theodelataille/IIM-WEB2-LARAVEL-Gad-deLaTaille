@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        <h1>{{$article->title}}</h1>
                        <p>{{$article->content}}</p>
                        <p>
                            @if($article->user)
                                Utilisateur: {{$article->user->name}}
                            @else
                                Pas d'utilisateur
                            @endif
                        </p>
                        <form method="POST" action="{{route('article.destroy', [$article->id])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Supprimer">
                        </form>
                        <a href="{{route('article.index')}}">Retour</a>
                        @include('components.share', ['url' => 'http://127.0.0.1:8000/article/{{$article->id}}'])
                            <div class="comments">
                                <ul class="list-group">

                                    @foreach ($article->comments as $comment)
                                        <li class="list-group-item">
                                            <strong>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </strong>
                                            {{ $comment->body }}
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                            <hr>

                            <div class="card">
                                <div class="card-block">
                                    <form method="POST" action="/article/{{ $article->id }}/comments">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <textarea name="body" placeholder="Votre commentaire ici." class="form-control">

                                            </textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Ajouter un commentaire</button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
