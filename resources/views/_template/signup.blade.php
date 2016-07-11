@include('_include.header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<!-- Sign up modal -->
<header>
    <div class="container">
        <div class="intro-text">
            <div class="modal-dialog">

                <form enctype="multipart/form-data" name="sentMessage" id="contactForm" method="Post" action="{{ url('/create') }}" novalidate>
                    {!! csrf_field() !!}

                    <h3>تسجيل مستخدم جديد</h3>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-xs-3 control-label">الاسم </label>
                        <div class="col-xs-8">     
                            <input type="text" class="form-control" placeholder="الاسم*" id="name" name="name" required data-validation-required-message="Please enter your name." value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-xs-3 control-label">البريد الالكترونى</label>
                        <div class="col-xs-8">
                            <input type="email" class="form-control" placeholder="البريد الالكترونى*" id="email" name="email" required data-validation-required-message="Please enter your email address." value="{{ old('email') }}">
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-xs-3 control-label">الرقم السري</label>
                        <div class="col-xs-8">
                            <input type="password" class="form-control" placeholder="الرقم السري*" id="password" name="password" required data-validation-required-message="Please enter your password.">
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label class="col-xs-3 control-label">اكد الرقم السري</label>
                        <div class="col-xs-8">
                            <input type="password" class="form-control" placeholder="اكد الرقم السري*" id="confirm-password" name="password_confirmation" required data-validation-required-message="Please enter your confirm password.">
                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                            <p class="help-block text-danger"></p>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-xs-3 control-label">النوع</label>
                        <div class="col-xs-8">
                            <select class="form-control" id="gender" name="gender" placeholder="النوع*">

                                <option value="false">ذكر</option>
                                <option value="true">اثني</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label">رقم الشارع</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" placeholder="رقم الشارع" id="street" name="street" required data-validation-required-message="Please enter street.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">المحافظة</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" placeholder="المحافظة*" id="governorate" name="governorate" required data-validation-required-message="Please enter governorate.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">البلد</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" placeholder="البلد*" id="country" name="country" required data-validation-required-message="Please enter country.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">المدينة</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" placeholder="المدينة*" id="city" name="city" required data-validation-required-message="Please enter city.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">موبايل</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" placeholder="موبايل *" id="country" name="mobile" required data-validation-required-message="Please enter mobile.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label"> تليفون</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" placeholder="تليفون *" id="country" name="phone" required data-validation-required-message="Please enter phone.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">تفاصيل عنك</label>
                        <div class="col-xs-8">
                            <textarea type="text" class="form-control" placeholder="تفاصيل عنك *" id="summery" name="summery" required data-validation-required-message="Please enter short summery."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">صورة المستخدم </label>
                        <div class="col-xs-8">
                            <input type="file" class="form-control-file" name="userimage"><br>
                        </div>
                    </div>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <div class="form-group"><br>
                        <label class="col-xs-3 control-label">نوع المستخدم</label>
                        <div class="col-xs-8"> 
                            <select class="form-control" id="type" name="bussinessType" placeholder="نوع التسجيل*">
                                <option value="empty">-----</option>
                                <option value="work">مورد</option>
                                <option value="hire">زبون</option>
                                <option value="both">كلا منهما</option>
                            </select>
                        </div>
                    </div>
                    <div id="extra-data" style="display: none;">
                    <div class="form-group">
                        <label class="col-xs-3 control-label">عنوانك الوظيفي</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" placeholder="عنوانك الوظيفي*" id="country" name="title" required data-validation-required-message="Please enter title.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">مهاراتك</label>
                        <div class="col-xs-8">
                            <select class="form-control" id="gender" name="skill" placeholder="مهاراتك *">
                                @foreach($skills as $skill)
                                <option value="{{$skill['skillId']}},">{{$skill['skillName']}},</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    </div>

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
<!-- Sign Up modal end-->
<script type="text/javascript">
                        $(document).ready(function($){
                          var mem=$('#type').val();
                          $('#type').change(function(){
                              console.log($('#type').val());
                              if($('#type').val()!=="empty"){
                              if($('#type').val()!=="hire"&&! $("#extra-data").is(':visible'))
                              {console.log("done");
                                $("#extra-data").show();
                              }
                              if($('#type').val()=="hire"&&$("#extra-data").is(':visible'))
                                  {console.log("hide");
                                $("#extra-data").hide();
                              }
                          }
                          });
                        });
                    </script>