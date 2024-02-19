      <!-- JAVASCRIPT -->
      <script src="{{asset('backend')}}/assets/libs/jquery/jquery.min.js"></script>
      <script src="{{asset('backend')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('backend')}}/assets/libs/metismenu/metisMenu.min.js"></script>
      <script src="{{asset('backend')}}/assets/libs/simplebar/simplebar.min.js"></script>
      <script src="{{asset('backend')}}/assets/libs/node-waves/waves.min.js"></script>

      <!-- apexcharts -->
      <script src="{{asset('backend')}}/assets/libs/apexcharts/apexcharts.min.js"></script>

      <!-- jquery.vectormap map -->
      <script src="{{asset('backend')}}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="{{asset('backend')}}/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

      <!-- Required datatable js -->
      <script src="{{asset('backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="{{asset('backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

      <!-- Responsive examples -->
      <script src="{{asset('backend')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
      <script src="{{asset('backend')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

      <script src="{{asset('backend')}}/assets/js/pages/dashboard.init.js"></script>

      <!-- App js -->
      <script src="{{asset('backend')}}/assets/js/app.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

      <script>
        @if(Session::has('message'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
              toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
              toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
              toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
              toastr.warning("{{ session('warning') }}");
        @endif
      </script>










  </body>

</html>