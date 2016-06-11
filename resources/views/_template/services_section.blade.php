<!-- Services Section -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">الفئات</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
         <div class="row text-center">
            @foreach($categories as $category)
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="{{$category['imageOfCategoryUrl']}}"></i>
                        </span>
                        <h4 class="service-heading">{{$category['categoryName']}}</h4>
                        <p class="text-muted"></p>
                        <a href="/portofolioUsers/{{$category['categoryId']}}">عن الفئة </a>
                    </div>
            @endforeach
        </div>
    </div>
</section>