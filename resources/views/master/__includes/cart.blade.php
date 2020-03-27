<div class="col-lg-3 text-right col-md-3">
  <ul class="nav-right">
    
      <li class="cart-icon">
          <a href="#">
              <i class="icon_bag_alt"></i>
          <span id="totalQuantity">
              @if(Session::has('totalQuantity'))
                {{Session::get('totalQuantity')}}
              @else 0
              @endif
          </span>
          </a>
          <div class="cart-hover">
              <div class="select-items">
                  <table>
                      <tbody id="cart-body">


                        @if(count(Session::get('cartProducts')))
                      @foreach (Session::get('cartProducts') as $item)
                         
                  
                      <tr>
                        <td class="si-pic"><img src="{{$item->main_image}}" alt=""></td>
                            <td class="si-text">
                                <div class="product-selected">
                                <p>{{$item->price }} $ x {{$item->quantity}}</p>
                                <h6>{{$item->name}}</h6>
                                </div>
                            </td>
                            <td class="si-close">
                            <i data-id="{{$item->id}}" class="ti-close"></i>
                            </td>
                        </tr>
                          @endforeach
                          @endif
                      </tbody>
                  </table>
              </div>
              <div class="select-total">
                  <span>total:</span>
              <h5 id="totalPrice">
                  @if(Session::has('totalPrice'))
                  {{Session::get('totalPrice')}} $
                  @else 0 $
                @endif
                </h5>
              </div>
              <div class="select-button">
              <a href="/shopping-cart" class="primary-btn view-card">VIEW CARD</a>
              <a href="/checkout" class="primary-btn checkout-btn">CHECK OUT</a>
              </div>
          </div>
      </li>
    <li id="totalPriceCart" class="cart-price">
        @if(Session::has('totalPrice'))
        {{Session::get('totalPrice')}} 

        @else 0
        @endif
        $</li>
  </ul>
</div>