<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
             @foreach($categories as $category)
            <li class="dropdown menu-item">
                @if (session()->get('language') == 'bangla')
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{$category->category_icon}}" aria-hidden="true"></i>{{$category->category_name_bn}}</a>
                 @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{$category->category_icon}}" aria-hidden="true"></i>{{$category->category_name_en}}</a>
                 @endif
                 <!-- ============== MEGAMENU VERTICAL ==================== -->
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            @foreach($category->subcategory as $subcat)
                            <div class="col-xs-12 col-sm-12 col-lg-4">
                                 @if (session()->get('language') == 'bangla')
                                    <a href="{{url('sub-category/product/'.$subcat->id.'/'.$subcat->subcategory_slug_bn)}}"><h2 class="title">{{$subcat->subcategory_name_bn}}</h2></a>
                                  @else
                                    <a href="{{url('sub-category/product/'.$subcat->id.'/'.$subcat->subcategory_slug_en)}}"><h2 class="title">{{$subcat->subcategory_name_en}}</h2></a>
                                  @endif
                                <ul>
                                    @foreach($subcat->subsubcategory as $subsubcat)
                                    <li>
                                        @if(session()->get('language') == 'bangla')
                                            <a href="{{url('sub/sub-category/product/'.$subsubcat->id.'/'.$subsubcat->subsubcategory_slug_bn)}}">{{$subsubcat->subsubcategory_name_bn}}</a>
                                        @else
                                        <a href="{{url('sub/sub-category/product/'.$subsubcat->id.'/'.$subsubcat->subsubcategory_slug_en)}}">{{$subsubcat->subsubcategory_name_en}}</a>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                            <div class="dropdown-banner-holder">
                                <a href="#"><img alt="" src="{{asset('fontend/images/banners/banner-side.png')}}" /></a>
                            </div>
                        </div><!-- /.row -->
                    </li><!-- /.yamm-content -->                    
                </ul><!-- /.dropdown-menu -->
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
            </li><!-- /.menu-item -->
            @endforeach
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a>
               <!-- /.dropdown-menu -->
           </li><!-- /.menu-item -->
          
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->