@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Derniers articles publiés</div>

                    <div class="panel-body">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @forelse($articles as $article)
                            <h1>{{ $article->title }}</h1>
                            <p>{{ $article->content }}</p>
                            <a type="button" class="btn btn-primary" href="{{route('article.show', ['id' => $article->id])}}">
                                Voir l'article
                            </a>
                            <div style="float:right">
                                @if ($article->isLiked)
                                    <a type="button" class="btn btn-danger btn-sm" href="{{ route('article.like', $article->id) }}">Je n'aime plus <i class="fa fa-thumbs-down"></i></a>
                                @else
                                    <a type="button" class="btn btn-success btn-sm" href="{{ route('article.like', $article->id) }}">J'aime <i class="fa fa-thumbs-up"></i></a>
                                @endif
                                <p>{{ $article->likes()->count() }} personnes aiment ça <br>
                                    @foreach ($article->likes as $user)
                                        <strong>{{ $user->name }}, </strong>
                                    @endforeach
                                </p>
                            </div>
                            <br><br><br>
                            <hr>

                        @empty
                            Rien du tout
                        @endforelse
                    </div>
                    <div class="text-center">
                        {{$articles->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
