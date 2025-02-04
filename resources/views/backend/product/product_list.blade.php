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
                                <li class="breadcrumb-item"><a href="#">Subcategory</a></li>
                                <li class="breadcrumb-item"><a>Subcategory-list</a></li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h2 class="m-t-0 header-title text-center">Total Category({{ $prouctCount }})</h2>
                            <div class="text-center">
                                <a href="{{ route('ProductAdd') }}" class="btn btn-outline-info mb-3"> <i class="fi-plus"></i> Add New Product</a>
                            </div>
                            {{-- Success Message --}}
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            {{-- Error Message --}}
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <strong>{{ session('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <form action="{{ route('CategorySelectedDelete') }}" method="POST">
                                @csrf
                                <label for="checkAll">Select All</label>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-default">
                                        <tr>
                                            <th>
                                                <label class="form-check-label mg-b-0">
                                                    <input type="checkbox" id="checkAll"><span></span>
                                                </label>
                                            </th>
                                            <th>Sl</th>
                                            <th>Product Title</th>
                                            {{-- <th>Slug</th> --}}
                                            <th>Product Brand</th>
                                            <th>Category Name</th>
                                            <th>Subcategory Name</th>
                                            {{-- <th>Product Summary</th>
                                            <th>Product Description</th> --}}
                                            <th>Product price</th>
                                            <th>Product Thumbnail</th>
                                            <th>Product Gallery</th>
                                            <th>Created</th>
                                            <th width="250" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productList as $key => $item)
                                            <tr>
                                                <td class="valign-center">
                                                    <label class="form-check-label mg-b-0">
                                                        <input type="checkbox" id="checkAll" name="subcat_id[]" value="{{ $item->id }}"><span></span>
                                                    </label>
                                                </td>
                                                <td scope="row">{{ $productList->firstitem() + $key }}</td>
                                                {{-- fastitem function or method ti akhane kaj korbe jodi amar pagination use kori tokhon --}}
                                                <td>{{ $item->title }}</td>
                                                {{-- <td>{{ $item->slug }}</td> --}}
                                                <td>{{ $item->Brand->brand_name ?? 'unknown' }}</td>
                                                <td>{{ $item->Category->category_name }}</td>
                                                <td>{{ $item->SubCategory->subcategory_name ?? '' }}</td>
                                                {{-- <td>{{ $item->summary }}</td>
                                                <td>{{ $item->description }}</td> --}}
                                                <td>{{ $item->product_price }}</td>
                                                <td><a href="{{ asset('images/'.$item->created_at->format('Y/m/').$item->id.'/'.$item->product_thumbnail) }}" download ><img width="100px" src="{{ asset('images/'.$item->created_at->format('Y/m/').$item->id.'/'.$item->product_thumbnail) }}" alt=""></a></td>
                                                <td>
                                                    @foreach ($item->ProductGallery as $pGallary)
                                                        <img width="70px" class="p-1" src="{{ asset('images/product-gallery/'.$pGallary->created_at->format('Y/m/').$pGallary->product_id.'/'.$pGallary->image_name) }}" alt="{{ $pGallary->image_name }}">
                                                    @endforeach
                                                </td>
                                                <td>{{ $item->created_at != null ? $item->created_at->diffForHumans() : 'N/A' }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('singleProduct', $item->slug) }}" class="btn btn-outline-success rounded-5">View</a>
                                                    <a href="{{ route('ProductEdit', $item->id) }}" class="btn btn-outline-info rounded-5">Edit</a>
                                                    <a href="{{ route('ProductDelete', $item->id) }}" class="btn btn-outline-danger rounded-5">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $productList }}
                                {{-- Pagination Button Show korbe --}}
                                <button class="btn btn-danger">Delete All</button>
                            </form>
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
