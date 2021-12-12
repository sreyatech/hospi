<!-- ======= Doctors Section ======= -->
<section id="doctors" class="doctors">
    <div class="container">

        <div class="section-title">
            <h2>Doctors</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

            @foreach($doctor as $item)
            <div class="col-lg-6">
                <div class="member d-flex align-items-start">
                    <div class="pic"><img style="height: 200px;width:200px;" src="doctorImage/{{$item->image}}" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>{{$item->name}}</h4>
                        <span>{{$item->speciality}}</span>
                        <div class="social">
                            <a href=""><i class="ri-twitter-fill"></i></a>
                            <a href=""><i class="ri-facebook-fill"></i></a>
                            <a href=""><i class="ri-instagram-fill"></i></a>
                            <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section><!-- End Doctors Section -->
