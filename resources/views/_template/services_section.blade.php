<!-- Services Section -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">الفئات</h2>
                <h3 class="section-subheading text-muted">.الفئات اللتى تدعمها خدمه اطلب و استنى</h3>
            </div>
        </div>
         <div class="row text-center">
            @foreach($categories as $category)    
               <div class="col-md-4">
                       <img src="http://localhost:8084/itiProject{{$category['imageOfCategoryUrl']}}" class="img-responsive img-circle" width="350" height="200">
                        <h4 class="service-heading">{{$category['categoryName']}}</h4>
                        <p class="text-muted"></p>
                        <a href="/portofolioUsers/{{$category['categoryId']}}">عن الفئة </a><br>
                        <form action="/addProject" method="post">
                            {!! csrf_field() !!}
                        <input type="hidden" name="cid" value="{{$category['categoryId']}}">
                        <button type="submit" class="page-scroll btn btn-sm"><a>ضيف مشروع</a></button>
                        </form>
               </div>
            @endforeach
        </div>
    </div>
</section>