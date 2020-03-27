<footer class="footer-section">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="footer-left">
                  <div class="footer-logo">
                      <a href="#"><img src="img/footer-logo.png" alt=""></a>
                  </div>
                  <ul>
                      <li>Address: 60-49 Road 11378 New York</li>
                      <li>Phone: +65 11.188.888</li>
                      <li>Email: hello.colorlib@gmail.com</li>
                  </ul>
                  <div class="footer-social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-instagram"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                  </div>
              </div>
          </div>
         
         
    
      </div>
  </div>
  <div class="copyright-reserved">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="copyright-text">
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  </div>
                  <div class="payment-pic">
                      <img src="img/payment-method.png" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
@if(auth()->check())
<script>
let user = "{{auth()->user()}}";
const replaced =   (user.split('&quot;').join('')).replace(/{|}/g, '').split(',');
user = {}
replaced.forEach(function(item) {       
        index = item.indexOf(':');
        property = item.substr(0,index);
        value = item.substr(++index);
        user[property] = value;
});
</script>
@else 
<script>
 const user = undefined;
</script>
@endif
<script src={{asset("js/jquery-3.3.1.min.js")}}></script>
<script src={{asset("js/bootstrap.min.js")}}></script>
<script src={{asset("js/jquery-ui.min.js")}}></script>
<script src={{asset("js/jquery.countdown.min.js")}}></script>
<script src={{asset("js/jquery.nice-select.min.js")}}></script>
<script src={{asset("js/jquery.zoom.min.js")}}></script>
<script src={{asset("js/jquery.dd.min.js")}}></script>
<script src={{asset("js/jquery.slicknav.js")}}></script>
<script src={{asset("js/owl.carousel.min.js")}}></script>
<script src={{asset("js/main.js")}}></script>
<script src={{asset("js/app.js")}}></script>
</body>

</html>