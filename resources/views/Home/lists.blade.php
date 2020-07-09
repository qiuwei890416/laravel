@extends('Home.Layouts.home')
@section('title', '文章列表')
@section('main-wrap')
 @include('Home.Public.sousuo')
 <div id="main-wrap">
  <div id="home-blog-wrap" class="container two-col-container">
   <div id="main-wrap-left">
    <div class="bloglist-container clr">
     @foreach($list as $val)
      <article class="home-blog-entry col span_1 clr">
       <a href="{{ url('/detail/'.$val->id) }}" title="{{$val->art_title}}" class="fancyimg home-blog-entry-thumb">
        <div class="thumb-img">
         <img src="{{ URL::asset($val->art_thumb) }}" alt="{{$val->art_title}}" />
         <span><i class="fa fa-pencil"></i></span>
        </div> </a>
       <div class="home-blog-entry-text clr">
        <h3> <a href="{{ url('/detail/'.$val->id) }}" title="{{$val->art_title}}">{{$val->art_title}}</a> </h3>
        <!-- Post meta -->
        <div class="meta">
         <span class="postlist-meta-time"><i class="fa fa-calendar"></i>{{$val->art_time}}</span>
         <span class="postlist-meta-views"><i class="fa fa-fire"></i>浏览:{{$val->art_view}}</span>
         <span class="postlist-meta-comments"><i class="fa fa-comments"></i><a href="#"><span>评论: </span>{{$val->art_pinglun}}</a></span>
        </div>
        <!-- /.Post meta -->
        <p>{{$val->art_description}}<a rel="nofollow" class="more-link" style="text-decoration:none;" href="#"></a></p>
       </div>
       <div class="clear"></div>
      </article>
     @endforeach


    </div>
    <!-- pagination -->
    <div class="clear">
    </div>
    <div class="pagination" style="margin-left: 30%">
     {{  $list->appends($request->all())->links()}}
{{--     <span class="pg-item pg-item-current"><span class="current">1</span></span>--}}
{{--     <span class="pg-item"><a href="lists.html?talk/page/2" title="浏览第2页" class="navbutton">2</a></span>--}}
{{--     <span class="pg-item"><a href="lists.html?talk/page/3" title="浏览第3页" class="navbutton">3</a></span>--}}
{{--     <span class="pg-item"> ... </span>--}}
{{--     <span class="pg-item"><a href="lists.html?talk/page/23" title="末页" class="navbutton">23</a></span>--}}
{{--     <span class="pg-item pg-nav-item pg-next"><a href="lists.html?talk/page/2" title="下一页" class="navbutton">下一页</a></span>--}}
    </div>
    <!-- /.pagination -->
   </div>
   <script type="text/javascript">
    $('.site_loading').animate({'width':'55%'},50);  //第二个节点
   </script>
   @parent
  </div>
 </div>
@endsection

