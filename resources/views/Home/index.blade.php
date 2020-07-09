@extends('Home.Layouts.home')

@section('title', '博客系统')

@section('main-wrap')
 <div id="main-wrap">
  <div id="sitenews-wrap" class="container"></div>
  <!-- Header Banner -->
  <!-- /.Header Banner -->
  <!-- CMS Layout -->
  <div class="container two-col-container cms-with-sidebar">
   <div id="main-wrap-left">


    <!-- Stickys -->
    <!-- /.Stickys -->
    @foreach($list as $key=>$val)
     @if(count($val->article)!=0)
     <section class="catlist-154 catlist clr">
      <div class="catlist-container clr">
       <h2 class="home-heading clr"> <span class="heading-text"> {{$val->cate_name}}</span> <a href="{{ url('/lists/'.$val->id) }}">+ 更多</a> </h2>

        @foreach($val->article as $k=>$v)
         @if($v->art_status==1)
       <span class="col-left catlist-style2">
        <article class="home-blog-entry clr">
           <a href="{{ url('/detail/'.$v->id) }}" title="{{$v->art_title}}" class="fancyimg home-blog-entry-thumb">
            <div class="thumb-img">
             <img src="{{ URL::asset($v->art_thumb) }}" alt="只做一件事，还是同时做几件事？" />
             <span><i class="fa fa-pencil"></i></span>
            </div> </a>
           <h3><a href="{{ url('/detail/'.$v->id) }}" title="{{$v->art_title}}">{{$v->art_title}}</a></h3>
           <div class="postlist-meta">
            <span class="postlist-meta-time">{{$v->art_time}}</span>
            <span class="delim"></span>
            <span class="postlist-meta-views">3&nbsp;℃</span>
            <span class="delim"></span>
            <span class="postlist-meta-comments"><i class="fa fa-comments"></i>&nbsp;<a href="#">{{$v->art_view}}</a></span>
            <div class="postlist-meta-like like-btn" style="float:right;" pid="5148" title="点击喜欢">
             <i class="fa fa-heart"></i>&nbsp;
             <span>{{$v->art_love}}</span>&nbsp;
            </div>
            <div class="postlist-meta-collect collect collect-no" data-uid="1" data-id="{{$v->id}}" style="float:right;cursor:default;" title="必须登录才能收藏">
             <i class="fa fa-star"></i>&nbsp;
             <span>{{$v->art_collect}}</span>&nbsp;
            </div>
           </div>
           <p>{{$v->art_description}}<a rel="nofollow" class="more-link" style="text-decoration:none;" href="#"></a> </p>
          </article>
       </span>
         @endif
        @endforeach


       <span class="col-right catlist-style2">
         @foreach($val->article as $k=>$v)
         @if($v->art_status==2&&$k<=5)
          <article class="clr col-small">
           <a href="#" title="懂事的孩子没糖吃" class="fancyimg home-blog-entry-thumb">
            <div class="thumb-img">
             <img src="{{ URL::asset($v->art_thumb) }}" alt="懂事的孩子没糖吃" />
             <span><i class="fa fa-pencil"></i></span>
            </div> </a>
           <h3><a href="#" title="懂事的孩子没糖吃">{{$v->art_title}}</a></h3>
           <p> {{$v->art_description}}<a rel="nofollow" class="more-link" style="text-decoration:none;" href="#"></a> </p>
          </article>
        @endif
        @endforeach
          </span>

      </div>
     </section>
    @endif
   @endforeach
{{--    <div id="loopad" class="container">--}}
{{--    </div>--}}

    <!-- pagination -->
    <div class="clear">
    </div>
    <div class="pagination">
    </div>
    <!-- /.pagination -->
   </div>
   <script type="text/javascript">
    $('.site_loading').animate({'width':'55%'},50);  //第二个节点
   </script>
   @parent
  </div>
  <div class="clear">
  </div>
  <!-- Blocks Layout -->
 </div>
@endsection

