<body>
  <!-- Page Preloder -->
  <div id="preloder">
      <div class="loader"></div>
  </div>

  <!-- Header Section Begin -->
  <header class="header-section">
      <div class="header-top">
          <div class="container">
              <div class="ht-left">
                  <div class="mail-service">
                      <i class=" fa fa-envelope"></i>
                      hello.colorlib@gmail.com
                  </div>
                  <div class="phone-service">
                      <i class=" fa fa-phone"></i>
                      +65 11.188.888
                  </div>
              </div>
              <div class="ht-right">

             
              
                  <div class="top-social">
                      <a href="#"><i class="ti-facebook"></i></a>
                      <a href="#"><i class="ti-twitter-alt"></i></a>
                      <a href="#"><i class="ti-linkedin"></i></a>
                      <a href="#"><i class="ti-pinterest"></i></a>
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="inner-header">
              <div class="row">
                  <div class="col-lg-2 col-md-2">
                      <div class="logo">
                          <a href="/">
                              <img src="../../img/logo.png" alt="">
                          </a>
                      </div>
                  </div>
                  <div class="col-lg-7 col-md-7">
                      <form action="/search" method="POST">
                        @csrf
                      <div class="advanced-search">
                          <button type="button" class="category-btn">All Categories</button>
                          <div class="input-group">
                              <input name="search-word" type="text" placeholder="What do you need?">
                              <button type="submit"><i class="ti-search"></i></button>
                          </div>
                      </div>
                    </form>
                  </div>
                  @if(auth()->check())
          @include('master.__includes.cart')

          @endif
              </div>
          </div>
      </div>
      <div class="nav-item">
          <div class="container">
          <div class="row">
              <nav class="col-lg-12 nav-menu mobile-menu">
                  <ul>
                      <li class="active"><a href="/">Home</a></li>
                      <li><a href="/shop">Shop</a></li>
                      <li><a href="#">Collection</a>
                          <ul class="dropdown">
                              <li><a href="/products/male">Men's</a></li>
                              <li><a href="/products/female">Women's</a></li>
                          </ul>
                      </li>
                      <li><a href="/my-orders">My orders</a></li>
                      <li><a href="./contact.html">Contact</a></li>

                
                      @if(Auth()->check())
                      <li>
                        <a id="logout" href="#" class="login-panel"><i class="fa fa-user"></i>Logout</a>
                      </li>
                      <form method="POST" id="logoutForm" style="display: none" action="/logout">
                          @csrf
                          <input type="submit" id="logoutBtn" value="Submit">
                      </form>
                           
                          @else 
                          <li><a href="/login">Login</a></li>
                          <li><a href="/register">Register</a></li>
                        @endif
                      @can('isAdmin')
                      <li><a href="/admin-panel">Admin Panel</a></li>
                      @endcan
                      {{-- <li><a href="./contact.html">Logout</a></li> --}}
                   
                      {{-- <li><a href="#">Pages</a>
                          <ul class="dropdown">
                              <li><a href="./blog-details.html">Blog Details</a></li>
                              <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                              <li><a href="./check-out.html">Checkout</a></li>
                              <li><a href="./faq.html">Faq</a></li>
                              <li><a href="./register.html">Register</a></li>
                              <li><a href="./login.html">Login</a></li>
                             
                          </ul>
                      </li> --}}
                  </ul>
              </nav>
              <div id="mobile-menu-wrap"></div>
            </div>
          </div>
      </div>



  
  </header>