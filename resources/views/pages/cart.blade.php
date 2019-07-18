@extends('layouts.master')

@section('content')
<section class="signin" id="signin">
  <div class="container">
    <div class="row">
		@if(session()->has('carts'))
		<div class="col-sm-6 cart">
	        <h2 class="cart-title text-center"><i class="fa fa-shopping-cart cart-title"></i> Your Cart</h2>
	        <p class="cart-desc text-center">Please review your items below</p>
	        <table class="table table-bordered cart-table">
	          <thead>
	            <tr>
	              <th>Package Name</th>
	              <th>SKU</th>
	              <th>Price</th>
	              <th>Quantity</th>
	              <th>Subtotal</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody>
          		<tr>
	              <td>{{ $cart->plan_duration }} - ${{ $cart->plan_price }}</td>
	              <td>{{ $cart->plan_title }} {{ $cart->plan_duration }} - ${{ $cart->plan_price }}</td>
	              <td>{{ $cart->plan_price }}</td>
	              <td>{{ $cart->plan_qty }}</td>
	              <td>${{ $cart->plan_price * $cart->plan_qty }}</td>
	              <td><a href="#" id="remove-cart"><i class="fas fa-minus"></i></a></td>
	            </tr>
	           
	          </tbody>
	        </table>
	        <div class="promo">
	          <h2 class="promo-title text-center">Have a promo code?</h2>
	          <div class="form-group promo-group">
	            <div class="row">
	              <div class="col-md-9"><input type="text" name="promo_code" id="promo-code" class="form-control" placeholder="Enter Code here" value=""></div>
	            <div class="col-md-3"><input type="submit" name="promo_submit" id="promo_submit" class="btn" value="Add Code"></div>
	            </div>
	          </div>
	        </div>
	        @if(isLoggedIn())
	        <div class="total-container">
	          <table class="table table-striped">
	            <tbody>
	              <tr class="sub_total">
	                <td class="text-right"><strong>Subtotal</strong></td>
	                <td class="text-right">${{ $cart->plan_price * $cart->plan_qty }}</td>
	              </tr>
	              <tr class="shipping_total">
	                <td class="text-right"><strong>Shipping</strong></td>
	                <td class="text-right">${{ $shipping }}</td>
	              </tr>
	              <tr class="tax_total">
	                <td class="text-right"><strong>Taxes</strong></td>
	                <td class="text-right">${{ $tax }}</td>
	              </tr>
	              <tr class="grand_total">
	                <td class="text-right"><strong>Total</strong></td>
	                <td class="text-right">${{ ($cart->plan_price * $cart->plan_qty) + $shipping +  $tax }}</td>
	              </tr>
	            </tbody>
	          </table>
	        </div>
	        @endif
	      </div>
	    @endif
      
      <div class="col-sm-6">
      	@if(!isLoggedIn())
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form action="{{ route('login') }}" method="POST" id="signin-form">
            	@csrf
              <h2 class="tab-title text-center">Sign In</h2>
              @if(session('verify_message'))
                  <div class="alert alert-success">
                      {{ session('verify_message') }}
                  </div>
              @endif
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Your email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" value="" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group text-center submit-container">
                <input type="submit" name="signin" id="signin_submit" class="btn btn-lg btn-success" value="Sign in to your account">
                <br>
                <br>
                <a id="signup-tab" href="#profile">Don't have an account yet? Sign up here.</a>
                <br>
                <br>
                <a href="#" class="forgot-password">Forgot your password?</a>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form action="{{ route('register') }}" method="POST" id="signup-form">
            	@csrf
              <h2 class="tab-title text-center">Sign Up</h2>
                <br>
                <div class="text-center">
                  <a id="signin-tab" href="#home" >Already have an account? Log in here.</a>
                </div>
              <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="" value="{{ old('first_name') }}">
                @if ($errors->has('first_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" id="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="" value="{{ old('last_name') }}">
                @if ($errors->has('last_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="card_email">Email Address</label>
                <input type="email" name="email" id="card_email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="card_password">Password</label>
                <input type="password" name="password" id="card_password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="" value="">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
              	<label for="password-confirm" class=" ">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
              <div class="form-group text-center submit-container">
                <input type="submit" name="signup" id="signup_submit" class="btn btn-lg btn-success" value="Continue to checkout">
              </div>
            </form>
            
          </div>
        </div>
        @endif
        @if(isLoggedIn())
        <div class="billing-container">
          <h2 class="billing-title text-center">Add a Card</h2>
          <div class="card-types d-flex">
            <div class="">
              <i class="fas fa-lock"></i>
              <span>secure</span>
            </div>
            <div class="ml-auto">
              <img src="{{ asset('assets/img/cart/card_types.gif') }}" alt="Card Types" class="img-fluid">
            </div>
          </div>
          
          <form class="card-form" action="" method="post">
            <div class="row form-group">
              <div class="col-md-3">
                <label for="full-name">Name on Card</label>
              </div>
              <div class="col-md-9">
                <input type="text" name="full_name" id="full-name" class="form-control" placeholder="Your full name">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-3">
                <label for="address">Address</label>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                </div>
                <div class="row form-group">
                  <div class="col-md-6">
                    <input type="text" name="city" id="city" class="form-control" placeholder="City">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="post_code" id="post-code" class="form-control" placeholder="90210">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-6">
                    <select class="form-control country_select mobile-margin-bottom select2-offscreen" name="country" tabindex="-1">
                      <option value="">Select a Country</option>
                      <option value="AF">Afghanistan</option>
                      <option value="AL">Albania</option>
                      <option value="DZ">Algeria</option>
                      <option value="AS">American Samoa</option>
                      <option value="AD">Andorra</option>
                      <option value="AO">Angola</option>
                      <option value="AI">Anguilla</option>
                      <option value="AQ">Antarctica</option>
                      <option value="AG">Antigua and Barbuda</option>
                      <option value="AR">Argentina</option>
                      <option value="AM">Armenia</option>
                      <option value="AW">Aruba</option>
                      <option value="AU">Australia</option>
                      <option value="AT">Austria</option>
                      <option value="AZ">Azerbaijan</option>
                      <option value="BS">Bahamas</option>
                      <option value="BH">Bahrain</option>
                      <option value="BD">Bangladesh</option>
                      <option value="BB">Barbados</option>
                      <option value="BY">Belarus</option>
                      <option value="BE">Belgium</option>
                      <option value="BZ">Belize</option>
                      <option value="BJ">Benin</option>
                      <option value="BM">Bermuda</option>
                      <option value="BT">Bhutan</option>
                      <option value="BO">Bolivia</option>
                      <option value="BA">Bosnia and Herzegovina</option>
                      <option value="BW">Botswana</option>
                      <option value="BV">Bouvet Island</option>
                      <option value="BR">Brazil</option>
                      <option value="BQ">British Antarctic Territory</option>
                      <option value="IO">British Indian Ocean Territory</option>
                      <option value="VG">British Virgin Islands</option>
                      <option value="BN">Brunei</option>
                      <option value="BG">Bulgaria</option>
                      <option value="BF">Burkina Faso</option>
                      <option value="BI">Burundi</option>
                      <option value="KH">Cambodia</option>
                      <option value="CM">Cameroon</option>
                      <option value="CA">Canada</option>
                      <option value="CT">Canton and Enderbury Islands</option>
                      <option value="CV">Cape Verde</option>
                      <option value="KY">Cayman Islands</option>
                      <option value="CF">Central African Republic</option>
                      <option value="TD">Chad</option>
                      <option value="CL">Chile</option>
                      <option value="CN">China</option>
                      <option value="CX">Christmas Island</option>
                      <option value="CC">Cocos [Keeling] Islands</option>
                      <option value="CO">Colombia</option>
                      <option value="KM">Comoros</option>
                      <option value="CG">Congo - Brazzaville</option>
                      <option value="CD">Congo - Kinshasa</option>
                      <option value="CK">Cook Islands</option>
                      <option value="CR">Costa Rica</option>
                      <option value="HR">Croatia</option>
                      <option value="CU">Cuba</option>
                      <option value="CY">Cyprus</option>
                      <option value="CZ">Czech Republic</option>
                      <option value="CI">Côte d’Ivoire</option>
                      <option value="DK">Denmark</option>
                      <option value="DJ">Djibouti</option>
                      <option value="DM">Dominica</option>
                      <option value="DO">Dominican Republic</option>
                      <option value="NQ">Dronning Maud Land</option>
                      <option value="DD">East Germany</option>
                      <option value="EC">Ecuador</option>
                      <option value="EG">Egypt</option>
                      <option value="SV">El Salvador</option>
                      <option value="GQ">Equatorial Guinea</option>
                      <option value="ER">Eritrea</option>
                      <option value="EE">Estonia</option>
                      <option value="ET">Ethiopia</option>
                      <option value="FK">Falkland Islands</option>
                      <option value="FO">Faroe Islands</option>
                      <option value="FJ">Fiji</option>
                      <option value="FI">Finland</option>
                      <option value="FR">France</option>
                      <option value="GF">French Guiana</option>
                      <option value="PF">French Polynesia</option>
                      <option value="TF">French Southern Territories</option>
                      <option value="FQ">French Southern and Antarctic Territories</option>
                      <option value="GA">Gabon</option>
                      <option value="GM">Gambia</option>
                      <option value="GE">Georgia</option>
                      <option value="DE">Germany</option>
                      <option value="GH">Ghana</option>
                      <option value="GI">Gibraltar</option>
                      <option value="GR">Greece</option>
                      <option value="GL">Greenland</option>
                      <option value="GD">Grenada</option>
                      <option value="GP">Guadeloupe</option>
                      <option value="GU">Guam</option>
                      <option value="GT">Guatemala</option>
                      <option value="GG">Guernsey</option>
                      <option value="GN">Guinea</option>
                      <option value="GW">Guinea-Bissau</option>
                      <option value="GY">Guyana</option>
                      <option value="HT">Haiti</option>
                      <option value="HM">Heard Island and McDonald Islands</option>
                      <option value="HN">Honduras</option>
                      <option value="HK">Hong Kong</option>
                      <option value="HU">Hungary</option>
                      <option value="IS">Iceland</option>
                      <option value="IN">India</option>
                      <option value="ID">Indonesia</option>
                      <option value="IR">Iran</option>
                      <option value="IQ">Iraq</option>
                      <option value="IE">Ireland</option>
                      <option value="IM">Isle of Man</option>
                      <option value="IL">Israel</option>
                      <option value="IT">Italy</option>
                      <option value="JM">Jamaica</option>
                      <option value="JP">Japan</option>
                      <option value="JE">Jersey</option>
                      <option value="JT">Johnston Island</option>
                      <option value="JO">Jordan</option>
                      <option value="KZ">Kazakhstan</option>
                      <option value="KE">Kenya</option>
                      <option value="KI">Kiribati</option>
                      <option value="KW">Kuwait</option>
                      <option value="KG">Kyrgyzstan</option>
                      <option value="LA">Laos</option>
                      <option value="LV">Latvia</option>
                      <option value="LB">Lebanon</option>
                      <option value="LS">Lesotho</option>
                      <option value="LR">Liberia</option>
                      <option value="LY">Libya</option>
                      <option value="LI">Liechtenstein</option>
                      <option value="LT">Lithuania</option>
                      <option value="LU">Luxembourg</option>
                      <option value="MO">Macau SAR China</option>
                      <option value="MK">Macedonia</option>
                      <option value="MG">Madagascar</option>
                      <option value="MW">Malawi</option>
                      <option value="MY">Malaysia</option>
                      <option value="MV">Maldives</option>
                      <option value="ML">Mali</option>
                      <option value="MT">Malta</option>
                      <option value="MH">Marshall Islands</option>
                      <option value="MQ">Martinique</option>
                      <option value="MR">Mauritania</option>
                      <option value="MU">Mauritius</option>
                      <option value="YT">Mayotte</option>
                      <option value="FX">Metropolitan France</option>
                      <option value="MX">Mexico</option>
                      <option value="FM">Micronesia</option>
                      <option value="MI">Midway Islands</option>
                      <option value="MD">Moldova</option>
                      <option value="MC">Monaco</option>
                      <option value="MN">Mongolia</option>
                      <option value="ME">Montenegro</option>
                      <option value="MS">Montserrat</option>
                      <option value="MA">Morocco</option>
                      <option value="MZ">Mozambique</option>
                      <option value="MM">Myanmar [Burma]</option>
                      <option value="NA">Namibia</option>
                      <option value="NR">Nauru</option>
                      <option value="NP">Nepal</option>
                      <option value="NL">Netherlands</option>
                      <option value="AN">Netherlands Antilles</option>
                      <option value="NT">Neutral Zone</option>
                      <option value="NC">New Caledonia</option>
                      <option value="NZ">New Zealand</option>
                      <option value="NI">Nicaragua</option>
                      <option value="NE">Niger</option>
                      <option value="NG">Nigeria</option>
                      <option value="NU">Niue</option>
                      <option value="NF">Norfolk Island</option>
                      <option value="KP">North Korea</option>
                      <option value="VD">North Vietnam</option>
                      <option value="MP">Northern Mariana Islands</option>
                      <option value="NO">Norway</option>
                      <option value="OM">Oman</option>
                      <option value="PC">Pacific Islands Trust Territory</option>
                      <option value="PK">Pakistan</option>
                      <option value="PW">Palau</option>
                      <option value="PS">Palestinian Territories</option>
                      <option value="PA">Panama</option>
                      <option value="PZ">Panama Canal Zone</option>
                      <option value="PG">Papua New Guinea</option>
                      <option value="PY">Paraguay</option>
                      <option value="YD">People's Democratic Republic of Yemen</option>
                      <option value="PE">Peru</option>
                      <option value="PH">Philippines</option>
                      <option value="PN">Pitcairn Islands</option>
                      <option value="PL">Poland</option>
                      <option value="PT">Portugal</option>
                      <option value="PR">Puerto Rico</option>
                      <option value="QA">Qatar</option>
                      <option value="RO">Romania</option>
                      <option value="RU">Russia</option>
                      <option value="RW">Rwanda</option>
                      <option value="RE">Réunion</option>
                      <option value="BL">Saint Barthélemy</option>
                      <option value="SH">Saint Helena</option>
                      <option value="KN">Saint Kitts and Nevis</option>
                      <option value="LC">Saint Lucia</option>
                      <option value="MF">Saint Martin</option>
                      <option value="PM">Saint Pierre and Miquelon</option>
                      <option value="VC">Saint Vincent and the Grenadines</option>
                      <option value="WS">Samoa</option>
                      <option value="SM">San Marino</option>
                      <option value="SA">Saudi Arabia</option>
                      <option value="SN">Senegal</option>
                      <option value="RS">Serbia</option>
                      <option value="CS">Serbia and Montenegro</option>
                      <option value="SC">Seychelles</option>
                      <option value="SL">Sierra Leone</option>
                      <option value="SG">Singapore</option>
                      <option value="SK">Slovakia</option>
                      <option value="SI">Slovenia</option>
                      <option value="SB">Solomon Islands</option>
                      <option value="SO">Somalia</option>
                      <option value="ZA">South Africa</option>
                      <option value="GS">South Georgia and the South Sandwich Islands</option>
                      <option value="KR">South Korea</option>
                      <option value="ES">Spain</option>
                      <option value="LK">Sri Lanka</option>
                      <option value="SD">Sudan</option>
                      <option value="SR">Suriname</option>
                      <option value="SJ">Svalbard and Jan Mayen</option>
                      <option value="SZ">Swaziland</option>
                      <option value="SE">Sweden</option>
                      <option value="CH">Switzerland</option>
                      <option value="SY">Syria</option>
                      <option value="ST">São Tomé and Príncipe</option>
                      <option value="TW">Taiwan</option>
                      <option value="TJ">Tajikistan</option>
                      <option value="TZ">Tanzania</option>
                      <option value="TH">Thailand</option>
                      <option value="TL">Timor-Leste</option>
                      <option value="TG">Togo</option>
                      <option value="TK">Tokelau</option>
                      <option value="TO">Tonga</option>
                      <option value="TT">Trinidad and Tobago</option>
                      <option value="TN">Tunisia</option>
                      <option value="TR">Turkey</option>
                      <option value="TM">Turkmenistan</option>
                      <option value="TC">Turks and Caicos Islands</option>
                      <option value="TV">Tuvalu</option>
                      <option value="UM">U.S. Minor Outlying Islands</option>
                      <option value="PU">U.S. Miscellaneous Pacific Islands</option>
                      <option value="VI">U.S. Virgin Islands</option>
                      <option value="UG">Uganda</option>
                      <option value="UA">Ukraine</option>
                      <option value="SU">Union of Soviet Socialist Republics</option>
                      <option value="AE">United Arab Emirates</option>
                      <option value="GB">United Kingdom</option>
                      <option value="US">United States</option>
                      <option value="UY">Uruguay</option>
                      <option value="UZ">Uzbekistan</option>
                      <option value="VU">Vanuatu</option>
                      <option value="VA">Vatican City</option>
                      <option value="VE">Venezuela</option>
                      <option value="VN">Vietnam</option>
                      <option value="WK">Wake Island</option>
                      <option value="WF">Wallis and Futuna</option>
                      <option value="EH">Western Sahara</option>
                      <option value="YE">Yemen</option>
                      <option value="ZM">Zambia</option>
                      <option value="ZW">Zimbabwe</option>
                      <option value="AX">Åland Islands</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="state" id="state" class="form-control" placeholder="State">
                  </div>
                </div>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-3">
                <label for="full-name">Card Number</label>
              </div>
              <div class="col-md-9">
                <input type="text" name="card_number" id="card-number" class="form-control" placeholder="XXXX XXXX XXXX XXXX">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-3">
                <label for="full-name">Expiration & CVC</label>
              </div>
              <div class="col-md-9">
                <div class="row form-group">
                  <div class="col-md-6">
                    <input type="text" name="expire_date" id="expire-date" class="form-control" placeholder="MM / YY">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="csv" id="csv" class="form-control" placeholder="CSV">
                  </div>
                </div>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-3">
                <label for="full-name"></label>
              </div>
              <div class="col-md-9">
                <p>Click the button below to add this card.</p>
                <input type="submit" name="submit_card" id="submit-card" class="btn btn-lg btn-success" value="Continue">
              </div>
            </div>
          </form>

        </div>
		@endif
      </div>
    </div>
  </div>
</section>
@endsection
