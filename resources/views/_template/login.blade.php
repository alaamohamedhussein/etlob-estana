@include('_include.header')
<!-- Log In modal -->
        <section id="login" class="modal fade login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form name="sentMessage" id="contactForm"  novalidate>
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
                            
                            <button  class="form-control" type="button" class="send-btn">Log In</button>
                    </form>
                </div>
            </div>
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
$(document).ready(function(){
  $('.send-btn').click(function(){            
    $.ajax({
      url: '/profile',
      type: "post",
      data: { 'email' : $('#email').val(),
                            'password' : $('#password').val()},
      success: function(data){
        alert(data);
      }
    });      
  }); 
});
            </script>
        </section>>
        <!-- Sign Up modal end-->
@include('_include.footer')
