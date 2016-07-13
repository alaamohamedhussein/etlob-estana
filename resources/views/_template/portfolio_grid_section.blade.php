<!-- Portfolio Grid Section -->
<section id="portfolio" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">اعلى مشروعات</h2>
                <h3 class="section-subheading text-muted">.اعلى المشروعات فى التقييم </h3>
            </div>
        </div>
<div class="row">
   
            @foreach($projects as $project)
            <?php if( isset($project) && !empty($project['projectId'])):
                ?>
            <div class="col-md-4 col-sm-6 portfolio-item">
                
                <a href="/ProjectsHightDetails/<?php echo($project['projectId']);?>" class="portfolio-link" data-toggle="modal">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    
                    <img src="{{"http://localhost:8084/itiProject".$project['projectsimageses'][0]['imageUrl']}}" class="img-responsive" alt="">
                </a>
                <div class="portfolio-caption">
                    <h5>اسم المشروع :</h5>
                    
                    <p class="text-muted"><?php echo($project['projectName']);?></p>
                </div>
            </div>
            <?php  endif;?>
            @endforeach
        </div>
    </div>
</section>
           