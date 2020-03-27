<section class="shopping-cart spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="cart-table">
                  <table>
                      <thead>
                          <tr>
                              <th>Image</th>
                              <th class="p-name">Product Name</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Total</th>
                              <th><i class="ti-close"></i></th>
                          </tr>
                      </thead>
                      <tbody id="shoppingCartProducts">
                          @foreach($productsForOrder as $product)
                          <tr>
                          <td class="cart-pic first-row"><img src="{{$product->main_image}}" alt=""></td>
                              <td class="cart-title first-row">
                              <h5>{{$product->name}}</h5>
                              </td>
                            <td class="p-price first-row">${{$product->price}}</td>
                              <td class="qua-col first-row">
                                  <div class="quantity">
                                  <div data-id="{{$product->id}}" class="pro-qty">
                                      <input type="number" min="1" class="quantity-value" max="5" value="{{$product->quantity}}">
                                      </div>
                                  </div>
                              </td>
                            <td class="total-price first-row">${{$product->quantity * $product->price}}</td>
                            <td class="close-td first-row"><i data-id="{{$product->id}}" class="ti-close"></i></td>
                          </tr>
                          @endforeach
                       
                      </tbody>
                  </table>
              </div>
              <div class="row">
                
                  <div class="col-lg-4 offset-lg-4">
                      <div class="proceed-checkout">
                          <ul>
                              <li class="subtotal">Subtotal <span class="subtotal-value" >${{session()->get('totalPrice')}}</span></li>
                          <li class="cart-total">Total <span class="cart-total-value" >${{session()->get('totalPrice')}}</span></li>
                          </ul>
                          <a href="/checkout" class="proceed-btn">PROCEED TO CHECK OUT</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>