@extends('admin.layout.main')

@section('css')

@endsection

@section('content')

        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Add Product with Variants</h5>
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
                            
                            <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                                <i class="feather-user-plus me-2"></i>
                                <span>Create </span>
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
            <form action="{{ route('ad.products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">

                            <div class="card-body lead-status">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2"> Status :</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line">Typically refers to adding a new potential customer or sales prospect</span>
                                    </h5>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-4 mb-4">
                                        <label class="form-label">Condition <span class="text-danger">*</span></label>
                                        <select name="condition" class="form-control" data-select2-selector="status">
                                            <option @if(old('condition') == 'New') {{ 'selected' }} @endif value="New">New</option>                                            
                                            <option @if(old('condition') == 'Damage') {{ 'selected' }} @endif value="Damage">Damage</option>
                                            <option @if(old('condition') == 'Second-Hand') {{ 'selected' }} @endif value="Second-Hand">Second-Hand</option>
                                        </select>
                                        @error('condition') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror     
                                        
                                    </div>
                                    <div class="col-lg-4 mb-4">
                                        <label class="form-label">Seller <span class="text-danger">*</span></label>                                         
                                        <select name="seller_id" class="form-control" data-select2-selector="status">
                                            @foreach($sellers as $seller)
                                            <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('seller_id') 
                                        <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror 
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <label class="form-label">Status<span class="text-danger">*</span></label>
                                        <select name="status" class="form-control" data-select2-selector="status">
                                            <option @if(old('status') == '1') {{ 'selected' }} @endif value="1">Active</option>
                                            <option @if(old('status') == '0') {{ 'selected' }} @endif value="0">Inactive</option>                                            
                                        </select> 
                                        @error('status') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror                                            
                                    </div>
                                                                      
                                </div>
                            </div>

                            <hr class="mt-0">

                            <div class="card-body general-info">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0 me-4">
                                        <span class="d-block mb-2">Product Info :</span>
                                        <span class="fs-12 fw-normal text-muted text-truncate-1-line">General information for your Product </span>
                                    </h5>                                   
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="" class="fw-semibold">Brand Name: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-link-2"></i></div>
                                            <select name="brand" class="form-control" required>
                                                <option value="">-- Select Brands --</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        {{ old('brand') == $brand->id ? 'selected' : '' }}>
                                                        {{ $brand->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('brand') 
                                           <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Select Category: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <select name="category_id" class="form-control" required>
                                                <option value="">-- Select Category --</option>
                                                @foreach($categories as $parent)
                                                    <option value="{{ $parent->id }}"
                                                        {{ old('category_id', $product->category_id ?? '') == $parent->id ? 'selected' : '' }}>
                                                        {{ $parent->name }}
                                                    </option>
                                                    @foreach($parent->children as $child)
                                                        <option value="{{ $child->id }}"
                                                            {{ old('category_id', $product->category_id ?? '') == $child->id ? 'selected' : '' }}>
                                                            └─ {{ $child->name }}
                                                        </option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Thumbnail: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="file" class="form-control" name="thumbnail" accept="image/*" >                                            
                                        </div>
                                        @error('thumbnail') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Product  Full
                                        Name: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" name="name" 
                                            value="{{ old('name') }}" id="fullnameInput" placeholder="Product Full Name">                                            
                                        </div>
                                        @error('name') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Description: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <textarea class="form-control" name="description" id="">{{ old('description') }}</textarea>
                                            
                                        </div>
                                        @error('description') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Slug: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <input type="text" class="form-control" name="slug" 
                                            value="{{ old('slug') }}" id="" placeholder="Slug Name">                                            
                                        </div>
                                        @error('slug') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="usernameInput" class="fw-semibold">Base Price: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                            <i class="feather-user"></i></div>
                                            <input type="number" class="form-control" 
                                            id="" placeholder="Mrp Price" name="mrp_price" value="{{ old('mrp_price') }}">                                            
                                        </div>
                                        @error('mrp_price') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                            <i class="feather-user"></i></div>
                                            <input type="number" class="form-control" 
                                            id="" placeholder="Base Price" name="base_price" value="{{ old('base_price') }}">                                            
                                        </div>
                                        @error('base_price') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="total_stock" class="fw-semibold">Total Stocks: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-link-2"></i></div>
                                            <input type="text" name="total_stock" value="{{ old('total_stock') }}" 
                                            class="form-control" id="" placeholder="Total Stocks">                                        
                                        </div>
                                        @error('total_stock') 
                                           <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Product Special: </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-compass"></i></div>
                                            <textarea class="form-control" name="product_specail" id="">{{ old('product_specail') }}</textarea>                                            
                                        </div>
                                        @error('product_specail') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Select Specification Group: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <select name="spec_group" id="spec_group" class="form-control" required>
                                                <option value="">-- Select Category --</option>
                                                @foreach($specGroups as $group)
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('spec_group') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div id="specification_fields" class="row mb-4 align-items-center">
                                            <!-- Attributes will appear here -->
                                </div>
                                
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Variants: </label>
                                    </div>
                                    <div class="col-lg-8">

                                        <div id="variant-wrapper">
                                            <div class="variant-block border p-3 mb-3">
                                                <div class="row g-2">
                                                    <div class="col-md-3">
                                                        <input class="form-control" placeholder="SKU" type="text" name="variants[0][sku]" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input class="form-control" placeholder="Price" type="number" name="variants[0][price]" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input class="form-control" placeholder="Stock" type="number" name="variants[0][stock]" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input class="form-control" placeholder="Options" type="text" name="variants[0][options]">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="file" class="form-control" name="variant_images[]" accept="image/*">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-danger btn-remove-variant" style="display:none;">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </br>
                                        <button class="btn btn-info" type="button" onclick="addVariant()">Add More Variant</button>
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="" class="fw-semibold">Shipping: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Weight (g)</label>
                                                <input type="number" step="0.01" name="weight" class="form-control" value="{{ old('weight', $product->weight ?? 0) }}">
                                                @error('weight') 
                                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label>Length (cm)</label>
                                                <input type="number" step="0.01" name="length" class="form-control" value="{{ old('length', $product->length ?? 0) }}">
                                                @error('length') 
                                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label>Width (cm)</label>
                                                <input type="number" step="0.01" name="width" class="form-control" value="{{ old('width', $product->width ?? 0) }}">
                                                @error('width') 
                                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label>Height (cm)</label>
                                                <input type="number" step="0.01" name="height" class="form-control" value="{{ old('height', $product->height ?? 0) }}">
                                                @error('height') 
                                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="" class="fw-semibold">Label: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                            <i class="feather-user"></i></div>
                                            
                                             <select name="label" class="form-select">
                                                <option value="">-- None --</option>
                                                <option value="hot sale" {{ old('label', $product->label ?? '') == 'hot sale' ? 'selected' : '' }}>Hot Sale</option>
                                                <option value="new" {{ old('label', $product->label ?? '') == 'new' ? 'selected' : '' }}>New</option>
                                                <option value="sale" {{ old('label', $product->label ?? '') == 'sale' ? 'selected' : '' }}>Sale</option>
                                            </select>                                          
                                        </div>
                                        @error('label') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="" class="fw-semibold">Product Type: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                            <i class="feather-user"></i></div>
                                             <select name="product_type" class="form-select">
                                                <option value="physical" {{ old('product_type', $product->product_type ?? '') == 'physical' ? 'selected' : '' }}>Physical</option>
                                                <option value="digital" {{ old('product_type', $product->product_type ?? '') == 'digital' ? 'selected' : '' }}>Digital</option>
                                            </select>                                    
                                        </div>
                                        @error('product_type') 
                                            <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="" class="fw-semibold">Taxes %: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>CGST (%)</label>
                                                <input type="number" step="0.01" name="cgst" class="form-control" value="{{ old('cgst', $product->cgst ?? 6) }}">
                                                @error('cgst') 
                                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>SGST (%)</label>
                                                <input type="number" step="0.01" name="sgst" class="form-control" value="{{ old('sgst', $product->sgst ?? 6) }}">
                                                @error('sgst') 
                                                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                <div id="faq_wrapper">
                                    <h5 class="mt-4">Product FAQs</h5>

                                    @php $faqIndex = 0; @endphp
                                    @if(old('faqs'))
                                        @foreach(old('faqs') as $i => $faq)
                                            @include('admin.products.faq-row', ['index' => $i, 'question' => $faq['question'], 'answer' => $faq['answer']])
                                        @endforeach
                                    @php $faqIndex = count(old('faqs')); @endphp
                                    @elseif(isset($product))
                                        @foreach($product->faqs as $i => $faq)
                                            @include('admin.products.faq-row', ['index' => $i, 'question' => $faq->question, 'answer' => $faq->answer])
                                        @endforeach
                                        @php $faqIndex = $product->faqs->count(); @endphp
                                    @else
                                        @include('admin.products.faq-row', ['index' => 0])
                                        @php $faqIndex = 1; @endphp
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-primary" id="add_faq_btn">+ Add FAQ</button>

                                <div class="row mb-4 align-items-right">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-2">
                                        <button type="submit" name="add_lead" class="submit-fix btn btn-primary" >Save Products</button>
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
    let faqIndex = {{ $faqIndex }};

    document.getElementById('add_faq_btn').addEventListener('click', function () {
        const wrapper = document.getElementById('faq_wrapper');
        const newFaq = document.createElement('div');
        newFaq.classList.add('faq-item', 'row', 'mb-3');
        newFaq.setAttribute('data-index', faqIndex);
        newFaq.innerHTML = `
            <div class="col-md-5">
                <input type="text" name="faqs[${faqIndex}][question]" class="form-control" placeholder="Question">
            </div>
            <div class="col-md-5">
                <input type="text" name="faqs[${faqIndex}][answer]" class="form-control" placeholder="Answer">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-faq w-100">Remove</button>
            </div>
        `;
        wrapper.appendChild(newFaq);
        faqIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-faq')) {
            e.target.closest('.faq-item').remove();
        }
    });
</script>

<script>
    let index = 1;

    function addVariant() {
        const variantHtml = `
            <div class="variant-block border p-3 mb-3">
                <div class="row g-2">
                    <div class="col-md-3">
                        <input class="form-control" placeholder="SKU" type="text" name="variants[${index}][sku]" required>
                    </div>
                    <div class="col-md-2">
                        <input class="form-control" placeholder="Price" type="number" name="variants[${index}][price]" required>
                    </div>
                    <div class="col-md-2">
                        <input class="form-control" placeholder="Stock" type="number" name="variants[${index}][stock]" required>
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" placeholder="Options" type="text" name="variants[${index}][options]">
                    </div>
                    <div class="col-md-2">
                        <input type="file" class="form-control" name="variant_images[]" accept="image/*">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-remove-variant" onclick="removeVariant(this)">Remove</button>
                    </div>
                </div>
            </div>
        `;

        document.getElementById('variant-wrapper').insertAdjacentHTML('beforeend', variantHtml);
        index++;
    }

    function removeVariant(button) {
        button.closest('.variant-block').remove();
    }

    // Make the remove button visible for the first block if more than one variant is present
    document.addEventListener('click', function () {
        const blocks = document.querySelectorAll('.variant-block');
        blocks.forEach((block, i) => {
            const btn = block.querySelector('.btn-remove-variant');
            btn.style.display = blocks.length > 1 ? 'inline-block' : 'none';
        });
    });

    
</script>

<script>
    const allGroups = @json($specGroups);

    document.getElementById('spec_group').addEventListener('change', function () {
        const groupId = this.value;
        const fieldContainer = document.getElementById('specification_fields');
        fieldContainer.innerHTML = ''; // Clear old fields

        if (!groupId) return;

        const group = allGroups.find(g => g.id == groupId);
        if (group && group.attributes.length > 0) {
            group.attributes.forEach(attr => {
                const inputGroup = `
                    <div class="col-lg-4 mb-2">
                        <label>${attr.name}:</label>
                    </div>
                    <div class="col-lg-8 mb-2">
                        <div class="input-group">
                            <div class="input-group-text"><i class="feather-user"></i></div>
                            <input 
                                type="text" 
                                name="specifications[${attr.id}]" 
                                class="form-control" 
                                placeholder="Enter ${attr.name}"
                            >
                        </div>
                    </div>
                `;
                fieldContainer.insertAdjacentHTML('beforeend', inputGroup);
            });
        }
    });
</script>

@endsection