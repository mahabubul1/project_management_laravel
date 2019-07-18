@extends('layouts.master')

@section('content')
<!-- Start Price Banner -->
<section class="price-banner" id="price-banner">
    <div class="container price-banner-content">
        <div class="row">
            <div class="col-md-6">
                <h2 class="price-banner-title">{{getSetting("price_bannar_title")}}</h2>
                <p class="price-banner-desc">{{getSetting("price_bg_text")}}</p>
            </div>
        </div>
    </div>
</section><!-- End Price Banner -->
<!-- Start Price Plan -->
<section class="price-plan" id="price-plan">
    <div class="container ">
        <h2 class="price-plan-title text-center">Plans</h2>
        <p class="price-plan-desc text-center">One fixed monthly price, unlimited design.</p>
        <div class="form-group text-center">
            <label class="switch">
              <input type="checkbox" name="discount_switch" id="discount-switch" autocomplete="off">
              <span class="monthly">Billed Monthly</span>
              <span class="switch-box round"></span>
              <span class="yearly">Billed Annually - 2 Months Free</span>
            </label>
        </div>
        <div class="row plans">
        	@foreach($plans as $plan)
        		<div class="col-md-4">
        			<form method="POST">
        				@csrf
        				<div class="plan {{ strtolower($plan->title) }}-plan">
        				    <img src='{{ asset("assets/img/price/{$plan->image}") }}' alt="{{ $plan->title }}" class="img-fluid plan-img">
        				    <h2 class="plan-title">{{ $plan->title }}</h2>
        				    <ul class="plan-list">
        				    	@foreach(explode("<br>", html_entity_decode($plan->description)) as $list)
        				    		@if(strpos($list, "<strong>") !== false)
        				    		<li><strong>{{ strip_tags( $list ) }}</strong></li>
        				    		@else
        				    		<li>{{ $list }}</li>
        				    		@endif
        				    	@endforeach
        				    </ul>
        				    @if($plan->price > 0)
	        				    <div class="plan-price">
	        				        <input type="hidden" name="original_price" id="original_price" value="{{ $plan->price }}">
	        				        <input type="hidden" name="price_input" id="price_input" value="{{ $plan->price }}">
	        				        <p><span class="currency">$</span><span class="price">{{ $plan->price }}</span></p>
	        				        <p class="plan-duration"><span class="separator-slash">/</span><span class="plan-option">month</span></p>
	        				    </div>
	        				    <div class="plan-btn">
	        				        <a href="{{ route('cart') }}" class="plan-btn-link get_started" data-price="{{ $plan->price }}" data-plan-id="{{ $plan->id }}" data-duration="monthly">Get started</a>
	        				    </div>
        				    @else
        				    	<div class="plan-btn">
        				    	    <a href="#" class="plan-btn-link">Contact Us</a>
        				    	</div>
        				    @endif
        				</div>
        			</form>
        		</div>
        	@endforeach
        </div>
    </div>
