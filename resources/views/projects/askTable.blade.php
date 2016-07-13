
@include('_include.header')
<section id="wantedprojects">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">مشاريعى</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <?php $class=["","timeline-inverted"];$i=0;$index=0; ?>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    
                    @foreach($askedProjects as $up)
                    <?php if($i==1)$i=0; else $i++; ?>
                    <li class="{{$class[$i]}}">
                         <div class="timeline-image">
                            <a href="/ProjectsWorkedDetails/{{$up['projectId']}}" class="portfolio-link" data-toggle="modal">
                     <div class="portfolio-hover">
                     <div class="portfolio-hover-content">
                      <i class="fa fa-plus fa-3x"></i>
                      </div>
                      </div>
                      
                            <img class="img-circle img-responsive" src="{{"http://localhost:8084/itiProject".$up['projectsimageses'][0]['imageUrl']}}" alt="">
               
                     </a>
                        </div>
                        
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <br><br>
                                <h4 class="subheading">اسم المشروع :<br>{{$up['projectName']}}</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">تفاصيل عن المشروع:<br>{{$up['projectDescription']}} </p>
                            </div>
                        </div>
                    </li>
                    <?php $index++; ?>
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
 
@include('_include.footer')
