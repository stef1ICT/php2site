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


  
  @if(session()->has('successMessage'))

  <div class="alert alert-success">
    {{session()->get('successMessage')}}
  </div>
  @endif
  <!-- END WELCOME-->
  <!-- DATA TABLE-->
  <section class="p-t-20">
      <div class="container">
        <div class="row">  
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Create </strong> Product
                    </div>
                    <div class="card-body card-block">
                    <form  action="{{route('store-product')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class="form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <input value="" type="text" id="text-input" name="name" placeholder="Product Name" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input"  class=" form-control-label">Price</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" name="price"  placeholder="Enter price" class="form-control">
                                </div>
                            </div>
                           
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input"class=" form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea   name="description" 
                                    placeholder="Enter description..."
                                    id="textarea-input" rows="9"  class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Select category</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="category" id="select" class="form-control">
                                    @foreach(App\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Gender</label>
                                </div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        @foreach(App\Gender::all() as $gender)
                                        <div class="radio">
                                            <label for="radio1" class="form-check-label ">
                                            <input type="radio" @if($loop->first) checked  @endif value="{{$gender->id}}"
                                            name="gender" class="form-check-input">
                                            {{$gender->genderName}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="images[]" class=" form-control-label">Upload images</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="file-input" name="images[]" class="form-control-file">
                                </div>
                            </div>
                         
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-dot-circle-o"></i> Create Product
                        </button>
                    </div>
                </form>
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
