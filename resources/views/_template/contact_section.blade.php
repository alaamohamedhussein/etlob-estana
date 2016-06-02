<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">LogIn</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="contactForm" action="{{ url('/new') }}" method="post" novalidate>
                    {!! csrf_field() !!}

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" placeholder="Your password *" name="password" id="password" required data-validation-required-message="Please enter your password.">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                                <p class="help-block text-danger"></p>
                            </div>
                           
                            <div class="col-md-3"><a href="{{ url('template.signup') }}" class="remove_underlines">Sign Up</a></div>
                            <div class="col-md-3"><a href="{{ url('/redirect') }}" class="remove_underlines">login with facebook</a></div>
                            
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-xl">LogIn</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>