@include('_include.header')
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Sign up</h2>
                <h3 class="section-subheading text-muted">Personal Information.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="contactForm" method="Post" action="{{ url('/create') }}" novalidate>
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" placeholder="Your name*" id="name" name="name" required data-validation-required-message="Please enter your name." value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" placeholder="Your Email *" id="email" name="email" required data-validation-required-message="Please enter your email address." value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" placeholder="Your password *" id="password" name="password" required data-validation-required-message="Please enter your password.">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" placeholder="Confirm password *" id="confirm-password" name="password_confirmation" required data-validation-required-message="Please enter your confirm password.">
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="dropdown form-group">
                                <button class="btn btn-primary dropdown-toggle form-control" type="button" data-toggle="dropdown" name="gender">Gender *
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu form-control">
                                    <li><a href="#">Male</a></li>
                                    <li><a href="#">Female</a></li>
                                </ul>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div style="padding-bottom: 50px;"></div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="section-subheading text-muted">Address Information.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Street *" id="street" name="street" required data-validation-required-message="Please enter street.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="City *" id="city" name="city" required data-validation-required-message="Please enter city.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Governorate *" id="governorate" name="governorate" required data-validation-required-message="Please enter governorate.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Country *" id="country" name="country" required data-validation-required-message="Please enter country.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Title *" id="country" name="title" required data-validation-required-message="Please enter title.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="mobile *" id="country" name="mobile" required data-validation-required-message="Please enter mobile.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="phone *" id="country" name="phone" required data-validation-required-message="Please enter phone.">
                            <p class="help-block text-danger"></p>
                        </div>

                        <div style="padding-bottom: 50px;"></div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="section-subheading text-muted">Additional Information.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Professinal Tiltle *" id="professinalTiltle" name="professinalTiltle" required data-validation-required-message="Please enter professinal tiltle.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Summery *" id="summery" name="summery" required data-validation-required-message="Please enter short summery.">
                            <p class="help-block text-danger"></p>
                        </div>

                        <div style="padding-bottom: 50px;"></div>

                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-xl">Register</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</section>

@include('_include.footer')