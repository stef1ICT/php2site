<section class="product-shop spad page-details">
  <div class="container">
      <div class="row">
       
          <div class="col-lg-12">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="product-pic-zoom">
                          <img width="250px" height="350px" class="product-big-img" src="{{asset($product->mainPhoto())}}" alt="">
                          <div class="zoom-icon">
                              <i class="fa fa-search-plus"></i>
                          </div>
                      </div>
                      <div class="product-thumbs">

                       
                          <div class="product-thumbs-track ps-slider owl-carousel">
                            @foreach($product->images as $image)
                          <div class="pt active" data-imgbigurl="{{asset($image->imageUrl)}}"><img width="150px" height="150px"  src="{{asset($image->imageUrl)}}" alt=""></div>
                                      @endforeach
                           
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="product-details">
                          <div class="pd-title">
                              
                          <h3>{{$product->name}}</h3>
                              
                          </div>
                         
                          <div class="pd-desc">
                            
                              <h4>${{$product->price}}</h4>
                          </div>
                       
                     
                          <div class="quantity">
                              <div class="pro-qty">
                                  <input type="text" value="1">
                              </div>
                            <a href="#" id="addToCartBtn" data-id="{{$product->id}}" class="primary-btn pd-cart">Add To Cart</a>
                          </div >
                        
                        
                      </div>
                  </div>
              </div>
              <div class="product-tab">
                  <div class="tab-item">
                      <ul class="nav" role="tablist">
                          <li>
                              <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                          </li>
                          <li>
                              <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                          </li>
                          
                      </ul>
                  </div>
                  <div class="tab-item-content">
                      <div class="tab-content">
                          <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                              <div class="product-content">
                                  <div class="row">
                                      <div class="col-lg-12">
                                      <p>{{$product->description}}</p>
                                      </div>
                                     
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="tab-2" role="tabpanel">
                              <div class="specification-table">
                                  <table>
                                     
                                  
                                    @foreach($product->specifications as $specification)
                                      <tr >
                                      <td class="p-catagory">
                                          {{$specification->specifications_type->name}}
                                      </td>
                                          <td>
                                              <div class="p-stock">
                                                {{$specification->value}}
                                              </div>
                                          </td>
                                      </tr>
                                  
                                    @endforeach
                                  
                                  
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>