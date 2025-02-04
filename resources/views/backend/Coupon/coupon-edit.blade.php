@extends('backend.master')

@section('coupon_active')
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
                            <li class="breadcrumb-item"><a href="{{ route('coupon') }}">Coupon</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Edit Coupon</a></li>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="card-box">
                        {{-- Success Message --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <h4 class="m-t-0 header-title text-center">Edit Coupon</h4>
                        <form role="form" action="{{ route('couponPost') }}" method="POST">
                            @csrf
                            {{-- Coupon Name --}}
                            <div class="form-group">
                                <label for="coupon_name">Coupon Name</label>
                                <input type="text" name="coupon_name"
                                    class="form-control @error('coupon_name') is-invalid @enderror" id="coupon_name"
                                    placeholder="Ex: New Year 2020" value="{{ old('coupon_name') }}">
                                    {{-- Input error Message --}}
                                    @error('coupon_name')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                            </div>
                            {{-- Coupon Code --}}
                            <div class="form-group">
                                <label for="coupon_code">Coupon Code</label>
                                <input type="text" name="coupon_code"
                                    class="form-control @error('coupon_code') is-invalid @enderror" id="coupon_code"
                                    placeholder="Ex: newyear-20" value="{{ old('coupon_code') ?? Str::random(8) }}">
                                    {{-- Input error Message --}}
                                    @error('coupon_code')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                            </div>

                            {{-- Start Time --}}
                            <div class="form-group">
                                <label for="starting_date">Starting date of Coupon</label>
                                <input type="date" name="starting_date"
                                    class="form-control @error('starting_date') is-invalid @enderror" id="starting_date"
                                    placeholder="Ex: New Year 2020" value="{{ old('starting_date') }}">
                                    {{-- Input error Message --}}
                                    @error('starting_date')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                            </div>

                            {{-- Start Time --}}
                            <div class="form-group">
                                <label for="ending_date">Ending date of Coupon</label>
                                <input type="date" name="ending_date"
                                    class="form-control @error('ending_date') is-invalid @enderror" id="ending_date"
                                    placeholder="Ex: New Year 2020" value="{{ old('ending_date') }}">
                                    {{-- Input error Message --}}
                                    @error('ending_date')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                            </div>

                            {{-- Discount Type --}}
                            <div class="form-group">
                                <label for="discount_type">Discount Type</label>
                                <select class="form-control" name="discount_type" id="discount_type">
                                    <option value="" disabled selected>Select Discount Type</option>
                                    <option value="1">Fixed Amount($)</option>
                                    <option value="2">Percentage(%)</option>
                                </select>
                                {{-- Input error Message --}}
                                @error('discount_type')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>

                            {{-- Discount Amount --}}
                            <div class="form-group">
                                <label for="discount_amount">Discount Amount</label>
                                <input type="number" name="discount_amount"
                                    class="form-control @error('discount_amount') is-invalid @enderror" id="discount_amount"
                                    placeholder="Ex: 300" value="{{ old('discount_amount') }}">
                                    {{-- Input error Message --}}
                                    @error('discount_amount')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                            </div>

                            {{-- Minium Amount --}}
                            <div class="form-group">
                                <label for="min_amount">Discount Amount</label>
                                <input type="number" name="min_amount"
                                    class="form-control @error('min_amount') is-invalid @enderror" id="min_amount"
                                    placeholder="Ex: 300" value="{{ old('min_amount') }}">
                                    {{-- Input error Message --}}
                                    @error('min_amount')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                            </div>
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
