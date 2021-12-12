<!-- ======= Appointment Section ======= -->
<section id="appointment" class="appointment section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Make an Appointment</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <form action="{{ url('appointment') }}" method="POST" role="form" class="">
            @csrf
            <div class="row">
                <div class="col-md-4 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                        data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                        data-rule="email" data-msg="Please enter a valid email">
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone"
                        data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group mt-3">
                    <input type="datetime" name="date" class="form-control datepicker" id="date"
                        placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <select name="department" id="department" class="form-select">
                        <option value="">Select Department</option>
                        <option value="Department 1">Skin</option>
                        <option value="Department 2">Heart</option>
                        <option value="Department 3">Nose</option>
                    </select>
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <select name="doctor" id="doctor" class="form-select">
                        <option value="">Select Doctor</option>
                        @foreach($doctor as $item)
                        <option value="{{ $item->name }}">{{ $item->name }} --speciality-- {{ $item->speciality }}
                        </option>
                        @endforeach
                    </select>
                    <div class="validate"></div>
                </div>
            </div>

            <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                <div class="validate"></div>
            </div>
            <div class="text-center"><input type="submit" class="btn btn-success"></div>
        </form>

    </div>
</section><!-- End Appointment Section -->
