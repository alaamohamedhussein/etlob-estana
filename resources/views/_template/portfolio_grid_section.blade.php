<!-- Portfolio Grid Section -->
<section id="portfolio" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">اعلى مشروعات</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
<div class="row">
            @foreach($projects as $project)
            <div class="col-md-4 col-sm-6 portfolio-item">
                
                <a href="/ProjectsHightDetails/{{$project['projectId']}}" class="portfolio-link" data-toggle="modal">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="/template/img/portfolio/roundicons.png" class="img-responsive" alt="">
                </a>
                <div class="portfolio-caption">
                    <h5>Round Icons</h5>
                    
                    <p class="text-muted">{{$project['projectName']}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
           