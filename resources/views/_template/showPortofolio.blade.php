@include('_include.header')
<section id="portfolio" class="bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">نماذج اعمال</h2>
                        <h3 class="section-subheading text-muted">نماذج اعمال خاصة بالمورد </h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($userData['portofolioforusers'] as $project)
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <?php if( isset($project['portofolioimageses']) && !empty($project['portofolioimageses'])):?>
                      <img src="{{"http://localhost:8084/itiProject".$project['portofolioimageses'][0]['portfolioImageUrl']}}" class="img-responsive" alt="">
                        <?php  endif;?>
                        <div class="portfolio-caption">
                            
                            <h4>السعر: </h4>
                            <p class="text-muted">{{$project['portofolioDescription']}}</p>
                            
                        </div>
                    </div>  
                    @endforeach
                </div>
                <?php if( !empty($userData['portofolioforusers'])){ ?>
                <h4><a href="/portofolioProfile/{{$userData['portofolioforusers'][0]['portofolioId']}}"> عن المورد</a> </h4>
                <?php } else {
                       echo " <h1>لا يوجد نماذج اعمال لهذا المستخدم </h1>";
                        }?>
            </div>
        </section>
@include('_include.footer')


