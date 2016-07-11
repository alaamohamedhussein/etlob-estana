@include('_include.header')
<!-- Sign up modal -->
<header>
    <div class="container">
        <div class="intro-text">
            <div class="modal-dialog">
                    <form name="sentMessage" id="contactForm" method="POST" action="{{ url('/login') }}" novalidate>
                    {!! csrf_field() !!}
                    <h3>تسجيل الدخول </h3>
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
                           
                            
<!--                            <div class="col-md-3"><a href="{{ url('/redirect') }}" class="remove_underlines">login with facebook</a></div>-->
                             <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-default">تسجيل </button>
                        </div>
                    </div>
                    </form>
                
            </div>
        </div>
    </div>
</header>
@include('_include.footer')
            <script>
//                function loginFun(){
//                    
//                    $.ajax({
//                        url:"/profile",
//                        method:"POST",
//                         data:{
//                            email : $('#email').val(),
//                            password : $('#password').val()
//                        },
//                        headers:{
//                            'X-CSRF-TOKEN':$('meta[name=token]').attr('content')
//                        },
//                       
//                    }).success(function(data){
//                        if(data!=null){
////                            $("span#usernameError").text(data.usernam_error)
//                        console.log(data);
//                    }
//                    }).error(function(err){
//                        console.log(err);
//                    });
//                }
//$(document).ready(function(){
//  $('.send-btn').click(function(){            
//    $.ajax({
//      url: '/profile',
//      type: "post",
//      data: { 'email' : $('#email').val(),
//                            'password' : $('#password').val()},
//      success: function(data){
//        alert(data);
//      }
//    });      
//  }); 
//});
            </script>
        </section>
        <!-- Sign Up modal end-->

