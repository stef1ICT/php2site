<section class="man-banner spad">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12" >
              <div class="filter-control">
                  <ul>
                    @foreach ($maleCategories as $category)
                  <li  data-info="{{$category->id}}|Male" class="categoryLink
                    @if($loop->first)
                    active
                    @endif
                    "
                    >{{$category->categoryName}}</li>
                    @endforeach
                  </ul>
              </div>
              <div id="manSection">
              <div  class="product-slider owl-carousel">
                  @foreach($maleProducts as $product)
                  <div class="product-item">
                      <div class="pi-pic">
                      <img width="300px;" height="300px;"  src="{{$product->getMainImageAttribute()}}"  alt="">
                          <div class="sale">Sale</div>
                          <ul>
                          <li class="quick-view"><a href="{{$product->path()}}">+ Quick View</a></li>
                          </ul>
                      </div>
                      <div class="pi-text">
                          <div class="catagory-name">{{$product->category->categoryName}}</div>
                          <a href="#">
                              <h5>{{$product->name}}</h5>
                          </a>
                          <div class="product-price">
                                {{$product->price}} . 00 $
                          </div>
                      </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
      
      </div>
  </div>
</section>