<footer class="footer-section">
    <div class="container-fluid container-xxl">
      <div class="text-center">
        <h2>logo here</h2>
      </div>
      <div class="col-lg-12 text-center">
        <ul class="list-unstyled">
          <li><a href="bedstore-sofas.php">bedstore sofas</a></li>
          <li><a href="corner-sofas.php">corner sofas</a></li>
          <li><a href="sofas.php">sofas</a></li>
          <li><a href="chairs.php">chairs</a></li>
          <li><a href="sofa-beds.php">sofa beds</a></li>
          <li><a href="stools&lounges.php">stools & chase lounges</a></li>
          <li><a href="instock.php">in stock</a></li>
        </ul>
      </div>
      <div class="container d-flex justify-content-center">
        <div class="col-lg-8">
          <p class="text-wrap text-center">
            Credit subject to status and affordability. Terms & Conditions Apply. Comfy Sofa Limited trading as
            Distinctive bedstores is a credit broker and is Authorised and Regulated by the Financial Conduct
            Authority. Credit is provided by Novuna Personal Finance, a trading style of Mitsubishi HC Capital UK PLC,
            authorised and regulated by the Financial Conduct Authority. Financial Services Register no. 704348. The
            register can be accessed through <a href="#">http://www.fca.org.uk.</a>
          </p>
          <p class="text-center"><a href="#" class="pe-2 border-warning border-end">Legal Notice</a>&nbsp;<a href="#"
              class="ps-2">Terms & Conditions</a></p>
          <div class="text-center">
            <p class="website_link">Website Design by <a href="#" class="text-decoration-none">Webtrica</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery.zoom.min.js"></script>
  <script src="js/jquery.dd.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
      <!-- Initialize Swiper -->
      <script>
        var swiper = new Swiper(".slide-container", {
          slidesPerView: 4,
          spaceBetween: 20,
          slidesPerGroup: 3,
          loop: true,
          centerSlide: "true",
          fade: "true",
          grabCursor: "true",
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },

          breakpoints: {
            0: {
              slidesPerView: 1,
              slidesPerGroup: 1,
            },
            520: {
              slidesPerView: 1,
            },
            768: {
              slidesPerView: 2,
            },
            1000: {
              slidesPerView: 4,
            },
          },
        });
      </script>

  <script>
    $(document).ready(function () {
      $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 4
          }
        }, {
          breakpoint: 520,
          settings: {
            slidesToShow: 2
          }
        }]
      });
    });
  </script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
    integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
    data-cf-beacon='{"rayId":"76e7ec21cbead1e0","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}'
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
</body>

</html>