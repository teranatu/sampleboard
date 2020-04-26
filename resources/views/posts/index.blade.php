@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="container">
        <div class="row">


            <div class="col-6">
                <h5 class="card-title">検索フォーム</h5>
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <form action="{{ route('posts.search') }}" method="get">

                            <input type="text" class="form-control input-lg" placeholder="Buscar" name="search" value="">
                            <span class="input-group-btn" style="position: relative;top: -36px;right: -179px;">
                                <button class="btn btn-info" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>


            <div class="form-group col-6">
                <div class="col-12 text-center">
                    <form action="{{ route('posts.searchDate') }}" method="get">
                        <input type="text" id="input-date" name="datetimepicker">
                        <button type="submit"></button>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div id="datetimepicker12"></div>
            </div>
                

        </div>
    </div>
</div>
<div class="card-header">Board</div>

@isset($search_result)
    <h5 class="card-title">{{ $search_result }}</h5>
@endisset

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @foreach($posts as $post)
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">タイトル:{{ $post->title }}</h5>
            <h5 class="card-title">
                カテゴリー:
                 <a href="{{ route('posts.index', ['category_id' => $post->category_id]) }}">
                    {{ $post->category->category_name }}
                </a>
            </h5>

            <h5 class="card-title">
                Tag:
                @foreach($post->tags as $tag)
                    <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}">
                        #{{ $tag->tag_name }}
                    </a>
                @endforeach
            </h5>
            <h5 class="card-title">
                投稿者:
                <a href="{{ route('users.show', $post->user_id) }}">{{ $post->user->name }}</a>
            </h5>
            <p class="card-text">内容:{{ $post->content }}</p>
            <p class="card-text">投稿日時:{{ $post->created_at }}</p>
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細</a>
          </div>
        </div>
    @endforeach


@if(isset($category_id))
    {{ $posts->appends(['category_id' => $category_id])->links() }}

@elseif(isset($tag_name))
    {{ $posts->appends(['tag_name' => $tag_name])->links() }}

@elseif(isset($search_query))
    {{ $posts->appends(['search' => $search_query])->links() }}

@else
    {{ $posts->links() }}
@endif



</div>
@endsection
