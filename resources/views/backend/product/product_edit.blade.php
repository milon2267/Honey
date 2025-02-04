@extends('backend.master')

@section('product_active')
    active
@endsection

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">Dashboard</h4>

                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="{{ url('admin/category-list') }}">Product-list</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Edit Product</a></li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">

                    <div class="col-md-8 m-auto">
                        <div class="card-box">
                            <h4 class="m-t-0 m-b-30 header-title text-center">Edit Product</h4>
                            <div class="text-center">
                                <a href="{{ route('ProductView') }}" class="btn btn-outline-primary"> <i
                                        class="fi-menu"></i> View Product</a>
                            </div>
                            <form role="form" action="{{ route('ProductUpdate') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                {{-- Product Title --}}
                                <div class="form-group">
                                    <label for="productName">Add Product Name:</label>
                                    <input type="text" name="productName"
                                        class="form-control @error('productName') is-invalid @enderror" id="productName"
                                        placeholder="Ex: T-shirt" value="{{ $product->title ?? old('productName') }}">
                                    @error('productName')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                {{-- Product Permalink
                                <div class="form-group">
                                    <label for="slug">Add Product Parmalink:</label>
                                    <input type="text" name="slug"
                                        class="form-control @error('slug') is-invalid @enderror" id="slug"slug
                                        placeholder="Ex: t-shir" value="{{ old('slug') }}">
                                    @error('slug')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div> --}}
                                {{-- Product Brand  --}}
                                <div class="form-group">
                                    <label for="BrandName">Product Brand Name:</label>
                                    <select name="BrandName" id="BrandName" class="form-control @error('BrandName') is-invalid @enderror">
                                        <option value="">Select Product Brand</option>
                                        @foreach ($brands as $item)
                                            <option
                                            @if ($product->brand_id == $item->id)
                                                selected
                                            @endif
                                             value="{{ $item->id }}">{{ $item->brand_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('BrandName')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>

                                {{-- Product Category  --}}
                                <div class="form-group">
                                    <label for="cateogryName">Product Category Name:</label>
                                    <select name="cateogryName" id="cateogryName" class="form-control @error('cateogryName') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach ($ProductCategory as $item)
                                            <option
                                            @if ($product->category_id == $item->id)
                                                selected
                                            @endif
                                             value="{{ $item->id }}">{{ $item->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('cateogryName')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                {{-- Product Sub-Category  --}}
                                <div class="form-group">
                                    <label for="subcategory">Product Sub Category Name:</label>
                                    <select name="subcategory" id="subcategory" class="form-control @error('subcategory') is-invalid @enderror">
                                        @foreach ($ProductSubCategory as $subitem)
                                            <option
                                            @if ($product->subcategory_id == $subitem->id)
                                                selected
                                            @endif
                                             value="{{ $subitem->id }}">{{ $subitem->subcategory_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('subcategory')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                {{-- Product Price --}}
                                <div class="form-group">
                                    <label for="productPrice">Default Product Price:</label>
                                    <input type="text" name="productPrice" class="form-control @error('productPrice') is-invalid @enderror" id="productPrice" value="{{ $product->product_price	}}">
                                    @error('productPrice')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>

                                {{-- Product Variation According to Color, Size, Price, Quantity --}}
                                @foreach ($attributes as $attribute)
                                <div id="dynamic-field-1" class="form-group dynamic-field">
                                    <div class="row">
                                        {{-- Product Color --}}
                                        <input type="hidden" name="productAttributeId[]" value="{{ $attribute->id }}">
                                        <div class="col-3">
                                            <label for="field" class="font-weight-bold">Color</label>
                                            <select class="form-control" name="color[]" id="color">
                                                <option value="" disabled selected>Select Color</option>
                                               @foreach ($color as $item)
                                                <option
                                                @if ($attribute->color_id == $item->id)
                                                selected
                                                @endif
                                                value="{{ $item->id }}">{{ ucwords($item->color_name) }}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        {{-- Product Size --}}
                                        <div class="col-3">
                                            <label for="size" class="font-weight-bold">Size</label>
                                            <select class="form-control" name="size[]" id="size">
                                                <option value="" disabled selected>Select Size</option>
                                               @foreach ($size as $item)
                                                <option
                                                @if ($attribute->size_id == $item->id)
                                                selected
                                                @endif
                                                value="{{ $item->id }}">{{ $item->size }}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        {{-- Product Quantity --}}
                                        <div class="col-3">
                                            <label for="quantity" class="font-weight-bold">Quantity</label>
                                        <input type="text" id="field" class="form-control" name="quantity[]" value="{{ $attribute->quantity }}" />
                                        </div>
                                        {{-- Product Price --}}
                                        <div class="col-3">
                                            <label for="productPrice" class="font-weight-bold">Price</label>
                                            <input type="text" name="attributeprice[]" value="{{ $attribute->price }}"
                                        class="form-control @error('productPrice') is-invalid @enderror" id="productPrice">
                                        @error('productPrice')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>{{ $message }}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                {{-- Product Thumbnail --}}
                                <div class="form-group">
                                    <label for="thumbnail" class="form-control-label">Add Product Thumbnail(Recommented: 300x280):</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control @error('product_price') is-invalid @enderror" onchange="document.getElementById('image_id').src = window.URL.createObjectURL(this.files[0])">
                                    @error('product_price')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="preview" class="form-control-label d-block">Product preview image: </label>
                                    <img id="image_id" width="250" src="{{ asset('images/'.$product->created_at->format('Y/m/').$product->id.'/'.$product->product_thumbnail) }}" alt="{{ $product->title }}">
                                </div>
                                {{-- Product Gallery --}}
                                <div class="form-group">
                                    <label for="image_name" class="form-control-label">Add Product Images(Recommented: 300x280):</label>
                                    @foreach ($product->ProductGallery as $item)
                                        <input type="hidden" name="gallery_id[]" value="{{ $item->id }}">
                                        <input type="file" name="image_name[]" id="image_name" class="form-control @error('product_price') is-invalid @enderror" onchange="document.getElementById('image_id{{ $item->id }}').src = window.URL.createObjectURL(this.files[0])">
                                        @error('image_name')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>{{ $message }}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="preview" class="form-control-label d-block">Product preview image: </label>
                                            <img id="image_id{{ $item->id }}" width="250" src="{{ asset('images/product-gallery/'.$item->created_at->format('Y/m/').$item->product_id.'/'.$item->image_name) }}" alt="{{ $item->image_name }}">
                                        </div>
                                    @endforeach
                                </div>
                                {{-- Product Summary  --}}
                                <div class="form-group">
                                    <label for="productSummary">Add Product Sumamry:</label>
                                    <textarea name="productSummary" class="form-control @error('productSummary') is-invalid @enderror" id="productSummary">{{ $product->summary }}</textarea>
                                    @error('productSummary')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                {{-- Product Description  --}}
                                <div class="form-group">
                                    <label for="productDesc">Add Product Description:</label>
                                    <textarea name="productDesc" class="form-control @error('productDesc') is-invalid @enderror" id="productDesc">{{ $product->description }}</textarea>
                                    @error('productDesc')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                {{-- Form Button  --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                                </div>
                            </form>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2021 © milon. - codermilon.com
        </footer>

    </div>
@endsection
@section('footer_js')
    <script>
    $('#productName').keyup(function() {
        $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
    });

    $('#cateogryName').change(function(){
        let category_id = $(this).val();
        if(category_id){
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/get-subcate') }}/" + category_id,
                success: function(data){
                    if(data){
                        $('#subcategory').empty();
                        $('#subcategory').append('<option value="">Select Sub-Category</option>');
                        $.each(data, function(key, value){
                            $('#subcategory').append('<option value="'+value.id+'">'+value.subcategory_name+'</option>');
                        })
                    }else{
                        $('#subcategory').empty();
                    }
                }
            })
        }else{
            $('#subcategory').empty();
        }
    })

    </script>
@endsection
