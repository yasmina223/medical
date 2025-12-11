@section('title', 'About Us')
<!-- ======= About Us Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About Us</h2>
        <p>{{$aboutus[0]->describtion}}</p>
      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="fade-right">
          <img src="{{ asset('frontend/assets/img/about.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3>{{$aboutus[0]->title}}</h3>
          {{-- <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p> --}}
          @foreach ($aboutus as $a)

            <ul>
                <li><i class="bi bi-check-circle"></i>{{$a->brief_describtion}}</li>
            </ul>

            @endforeach
          <p>
            {{-- Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum
          </p> --}}
        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->
