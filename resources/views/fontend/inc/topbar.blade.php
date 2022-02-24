<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
<div class="top-bar animate-dropdown">
    <div class="container">
        <div class="header-top-inner">
            <div class="cnt-account">
                <ul class="list-unstyled">
                    <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                    <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                    <li><a href="{{ route('cart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                    <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
                    @auth
                    <li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>profile</a></li>
                    <!-- <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li> -->
                    

                                    
                    @else
                    <li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Login/Register</a></li>
                    @endif
                </ul>
            </div><!-- /.cnt-account -->

            <div class="cnt-block">
                <ul class="list-unstyled list-inline">
                    <li class="dropdown dropdown-small">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="modal" data-target="#exampleModal"><span class="value">Order Track </span></a>
                    </li>
                    

                    <li class="dropdown dropdown-small">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
                             @if (session()->get('language') == 'bangla') ভাষা পরিবর্তন করুন @else Language @endif</span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @if (session()->get('language') == 'bangla')
                            <li><a href="{{ route('english.language') }}">English</a></li>
                            @else
                            <li><a href="{{ route('bangla.language') }}">বাংলা</a></li>
                            @endif
                        </ul>
                    </li>
                </ul><!-- /.list-unstyled -->
            </div><!-- /.cnt-cart -->
            <div class="clearfix"></div>
        </div><!-- /.header-top-inner -->
    </div><!-- /.container -->
</div><!-- /.header-top -->
<!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
<div class="logo">
    <a href="home.html">
        
        <img src="assets/images/logo.png" alt="">

    </a>
</div><!-- /.logo -->
<!-- ============================================================= LOGO : END ============================================================= -->             </div><!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
<!-- ============================================================= SEARCH AREA ============================================================= -->
<div class="search-area">
    <form action="{{ route('search.product') }}" method="GET">
        <div class="control-group">
            <input class="search-field" autocomplete="off" onfocus="showSearchResult()" onblur="hideSearchResult()" name="search" id="search" placeholder="Search here..." />
            <button class="search-button"></button>
        </div>
    </form>
    <div id="suggestProduct"></div>
</div><!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->              </div><!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

    <div class="dropdown dropdown-cart">
        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
            <div class="basket">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                </div>
                <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
                <div class="total-price-basket">
                    <span class="lbl">cart -</span>
                    <span class="total-price">
                        <span class="sign">$</span><span class="value" id="cartSubTotal"></span>
                    </span>
                </div>


            </div>
        </a>
        <ul class="dropdown-menu">
            <li>
                 {{-- mini cart start with ajax  --}}
                <div id="miniCart">

                </div>
                {{-- mini cart end  --}}
                <div class="clearfix"></div>
            <hr>
        
            <div class="clearfix cart-total">
                <div class="pull-right">
                    
                        <span class="text">Sub Total :</span><span class='price'>$600.00</span>
                        
                </div>
                <div class="clearfix"></div>
                    
                <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> 
            </div><!-- /.cart-total-->
                    
                
        </li>
        </ul><!-- /.dropdown-menu-->
    </div><!-- /.dropdown-cart -->

<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->                </div><!-- /.top-cart-row -->
            </div><!-- /.row -->

        </div><!-- /.container -->

    </div><!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                    <div class="nav-outer">
                        <ul class="nav navbar-nav">
                            <li class="active dropdown yamm-fw">
                                <a href="" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">@if (session()->get('language') == 'bangla') হোম @else Home @endif</a>
                                
                            </li>
                            @php
                                $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
                            @endphp
                            @foreach($categories as $category)
                            <li class="dropdown yamm mega-menu">
                                @if (session()->get('language') == 'bangla')
                                    <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $category->category_name_bn }}</a>
                                    @else
                                    <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $category->category_name_en }}</a>
                                @endif
                                <ul class="dropdown-menu container">
                                    <li>
                                        <div class="yamm-content ">
                                            <div class="row">
                                                @php
                                                    $sucategories = App\Models\Subcategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                                                @endphp
                                                @foreach ($sucategories as $subcat)
                                                <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                     
                                                     @if (session()->get('language') == 'bangla')
                                                        <a href="">
                                                            <h2 class="title">{{ $subcat->subcategory_name_bn }}</h2>
                                                        </a>
                                                    @else
                                                        <a href="">
                                                            <h2 class="title">{{ $subcat->subcategory_name_en }}</h2>
                                                        </a>
                                                     @endif

                                                     @php
                                                        $subsucategories = App\Models\Subsubcategory::where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_en','ASC')->get();
                                                    @endphp
                                                    <ul class="links">
                                                        @foreach ($subsucategories as $subsubcat)
                                                             <li>
                                                                @if (session()->get('language') == 'bangla')
                                                                <a href="#">{{ $subsubcat->subsubcategory_name_bn }}</a>
                                                                @else
                                                                 <a href="#">{{ $subsubcat->subsubcategory_name_en }}</a>
                                                                 @endif
                                                                </li>
                                                        @endforeach
                                      
                                                    </ul>
                                                </div><!-- /.col -->
                                                @endforeach

                                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt="">
                                            </div><!-- /.yamm-content -->                   
                                        </div>
                                    </div>

                                    </li>
                                </ul>
                                
                            </li>
                            @endforeach
                            <li class="dropdown">
                                        <a href="{{ route('shop') }}">Shop</a>
                                    </li>

                                    
                            
                        </ul><!-- /.navbar-nav -->
                        <div class="clearfix"></div>                
                    </div><!-- /.nav-outer -->
</div><!-- /.navbar-collapse -->


            </div><!-- /.nav-bg-class -->
        </div><!-- /.navbar-default -->
    </div><!-- /.container-class -->

</div><!-- /.header-nav -->
<!-- ============================================== NAVBAR : END ============================================== -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('order.track') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Invoice No</label>
                          <input type="text" name="invoice_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="invoice no">
                        </div>
                        <button type="submit" class="btn btn-primary">Track Now</button>
                      </form>
                </div>
            </div>
            </div>
        </div>

</header>