@section('title', 'Appointment')
 <!-- ======= Appointment Section ======= -->
 <section id="appointment" class="appointment section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Make an Appointment</h2>
      </div>

      <form action="{{ route('appoinments.store')}}" method="post" role="form"   data-aos-delay="100">
        @csrf
        <div class="row">
          <div class="col-md-4 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
          </div>
          <div class="col-md-4 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>
          <div class="col-md-4 form-group mt-3 mt-md-0">
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 form-group mt-3">
            <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" required>
          </div>

            <div class="col-md-4 form-group mt-3">
                <select name="depart_id" id="depart_id" class="form-select" required
                onclick="console.log($(this).val())"
                 onchange="console.log('change is firing')">
                    <option value="" selected disabled class="text-center"> ---choose depart---</option>
                    @foreach ($departs as $depart)
                        <option value="{{ $depart->id }}">{{ $depart->title }}</option>
                    @endforeach
                </select>
          </div>

          <div class="col-md-4 form-group mt-3">
            <select name="doctor_id" id="doctor_id" class="form-control" required>
            <option value="" selected disabled class="text-center"> ---choose doctor---</option>
                    @foreach ( $doctors as $doctor )
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
          </div>
        </div>

        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
        </div>

        <div class="text-center "><button type="submit" class="btn btn-primary btn-lg mt-3">Make an Appointment</button></div>
      </form>

    </div>

  </section><!-- End Appointment Section -->
