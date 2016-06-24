<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="token" content="{{csrf_token()}}"/>
        <title>Agency - Start Bootstrap Theme</title>

        <!-- Bootstrap Core CSS -->
        <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
        {!!HTML::style('/template/css/bootstrap.min.css')!!}
        {!!HTML::style('/template/css/bootstrap-rtl.css')!!}
        <!-- Custom CSS -->
        <!--<link href="css/agency.css" rel="stylesheet">-->
        {!!HTML::style('/template/css/agency.css')!!}

        <!-- Custom Fonts -->
        <!--<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
        {!!HTML::style('/template/font-awesome/css/font-awesome.min.css')!!}
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Custom MYCSS -->
        <!--<link href="css/myCss.css" rel="stylesheet">-->
        {!!HTML::style('/template/css/myCss.css')!!}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

     <body id="page-top" class="index">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="header-container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header navbar-right page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="signing-list">
                        @if (!$user['userEmail'])
      <button class="controller-btn"  data-toggle="modal" href="#login">Log In</button>
      <button class="controller-btn" data-toggle="modal" href="#signup">Sign Up</button>
            @else
           
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{$user['userName'] }} <span class="caret"></span>
                            </a>

            <button class="controller-btn"> <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></button>
                         
                    @endif
                    </div>
                    <a class="navbar-brand page-scroll" href="#page-top">اطلب و استنى </a>                
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/#wantedprojects">المشاريع المطلوبة</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/#services">الفئات</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/#portfolio">اعلى مشاريع</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/#team">الموردين</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/#about">عننا</a>
                        </li>
                        
                        @if ($user['userEmail'])
                        <li>
                            <a class="page-scroll" href="/userProfile/{{$user['userId']}}">حسابى </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/ProjectsHired">اعمالى المطلوبة </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/ProjectsWorked">مشاريعى</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- /.navbar-collapse -->    
            </div>
            <!-- /.container-fluid -->

        </nav>
        
<!-- Sign up modal -->
<div class="modal fade signup-modal" id="test" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   <form name="sentMessage" id="contactForm" method="Post" action="{{ url('/create') }}" novalidate>
                    {!! csrf_field() !!}
                    <h3>Register Now</h3>
                   <div class="form-group">
                            <label class="col-xs-3 control-label">User Image</label>
                            <div class="col-xs-5">
                                <input type="file" class="form-control-file" name="userimage">
                
                            </div>
                        </div>
                     <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" placeholder="الاسم*" id="name" name="name" required data-validation-required-message="Please enter your name." value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" placeholder="الايميل*" id="email" name="email" required data-validation-required-message="Please enter your email address." value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" placeholder="الرقم السري*" id="password" name="password" required data-validation-required-message="Please enter your password.">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" placeholder="اكد الرقم السري*" id="confirm-password" name="password_confirmation" required data-validation-required-message="Please enter your confirm password.">
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                                <p class="help-block text-danger"></p>
                            </div> 
                     <div class="form-group">
                    
                    <select class="form-control" id="gender" name="gender" placeholder="النوع*">
                        
                        <option>ذكر</option>
                        <option>اثني</option>
                    </select>
                     </div>
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="رقم الشارع" id="street" name="street" required data-validation-required-message="Please enter street.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="البلد*" id="city" name="city" required data-validation-required-message="Please enter city.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="المحافظة*" id="governorate" name="governorate" required data-validation-required-message="Please enter governorate.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="البلد*" id="country" name="country" required data-validation-required-message="Please enter country.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="عنوانك الوظيفي*" id="country" name="title" required data-validation-required-message="Please enter title.">
                            <p class="help-block text-danger"></p>
                        </div>
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="موبايل *" id="country" name="mobile" required data-validation-required-message="Please enter mobile.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="تليفون *" id="country" name="phone" required data-validation-required-message="Please enter phone.">
                            <p class="help-block text-danger"></p>
                        </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" placeholder="تفاصيل عنك *" id="summery" name="summery" required data-validation-required-message="Please enter short summery."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    
                    
                    <button  class="login-btn">Sign Up</button>
                   </form>
                </div>
            </div>
        </div>
        <!-- Sign Up modal end-->
        <!-- Log In modal -->
        <div class="modal fade login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form name="sentMessage" id="contactForm" action="{{ url('/profile') }}" method="post" novalidate>
                    {!! csrf_field() !!}
                    <h3>Login Now</h3>
                     <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="الايميل*" id="email" required data-validation-required-message="Please enter your email address.">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" placeholder="الرقم السري*" name="password" id="password" required data-validation-required-message="Please enter your password.">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                                <p class="help-block text-danger"></p>
                            </div>
                           
                            
                            <div class="col-md-3"><a href="{{ url('/redirect') }}" class="remove_underlines">login with facebook</a></div>
                            
                    <button  class="form-control">Log In</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sign Up modal end-->