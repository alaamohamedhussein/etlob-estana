<!-- Team Section -->
<section id="team" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">اعلى الموردين كفاءة  </h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row">
            @foreach($suppliers as $users)
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="template/img/team/1.jpg" class="img-responsive img-circle" alt="">
                    <h4>{{$users['userName']}}</h4>
                    <h6>{{$users['professinalTiltle']}}</h6>
                    <p class="text-muted">{{$users['summery']}}</p>
                    <ul class="list-inline social-buttons">
                        <li><a href="/userProfile/{{$users['userId']}}"><i class="fa fa-facebook"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <p class="large text-muted"></p>
            </div>
        </div>
    </div>
</section>