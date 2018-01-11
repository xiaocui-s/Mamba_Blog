@inject('systemPresenter','App\Presenters\SystemPresenter')

@extends('layouts.app')

@section('title',$systemPresenter->getKeyValue('title'))

@section('description',$systemPresenter->getKeyValue('seo_desc'))

@section('keywords',$systemPresenter->getKeyValue('seo_keyword'))

@section('style')
    <link rel="stylesheet" href="{{ asset('editor.md/css/editormd.preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('share.js/css/share.min.css') }}">
@endsection

@section('header-text')
    <div class="text-inner">
        <div class="row">
            <div class="col-md-12 to-animate fadeInUp animated">
                <h3 class="color-white">
                    {{ $article->title }}
                </h3>

                <p class=" m-t-25 color-white">
                    <i class="glyphicon glyphicon-calendar"></i>{{ date("Y-m-d"),strtotime($article->created_at) }}
                    @if($article->category)
                        <i class="glyphicon glyphicon-th-list"></i>
                        <a href="{{ route('category',['id'=>$article->cate_id]) }}" target="_blank">
                            {{ $article->category->name }}
                        </a>
                    @endif
                </p>
                <p class="color-white">
                    @if($article->tag)
                        <i class="glyphicon glyphicon-tags"></i>&nbsp;
                        @foreach( $article->tag as $tag )
                            <a href="{{ route('tag',['id'=>$tag->id]) }}" target="_blank">
                                {{ $tag->tag_name }}
                            </a>
                        @endforeach
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="markdown-body editormd-html-preview" style="padding:0;">
        {!! $article->html_content !!}
    </div>
    <div id="share" class="social-share m-t-25"></div>
@endsection

@section('script')
    <script src="{{ asset('share.js/js/jquery.share.min.js') }}"></script>

    <script>
        $(function(){
            $('#share').share({sites: ['qzone', 'qq', 'weibo','wechat']});
        });
    </script>

@endsection