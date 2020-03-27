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
                  <h3 class="title-5 text-center m-b-35">{{$category->categoryName}}</h3>
                  <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>   
                                    <th>name</th>
                                    <th>name</th>
                                    <th>description</th>
                                    <th>price</th>
                                    <th>category</th>
                                    <th>gender</th>
                                    <th>created at</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($products as $product)
                                <tr class="tr-shadow">
                                  <td>
                                  <img src="{{$product->main_image}}" class="img-fluid" />    
                                     
                                  </td>
                                <td>{{$product->name}}</td>
                                    <td>
                                    <span class="block-email">{{Str::limit($product->description,30)}}</span>
                                    </td>
                                    <td>
                                      <span class="block-email">${{$product->price}}</span>
                                      </td>
                                      <td>
                                          <span class="block-email">{{$product->category->categoryName}}</span>
                                          </td>
                                          <td>
                                              <span class="block-email">{{$product->gender->genderName}}</span>
                                              </td>
                                    <td>
                                    <span>{{$product->created_at}}</span>
                                    </td>
                                  
                                    <td>
                                        <div class="table-data-feature">
                                          <a class="btn btn-primary text-white" type="button">
                                              <i class="fa fa-star"></i>&nbsp; More</a>
                                         
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                               @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">  {{$products->links()}}</div>
                      
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