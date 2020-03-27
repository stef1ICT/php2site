<section class="shopping-cart spad">
  <div class="container">
      <div class="row">
          <h3>Your orders:</h3>
          <div class="col-lg-12">
              <div class="cart-table">
                  <table>
                      <thead>
                          <tr>
                              <th>Products</th>
                              <th>Total Price</th>
                              <th>Status</th>
                          </tr>
@foreach($orders as $order)
                          <tr>

                       
                          <td>
                            @foreach($order->orderedProducts as $ordered)
                            <div>
                            <a href="{{$ordered->product->path()}}">{{$ordered->product->name}}</a>
                            <span class="badge badge-primary">{{$ordered->quantity}}</span>
                            </div>
                            @endforeach
                          </td>
                          
                        <td>$ {{$order->totalPrice}}</td>
                            <td>
                                @if($order->orderStatus->status === 'Unproccessed')
                                <div class="alert alert-secondary" role="alert">
                                    {{$order->orderStatus->status }}
                                  </div>
                                  @elseif($order->orderStatus->status === 'Denied') 
                                  <div class="alert alert-danger" role="alert">
                                    {{$order->orderStatus->status }}
                                  </div>
                                  @else
                                  <div class="alert alert-success" role="alert">
                                    {{$order->orderStatus->status }}
                                  </div>
                                    @endif
                            </td>
                          </tr>
                          @endforeach
                      </thead>
                      <tbody>
                        
                       
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</section>