
<section id="wantedprojects">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">مشاريع مطلوبة</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <?php $class=["","timeline-inverted"];$i=0; ?>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    @foreach($wantedProjects as $wp)
                    <?php if($i==1)$i=0; else $i++; ?>
                    <li class="{{$class[$i]}}">
                <div class="timeline-image">
                            <a href="/ProjectsWantedDetails/{{$wp['projectId']}}" class="portfolio-link" data-toggle="modal">
                     <div class="portfolio-hover">
                     <div class="portfolio-hover-content">
                      <i class="fa fa-plus fa-3x"></i>
                      </div>
                      </div>
                      
                            <img class="img-circle img-responsive" src="{{"http://localhost:8084/itiProject".$wp['projectsimageses'][0]['imageUrl']}}" alt="">
               
                     </a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <br><br>
                                <h4 class="subheading">اسم المشروع :<br>{{$wp['projectName']}}</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">تفاصيل عن المشروع:<br>{{$wp['projectDescription']}} </p>
                            </div>
                        </div>
                    </li>
                     @endforeach
                    
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>Be Part
                                <br>Of Our
                                <br>Story!</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
