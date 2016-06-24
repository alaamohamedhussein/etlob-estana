@include('_include.header') 
<section id="portfolioModel"role="dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    
                    <div class="lr">
                        <div class="rl">
                            <i class=""></i>
                            <a href="/#portfolio"><i class="glyphicon glyphicon-remove"></i></a>
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
                           
                                    <hr>

                                    <!-- Date/Time -->
                                    <p><span class="glyphicon glyphicon-time"></span>السعر:{{$askedProjects['budget']}} </p>

                                    <hr>
                                     <p><span class="glyphicon glyphicon-time"></span>الحالة: مطلوب </p>
                                    <!-- Preview Image -->
                                    @if($askedProjects['projectsimageses'])
                      
                                    <div class="row myRow">

                                        @foreach($askedProjects['projectsimageses'] as $image)
                                         <img class="img-responsive" src="http://localhost:8084/itiProject/{{$image['imageUrl']}}" alt="">

                                    <hr>
                                        <div class="col-sm-3 col-xs-6">
                                            <a href="#">
                                                <img class="img-responsive portfolio-item" src="http://localhost:8084/itiProject/{{$image['imageUrl']}}" alt="">
                                            </a>
                                        </div>
                                        @endforeach

                                    </div>
                                    @endif
                                    <hr>

                                    <!-- Post Content -->
                                    <p class="lead">{{$askedProjects['projectDescription']}}</p>
                                    

                                    <hr>

                                    <!-- Blog Comments -->

                                    <!-- Comments Form -->
                                    <div class="well">
                                        <h4>Leave a Comment:</h4>
                                        <form role="form" action="/comment" method="post">
                                            {!! csrf_field() !!}
                                            <div class="form-group">
                                                <textarea class="form-control" name="comment" rows="3"></textarea>
                                            </div>
                                            <input type="hidden" name="pid" value="{{$askedProjects['projectId']}}">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                    <hr>

                                    <!-- Posted Comments -->

                                <!-- Comment -->
                                    @if(!empty($askedProjects['postforprojectses']))
                                    @foreach($askedProjects['postforprojectses'] as $comment)
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <small>August 25, 2014 at 9:30 PM</small>
                                            </h4>
                                             {{$comment['post']}}
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

                                </div>

                                <!-- Blog Sidebar Widgets Column -->
                                <div class="col-md-4" >



                                    <!-- Blog Categories Well -->
                                    <div class="well">
                                        <h4>Tags</h4>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <ul class="list-unstyled">
                                                    @foreach($askedProjects['tagsofprojectses'] as $project)
                                                    @if($project['tags'])
                                                    <li><a href="#">{{$project['tags']['tagDescription']}}</a>
                                                    </li>
                                                   @endif
                                                    @endforeach
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
                                <button class="btn btn-primary"><a href="/#portfolio"><i class="fa fa-times"></i></a>Close Project</button>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('_include.footer')





