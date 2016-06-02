<!-- Services Section -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Categories</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
         <div class="row text-center">
            @foreach($data as $category)
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">{{$category['categoryName']}}</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            @endforeach
        </div>
    </div>
</section>