@include('_include.header') 
<section id="portfolioModel"role="dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    
                    <div class="lr">
                        <div class="rl">
                            <i class=""></i>
                            <a href="/#wantedprojects"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <div class="col-lg-8">
                                    
                                    <!-- Blog Post -->
                                     <h1>{{$askedProjects['projectName']}}</h1>
                                     <form action="/addOffer" method="post">
                                         {!! csrf_field() !!}
                                    <input type="hidden" name="pdata" value="{{$askedProjects['projectId']}}">
                                    <!-- Author -->
                                    <p class="lead">
                                        by <button type="submit" class="controller-btn"> <a>Add Offer</a></button>
                                        
                                   
                                    
                                    </p>
                                     </form>
                                     <form action="/showOffer" method="post">
                                         {!! csrf_field() !!}
                                    <input type="hidden" name="pid" value="{{$askedProjects['projectId']}}">
                                    
                                    <!-- Author -->
                                    <p class="lead">
                                        ,<button type="submit" class="controller-btn"> <a>AllOffer</a></button>
                                        
                                    </p>
                                     </form> 
                                    <hr>

                                    <!-- Date/Time -->
                                    <p><span class="glyphicon glyphicon-time"></span>السعر:{{$askedProjects['budget']}} </p>

                                    <hr>
                                     <p><span class="glyphicon glyphicon-time"></span>الحالة: مطلوب </p>
                                    <!-- Preview Image -->
                                    <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                                    <hr>

                                    <div class="row myRow">



                                        <div class="col-sm-3 col-xs-6">
                                            <a href="#">
                                                <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                                            </a>
                                        </div>

                                        <div class="col-sm-3 col-xs-6">
                                            <a href="#">
                                                <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                                            </a>
                                        </div>

                                        <div class="col-sm-3 col-xs-6">
                                            <a href="#">
                                                <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                                            </a>
                                        </div>

                                        <div class="col-sm-3 col-xs-6">
                                            <a href="#">
                                                <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                                            </a>
                                        </div>

                                    </div>

                                    <hr>

                                    <!-- Post Content -->
                                    <p class="lead">{{$askedProjects['projectDescription']}}</p>
                                    

                                    <hr>

                                    <!-- Blog Comments -->

                                    <!-- Comments Form -->
                                    <div class="well">
                                        <h4>Leave a Comment:</h4>
                                        <form role="form">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>

                                    <hr>

                                    <!-- Posted Comments -->

                                    <!-- Comment -->
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Start Bootstrap
                                                <small>August 25, 2014 at 9:30 PM</small>
                                            </h4>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                        </div>
                                    </div>

                                    <!-- Comment -->
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Start Bootstrap
                                                <small>August 25, 2014 at 9:30 PM</small>
                                            </h4>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            <!-- Nested Comment -->
                                            <div class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Nested Start Bootstrap
                                                        <small>August 25, 2014 at 9:30 PM</small>
                                                    </h4>
                                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                                </div>
                                            </div>
                                            <!-- End Nested Comment -->
                                        </div>
                                    </div>

                                </div>

                                <!-- Blog Sidebar Widgets Column -->
                                <div class="col-md-4" >



                                    <!-- Blog Categories Well -->
                                    <div class="well">
                                        <h4>Tags</h4>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <ul class="list-unstyled">
                                                    <li><a href="#">Category</a>
                                                    </li>
                                                    <li><a href="#">Category</a>
                                                    </li>
                                                    <li><a href="#">Category</a>
                                                    </li>
                                                    <li><a href="#">Category</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">
                                                <ul class="list-unstyled">
                                                    <li><a href="#">Category</a>
                                                    </li>
                                                    <li><a href="#">Category</a>
                                                    </li>
                                                    <li><a href="#">Category</a>
                                                    </li>
                                                    <li><a href="#">Category</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>

                                    <!-- Side Widget Well -->
                                    <div class="well">
                                        <h4>Project Details</h4>
                                        <p>تاريخ البدء </p>
                                        <p><span class="glyphicon glyphicon-time"></span>{{$askedProjects['startDate']}}</p>
                                        <p>تاريخ الانتهاء </p>
                                        <p><span class="glyphicon glyphicon-time"></span>{{$askedProjects['projectDeadLine']}}</p>
                                        
                                    </div>

                                </div>
                                <button class="btn btn-primary"><a href="/#wantedprojects"><i class="fa fa-times"></i></a>Close Project</button>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('_include.footer')

