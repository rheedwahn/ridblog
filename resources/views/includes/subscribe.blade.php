<div class="container-fluid bg-green-color">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="subscribe scrollme">
                    <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                        <h4 class="subscribe-title">Email Newsletters!</h4>
                        <form class="subscribe-form" method="post" action="{{ route('subscribe') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input class="email input-standard-grey input-white" name="email" required="required" placeholder="Your Email Address" type="email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button class="subscr-btn">subscribe
                                <span class="semicircle--right"></span>
                            </button>
                        </form>
                        <div class="sub-title">Subscribe to get the latest information from our blog. </div>

                    </div>

                    <div class="images-block">
                        <img src="{{ asset('app/img/subscr-gear.png') }}" alt="gear" class="gear">
                        <img src="{{ asset('app/img/subscr1.png') }}" alt="mail" class="mail">
                        <img src="{{ asset('app/img/subscr-mailopen.png') }}" alt="mail" class="mail-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>