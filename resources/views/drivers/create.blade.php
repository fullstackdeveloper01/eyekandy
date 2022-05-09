@extends('layouts.app', ['title' => __('Drivers Management')])

@section('content')
    @include('drivers.partials.header', ['title' => __('Add Driver')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Drivers Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('drivers.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ __('Driver information') }}</h6>
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('drivers.store') }}" enctype='multipart/form-data' autocomplete="off">
                                @csrf
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="name_driver">{{ __('Driver Name') }}</label>
                                        <input type="text" name="name_driver" id="name_driver" class="form-control form-control-alternative{{ $errors->has('name_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Driver Name') }}" value="{{ old('name_driver')}}" required>
                                        @if ($errors->has('name_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="email_driver">{{ __('Driver Email') }}</label>
                                        <input type="email" name="email_driver" id="email_driver" class="form-control form-control-alternative{{ $errors->has('email_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Driver Email') }}" value="{{ old('email_driver')}}" required>
                                        @if ($errors->has('email_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('phone_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="phone_driver">{{ __('Driver Phone') }}</label>
                                        <input type="text" name="phone_driver" id="phone_driver" class="form-control form-control-alternative{{ $errors->has('phone_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Driver Phone') }}" value="{{ old('phone_driver')}}" required pattern="(([6-9]{1})([0-9]{9}))">
                                        @if ($errors->has('phone_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <h6 class="heading-small text-muted mb-4">{{ __('Personal information') }}</h6>
                                    <div class="form-group{{ $errors->has('full_name_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="full_name_driver">{{ __('Full Name') }}</label>
                                        <input type="text" name="full_name_driver" id="full_name_driver" class="form-control form-control-alternative{{ $errors->has('full_name_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Full Name') }}" value="{{ old('full_name_driver')}}" required>
                                        @if ($errors->has('full_name_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('full_name_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <!-- <div class="form-group{{ $errors->has('middle_name_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="middle_name_driver">{{ __('Middle Name') }}</label>
                                        <input type="text" name="middle_name_driver" id="middle_name_driver" class="form-control form-control-alternative{{ $errors->has('middle_name_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Middle Name') }}" value="{{ old('middle_name_driver')}}" required>
                                        @if ($errors->has('middle_name_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('middle_name_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div> -->
                                    <div class="form-group{{ $errors->has('father_name_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="father_name_driver">{{ __('Father Name') }}</label>
                                        <input type="text" name="father_name_driver" id="father_name_driver" class="form-control form-control-alternative{{ $errors->has('father_name_driver') ? ' is-invalid' : '' }}" placeholder="{{ __(' Father Name') }}" value="{{ old('father_name_driver')}}" required>
                                        @if ($errors->has('father_name_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('father_name_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('dob_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="dob_driver">{{ __('Date of Birth') }}</label>
                                        <input type="text" name="dob_driver" id="dob_driver" class="form-control form-control-alternative{{ $errors->has('dob_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('DOB') }}" value="{{ old('dob_driver')}}" required>
                                        @if ($errors->has('dob_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dob_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('gender_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="gender_driver">{{ __('Gender') }}</label>
                                        <select name="gender_driver" id="gender_driver" class="form-control form-control-alternative{{ $errors->has('gender_driver') ? ' is-invalid' : '' }}" required value="{{ old('gender_driver')}}">
                                            <option value="" >Select Gender</option>
                                            <option value="Female" >Female</option>
                                            <option value="Male">Male</option>
                                        </select>
                                        @if ($errors->has('gender_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('gender_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <h6 class="heading-small text-muted mb-4">{{ __('Permanent Address (as per aadhar)') }}</h6>
                                    
                                    <div class="form-group{{ $errors->has('address_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="address_driver">{{ __('Address') }}</label>
                                        <input type="text" name="address_driver" id="address_driver" class="form-control form-control-alternative{{ $errors->has('address_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" value="{{ old('address_driver')}}" required>
                                        @if ($errors->has('address_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('address1_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="address1_driver">{{ __('Address1') }}</label>
                                        <input type="text" name="address1_driver" id="address1_driver" class="form-control form-control-alternative{{ $errors->has('address1_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Address1') }}" value="{{ old('address1_driver')}}" required>
                                        @if ($errors->has('address1_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address1_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('district_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="district_driver">{{ __('City/District') }}</label>
                                        <input type="text" name="district_driver" id="district_driver" class="form-control form-control-alternative{{ $errors->has('district_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('City/District') }}" value="{{ old('district_driver')}}" required>
                                        @if ($errors->has('district_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('district_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('state_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="state_driver">{{ __('state') }}</label>
                                        <select name="state_driver" id="state_driver" class="form-control form-control-alternative{{ $errors->has('state_driver') ? ' is-invalid' : '' }}" value="{{ old('state_driver')}}" required >
                                            <option value=""> Select State</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                        @if ($errors->has('state_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('state_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('pincode_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="pincode_driver">{{ __('Pincode') }}</label>
                                        <input type="number" name="pincode_driver" id="pincode_driver" class="form-control form-control-alternative{{ $errors->has('pincode_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Pincode') }}" value="{{ old('pincode_driver')}}" required>
                                        @if ($errors->has('pincode_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pincode_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('isPermanent_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="isPermanent_driver">{{ __('isPermanent') }}</label>
                                        <input type="checkbox" name="isPermanent_driver" id="isPermanent_driver" class="{{ $errors->has('isPermanent_driver') ? ' is-invalid' : '' }}">
                                        @if ($errors->has('isPermanent_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('isPermanent_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <h6 class="heading-small text-muted mb-4">{{ __('Current Address') }}</h6>
                                    
                                    <div class="form-group{{ $errors->has('current_address_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="current_address_driver">{{ __('Address') }}</label>
                                        <input type="text" name="current_address_driver" id="current_address_driver" class="form-control form-control-alternative{{ $errors->has('current_address_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" value="{{ old('current_address_driver')}}" required>
                                        @if ($errors->has('current_address_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('current_address_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('current_address1_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="current_address1_driver">{{ __('Address1') }}</label>
                                        <input type="text" name="current_address1_driver" id="current_address1_driver" class="form-control form-control-alternative{{ $errors->has('current_address1_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Address1') }}" value="{{ old('current_address1_driver')}}" required>
                                        @if ($errors->has('current_address1_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('current_address1_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('current_district_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="current_district_driver">{{ __('City/District') }}</label>
                                        <input type="text" name="current_district_driver" id="current_district_driver" class="form-control form-control-alternative{{ $errors->has('current_district_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('City/District') }}" value="{{ old('district_driver')}}" required>
                                        @if ($errors->has('current_district_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('current_district_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('current_state_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="current_state_driver">{{ __('state') }}</label>
                                        <select name="current_state_driver" id="current_state_driver" class="form-control form-control-alternative{{ $errors->has('current_state_driver') ? ' is-invalid' : '' }}" required value="{{ old('state_driver')}}">
                                            <option value=""> Select State</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                        @if ($errors->has('current_state_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('current_state_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('current_pincode_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="current_pincode_driver">{{ __('Pincode') }}</label>
                                        <input type="number" name="current_pincode_driver" id="current_pincode_driver" class="form-control form-control-alternative{{ $errors->has('current_pincode_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Pincode') }}" value="{{ old('current_pincode_driver')}}" required>
                                        @if ($errors->has('pincode_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('current_pincode_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('profile_photo') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="profile_photo">{{ __('Upload Profile Photo') }}</label>
                                        <input type="file" name="profile_photo" id="profile_photo" class="image_file form-control form-control-alternative{{ $errors->has('profile_photo') ? ' is-invalid' : '' }}" placeholder="{{ __('Profile Photo') }}" value="{{ old('name_driver')}}" required accept="image/*">
                                        @if ($errors->has('profile_photo'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('profile_photo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <!-- <h6 class="heading-small text-muted mb-4">{{ __('Address information') }}</h6>

                                    <div class="form-group{{ $errors->has('residential_address') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="residential_address">{{ __('Residential Address') }}</label>
                                        <input type="text" name="residential_address" id="residential_address" class="form-control form-control-alternative{{ $errors->has('residential_address') ? ' is-invalid' : '' }}" placeholder="{{ __('Residential Address') }}" value="{{ old('residential_address')}}" required>
                                        @if ($errors->has('residential_address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('residential_address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('latitude') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="latituded">{{ __('Latitude') }}</label>
                                        <input type="text" name="latitude" id="latitude" class="form-control form-control-alternative{{ $errors->has('latitude') ? ' is-invalid' : '' }}" placeholder="{{ __('Latitude') }}" value="{{ old('latitude')}}" required>
                                        @if ($errors->has('latitude'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('latitude') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('longitude') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="longitude">{{ __('Longitude') }}</label>
                                        <input type="text" name="longitude" id="longitude" class="form-control form-control-alternative{{ $errors->has('longitude') ? ' is-invalid' : '' }}" placeholder="{{ __('Longitude') }}" value="{{ old('longitude')}}" required>
                                        @if ($errors->has('longitude'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('longitude') }}</strong>
                                            </span>
                                        @endif
                                    </div> -->
                                    <h6 class="heading-small text-muted mb-4">{{ __('Pan Card information') }}</h6>

                                    <div class="form-group{{ $errors->has('pancard_name_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="pancard_name_driver">{{ __('Full Name') }}</label>
                                        <input type="text" name="pancard_name_driver" id="pancard_name_driver" class="form-control form-control-alternative{{ $errors->has('pancard_name_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('PAN Card Name') }}" value="{{ old('pancard_name_driver')}}" required>
                                        @if ($errors->has('pancard_name_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pancard_name_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('pancard_number_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="pancard_number_driver">{{ __('PAN Card Number') }}</label>
                                        <input type="text" name="pancard_number_driver" id="pancard_number_driver" class="form-control form-control-alternative{{ $errors->has('pancard_number_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('PAN Card Number') }}" value="{{ old('pancard_number_driver')}}" required  pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" min=10>
                                        @if ($errors->has('pancard_number_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pancard_number_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('image_pancard_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="image_pancard_driver">{{ __('Upload PAN Card') }}</label>
                                        <input type="file" name="image_pancard_driver" id="image_pancard_driver" class="image_file form-control form-control-alternative{{ $errors->has('image_pancard_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Pancard') }}" value="{{ old('image_pancard_driver')}}" required accept="image/*">
                                        @if ($errors->has('image_pancard_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('image_pancard_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <h6 class="heading-small text-muted mb-4">{{ __('Aadhar Card information') }}</h6>

                                    <div class="form-group{{ $errors->has('aadhar_card_no_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="aadhar_card_no_driver">{{ __('Aadhar Card Number') }}</label>
                                        <input type="text" name="aadhar_card_no_driver" id="aadhar_card_no_driver" class="form-control form-control-alternative{{ $errors->has('aadhar_card_no_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Aadhar Card Number') }}" value="{{ old('aadhar_card_no_driver')}}" required pattern="^\d{4}\s\d{4}\s\d{4}$">
                                        @if ($errors->has('aadhar_card_no_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('aadhar_card_no_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('aadhar_card_name_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="aadhar_card_name_driver">{{ __('Full Name') }}</label>
                                        <input type="text" name="aadhar_card_name_driver" id="aadhar_card_name_driver" class="form-control form-control-alternative{{ $errors->has('aadhar_card_name_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Aadhar Card Name') }}" value="{{ old('aadhar_card_name_driver')}}" required>
                                        @if ($errors->has('address1_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('aadhar_card_name_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('aadhar_card_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="aadhar_card_driver">{{ __('Upload Aadhar Card') }}</label>
                                        <input type="file" name="aadhar_card_driver" id="aadhar_card_driver" class="image_file form-control form-control-alternative{{ $errors->has('aadhar_card_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('Image') }}" value="{{ old('aadhar_card_driver')}}" required accept="image/*">
                                        @if ($errors->has('aadhar_card_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('aadhar_card_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <h6 class="heading-small text-muted mb-4">{{ __('Vehicle information') }}</h6>

                                    <div class="form-group{{ $errors->has('vehicle_number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="vehicle_number">{{ __('Vehicle Number') }}</label>
                                        <input type="text" name="vehicle_number" id="vehicle_number" class="form-control form-control-alternative{{ $errors->has('vehicle_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Vehicle Number') }}" value="{{ old('vehicle_number')}}" required>
                                        @if ($errors->has('vehicle_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('vehicle_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('vehicle_make') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="vehicle_make">{{ __('Vehicle Make') }}</label>
                                        <select name="vehicle_make" id="vehicle_make" class="form-control form-control-alternative{{ $errors->has('vehicle_make') ? ' is-invalid' : '' }}" placeholder="{{ __('Vehicle Make') }}" required>
                                            <option value=''>Select</option>
                                            @foreach($vehicles as $vehicle)
                                                @if (old('vehicle_make') == $vehicle->id)
                                                <option value="{{$vehicle->id}}" selected>{{$vehicle->name}}</option>
                                                @else
                                                <option value="{{$vehicle->id}}" >{{$vehicle->name}}</option>
                                                @endif
                                            @endforeach
                                                    
                                        </select>
                                        @if ($errors->has('vehicle_make'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('vehicle_make') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('vehicle_insurance_number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="vehicle_insurance_number">{{ __('Vehicle Insurance Number') }}</label>
                                        <input type="text" name="vehicle_insurance_number" id="vehicle_insurance_number" class="form-control form-control-alternative{{ $errors->has('vehicle_insurance_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Vehicle Insurance Number') }}" value="{{ old('vehicle_insurance_number')}}" required>
                                        @if ($errors->has('vehicle_insurance_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('vehicle_insurance_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('vehicle_registartion_certificate') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="vehicle_registartion_certificate">{{ __('Upload Vehicle Registration Certificate') }}</label>
                                        <input type="file" name="vehicle_registartion_certificate" id="vehicle_registartion_certificate" class="image_file form-control form-control-alternative{{ $errors->has('vehicle_registartion_certificate') ? ' is-invalid' : '' }}" placeholder="{{ __('Vehicle Registartion Certificate') }}" value="{{ old('vehicle_registartion_certificate')}}" required accept="image/*">
                                        @if ($errors->has('vehicle_registartion_certificate'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('vehicle_registartion_certificate') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('vehicle_validate') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="vehicle_validate">{{ __('Vehicle Validate') }}</label>
                                        <input type="checkbox" name="vehicle_validate" id="vehicle_validate" class="{{ $errors->has('vehicle_validate') ? ' is-invalid' : '' }}">
                                        @if ($errors->has('vehicle_validate'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('vehicle_validate') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <h6 class="heading-small text-muted mb-4">{{ __('Bank information') }}</h6>

                                    <div class="form-group{{ $errors->has('bank_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="bank_name">{{ __('Bank Name') }}</label>
                                        <select name="bank_name" id="bank_name" class="form-control form-control-alternative{{ $errors->has('bank_name') ? ' is-invalid' : '' }}"  value="{{ old('bank_name')}}" required>
                                            <option value=''>Select</option>
                                            @foreach($banks as $bank)
                                                @if (old('bank_name') == $bank->id)
                                                <option value="{{$bank->id}}" selected>{{$bank->bank_name}}</option>
                                                @else
                                                <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                                @endif
                                            @endforeach
                                                    
                                        </select>
                                        @if ($errors->has('bank_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('bank_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('account_number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="account_number">{{ __('Account Number') }}</label>
                                        <input type="text" name="account_number" id="account_number" class="form-control form-control-alternative{{ $errors->has('account_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Account Number') }}" value="{{ old('account_number')}}" required>
                                        @if ($errors->has('account_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('account_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('bank_ifsc_code') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="bank_ifsc_code">{{ __('IFSC Code') }}</label>
                                        <input type="text" name="bank_ifsc_code" id="bank_ifsc_code" class="form-control form-control-alternative{{ $errors->has('bank_ifsc_code') ? ' is-invalid' : '' }}" placeholder="{{ __('IFSC Code') }}" value="{{ old('bank_ifsc_code')}}" required>
                                        @if ($errors->has('bank_ifsc_code'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('bank_ifsc_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('bank_document') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="bank_document">{{ __('Upload Bank Document') }}</label>
                                        <input type="file" name="bank_document" id="bank_document" class="image_file form-control form-control-alternative{{ $errors->has('bank_document') ? ' is-invalid' : '' }}" value="{{ old('bank_document')}}" required accept="image/*">
                                        @if ($errors->has('bank_document'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('bank_document') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                   
                                    <h6 class="heading-small text-muted mb-4">{{ __('Driving License information') }}</h6>

                                    <div class="form-group{{ $errors->has('dl_number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="dl_number">{{ __('Driving License Number') }}</label>
                                        <input type="text" name="dl_number" id="dl_number" class="form-control form-control-alternative{{ $errors->has('dl_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Driving License Number') }}" value="{{ old('dl_number')}}" required>
                                        @if ($errors->has('dl_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dl_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('driving_license') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="driving_license">{{ __('Upload Driving License') }}</label>
                                        <input type="file" name="driving_license" id="driving_license" class="image_file form-control form-control-alternative{{ $errors->has('driving_license') ? ' is-invalid' : '' }}"  value="{{ old('driving_license')}}" required accept="image/*">
                                        @if ($errors->has('driving_license'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('driving_license') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('driving_license_expiry_date') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="driving_license_expiry_date">{{ __('Expiry Date') }}</label>
                                        <input type="text" name="driving_license_expiry_date" id="driving_license_expiry_date" class="form-control form-control-alternative{{ $errors->has('driving_license_expiry_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Expiry Date') }}" value="{{ old('driving_license_expiry_date')}}" required>
                                        @if ($errors->has('driving_license_expiry_date'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('driving_license_expiry_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <h6 class="heading-small text-muted mb-4">{{ __('Nominee information') }}</h6>

                                    <div class="form-group{{ $errors->has('nominee_relationship') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="nominee_relationship">{{ __('Nominee  Relationship') }}</label>
                                        <select name="nominee_relationship" id="nominee_relationship" class="form-control form-control-alternative{{ $errors->has('nominee_relationship') ? ' is-invalid' : '' }}" required value="{{ old('nominee_relationship')}}">
                                            <option value="" >Select the Nominee Relationship</option>
                                            @foreach($nominee_relationship as $nominee)
                                                @if(old('nominee_relationship') == $nominee->relationship_name)
                                                <option value="{{$nominee->relationship_name}}" selected>{{$nominee->relationship_name}}</option>
                                                @else
                                                <option value="{{$nominee->relationship_name}}">{{$nominee->relationship_name}}</option>
                                                @endif
                                            @endforeach
                                            
                                        </select>
                                        @if ($errors->has('nominee_relationship'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nominee_relationship') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('nominee_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="nominee_name">{{ __('Nominee Name') }}</label>
                                        <input type="text" name="nominee_name" id="nominee_name" class="form-control form-control-alternative{{ $errors->has('nominee_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nominee Name') }}" value="{{ old('nominee_name')}}" required>
                                        @if ($errors->has('nominee_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nominee_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('nominee_mobile') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="nominee_mobile">{{ __('Nominee Mobile') }}</label>
                                        <input type="text" name="nominee_mobile" id="nominee_mobile" class="form-control form-control-alternative{{ $errors->has('nominee_mobile') ? ' is-invalid' : '' }}" placeholder="{{ __('Nominee Mobile') }}" value="{{ old('nominee_mobile')}}" required pattern="(([6-9]{1})([0-9]{9}))">
                                        @if ($errors->has('nominee_mobile'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nominee_mobile') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('nominee_dob') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="nominee_dob">{{ __('Nominee DOB') }}</label>
                                        <input type="text" name="nominee_dob" id="nominee_dob" class="form-control form-control-alternative{{ $errors->has('nominee_dob') ? ' is-invalid' : '' }}" placeholder="{{ __('Nominee DOB') }}" value="{{ old('nominee_dob')}}" required>
                                        @if ($errors->has('nominee_dob'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nominee_dob') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('same_nominee') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="same_nominee">{{ __('IsSameNominee') }}</label>
                                        <input type="checkbox" name="same_nominee" id="same_nominee" class="{{ $errors->has('same_nominee') ? ' is-invalid' : '' }}">
                                        @if ($errors->has('same_nominee'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('same_nominee') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('emergency_contact_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="emergency_contact_name">{{ __('Emergency Contact Name') }}</label>
                                        <input type="text" name="emergency_contact_name" id="emergency_contact_name" class="form-control form-control-alternative{{ $errors->has('emergency_contact_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Emergency Contact Name') }}" value="{{ old('emergency_contact_name')}}" required>
                                        @if ($errors->has('emergency_contact_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('emergency_contact_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('emergency_contact_number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="emergency_contact_number">{{ __('Emergency Contact Number') }}</label>
                                        <input type="text" name="emergency_contact_number" id="emergency_contact_number" class="form-control form-control-alternative{{ $errors->has('emergency_contact_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Emergency Contact Number') }}" value="{{ old('emergency_contact_number')}}" required pattern="(([6-9]{1})([0-9]{9}))">
                                        @if ($errors->has('emergency_contact_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('emergency_contact_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <h6 class="heading-small text-muted mb-4">{{ __('Locality and Shift information') }}</h6>

                                    <div class="form-group{{ $errors->has('vehicle_type') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="vehicle_type">{{ __('Vehicle Type') }}</label>
                                        <select name="vehicle_type" id="vehicle_type" class="form-control form-control-alternative{{ $errors->has('vehicle_type') ? ' is-invalid' : '' }}"  value="{{ old('vehicle_type')}}" required>
                                            <option value="">Select</option>
                                            <option value="Bike">Bike</option>
                                            <option value="Cycle">Cycle</option>
                                            <option value="Ecycle">Ecycle</option>
                                                    
                                        </select>

                                        @if ($errors->has('vehicle_type'))
                                        
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('vehicle_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="city">{{ __('City') }}</label>
                                        <select name="city" id="city" class="form-control form-control-alternative{{ $errors->has('city') ? ' is-invalid' : '' }}"  value="{{ old('city')}}" required>
                                            <option value=''>Select</option>
                                            @foreach($cities as $city)
                                                @if (old('city') == $city->id)
                                                <option value="{{$city->id}}" selected>{{$city->city_name}}</option>
                                                @else
                                                <option value="{{$city->id}}">{{$city->city_name}}</option>
                                                @endif
                                            @endforeach
                                                    
                                        </select>
                                        @if ($errors->has('city'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <h6 class="heading-small text-muted mb-4">{{ __('Select Zone') }}</h6>

                                    <div class="form-group{{ $errors->has('zone_area_name') ? ' has-danger' : '' }}">
                                        <div id="zone"></div>
                                        <!-- <label class="form-control-label" for="zone_area">{{ __('Zone Area') }}</label>
                                        <input type="radio" name="zone_area" id="zone_area" class="{{ $errors->has('zone_area') ? ' is-invalid' : '' }}" value="{{ old('name_driver')}}" required> -->
                                        @if ($errors->has('zone_area_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('zone_area_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <h6 class="heading-small text-muted mb-4">{{ __('Select Shift') }}</h6>
                                    <div class="form-group{{ $errors->has('shift_name') ? ' has-danger' : '' }}">
                                        @foreach($shifts as $shift)
                                            <p class="form-control-label" for="shift">{{ $shift->title}}</p>
                                            <p>{{$shift->from_time}} to {{$shift->to_time}}</p>
                                            <label>{{$shift->description}}</label>
                                            @if (old('shift_name') == $shift->id)
                                            <input type="radio" checked name="shift_name" id="{{$shift->id}}" class="{{ $errors->has('shift') ? ' is-invalid' : '' }}" value="{{$shift->id}}" required>
                                            @endif
                                            <input type="radio" name="shift_name" id="{{$shift->id}}" class="{{ $errors->has('shift') ? ' is-invalid' : '' }}" value="{{$shift->id}}" required>
                                            @endforeach
                                        @if ($errors->has('shift_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('shift_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <h6 class="heading-small text-muted mb-4">{{ __('Add t-shirt Size') }}</h6>

                                    <div class="form-group{{ $errors->has('t_shirt_size') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="">{{ __('T-shirt Size') }}</label>
                                        <select name="t_shirt_size" id="t_shirt_size" class="form-control form-control-alternative{{ $errors->has('t_shirt_size') ? ' is-invalid' : '' }}"  value="{{ old('t_shirt_size')}}" required>
                                            <option value="">Select</option>
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="2XL">2XL</option>
                                            <option value="3XL">3XL</option>
                                            <option value="4XL">4XL</option>
                                            <option value="5XL">5XL</option>
                                                   
                                        </select>
                                        @if ($errors->has('t_shirt_size'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('t_shirt_size') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <div class="text-center">
                                        <button id="driver_save" type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
