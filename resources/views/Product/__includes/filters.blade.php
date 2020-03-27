<div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">

  @if(!$gender)
  <div class="filter-widget">
      <h4 class="fw-title">Genders</h4>
      <ul class="filter-catagories">
        <div> 
        <input type="radio"  checked value="all"  id="all" selected="true" name="gender">
        <label for="all">All</label>
        </div>
        @foreach(App\Gender::all() as $gender)
      
        <div> 
        <input type="radio" id="{{$gender->genderName}}" value="{{$gender->id}}" name="gender">
          <label for="{{$gender->genderName}}">
            {{$gender->genderName}}
          </label>
          </div>
          @endforeach
      </ul>
  </div>
  @else
<input type="radio"  checked value="{{$gender}}" style="display: none;" name="gender" >
  @endif
  <div class="filter-widget">
      <h4 class="fw-title">Categories</h4>
      <div class="fw-brand-check">

        @foreach (App\Category::all() as $category)
      
          <div class="bc-item">
   
                  
          <input type="checkbox" value="{{$category->id}}" class="categories"  id="{{$category->categoryName}}" >
                  <label for="{{$category->categoryName}}">{{$category->categoryName}}</label>
            
          </div>
                
        @endforeach
      
        
      </div>
  </div>
  <div class="filter-widget">
      <h4 class="fw-title">Price</h4>
      <div class="filter-range-wrap">
          <div class="range-slider">
              <div class="price-input">
                  <input type="text" readonly id="minamount">
                  <input type="text" readonly id="maxamount">
              </div>
          </div>
          <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
              data-min="20" data-max="200">
              <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
              <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
              <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
          </div>
      </div>
      <a style="cursor: pointer;"  class="filter-btn">Filter</a>
  </div>

  
</div>