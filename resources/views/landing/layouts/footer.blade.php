<footer id="footer" class="footer position-relative light-background">

  <div class="container footer-top">
    <div class="row gy-4">
      
      <!-- Footer About -->
      <div class="col-lg-6 col-md-6 footer-about">
        <a href="/" class="logo d-flex align-items-center">
          <span class="sitename">SEA Catering</span>
        </a>
        <div class="footer-contact pt-3">
          <p>Jl. Daan Mogot No.KM. 11 1, RT.12/RW.4, Kedaung Kali Angke, Kecamatan Cengkareng</p>
          <p>Kota Jakarta Barat, DKI Jakarta 11710</p>
          <p class="mt-3"><strong>Manager:</strong> <span>Athar Fazli</span></p>
          <p class="mt-3"><strong>Phone:</strong> <span>+62 878 1609 8777</span></p>
          <p><strong>Email:</strong> <span>atharfs9@gmail.com</span></p>
        </div>
        <div class="social-links d-flex mt-4">
          <a href="https://github.com/atharfazli/"><i class="bi bi-github"></i></a>
          <a href="https://x.com/atharfazli/"><i class="bi bi-twitter-x"></i></a>
          <a href="https://www.instagram.com/athar_fazli/"><i class="bi bi-instagram"></i></a>
          <a href="https://www.linkedin.com/in/atharfazli/"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

      <!-- Footer Links -->
      <div class="col-lg-6 col-md-3 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('mealplans.index') }}">Meal Plans</a></li>
          <li><a href="{{ route('subscriptions') }}">Subscription</a></li>
          <li><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
      </div>

    </div>
  </div>

  <div class="container copyright text-center mt-4">
    <p>© <span>Copyright</span> <strong class="px-1 sitename">SEA Catering</strong><span>All Rights Reserved</span></p>
    <div class="credits">
      Designed with ❤️ by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>

</footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/QuickStart/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/QuickStart/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('/QuickStart/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('/QuickStart/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('/QuickStart/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('/QuickStart/assets/js/main.js') }}"></script>

  {{-- swiper --}}
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  {{-- sweetalert --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
