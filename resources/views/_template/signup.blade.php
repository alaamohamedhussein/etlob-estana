<!-- Sign up modal -->
<div class="modal fade signup-modal" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   <form name="sentMessage" id="contactForm" method="Post" action="{{ url('/create') }}" novalidate>
                    {!! csrf_field() !!}
                    <h3>Register Now</h3>
                   
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
                     <div class="form-group">
                            <label class="col-xs-3 control-label">User Image</label>
                            <div class="col-xs-5">
                                <input type="file" class="form-control-file" name="userimage">
                
                            </div>
                        </div>
                    
                    <button  class="login-btn">Sign Up</button>
                   </form>
                </div>
            </div>
        </div>
        <!-- Sign Up modal end-->