<div class="col-lg-9 order-1 order-lg-2">
  <div class="product-list">
      <div id="products-area" class="row">

        @foreach ($products as $product)  
          <div class="col-lg-4 col-sm-6">
              <div class="product-item">
                  <div class="pi-pic">
                <img src="{{asset($product->main_image)}}" alt="">
                     
                      <ul>
                          
                      <li class="quick-view"><a href="/{{$product->path}}">+ Quick View</a></li>
                         
                      </ul>
                  </div>
                  <div class="pi-text">
                  <div class="catagory-name">{{$product->gender->genderName}}</div>
                      <a href="#">
                      <h5>{{$product->name}}</h5>
                      </a>
                      <div class="product-price">
                         $ {{$product->price}}
                      <span>{{$product->price }}</span>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
         


          <div class="loading-more">
            {{$products->links()}}
          </div>
      </div>
  </div>
 
</div>