</section><!-- End Price Plan -->
<!-- Start FAQ -->
<section class="faq-contents">
  <div class="container">
    <h2 class="faq-title">Faq</h2>
    <div class="faq-inner-content">
        <div id="accordion" class="getting-faq">
          <div class="card">
            <div class="card-header" id="headingOne">
                <a class="faq-btn" href="#ac-1" data-toggle="collapse" data-target="#ac-1" aria-expanded="true" aria-controls="ac-1">
                  Is it really unlimited? <span class="fa fa-chevron-down faq-btn-icon"></span>
                </a>
            </div>

            <div id="ac-1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <p>Yes! You can submit as many orders as you want and we will do unlimited revisions.</p>
              </div>
            </div>
          </div>
          
          <div class="card">
            <div class="card-header" id="headingTwo">
                <a class="faq-btn" href="#ac-2" data-toggle="collapse" data-target="#ac-2" aria-expanded="true" aria-controls="ac-2">
                  What do you mean by 1, 2 or X orders at a time? <span class="fa fa-chevron-down faq-btn-icon"></span>
                </a>
            </div>

            <div id="ac-2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                <p>We will work on one order a time. Once the update is given your designer will automatically move to the next order/task in the queue.</p>
                <p>If you have a lot of projects that need to be worked on simultaneously we recommend you to upgrade to have more orders/tasks worked on at the same time.</p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingThree">
                <a class="faq-btn" href="#ac-3" data-toggle="collapse" data-target="#ac-3" aria-expanded="true" aria-controls="ac-3">
                  What is the average time per order? <span class="fa fa-chevron-down faq-btn-icon"></span>
                </a>
            </div>

            <div id="ac-3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                <p>We will give you updates every business day.
                Typically we complete orders within a couple of days depending on the project size and complexity.</p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingFour">
                <a class="faq-btn" href="#ac-4" data-toggle="collapse" data-target="#ac-4" aria-expanded="true" aria-controls="ac-4">
                  How much work can I realistically expect in a month? <span class="fa fa-chevron-down faq-btn-icon"></span>
                </a>
            </div>

            <div id="ac-4" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
              <div class="card-body">
                <p>While this is is hard to predict, we will always work as fast as we can.</p>
                <p>Revisions incluced, banners and small graphics usually take 1 to 3 days to complete whereas larger projects can take up tp 5 days to be completed.</p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingFive">
                <a class="faq-btn" href="#ac-5" data-toggle="collapse" data-target="#ac-5" aria-expanded="true" aria-controls="ac-5">
                  Do you accept agencies as clients? <span class="fa fa-chevron-down faq-btn-icon"></span>
                </a>
            </div>

            <div id="ac-5" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
              <div class="card-body">
                <p>Yes we do! We are offering a custom/agency plan for our larger clients who whish us to work on a much larger volume of tasks/orders.</p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingFive">
                <a class="faq-btn" href="#ac-6" data-toggle="collapse" data-target="#ac-6" aria-expanded="true" aria-controls="ac-6">
                  What happens if I don’t like the design? <span class="fa fa-chevron-down faq-btn-icon"></span>
                </a>
            </div>

            <div id="ac-6" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
              <div class="card-body">
                <p>We can always make revisions if you do not like the design. We can also start over and assign the order/task to another designer. This is of course included in the price.</p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingFive">
                <a class="faq-btn" href="#ac-7" data-toggle="collapse" data-target="#ac-7" aria-expanded="true" aria-controls="ac-7">
                  Is there a minimum contract terms? <span class="fa fa-chevron-down faq-btn-icon"></span>
                </a>
            </div>

            <div id="ac-7" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
              <div class="card-body">
                <p>We do not have minimum contract terms. You can cancel your subscription anytime.</p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingFive">
                <a class="faq-btn" href="#ac-8" data-toggle="collapse" data-target="#ac-8" aria-expanded="true" aria-controls="ac-8">
                  How does the money back guarantee work? <span class="fa fa-chevron-down faq-btn-icon"></span>
                </a>
            </div>

            <div id="ac-8" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
              <div class="card-body">
                <p>If you think ManyPixels is not the right fit for you, you can ask your money back within 14 days (provided you did not ask for the source files). We will then refund you entirely, no questions asked.</p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingFive">
                <a class="faq-btn" href="#ac-9" data-toggle="collapse" data-target="#ac-9" aria-expanded="true" aria-controls="ac-9">
                  Do you offer annual discounts? <span class="fa fa-chevron-down faq-btn-icon"></span>
                </a>
            </div>

            <div id="ac-9" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
              <div class="card-body">
                <p>Yes we offer 2 months free if you subscribe for 12 months.</p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingFive">
                <a class="faq-btn" href="#ac-10" data-toggle="collapse" data-target="#ac-10" aria-expanded="true" aria-controls="ac-5">
                  I need more help <span class="fa fa-chevron-down faq-btn-icon"></span>
                </a>
            </div>

            <div id="ac-10" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
              <div class="card-body">
                <p>If you didn't find answers to your question here, don't hesitate to check our Help Center at <a href="mailto:help@codexshaper.com">help@codexshaper.com</a></p>
              </div>
            </div>
          </div>

        </div>
    </div>
  </div>
</section><!-- End FAQ -->
@endsection
