@extends('frontend.templates.master', [
    'title' => 'Danh Mục '.$category->name,
    'include'=>[],

])
@section('content')
@inject('request', 'Illuminate\Http\Request')
<?php $arr=explode('/', $request->path()); $arr2=explode('-', $arr[1]);?>
<div class="columns-container">
        <div class="container" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="#" title="Return to Home">Home</a>
                <span class="navigation-pipe">&nbsp;</span>
                <span class="navigation_page">{{$category->name}}</span>
            </div>
            <!-- ./breadcrumb -->
            <!-- row -->
            <div class="row">
                <!-- Left colunm -->
                <div class="column col-xs-12 col-sm-3" id="left_column">
                    <!-- block category -->
                    <div class="block left-module">

                        <p class="title_block">Danh Mục</p>
                        <div class="block_content">
                            <!-- layered -->
                            <div class="layered layered-category">
                                <div class="layered-content">
                                    <ul class="tree-menu">
                                    @foreach($categories as $category_parent)
                                        <li class="{{$arr2[0]==$category_parent->id? "active":''}}">
                                            <span></span><a href="{{url('category', ['id'=>$category_parent->id])}}">{{$category_parent->name}}</a>
                                            <ul class="tree-menu">
                                            <?php $categories2 = DB::table('categories')->where('parent_id', $category_parent->id)->get();?>
                                                @foreach($categories2 as $subcategory)
                                                    <li class="{{$arr2[0]==$subcategory->id? "active":''}}"><span></span><a href="{{url('category', ['id'=>$subcategory->id])}}">{{$subcategory->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- ./layered -->
                        </div>
                    </div>

                    

                    <!-- ./block category  -->
                    <!-- block filter -->
                    <div class="block left-module">
                        <p class="title_block">Filter selection</p>
                        <div class="block_content">
                            <!-- layered -->
                            <div class="layered layered-filter-price">
                        
                                <!-- filter price -->
                                <div class="layered_subtitle">Giá</div>
                                <div class="layered-content slider-range">

                                    <div data-label-reasult="Range:" data-min="0" data-max="50000000" data-unit="$" class="slider-range-price" data-value-min="1000" data-value-max="5000000"></div>
                                    <div class="amount-range-price">Range: 20000 - 5000000</div>
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" id="p1" name="cc" />
                                            <label for="p1">
                                                <span class="button"></span>
                                                $20 - $50<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="p2" name="cc" />
                                            <label for="p2">
                                                <span class="button"></span>
                                                $50 - $100<span class="count">(0)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="p3" name="cc" />
                                            <label for="p3">
                                                <span class="button"></span>
                                                $100 - $250<span class="count">(0)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- ./filter price -->
                                <!-- filter color -->
                                
                                <!-- ./filter color -->
                                <!-- ./filter brand -->
                                
                                <!-- ./filter brand -->
                                <!-- ./filter size -->
                                
                                <!-- ./filter size -->
                            </div>
                            <!-- ./layered -->

                        </div>
                    </div>
                    <!-- ./block filter  -->

                    <!-- left silide -->
                    <div class="col-left-slide left-module">
                        <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
                            <li><a href="#"><img src="assets/data/slide-left.jpg" alt="slide-left"></a></li>
                            <li><a href="#"><img src="assets/data/slide-left2.jpg" alt="slide-left"></a></li>
                            <li><a href="#"><img src="assets/data/slide-left3.png" alt="slide-left"></a></li>
                        </ul>

                    </div>
                    <!--./left silde-->
                    <!-- SPECIAL -->
                    <div class="block left-module">
                        <p class="title_block">SPECIAL PRODUCTS</p>
                        <div class="block_content">
                            <ul class="products-block">
                                <li>
                                    <div class="products-block-left">
                                        <a href="#">
                                            <img src="assets/data/product-100x122.jpg" alt="SPECIAL PRODUCTS">
                                        </a>
                                    </div>
                                    <div class="products-block-right">
                                        <p class="product-name">
                                            <a href="#">Woman Within Plus Size Flared</a>
                                        </p>
                                        <p class="product-price">$38,95</p>
                                        <p class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <div class="products-block">
                                <div class="products-block-bottom">
                                    <a class="link-all" href="#">All Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./SPECIAL -->
                    <!-- TAGS -->
                    <div class="block left-module">
                        <p class="title_block">TAGS</p>
                        <div class="block_content">
                            <div class="tags">
                                <a href="#"><span class="level1">actual</span></a>
                                <a href="#"><span class="level2">adorable</span></a>
                                <a href="#"><span class="level3">change</span></a>
                                <a href="#"><span class="level4">consider</span></a>
                                <a href="#"><span class="level3">phenomenon</span></a>
                                <a href="#"><span class="level4">span</span></a>
                                <a href="#"><span class="level1">spanegs</span></a>
                                <a href="#"><span class="level5">spanegs</span></a>
                                <a href="#"><span class="level1">actual</span></a>
                                <a href="#"><span class="level2">adorable</span></a>
                                <a href="#"><span class="level3">change</span></a>
                                <a href="#"><span class="level4">consider</span></a>
                                <a href="#"><span class="level2">gives</span></a>
                                <a href="#"><span class="level3">change</span></a>
                                <a href="#"><span class="level2">gives</span></a>
                                <a href="#"><span class="level1">good</span></a>
                                <a href="#"><span class="level3">phenomenon</span></a>
                                <a href="#"><span class="level4">span</span></a>
                                <a href="#"><span class="level1">spanegs</span></a>
                                <a href="#"><span class="level5">spanegs</span></a>
                            </div>
                        </div>
                    </div>
                    <!-- ./TAGS -->
                    <!-- Testimonials -->
                    <div class="block left-module">
                        <p class="title_block">Testimonials</p>
                        <div class="block_content">
                            <ul class="testimonials owl-carousel" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplay="true" data-autoplayHoverPause = "true" data-items="1">
                                <li>
                                    <div class="client-mane">Roverto & Maria</div>
                                    <div class="client-avarta">
                                        <img src="assets/data/testimonial.jpg" alt="client-avarta">
                                    </div>
                                    <div class="testimonial">
                                        "Your product needs to improve more. To suit the needs and update your image up"
                                    </div>
                                </li>
                                <li>
                                    <div class="client-mane">Roverto & Maria</div>
                                    <div class="client-avarta">
                                        <img src="assets/data/testimonial.jpg" alt="client-avarta">
                                    </div>
                                    <div class="testimonial">
                                        "Your product needs to improve more. To suit the needs and update your image up"
                                    </div>
                                </li>
                                <li>
                                    <div class="client-mane">Roverto & Maria</div>
                                    <div class="client-avarta">
                                        <img src="assets/data/testimonial.jpg" alt="client-avarta">
                                    </div>
                                    <div class="testimonial">
                                        "Your product needs to improve more. To suit the needs and update your image up"
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- ./Testimonials -->
                </div>
                <!-- ./left colunm -->
                <!-- Center colunm-->
                <div class="center_column col-xs-12 col-sm-9" id="center_column">
        
                    <div id="view-product-list" class="view-product-list">
                        <h2 class="page-heading">
                            <span class="page-heading-title">{{$category->name}}</span>
                        </h2>
                        <ul class="display-product-option">
                            <li class="view-as-grid selected">
                                <span>grid</span>
                            </li>
                            <li class="view-as-list">
                                <span>list</span>
                            </li>
                        </ul>
                        <!-- PRODUCT LIST -->
                        <ul class="row product-list grid">
                            @foreach($products as $product)
                            
                            <li class="col-sx-12 col-sm-4">
                                <div class="product-container">
                                    <div class="left-block">
                                        <a href="{{url('product', ['id'=>$product->id])}}">
                                        @if($product->getMedia()->isEmpty() == false)
                                            <img class="img-responsive" alt="product" src="{{asset($product->getMedia()[0]->getUrl())}}" />
                                        @endif    
                                        </a>
                                        {{-- <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                        </div> --}}
                                        <div class="add-to-cart">
                                            <a title="Add to Cart" href="{{url('add-to-cart', ['id'=>$product->id])}}">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="{{url('product', ['id'=>$product->id])}}">{{$product->name}}</a></h5>
                                        {{-- <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div> --}}
                                        <div class="content_price">
                                            <span class="price product-price">{{number_format($product->price,0,",",".")}} VNĐ</span>
                                            @if($product->compare_price > $product->price)
                                            <p class="price old-price">{{number_format($product->compare_price,0,",",".")}} VNĐ</p>
                                            @endif
                                        </div>
                                        <div class="info-orther">
                                            <p>Khối lượng: {{$product->weight/1000}} kg</p>
                                            {{-- <p class="availability">Availability: <span>In stock</span></p> --}}
                                            <div class="product-desc">
                                                {{htmlspecialchars($product->summary)}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <!-- ./PRODUCT LIST -->
                    </div>
                    <!-- ./view-product-list-->
                    <div class="sortPagiBar">
                        {{-- <div class="bottom-pagination">
                            <nav>
                                <ul class="pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">Next &raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div> --}}
                        <div class="bottom-pagination">
                        <nav>
                          <ul class="pagination">
                              <?php $i; ?>
                        @if($products != null && empty($products->error))
                            @if($products->currentPage() > 1 )
                                <li>
                                  <a href="{{$request->fullUrlWithQuery([ 'page'=>($products->currentPage()-1)])}}" title="Pre page" aria-label="Pre">
                                      <span aria-hidden="true">&laquo; Pre</span>
                                  </a>
                                </li>
                            @endif

                            @for($i =1; $i<=$products->lastPage(); $i++)
                                <li class="{{ $products->currentPage() == $i ? 'active' :''  }}"><a href="{{$request->fullUrlWithQuery([ 'page'=>$i])}}" title="page {{$i}}">{{$i}}</a></li>
                            @endfor

                            @if($products->lastPage() > $products->currentPage() )
                                <li>
                                  <a href="{{$request->fullUrlWithQuery([ 'page'=>($products->currentPage()+1)])}}" title="Next page" aria-label="Next">
                                      <span aria-hidden="true">Next &raquo;</span>
                                  </a>
                                </li>
                            @endif
                        @endif
                          </ul>
                        </nav>
                    </div>
                        <div class="show-product-item">
                            <select name="">
                                <option value="">Show 18</option>
                                <option value="">Show 20</option>
                                <option value="">Show 50</option>
                                <option value="">Show 100</option>
                            </select>
                        </div>
                        <div class="sort-product">
                            <select>
                                <option value="">Product Name</option>
                                <option value="">Price</option>
                            </select>
                            <div class="sort-product-icon">
                                <i class="fa fa-sort-alpha-asc"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
    </div>
@endsection