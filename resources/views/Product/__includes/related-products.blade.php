<div class="related-products spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section-title">
                  <h2>Related Products</h2>
              </div>
          </div>
      </div>
      <div class="row">
          @foreach($relatedProducts as $product)
          <div class="col-lg-3 col-sm-6">
              <div class="product-item">
                  <div class="pi-pic">
                  <img src="{{asset($product->main_image)}}" alt="">
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
                        ${{$product->price}}
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
      </div>
  </div>
</div>