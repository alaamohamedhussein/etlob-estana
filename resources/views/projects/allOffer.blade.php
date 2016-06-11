@include('_include.header') 
<section>
            <!-- Page Content -->
            <div class="container">

                <div class="row">

                    <ul class="list-group">
                         @foreach($allOffer as $wp)
                        <li class="list-group-item">
                            <div class="col-lg-4"><img src="http://placehold.it/900x300" class="img-rounded" alt="Cinque Terre" width="200" height="150"><br></div>
                            <div class="col-lg-8">
                                
                                <h4>Project Details</h4>
                                <p>السعر :{{$wp['price']}}</p>
                                <P>الحالة :{{$wp['statusOfPorposa']}}</p>
                                    <p>تاريخ البدء </p>
                                    <p><span class="glyphicon glyphicon-time"></span>{{$wp['startDatePor']}}</p>
                                    <p>تاريخ الانتهاء </p>
                                    <p><span class="glyphicon glyphicon-time"></span>{{$wp['deadLinePor']}}</p>
                            </div>
                            <br class="clearBoth" />
                            <div><a href="#">First link</a></div>
                        </li>
                        @endforeach
                    </ul>

                </div>
               
            </div>
            <!-- /.container -->
        </section>
@include('_include.footer') 
