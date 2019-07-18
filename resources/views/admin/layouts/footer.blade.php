            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Ample admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    @include('admin.layouts.right-sidebar')
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('dashboard/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Laravel App Js -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('dashboard/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('dashboard/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('dashboard/dist/js/app-style-switcher.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('dashboard/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dashboard/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dashboard/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dashboard/dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/sweetalert2/sweet-alert.init.js') }}"></script>
    @yield('script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });      
        });
    </script>
    <script src="{{ asset('dashboard/js/dashboard.js') }}"></script>
</html>