@include('Admin.master.__includes.head')
@include('Admin.master.__includes.header-desktop')

        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        @include('Admin.master.__includes.header-mobile-desktop')
   
        @yield('content')
       
    

<!-- end document-->
@include('Admin.master.__includes.footer')