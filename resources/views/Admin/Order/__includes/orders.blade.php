<div class="page-content--bgf7">
  <!-- BREADCRUMB-->
  <section class="au-breadcrumb2">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="au-breadcrumb-content">
                      <div class="au-breadcrumb-left">
                          <span class="au-breadcrumb-span">You are here:</span>
                          <ul class="list-unstyled list-inline au-breadcrumb__list">
                              <li class="list-inline-item active">
                                  <a href="#">Home</a>
                              </li>
                              <li class="list-inline-item seprate">
                                  <span>/</span>
                              </li>
                              <li class="list-inline-item">Dashboard</li>
                          </ul>
                      </div>
                    
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- END BREADCRUMB-->

  <!-- WELCOME-->
  <section class="welcome p-t-10">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="title-4">Welcome back
                      <span>{{auth()->user()->name}}</span>
                  </h1>
                  <hr class="line-seprate">
              </div>
          </div>
      </div>
  </section>
  <!-- END WELCOME-->
  <!-- DATA TABLE-->
  <section class="p-t-20">
      <div class="container">
          <div class="row">
           
              <div class="col-md-12">
                  <h3 class="title-5 m-b-35">Orders</h3>
                   <div class="table-responsive table-responsive-data2">
                      <table class="table table-data2">
                          <thead>
                              <tr>   
                                  <th>Name</th>
                                  <th>Street</th>
                                  <th>Town</th>
                                  <th>Phone</th>
                                  <th>Ordered products </th>
                                  <th>Total price</th>
                                  <th>Ordered date</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($orders as $order)
                              <tr class="tr-shadow">
                                <td>
                             
                                <p>{{$order->user->name}}</p>
                                </td>
                              <td>
                              <p>{{$order->street}}</p>
                              </td>
                                  <td>
                                  <span>
                                    {{$order->town}}
                                  </span>
                                  </td>
                                  <td>
                                    <span >
                                      {{$order->phone}}
                                    </span>
                                    </td>
                                    <td>
                                        <span>
                                          @foreach($order->orderedProducts as $orderedProduct)
                                          <a href="#">{{$orderedProduct->product->name}}
                                          <span class="badge badge-primary">{{$orderedProduct->quantity}}x</span>
                                          </a>
                                          @endforeach
                                        </span>
                                        </td>
                                        <td>
                                            <span>
                                              $ <strong>{{$order->totalPrice}} </strong>
                                            </span>
                                            </td>
                                  <td>
                                    {{$order->created_at}}
                           
                                  </td>
                                  <td>
                                      <div id="order-statuses" class="table-data-feature">
                                        <select name="select" id="selectStatus" class="form-control">

                                            @foreach (App\OrderStatus::all() as $item)
                                            
                                        <option
                                        @if($order->order_status_id === $item->id) selected @endif
                                        value="{{$order->id}}|{{$item->id}}">{{$item->status}}</option>
                                            @endforeach
                                         
                                        </select>
                                       
                                      </div>
                                  </td>
                              </tr>
                              
                              <tr class="spacer"></tr>

                             
                             @endforeach
                            
                          </tbody>
                      
                      </table>
                      <div class="mt-4">  {{$orders->links()}}</div>
                    
                  </div> 
              </div>
          </div>
      </div>
  </section>
  <!-- END DATA TABLE-->

  <!-- COPYRIGHT-->
  <section class="p-t-60 p-b-20">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="copyright">
                      <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- END COPYRIGHT-->
</div>

</div>
