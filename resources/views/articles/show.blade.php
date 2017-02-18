@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if($article->user)
                            {{$article->user->name}}
                        @else
                            Pas d'utilisateur
                        @endif
                    </div>

                    <div class="panel-body">
                        <h3 style="float:right">@include('components.share', [
                                'url' => request()->fullUrl(),
                                'description' => 'This is really cool link',
                                'image' => 'http://placehold.it/300x300?text=Cool+link'
                        ]) </h3>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        <h1>{{$article->title}}</h1>
                        <p>{{$article->content}}</p>
                        <br>

                        <a type="button" class="btn btn-default" href="{{route('article.edit', ['id' => $article->id])}}">
                            Modifier
                        </a>

                        <form method="POST" action="{{route('article.destroy', [$article->id])}}" style="float:right">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Supprimer">
                        </form>

                        <hr>
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

                        <div class="card">
                            <div class="card-block">
                                <form method="POST" action="/article/{{ $article->id }}/comments">

                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <textarea name="body" placeholder="Votre commentaire" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Publier</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <a type="button" class="btn btn-default btn-sm" href="{{route('article.index')}}" style="float:right">Retour</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
