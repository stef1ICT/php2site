<div class="breacrumb-section">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="breadcrumb-text">
                  <a href="#"><i class="fa fa-home"></i> Home</a>
                  <span>Register</span>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 offset-lg-3">
              <div class="register-form">
                  <h2>Register</h2>
              <form method="POST" action="/register">
                @csrf
                      <div class="group-input">
                          <label for="username">Email address *</label>
                      <input name="email" value="{{old('email')}}" type="text" id="username">
                      </div>
                      <div class="group-input">
                        <label for="pass">Password *</label>
                        <input name="password" type="text" id="pass">
                    </div>
                    <div class="group-input">
                      <label for="pass">Password *</label>
                      <input name="password_confirmation" type="text" id="pass">
                  </div>
                      <div class="group-input">
                        <label for="username">Full Name</label>
                        <input name="name"  type="text" id="name">
                    </div>
                   
                      <button type="submit" class="site-btn register-btn">REGISTER</button>
                  </form>

                  @if($errors->any())

                    <div class="mt-3 alert alert-danger">
                        {{$errors->first()}}
                    </div>
                  @endif
                
                  <div class="switch-login">
                      <a href="./login.html" class="or-login">Or Login</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>