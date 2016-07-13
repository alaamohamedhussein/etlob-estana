@include('_include.header')
<section id="contact">
            <div class="container">
                <div class="row">
<!--                                        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
                                            <A href="edit.html" >Edit Profile</A>
                    
                                            <A href="edit.html" >Logout</A>
                                            <br>
                                            <p class=" text-info">May 05,2014,03:00 pm </p>
                                        </div>-->
                    <div class="container toppad" >
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{$userData['userName']}}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                   
                                    <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://localhost:8084/itiProject/{{$userData['userImageUrl']}}" class="img-circle img-responsive"> </div>

                                    <div class=" col-md-9 col-lg-9 "> 
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr>
                                                    <td>المهنة:</td>
                                                    <td>{{$userData['professinalTiltle']}}</td>
                                                </tr>
                                                
                                                @if($userData['ped'])
                                                <tr>
                                                    <td> معدل المناقصات:</td>
                                                    <td>{{$userData['ped']}}</td>
                                                </tr>
                                                @endif 
                                                @if($userData['rate'])
                                                <tr>
                                                    <td>التقيم:</td>
                                                    <td>{{$userData['rate']}}</td>
                                                </tr>
                                                @endif 

                                                <tr>
                                                <tr>
                                                    <td>النوع :</td>
                                                    <td>{{$userData['gender']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>العنوان :</td>
                                                    <td>{{$userData['governorate']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{$userData['userEmail']}}</td>
                                                </tr>
                                            <td>Phone Number</td>
                                            <td>
                                                @foreach($userData['phoneofusers'] as $data)

                                            {{$data['phoneNumber']}}<br>
                                            @endforeach
                                            </td>

                                            </tr>

                                            </tbody>
                                        </table>
                                    
                                    @if($user['userId']== $userData['userId'])
                                        @if($user['typeOfBusiness']=="work"||$user['typeOfBusiness']=="both")
                                        <a href="/ProjectsHired" class="btn btn-primary">متابعة اعمالى</a>
                                        @endif
                                        <!--<a href="#" class="btn btn-primary">Team Sales Performance</a>-->
                                        <a href="{{url('/showPortofolio/'.$userData['userId'])}}" class="btn btn-primary">نماذج اعمال</a>
                                        <a href="/addPortofolio" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
                                    @else
                                    <a href="{{url('/showPortofolio/'.$userData['userId'])}}" class="btn btn-primary">نماذج اعمال</a>
                                    @endif
                                    </div>
                                </div>
                            </div> 
                            <div class="panel-footer">
                                <!--<a data-original-title="Broadcast Message" data-toggle="tooltip" class="btn btn-sm btn-primary msg-btn"><i class="glyphicon glyphicon-plus"></i></a>-->
                                <!--<span class="pull-left">-->
                                    <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="{{ url('/logout') }}" data-original-title="Remove this user" data-toggle="tooltip" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i>خروج</a>
                                <!--</span>-->
                                <div class="clear"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


<!--<section id="contact">
            <div class="container">
                <div class="row">
                                        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
                                            <A href="edit.html" >Edit Profile</A>
                    
                                            <A href="edit.html" >Logout</A>
                                            <br>
                                            <p class=" text-info">May 05,2014,03:00 pm </p>
                                        </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

                           
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{$userData['userName']}}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://localhost:8084/itiProject/image/user/01.png" class="img-circle img-responsive"> </div>

                                    <div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                                      <dl>
                                        <dt>DEPARTMENT:</dt>
                                        <dd>Administrator</dd>
                                        <dt>HIRE DATE</dt>
                                        <dd>11/12/2013</dd>
                                        <dt>DATE OF BIRTH</dt>
                                           <dd>11/12/2013</dd>
                                        <dt>GENDER</dt>
                                        <dd>Male</dd>
                                      </dl>
                                    </div>
                                    <div class=" col-md-9 col-lg-9 "> 
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr>
                                                    <td>Professinal Tiltle:</td>
                                                    <td>{{$userData['professinalTiltle']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Rate</td>
                                                    <td>{{$userData['rate']}}</td>
                                                </tr>

                                                <tr>
                                                <tr>
                                                    <td>Gender</td>
                                                    <td>{{$userData['gender']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Governorate</td>
                                                    <td>{{$userData['governorate']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{$userData['userEmail']}}</td>
                                                </tr>
                                            <td>Phone Number</td>
                                            <td>
                                            @foreach($userData['phoneofusers'] as $data)

                                            {{$data['phoneNumber']}}<br>
                                            @endforeach
                                            </td>
                                            </tr>

                                            </tbody>
                                        </table>

                                        <a href="/ProjectsHired" class="btn btn-primary">متابعة اعمالى</a>
                                        <a href="#" class="btn btn-primary">Team Sales Performance</a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a data-original-title="Broadcast Message" data-toggle="tooltip" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                                <span class="pull-right">
                                    <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a data-original-title="Remove this user" data-toggle="tooltip" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>-->


@include('_include.footer')
