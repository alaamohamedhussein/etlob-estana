@include('_include.header') 
<section>
            <!-- Page Content -->
            <div class="container">

                <div class="row">

                    <ul class="list-group">
                        <?php 
                        if(empty($allOffer))
                        {
                       echo " <h1>لا يوجد عروض لهذا المشروع</h1>";
                        }
                        ?>
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
                          <div>
                               <form action="/OfferAction" method="post">
                                         {!! csrf_field() !!}
                                    <input type="hidden" name="pid" value="{{$pid}}">
                                    <input type="hidden" name="porposlid" value="{{$wp['porpId']}}">
                                <button type="submit" class="btn btn-success">قبول العرض</button> 
                                <button type="submit" class="btn btn-danger">رفض العرض</button>
                              </form> 
                          </div>
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
