@include('_include.header')
<section id="portfolio" class="bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">نماذج اعمال</h2>
                        <h3 class="section-subheading text-muted">نماذج اعمال خاصة بالفئة </h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($portofolio as $project)
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <?php if( isset($project['portofolioimageses']) && !empty($project['portofolioimageses'])):?>
                      <img src="{{"http://localhost:8084/itiProject".$project['portofolioimageses'][0]['portfolioImageUrl']}}" class="img-responsive" alt="">
                        <?php  endif;?>
                        <div class="portfolio-caption">
                            
                            <h4>السعر: </h4>
                            <p class="text-muted">{{$project['portofolioDescription']}}</p>
                            <h4><a href="/portofolioProfile/{{$project['portofolioId']}}"> عن المورد</a> </h4>
                        </div>
                    </div>  
                    @endforeach
                </div>
            </div>
        </section>
@include('_include.footer')

