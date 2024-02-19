    {{-- Css --}}
@include('backend.body.css');

        <!-- Begin page -->
        <div id="layout-wrapper">
            {{-- //Header --}}
            @include('backend.body.header');

           <!-- Left Sidebar Start -->
            @include('backend.body.sidebar');

                {{-- Main --}}
              <div class="main-content">
                <div class="page-content">
                    @yield('admin')
                </div>
                {{-- Footer --}}
                @include('backend.body.footer');
            </div>
            <!-- end main content-->

        </div>

   <!-- JAVASCRIPT -->
   @include('backend.body.js');
