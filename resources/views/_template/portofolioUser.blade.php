@include('_include.header')
<section id="portfolio" class="bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Portofolios</h2>
                        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($portofolio as $project)
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        
                      <img src="/template/img/portfolio/golden.png" class="img-responsive" alt="">
                        
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

