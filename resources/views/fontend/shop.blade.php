@extends('layouts.fontend-master')
@section('fontend-content')
    @section('title') Shop Page @endsection

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Shop Page</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <form action="{{ route('shop.filter') }}" method="POST">
                @csrf
                <div class='row'>
                    <div class='col-md-3 sidebar'>
                        <!-- ================================== TOP NAVIGATION ================================== -->
                        @include('fontend.inc.category')
                        <!-- ================================== TOP NAVIGATION : END ================================== -->
                        <div class="sidebar-module-container">

                            <div class="sidebar-filter">
                                <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                                <div class="sidebar-widget wow fadeInUp">
                                    <h3 class="section-title">shop by category</h3>

                                    <div class="sidebar-widget-body">
                                        <div class="accordion">
                                            @if (!empty($_GET['category']))
                                                @php
                                                    $filterCat = explode(',', $_GET['category']);
                                                @endphp
                                            @endif
                                            @foreach ($categories as $cat)
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="category[]" id=""
                                                                value="{{ $cat->category_slug_en }}" @if (!empty($filterCat) && in_array($cat->category_slug_en, $filterCat)) checked @endif
                                                                onchange="this.form.submit();">
                                                            @if (session()->get('language') == 'bangla')
                                                                {{ $cat->category_name_bn }}
                                                            @else
                                                                {{ $cat->category_name_en }}
                                                            @endif
                                                        </label>
                                                    </div><!-- /.accordion-heading -->

                                                </div><!-- /.accordion-group -->
                                            @endforeach
                                        </div><!-- /.accordion -->
                                    </div><!-- /.sidebar-widget-body -->
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <h3 class="section-title">shop by Brand</h3>
                                    <div class="sidebar-widget-body">
                                        <div class="accordion">
                                            @if (!empty($_GET['brand']))
                                                @php
                                                    $filterBrand = explode(',', $_GET['brand']);
                                                @endphp
                                            @endif
                                            @foreach ($brands as $brand)
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" name="brand[]"
                                                                id="" value="{{ $brand->brand_slug_en }}" @if (!empty($filterBrand) && in_array($brand->brand_slug_en, $filterBrand)) checked @endif
                                                                onchange="this.form.submit();">
                                                            @if (session()->get('language') == 'bangla')
                                                                {{ $brand->brand_name_bn }}
                                                            @else
                                                                {{ $brand->brand_name_en }}
                                                            @endif
                                                        </label>
                                                    </div><!-- /.accordion-heading -->

                                                </div><!-- /.accordion-group -->
                                            @endforeach
                                        </div><!-- /.accordion -->
                                    </div><!-- /.sidebar-widget-body -->
                                </div><!-- /.sidebar-widget -->
                                <!-- ======================= SIDEBAR CATEGORY : END ============================== -->
                                <!-- ============================= PRICE SILDER================================== -->
                                <div class="sidebar-widget wow fadeInUp">
                                    <div class="widget-header">
                                        <h4 class="widget-title">Price Slider</h4>
                                    </div>
                                    <div class="sidebar-widget-body m-t-10">
                                        <div id="slider-range" class="price-filter-range"
                                            data-min="{{ Helper::minPrice() }}" data-max="{{ Helper::maxPrice() }}">
                                        </div><!-- /.price-range-holder --> <br>

                                        <input type="hidden" id="price_range" name="price_range" value="@if (!empty($_GET['price'])) {{ $_GET['price'] }} @endif">

                                        @if (!empty($_GET['price']))
                                            @php
                                                $price = explode('-', $_GET['price']);
                                            @endphp
                                        @endif
                                        <input type="text" id="amount" class="form-control" value="@if (!empty($_GET['price'])) ${{ $price[0] }} @else {{ Helper::minPrice() }} @endif-@if (!empty($_GET['price']))
                                    ${{ $price[1] }} @else {{ Helper::maxPrice() }} @endif" readonly> <br> <br>

                                        <button type="submit" class="lnk btn btn-primary">Filter</button>
                                    </div><!-- /.sidebar-widget-body -->
                                </div><!-- /.sidebar-widget -->
                                <!-- ==========]========== PRICE SILDER : END ============================================== -->

                                <!-- =================== PRODUCT TAGS ======================== -->
                                @include('fontend.inc.product-tags')
                                <!-- =========== PRODUCT TAGS : END =================================== -->
                                @include('fontend.inc.testimonial')
                                <!-- ============================================== Testimonials: END ============================================== -->

                                <div class="home-banner">
                                    <img src="assets/images/banners/LHS-banner.jpg" alt="Image">
                                </div>

                            </div><!-- /.sidebar-filter -->
                        </div><!-- /.sidebar-module-container -->
                    </div><!-- /.sidebar -->
                    <div class='col-md-9'>
                        <!-- ========================================== SECTION – HERO ========================================= -->

                        <div id="category" class="category-carousel hidden-xs">
                            <div class="item">
                                <div class="image">
                                    <img src="{{ asset('fontend') }}/assets/images/banners/cat-banner-1.jpg" alt=""
                                        class="img-responsive">
                                </div>
                                <div class="container-fluid">
                                    <div class="caption vertical-top text-left">
                                        <div class="big-text">
                                            Big Sale
                                        </div>

                                        <div class="excerpt hidden-sm hidden-md">
                                            Save up to 49% off
                                        </div>
                                        <div class="excerpt-normal hidden-sm hidden-md">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                        </div>

                                    </div><!-- /.caption -->
                                </div><!-- /.container-fluid -->
                            </div>
                        </div>




                        <!-- ================== SECTION – HERO : END ========================================= -->
                        <div class="clearfix filters-container m-t-10">
                            <div class="row">
                                <div class="col col-sm-6 col-md-2">
                                    <div class="filter-tabs">
                                        <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                            <li class="active">
                                                <a data-toggle="tab" href="#grid-container"><i
                                                        class="icon fa fa-th-large"></i>Grid</a>
                                            </li>
                                            <li><a data-toggle="tab" href="#list-container"><i
                                                        class="icon fa fa-th-list"></i>List</a></li>
                                        </ul>
                                    </div><!-- /.filter-tabs -->
                                </div><!-- /.col -->
                                <div class="col col-sm-12 col-md-6">
                                    <div class="col col-sm-3 col-md-6 no-padding">
                                        <div class="lbl-cnt">
                                            <div class="fld inline">
                                                <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                    <select class="form-control" name="sortBy"
                                                        onchange="this.form.submit();">
                                                        <option value="">Sort By Products</option>
                                                        <option value="priceLowtoHigh" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceLowtoHigh') selected @endif>Price:Lower to Higher
                                                        </option>
                                                        <option value="priceHightoLow" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceHightoLow') selected @endif>Price:Higher to Lower
                                                        </option>
                                                        <option value="nameAtoZ" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'nameAtoZ') selected @endif>Product Name:A to Z
                                                        </option>
                                                        <option value="nameZtoA" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'nameZtoA') selected @endif>Product Name:Z to A
                                                        </option>
                                                    </select>

                                                </div>
                                            </div><!-- /.fld -->
                                        </div><!-- /.lbl-cnt -->
                                    </div><!-- /.col -->

                                </div><!-- /.row -->
                            </div>
                            <div class="search-result-container ">
                                <div id="myTabContent" class="tab-content category-list">
                                    <div class="tab-pane active " id="grid-container">
                                        <div class="category-product">
                                            <div class="row">
                                                @foreach ($products as $product)
                                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                        <div class="products">
                                                            <div class="product">
                                                                <div class="product-image">
                                                                    <div class="image">
                                                                        @if (session()->get('language') == 'bangla')
                                                                            <a
                                                                                href="{{ url('single/product/' . $product->id . '/' . $product->product_slug_bn) }}"><img
                                                                                    src="{{ asset($product->product_thambnail) }}"
                                                                                    alt=""></a>
                                                                        @else
                                                                            <a
                                                                                href="{{ url('single/product/' . $product->id . '/' . $product->product_slug_en) }}"><img
                                                                                    src="{{ asset($product->product_thambnail) }}"
                                                                                    alt=""></a>
                                                                        @endif
                                                                    </div><!-- /.image -->
                                                                    @php
                                                                        $amount = $product->selling_price - $product->discount_price;
                                                                        $discount = ($amount / $product->selling_price) * 100;
                                                                    @endphp
                                                                    <div class="tag new">
                                                                        @if ($product->discount_price == null)
                                                                            <span>
                                                                                @if (session()->get('language') == 'bangla')
                                                                                নতুন @else new @endif
                                                                            </span>
                                                                        @else
                                                                            <span>
                                                                                @if (session()->get('language') == 'bangla')
                                                                                    {{ bn_price(round($discount)) }}%
                                                                                @else {{ round($discount) }}%
                                                                                @endif
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div><!-- /.product-image -->


                                                                <div class="product-info text-left">
                                                                    <h3 class="name">
                                                                        @if (session()->get('language') == 'bangla')
                                                                            <a
                                                                                href="detail.html">{{ $product->product_name_bn }}</a>
                                                                        @else
                                                                            <a
                                                                                href="detail.html">{{ $product->product_name_en }}</a>
                                                                        @endif
                                                                    </h3>
                                                                    <div class="rating rateit-small"></div>
                                                                    <div class="description"></div>

                                                                    <div class="product-price">
                                                                        @if ($product->discount_price == null)
                                                                            @if (session()->get('language') == 'bangla')
                                                                                <span
                                                                                    class="price">${{ bn_price($product->selling_price) }}</span>
                                                                            @else
                                                                                <span
                                                                                    class="price">${{ $product->selling_price }}</span>
                                                                            @endif
                                                                        @else
                                                                            @if (session()->get('language') == 'bangla')
                                                                                <span
                                                                                    class="price">${{ bn_price($product->discount_price) }}</span>
                                                                                <span
                                                                                    class="price-before-discount">${{ bn_price($product->selling_price) }}</span>
                                                                            @else
                                                                                <span
                                                                                    class="price">${{ $product->discount_price }}</span>
                                                                                <span
                                                                                    class="price-before-discount">${{ $product->selling_price }}</span>
                                                                            @endif

                                                                        @endif
                                                                    </div><!-- /.product-price -->

                                                                </div><!-- /.product-info -->
                                                                <div class="cart clearfix animate-effect">
                                                                    <div class="action">
                                                                        <ul class="list-unstyled">
                                                                            <li class="add-cart-button btn-group">
                                                                                <button class="btn btn-primary icon"
                                                                                    type="button" title="Add Cart"
                                                                                    data-toggle="modal"
                                                                                    data-target="#cartModal"
                                                                                    id="{{ $product->id }}"
                                                                                    onclick="productView(this.id)">
                                                                                    <i class="fa fa-shopping-cart"></i>
                                                                                </button>
                                                                                <button class="btn btn-primary cart-btn"
                                                                                    type="button">
                                                                                    @if (session()->get('language') == 'bangla')
                                                                                    কার্টেসংযুক্ত করুন@else Add to cart
                                                                                    @endif>
                                                                                </button>
                                                                            </li>
                                                                            <button class="btn btn-primary icon"
                                                                                type="button" title="Add to WIshlist"
                                                                                id="{{ $product->id }}"
                                                                                onclick="addToWishlist(this.id)">
                                                                                <i class="icon fa fa-heart"></i>
                                                                            </button>
                                                                        </ul>
                                                                    </div><!-- /.action -->
                                                                </div><!-- /.cart -->
                                                            </div><!-- /.product -->
                                                        </div><!-- /.products -->
                                                    </div><!-- /.item -->
                                                @endforeach
                                            </div><!-- /.row -->
                                        </div><!-- /.category-product -->
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane " id="list-container">
                                        <div class="category-product">
                                            @foreach ($products as $product)
                                                <div class="category-product-inner wow fadeInUp">
                                                    <div class="products">
                                                        <div class="product-list product">
                                                            <div class="row product-list-row">
                                                                <div class="col col-sm-4 col-lg-4">
                                                                    <div class="product-image">
                                                                        <div class="image">
                                                                            @if (session()->get('language') == 'bangla')
                                                                                <a
                                                                                    href="{{ url('single/product/' . $product->id . '/' . $product->product_slug_bn) }}"><img
                                                                                        src="{{ asset($product->product_thambnail) }}"
                                                                                        alt=""></a>
                                                                            @else
                                                                                <a
                                                                                    href="{{ url('single/product/' . $product->id . '/' . $product->product_slug_en) }}"><img
                                                                                        src="{{ asset($product->product_thambnail) }}"
                                                                                        alt=""></a>
                                                                            @endif
                                                                        </div>
                                                                    </div><!-- /.product-image -->
                                                                </div><!-- /.col -->
                                                                <div class="col col-sm-8 col-lg-8">
                                                                    <div class="product-info">
                                                                        <h3 class="name">
                                                                            @if (session()->get('language') == 'bangla')
                                                                                <a
                                                                                    href="detail.html">{{ $product->product_name_bn }}</a>
                                                                            @else
                                                                                <a
                                                                                    href="detail.html">{{ $product->product_name_en }}</a>
                                                                            @endif
                                                                        </h3>
                                                                        <div class="rating rateit-small"></div>
                                                                        <div class="product-price">
                                                                            @if ($product->discount_price == null)
                                                                                @if (session()->get('language') == 'bangla')
                                                                                    <span
                                                                                        class="price">${{ bn_price($product->selling_price) }}</span>
                                                                                @else
                                                                                    <span
                                                                                        class="price">${{ $product->selling_price }}</span>
                                                                                @endif
                                                                            @else
                                                                                @if (session()->get('language') == 'bangla')
                                                                                    <span
                                                                                        class="price">${{ bn_price($product->discount_price) }}</span>
                                                                                    <span
                                                                                        class="price-before-discount">${{ bn_price($product->selling_price) }}</span>
                                                                                @else
                                                                                    <span
                                                                                        class="price">${{ $product->discount_price }}</span>
                                                                                    <span
                                                                                        class="price-before-discount">${{ $product->selling_price }}</span>
                                                                                @endif

                                                                            @endif

                                                                        </div><!-- /.product-price -->
                                                                        <div class="description m-t-10">
                                                                            {!! $product->short_descp_en !!}</div>
                                                                        <div class="cart clearfix animate-effect">
                                                                            <div class="action">
                                                                                <ul class="list-unstyled">
                                                                                    <li class="add-cart-button btn-group">
                                                                                        <button class="btn btn-primary icon"
                                                                                            type="button" title="Add Cart"
                                                                                            data-toggle="modal"
                                                                                            data-target="#cartModal"
                                                                                            id="{{ $product->id }}"
                                                                                            onclick="productView(this.id)">
                                                                                            <i
                                                                                                class="fa fa-shopping-cart"></i>
                                                                                        </button>
                                                                                        <button
                                                                                            class="btn btn-primary cart-btn"
                                                                                            type="button">
                                                                                            @if (session()->get('language') == 'bangla')
                                                                                            কার্টেসংযুক্ত করুন@else Add
                                                                                                to cart @endif>
                                                                                        </button>
                                                                                    </li>
                                                                                    <button class="btn btn-primary icon"
                                                                                        type="button"
                                                                                        title="Add to WIshlist"
                                                                                        id="{{ $product->id }}"
                                                                                        onclick="addToWishlist(this.id)">
                                                                                        <i class="icon fa fa-heart"></i>
                                                                                    </button>
                                                                                </ul>
                                                                            </div><!-- /.action -->
                                                                        </div><!-- /.cart -->

                                                                    </div><!-- /.product-info -->
                                                                </div><!-- /.col -->
                                                            </div><!-- /.product-list-row -->
                                                            @php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $discount = ($amount / $product->selling_price) * 100;
                                                            @endphp
                                                            <div class="tag-new">
                                                                @if ($product->discount_price == null)
                                                                    <span>
                                                                        @if (session()->get('language') == 'bangla')
                                                                        নতুন @else new @endif
                                                                    </span>
                                                                @else
                                                                    <span>
                                                                        @if (session()->get('language') == 'bangla')
                                                                        {{ bn_price(round($discount)) }}% @else
                                                                            {{ round($discount) }}% @endif
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div><!-- /.product-list -->
                                                    </div><!-- /.products -->
                                                </div><!-- /.category-product-inner -->
                                            @endforeach

                                        </div><!-- /.category-product -->
                                    </div><!-- /.tab-pane #list-container -->
                                </div><!-- /.tab-content -->
                                {{ $products->appends($_GET)->links('vendor.pagination.custom') }}

                            </div><!-- /.search-result-container -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
            </form>
        </div><!-- /.container -->

    </div><!-- /.body-content -->

@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            if ($('#slider-range').length > 0) {
                const max_price = parseInt($('#slider-range').data('max'));
                const min_price = parseInt($('#slider-range').data('min'));
                let price_range = min_price + "-" + max_price;
                if ($('#price_range').length > 0 && $('#price_range').val()) {
                    price_range = $('#price_range').val().trim();
                }
                let price = price_range.split('-');
                $("#slider-range").slider({
                    range: true,
                    min: min_price,
                    max: max_price,
                    values: price,
                    slide: function(event, ui) {
                        $("#amount").val('$' + ui.values[0] + "-" + '$' + ui.values[1]);
                        $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                    }
                });
            }
        });

    </script>

@endsection
