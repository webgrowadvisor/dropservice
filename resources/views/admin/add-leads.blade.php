@extends('admin.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Leads</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Create</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            {{-- <a href="javascript:void(0);" class="btn btn-light-brand successAlertMessage">
                                <i class="feather-layers me-2"></i>
                                <span>Save as Draft</span>
                            </a> --}}
                            <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                                <i class="feather-user-plus me-2"></i>
                                <span>Create Lead</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <form action="{{ route('leads.store') }}" method="post">
                @csrf
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">

                            <div class="card-body lead-status">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Lead Status :</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line">Typically refers to adding a new potential customer or sales prospect</span>
                                    </h5>
                                    <!-- <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Create Invoice</a> -->
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-4 mb-4">
                                        <label class="form-label">Lead Status <span class="text-danger">*</span></label>
                                        <select name="lead_status" class="form-control" data-select2-selector="status">
                                            <option @if(old('lead_status') == 'New') {{ 'selected' }} @endif value="New">New</option>
                                            <option @if(old('lead_status') == 'Contacted') {{ 'selected' }} @endif value="Contacted">Contacted</option>
                                            <option @if(old('lead_status') == 'Follow-up') {{ 'selected' }} @endif value="Follow-up">Follow-up</option>
                                            <option @if(old('lead_status') == 'Qualified') {{ 'selected' }} @endif value="Qualified">Qualified</option>
                                            <option @if(old('lead_status') == 'Converted') {{ 'selected' }} @endif value="Converted">Converted</option>
                                            <option @if(old('lead_status') == 'Lost') {{ 'selected' }} @endif value="Lost">Lost</option>
                                        </select>
                                        @error('lead_status') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror     
                                        
                                    </div>
                                    <div class="col-lg-4 mb-4">
                                        <label class="form-label">Lead Source <span class="text-danger">*</span></label>
                                         <input type="text" class="form-control" name="lead_source" 
                                            value="{{ old('lead_source') }}" id="" placeholder="Lead Source">
                                        {{-- <select name="lead_source" class="form-control" data-select2-selector="status">
                                            <option @if(old('lead_source') == 'website') {{ 'selected' }} @endif value="Website">Website</option>
                                            <option @if(old('lead_source') == 'Referral') {{ 'selected' }} @endif value="Referral">Referral</option>
                                            <option @if(old('lead_source') == 'Social Media') {{ 'selected' }} @endif value="Social Media">Social Media</option>
                                            <option @if(old('lead_source') == 'Ads') {{ 'selected' }} @endif value="Ads">Ads</option>
                                        </select> --}}
                                        @error('lead_source') 
                                        <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror 
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <label class="form-label">Deal Stage <span class="text-danger">*</span></label>
                                        <select name="deal_stage" class="form-control" data-select2-selector="status">
                                            <option @if(old('deal_stage') == 'Normal') {{ 'selected' }} @endif value="Normal">Normal</option>
                                            <option @if(old('deal_stage') == 'Proposal Sent') {{ 'selected' }} @endif value="Proposal Sent">Proposal Sent</option>
                                            <option @if(old('deal_stage') == 'Negotiation') {{ 'selected' }} @endif value="Negotiation">Negotiation</option>
                                            <option @if(old('deal_stage') == 'Closed-Won') {{ 'selected' }} @endif value="Closed-Won">Closed-Won</option>
                                            <option @if(old('deal_stage') == 'Closed-Lost') {{ 'selected' }} @endif value="Closed-Lost">Closed-Lost</option>
                                        </select> 
                                        @error('deal_stage') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror                                            
                                    </div>
                                                                      
                                </div>
                            </div>

                            <hr class="mt-0">

                            <div class="card-body general-info">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Lead Info :</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line">General information for your lead</span>
                                    </h5>                                   
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Full
                                        Name: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" name="full_name" 
                                            value="{{ old('full_name') }}" id="fullnameInput" placeholder="Full Name">                                            
                                        </div>
                                        @error('full_name') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="mailInput" class="fw-semibold">Email: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-mail"></i></div>
                                            <input type="text" class="form-control" value="{{ old('email') }}" name="email" 
                                            id="mailInput" placeholder="Email">                                            
                                        </div>
                                        @error('email') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="usernameInput" class="fw-semibold">Phone Number: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                            <i class="feather-phone"></i></div>
                                            <input type="tel" class="form-control" 
                                            id="usernameInput" placeholder="Phone Number" name="phone" value="{{ old('phone') }}">                                            
                                        </div>
                                        @error('phone') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="phoneInput" class="fw-semibold">Company Name: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-link-2"></i></div>
                                            <input type="text" name="company_name" value="{{ old('company_name') }}" 
                                            class="form-control" id="phoneInput" placeholder="Company Name">                                        
                                        </div>
                                        @error('company_name') 
                                           <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="companyInput" class="fw-semibold">Job Title: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" name="job_title" value="{{ old('job_title') }}" id="companyInput" placeholder="Job Title">
                                            
                                        </div>
                                        @error('job_title') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="companyInput" class="fw-semibold">Website: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" name="website" 
                                            value="{{ old('website') }}" placeholder="Website">                                            
                                        </div>
                                        @error('website') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>  

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="companyInput" class="fw-semibold">Lead Owner
                                            <span class="text-danger">*</span> : 
                                        </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>                                            
                                            <select name="lead_owner" class="form-control" data-select2-selector="status">
                                                <option value="0">-- Leads Assign --</option>
                                                @if(Auth::user()->department == 'Admin' || Auth::user()->department == 'Manager')
                                                @foreach($user as $data)
                                                <option @if(old('lead_owner') == $data->id) {{ 'selected' }} @endif value="{{ $data->id }}">{{ $data->name .' - '. $data->department .' Department'}}</option> 
                                                @endforeach       
                                                @else 
                                                <option value="{{ Auth::user()->id }}">{{ Auth::user()->name .' - '. Auth::user()->department .' Department'}}</option> 
                                                @endif                                                                                 
                                            </select>
                                        </div>
                                        @error('lead_owner') 
                                                <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Street Address: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" name="street_address" 
                                            value="{{ old('street_address') }}" placeholder="Street Address">                                            
                                        </div>
                                        @error('street_address') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">City: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" name="city" 
                                            value="{{ old('city') }}" placeholder="City">                                            
                                        </div>
                                        @error('city') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>  

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">State: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" name="state" 
                                            value="{{ old('state') }}" placeholder="State">                                            
                                        </div>
                                        @error('state') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Country: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" name="country" 
                                            value="{{ old('country') }}" placeholder="Country">                                            
                                        </div>
                                        @error('country') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">ZIP/Postal Code: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" name="zip_code" 
                                            value="{{ old('zip_code') }}" placeholder="ZIP/Postal Code">                                            
                                        </div>
                                        @error('zip_code') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Communication & Engagement --}}

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="companyInput" class="fw-semibold">Preferred Contact Method: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            
                                            <select name="contact_method" class="form-control" data-select2-selector="status">
                                                <option @if(old('contact_method') == 'Email') {{ 'selected' }} @endif value="Email">Email</option>
                                                <option @if(old('contact_method') == 'Phone') {{ 'selected' }} @endif value="Phone">Phone</option>
                                                <option @if(old('contact_method') == 'WhatsApp') {{ 'selected' }} @endif value="WhatsApp">WhatsApp</option>                                            
                                            </select>                                                                                    
                                        </div>
                                        @error('contact_method') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Last Contact Date: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="date" class="form-control" name="last_contact_date" 
                                            value="{{ old('last_contact_date') }}" placeholder="Last Contact Date">
                                            
                                        </div>
                                        @error('last_contact_date') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Next Follow-up Date: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="date" class="form-control" name="next_followup_date" 
                                            value="{{ old('next_followup_date') }}" placeholder="Next Follow-up Date">
                                            
                                        </div>
                                        @error('next_followup_date') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Notes/Comments: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <textarea class="form-control" name="notes" id="">{{ old('notes') }}</textarea>
                                            
                                        </div>
                                        @error('notes') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Deal & Opportunity Details --}}

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Interested Product/Service<span class="text-danger">*</span>: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>                                            
                                            <select id="interested_product" name="interested_product" class="form-control" data-select2-selector="status">
                                                <option value="">-- Select a Product --</option>
                                                @foreach($product as $data)
                                                <option @if(old('interested_product') == $data->id) {{ 'selected' }} @endif value="{{ $data->id }}">{{ $data->product_name }}</option> 
                                                @endforeach                                                                                        
                                            </select>    
                                        </div>
                                        <div id="product_details" style="display: none; margin-top: 20px;">
                                            <span>Product Details</span><br>
                                            <span><strong>Price:</strong> ₹<span id="product_price"></span></span><br>
                                            <span><strong>Product:</strong> <span id="product"></span></span><br>
                                            <span><strong>Quantity:</strong> <span id="quantity"></span></span><br>
                                            <span><strong>Description:</strong> <span id="product_description"></span></span>
                                        </div>
                                        @error('interested_product') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> 

                                <div class="row mb-4 align-items-center" id="product_upsale" style="display: none;">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Upsale & Other Product: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <select class="form-select form-control" name="upsale_product[]" data-select2-selector="tag" multiple>
                                                @foreach($product as $data)
                                                {{-- <option @if(old('upsale_product') == $data->id) {{ 'selected' }} @endif value="{{ $data->id }}">{{ $data->product_name }}</option> --}}
                                                <option value="{{ $data->id }}" 
                                                    @if(is_array(old('upsale_product')) && in_array($data->id, old('upsale_product'))) 
                                                        selected 
                                                    @endif>
                                                    {{ $data->product_name }}
                                                </option> 
                                                @endforeach                                                
                                            </select>                                           
                                        </div>
                                        @error('upsale_product') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Advance Payment:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <i class="feather-dollar-sign"></i>
                                            </div>
                                            <input type="text" class="form-control" name="budget" 
                                            value="{{ old('budget') }}" placeholder="Advance payment">                                            
                                        </div>
                                        @error('budget') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Estimated Closing Date: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="date" class="form-control" name="closing_date" 
                                            value="{{ old('closing_date') }}" placeholder="Estimated Closing Date">
                                            
                                        </div>
                                        @error('closing_date') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <div class="row mb-4 align-items-right">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-2">
                                        <button type="submit" name="add_lead" class="submit-fix btn btn-primary" >Add Lead</button>
                                    </div>
                                </div>
                            </form>
                                    
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
      
@endsection

@section('script')

<script>
    $(document).ready(function () {        

        $('#interested_product').on('change', function () {
            var productId = $(this).val();

            if (productId) {
                $.ajax({
                    url: '/admin/get-product-details/' + productId,
                    type: 'GET',
                    success: function (response) {
                        $('#product').text(response.produc_life);
                        $('#quantity').text(response.quantity);
                        $('#product_price').text(response.price);
                        $('#product_description').text(response.description);
                        $('#product_details').show();
                        if(response.upsale == 'Yes'){
                            $('#product_upsale').show();
                        }else{
                            $('#product_upsale').hide();
                        }
                    }
                });
            } else {
                $('#product_details').hide();
            }
        });
    });
</script>

@endsection