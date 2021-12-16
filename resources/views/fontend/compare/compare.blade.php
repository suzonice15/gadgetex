
@extends('fontend.layout.master')
@section('content')
    <div class="container my-3" id="wishlist" >
        <div class="row">

            <div class="col-lg-12 col">
                <div class="content">
                    <div class="com-heading">
                        <h2 class="title">
                            Product Compare
                        </h2>
                    </div>
                    <div class="compare-page-content-wrap">
                        <div class="compare-table table-responsive">
                            <div class="table-responsive"><table class="table table-bordered mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="first-column top">Product Name</td>

                                        <td class="product-image-title c1075">
                                            <img class="img-fluid" src="https://fairmartslive.s3.ap-south-1.amazonaws.com/public/assets/images/thumbnails/t9azWJIkJeTq.jpg" alt="Compare product['item']">
                                            <a href="https://fairmart.com.bd/item/shell-advance-4t-ax5-20w40-butterfly-1l-engine-oil-for-motorbike-mzd9073w0p">
                                                <h4 class="title">
                                                    Shell Advance 4T AX5 20W40 Butterfly -1L Engine Oil for Motorbike
                                                </h4>
                                            </a>
                                        </td>
                                        <td class="product-image-title c1014">
                                            <img class="img-fluid" src="https://fairmartslive.s3.ap-south-1.amazonaws.com/public/assets/images/thumbnails/GSbH1AP9njj2.jpg" alt="Compare product['item']">
                                            <a href="https://fairmart.com.bd/item/mediker-safelife-hand-wash-170ml-refill-phb22830za">
                                                <h4 class="title">
                                                    Mediker SafeLife Hand Wash 170ml Refill
                                                </h4>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="first-column">Price</td>
                                        <td class="pro-price c1075">৳480</td>
                                        <td class="pro-price c1014">৳55</td>
                                    </tr>
                                    <tr>
                                        <td class="first-column">Rating</td>

                                        <td class="pro-ratting c1075">
                                            <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" style="width:0%"></div>
                                            </div>
                                        </td>
                                        <td class="pro-ratting c1014">
                                            <div class="ratings">
                                                <div class="empty-stars"></div>
                                                <div class="full-stars" style="width:0%"></div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="first-column">Add To Cart</td>
                                        <td class="c1075">

                                            <a href="javascript:;" data-href="https://fairmart.com.bd/addcart/1075" class="btn btn-success add-to-cart">Add To Cart</a>
                                            <a href="https://fairmart.com.bd/addtocart/1075" class="btn btn-success">Buy Now</a>
                                        </td>
                                        <td class="c1014">

                                            <a href="javascript:;" data-href="https://fairmart.com.bd/addcart/1014" class="btn btn-success add-to-cart">Add To Cart</a>
                                            <a href="https://fairmart.com.bd/addtocart/1014" class="btn btn-success">Buy Now</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="first-column">Remove</td>
                                        <td class="pro-remove c1075">
                                            <i class="fal fa-trash compare-remove" data-href="https://fairmart.com.bd/item/compare/remove/1075" data-class="c1075"></i>
                                        </td>
                                        <td class="pro-remove c1014">
                                            <i class="fal fa-trash compare-remove" data-href="https://fairmart.com.bd/item/compare/remove/1014" data-class="c1014"></i>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
