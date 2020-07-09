<div class="breadcrumbs">
    <div class="container clr">
        <div class="header-search">
            <form method="get" id="searchform" class="searchform" action="http://www.iydu.net" role="search">
                <input type="search" class="field" name="s" value="" id="s" placeholder="Search" required="" />
                <button type="submit" class="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div id="breadcrumbs">
            <h1><i class="fa fa-folder-open"></i>
                @if($state=='lists')
                    {{$data->cate_name}}
                    @else
                    {{$data->art_title}}
                @endif

            </h1>
            <div class="breadcrumbs-text">
                <a href="{{ url('/') }}" title="阅读使人自由">主页</a>&nbsp;&raquo;&nbsp;
                @if($state=='lists')
                    {{$data->cate_name}}
                @else
                    {{$data->art_title}}
                @endif
            </div>
        </div>
    </div>
</div>