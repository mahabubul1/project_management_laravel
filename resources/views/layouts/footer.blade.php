    
<?php  $services= DB::table("services")->select("service_name")->where("publication_status",1)->get();
   

?>






    <div class="goto-top">
        <a href="#banner" class="goto-link"><i class="fas fa-chevron-up"></i></a>
    </div>
    <!-- Start Footer -->
    <footer class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-item" id="footer-item-1">
                    <a href="#"><img src="{{ asset('assets/img/logo.png') }}" alt="Footer Logo" class="img-fluid"></a>
                    <address><span>Phone:</span> <a href="mailto: + 1 (045) - 224 - 12 - 67">+ 1 (045) - 224 - 12 - 67</a></address>
                    <address><span>Mail:</span> <a href="mailto: info@codexshaper.com">info@codexshaper.com</a></address>
                </div>
                <div class="col-lg-3 col-md-6 footer-item" id="footer-item-2">
                    <h2 class="footer-title">Services</h2>
                    <ul class="footer-menu">
                        @foreach($services as $service)
                           <li><a href="#">{{$service->service_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-item" id="footer-item-3">
                    <h2 class="footer-title">About Company</h2>
                    <ul class="footer-menu">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Samples</a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-item" id="footer-item-4">
                     <h2 class="footer-title">Our Social Networks</h2>
                     <p class="footer-desc">Join us in the social networks and keep up on the latest news.</p>
                     <ul class="footer-social">
                         <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                         <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                         <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                         <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="copyright">Copyright &copy; 2019 Janica. All Rights Reserved. | Design by <a href="http://www.codexshaper.com" target="_blank">CodexShaper</a>. Inspired from Nektop</p>
                    </div>
                    <div class="col-md-6">
                        <ul class="footer-bottom-list">
                            <li><a href="#">Privacy & Policy</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->
</div><!-- End App  -->
<!-- Start Script -->
<!-- Jquery 3.2.1 -->
<script src="{{ asset('assets/libs/jquery/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });      
    });
</script>
<!-- Bootstrap -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Plugins -->
<script src="{{ asset('assets/js/smooth.min.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>
@yield('script')
</body>
</html>