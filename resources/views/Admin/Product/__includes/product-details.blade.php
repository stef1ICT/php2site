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
  @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


@if(session()->has('deleteMessage'))
<div class="alert alert-success">
    {{ session()->get('deleteMessage') }}
</div>
@endif



@if (count($errors) > 0)
<ul><li>{{ $errors->first() }}</li></ul>
@endif
  <!-- END WELCOME-->
  <!-- DATA TABLE-->
  <section class="p-t-20">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Custom Tab</h4>
                    </div>
                    <div class="card-body">
                        <div class="custom-tab">

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Home</a>
                                    <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Edit</a>
                                    <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Specifications</a>
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane show active " id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                    <div class=" offset-lg-12 col-lg-12">
                                        <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
                                            <div class="au-card-inner">
                                                <div class="table-responsive">
                                                    <table style="color:white" class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td style="vertical-align: middle">Images</td>
                                                            <td id="product-images" class="text-right">
                                                             @foreach  ($product->images as $image)
                                                             <img 
                                                             style="width:25%; height:150px"
                                                             class="rounded" src="{{$image->imageUrl}}"/>
                                                             @endforeach   
                                                           
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Name</td>
                                                            <td  class="text-right">{{$product->name}}</td >
                                                            </tr>

                                                        
                                                            <tr>
                                                                <td>Description</td>
                                                            <td  class="text-justify">
                                                            
                                                               <p>
                                                                    {{$product->description}}
                                                                </p>
                                                                   
                                        
                                                               </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Price</td>
                                                            <td  class="text-right">
                                                   
                                                                 $   {{$product->price}}
                                                 
                                                                   
                                        
                                                               </td>
                                                            </tr>


                                                            <tr>
                                                                <td>Category</td>
                                                            <td  class="text-right">
                                                            
                                                       
                                                                    {{$product->category->categoryName}}
                                                               
                                                           
                                        
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Created at</td>
                                                            <td  class="text-right">
                                                            
                                                       
                                                               {{$product->created_at}}
                                                               
                                                           
                                        
                                                               </td>
                                                            </tr>

                                                                @foreach($product->specifications as $specification)
                                                            <tr>
                                                            <td>{{$specification->specifications_type->name}}</td>
                                                            <td  class="text-right">
                                                            
                                                       
                                                               {{$specification->value}}
                                                               
                                                           
                                        
                                                               </td>
                                                            </tr>
                                                            @endforeach


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                   <div class="row">  
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Update </strong> Product
                                            </div>
                                            <div class="card-body card-block">
                                            <form action="{{route('update-product',['product' => $product->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    
                                                    @csrf
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class="form-control-label">Name</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                        <input value="{{$product->name}}" type="text" id="text-input" name="name" placeholder="Product Name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="email-input"  class=" form-control-label">Price</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" name="price"  value="{{$product->price}}" name="email-input" placeholder="Enter price" class="form-control">
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="textarea-input"class=" form-control-label">Description</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea   name="description"  id="textarea-input" rows="9"  class="form-control">{{$product->description}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="select" class=" form-control-label">Select category</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="category" id="select" class="form-control">
                                                                @foreach(App\Category::all() as $category)
                                                            <option  
                                                                @if($product->category_id == $category->id)
                                                                    selected
                                                                @endif
                                                            value="{{$category->id}}">{{$category->categoryName}}</option>
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
                                                                    <input type="radio"  
                                                                    @if($product->gender_id == $gender->id) checked  @endif
                                                                    name="gender" value="{{$gender->id}}" class="form-check-input">{{$gender->genderName}}
                                                                    </label>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="file-input" class=" form-control-label">File input</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="file" id="file-input" name="file-input" class="form-control-file">
                                                        </div>
                                                    </div>
                                                 
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Update
                                                </button>
                                            </div>
                                        </form>
                                        </div>
                                      
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row btns-delete-photos">
                                        @foreach($product->images as $image)
                                        <div class="col-lg-4 ">
                                            <div class="card">
                                            <img class="card-img-top" style="height:200px;" src="{{$image->imageUrl}}" alt="Card image cap">
                                                <div class="card-body">
                                                <button data-ids="{{$product->id}}|{{$image->id}}" class="btn btn-danger delete-photo">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                <form method="POST" action="{{route('add-photos',['product'=>$product->id])}}" enctype="multipart/form-data">
                                    <div class="row form-group">
                                        @csrf
                                        <div class="col col-md-3">
                                            <label for="file-multiple-input" class=" form-control-label">Add more photos</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" name="images[]" multiple="" class="form-control-file">
                                        </div>
                                        <button class="btn btn-primary">Add Photos</button>
                                   
                                    </div>
                                </form>
                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane fade " id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                                <tr>
                                                    <th>Specifications</th>
                                                    <th>Value</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="specifications">
                                                @foreach($product->specifications as $specification)
                                                <tr>
                                                <td>{{$specification->specifications_type->name}}</td>
                                                <td>{{$specification->value}}</td>
                                                <td>
                                                <form action="{{route('delete-specification')}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" 
                                                value="{{$specification->id}}"
                                                    name="specificationId" />
                                                    <button  data-id="{{$specification->id}}" class="btn btn-danger specification-delete">Delete</button>
                                                </form>
                                                </td>
                                                </tr>
                                              @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Add new </strong> Specification
                                        </div>
                                    <form action="{{route('add-specification', ['product'=>$product->id])}}" method="post" class="form-horizontal">
                                        @csrf
                                        <div class="card-body card-block">
                                            
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="hf-email" class=" form-control-label">Specification type</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" list="spec_type" class="form-control" name="spec_type">
                                                        <datalist id="spec_type">

                                                            @foreach(App\SpecificationsType::all() as $type)
                                                        <option value="{{$type->name}}">
                                                        @endforeach
                                                        </datalist>
                                                       
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="hf-password" class=" form-control-label">Value</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text"  name="spec_value" placeholder="Enter value of specification type" class="form-control">
                                                  
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-dot-circle-o"></i> Add Specification
                                                    </button>
                                                  
                                                </div>
                                          
                                        </form>
                                    </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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
