<div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <nav style="--bs-breadcrumb-divider: '';background: #ddd;margin-top: 9px;padding-top: 10px;padding-bottom: 1px;margin-left: 5px;padding-left: 11px;" aria-label="breadcrumb" aria-label="breadcrumb"  >
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-decoration-none " style="color:black"> <i class="fa fa-home"></i> Home >></a></li>
                        <li class="breadcrumb-item active" aria-current="page"  style="color:black">New Arrival >></li>
                        <li class="breadcrumb-item active" aria-current="page"  style="color:black">Smartphone   >></li>
                        <li class="breadcrumb-item active" aria-current="page"  style="color:black">Smartphone  Vivo Y29</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
<div class="container-fluid mt-3">
    <div class="row">
        <!-- ===============product slides ============ -->
    <div class="col-sm-12 col-md-6">
    <img src="{{ url('/uploads') }}/{{ $product->folder }}/{{ $product->feasured_image }}"  id="MainImgClass" class="img-fluid w-100 pd-5">

    <div class="product-carusal col-sm-12">

        <?php
        if($product->galary_image_1){
        ?>
        <div> <img src="{{ url('/uploads') }}/{{ $product->folder }}/{{ $product->feasured_image }}" id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
        <?php } ?>

        <?php
        if($product->galary_image_1){
        ?>
        <div> <img src="{{ url('/uploads') }}/{{ $product->folder }}/{{ $product->galary_image_1 }}" id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
        <?php } ?>
        <?php
        if($product->galary_image_2){
        ?>
        <div> <img src="{{ url('/uploads') }}/{{ $product->folder }}/{{ $product->galary_image_2 }}" id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
        <?php } ?>
        <?php
        if($product->galary_image_3){
        ?>
        <div> <img src="{{ url('/uploads') }}/{{ $product->folder }}/{{ $product->galary_image_3 }}" id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
        <?php } ?>
        <?php
        if($product->galary_image_4){
        ?>
        <div> <img src="{{ url('/uploads') }}/{{ $product->folder }}/{{ $product->galary_image_4 }}" id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
        <?php } ?>
        <?php
        if($product->galary_image_5){
        ?>
        <div> <img src="{{ url('/uploads') }}/{{ $product->folder }}/{{ $product->galary_image_5 }}" id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
        <?php } ?>


    </div>
     </div>
<!-- ===============product details ============ -->

    <div class="col-sm-12 col-md-6">
        <div style="-webkit-box-shadow: 0px 0px 7px 6px rgba(221,221,221,0.98);
    box-shadow: 0px 0px 7px 6px rgba(221,221,221,0.98);" class="product-dtails">
            <h2 class="text-center pt-3">{{ $product->product_title }}</h2>

        <div class="row">
            <div class="col-6 ps-3"><h4 class="font-weight-bold">Brand :</h4></div>
            <div class="col-6 text-end pe-5"><img src="{{asset('/images/ICON/vivo Mobile Official Logo 1.png')}}" class="img-fluid" /> </div>
        </div>

        <div class="row d-flex flex-row available-box justify-content-around">
            <div class="col-4">
                <p class="available-desktop-header">In Stock</p>
                <p class="available-desktop">Available</p>
            </div>
            <div class="col-4">
                <p class="available-desktop-header">EMI</p>
                <p class="available-desktop">Available</p>
            </div>
            <div class="col-4">
                <p class="available-desktop-header">Warranty</p>
                <p class="available-desktop">12 Months</p>
            </div>
        </div>



        <div class="row justify-content-center">
            <div class="col-12 d-flex mcolor flex-row">
                <h4 class="">Color:</h4>
                <div class="colorform d-flex">
                <div class="form-check">
                    <input class="form-check-input color-check" type="radio" style="background:#BDF3C9;" name="flexRadioDefault" id="flexRadioDefault1">
                </div>
                <div class="form-check">
                    <input class="form-check-input color-check" type="radio" style="background:#C8F6E8;" name="flexRadioDefault" id="flexRadioDefault1">
                </div>
                <div class="form-check">
                    <input class="form-check-input color-check" type="radio" style="background:#D9D9FF;" name="flexRadioDefault" id="flexRadioDefault1">
                </div>
                </div>
            </div>

        </div>



        <div class="row  justify-content-center mt-3">

            <div class="col-12">
                <div class="QuantitySection"><div class="Dcrement">-</div><span class="Quantity" id="quantity">1</span><div class="Increment">+</div></div>

            </div>
            <div class="row">
            <div class="col-6 col-md-6">

            <a href="" class="btn btn-success btn-sm add-to-cart" >ADD TO CART</a>

            </div>
            <div class="col-6 col-md-6">
            <a href="" class="btn btn-success btn-sm buy-now"  >BUY NOW</a>
            </div>
            </div>


        </div>


        <div class=" mcompare  d-flex flex-row justify-content-around mt-2">
            <a href="" class="btn btn-success btn-sm add-to-wishlished"   > <i class="fal fa-heart  me-2" style=""></i>Add to Wishlist</a>
            <a href="" class="btn btn-success btn-sm add-to-compare" > <img class="compareicon" src="{{asset('/images/ICON/Compare_Icon27.png')}}">    Compare</a>
        </div>

        <div class="d-flex shareto flex-row justify-content-center mt-3 ">
            <h4>Share to | </h4>
        <a class="solik"  href="http://"> <i class="fab fa-facebook-square  social-padding-of-single-product"></i></a>
            <a class="solik" style="color: #833AB4;" href="http://"  target="_blank" rel="noopener noreferrer"> <i class="fab fa-instagram  social-padding-of-single-product"></i></a>
            <a class="solik" style="color:#25D366;" href="http://"  target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp  social-padding-of-single-product"></i></a>
            <a class="solik" style="color:#2867B2;" href="http://"  target="_blank" rel="noopener noreferrer"> <i class="fab fa-linkedin  social-padding-of-single-product "></i></a>
        <a class="solik" style="color:#1DA1F2;" href="http://"  target="_blank" rel="noopener noreferrer"> <i class="fab fa-twitter  social-padding-of-single-product"></i></a>
        </div>
        </div>
    </div>
<!-- ===============product spacification ============ -->
        <div class="col-sm-12 col-md-12 mt-5">

        <ul class="nav nav-tabs ptab" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications" type="button" role="tab" aria-controls="Specifications" aria-selected="true">Specifications</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="profile" aria-selected="false">Details</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="waranty-policy-tab" data-bs-toggle="tab" data-bs-target="#waranty-policy" type="button" role="tab" aria-controls="contact" aria-selected="false">Waranty Policy</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="terms-tab" data-bs-toggle="tab" data-bs-target="#terms" type="button" role="tab" aria-controls="terms" aria-selected="false">Terms</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="riviews-tab" data-bs-toggle="tab" data-bs-target="#riviews" type="button" role="tab" aria-controls="contact" aria-selected="false">Riviews</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="specifications" role="tabpanel" aria-labelledby="home-tab">

                @if($product->product_specification)

                    <?php echo $product->product_specification;?>


                  @else
                <table class="table table-bordered">

                    <tbody>
                    @if(count($specifications) > 0)
                        @foreach($specifications as $key)
                            <tr>

                                <td>{{$key->value}}</td>

                            </tr>

                        @endforeach
                    @else
                        <tr>
                            <td colspan="2">There are no specificatios</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                    @endif


            </div>
            <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="profile-tab">


                @if($product->product_description)
                    <?php echo $product->product_description; ?>

                @else
                    <p>There are no description</p>
                @endif

            </div>
            <div class="tab-pane fade" id="waranty-policy" role="tabpanel" aria-labelledby="waranty-policy">

                @if($product->warranty_policy)
                    <?php echo $product->warranty_policy; ?>

                @else
                    <p>There are no warranty</p>
                @endif

            </div>
            <div class="tab-pane fade" id="terms" role="tabpanel" aria-labelledby="terms">

                @if($product->product_terms)
                    <?php echo $product->product_terms; ?>

                @else
                    <p>There are no terms</p>
                @endif
            </div>
            <div class="tab-pane fade" id="riviews" role="tabpanel" aria-labelledby="riviews">riviews</div>
        </div>

       
<!-- ===================ad box================== -->
    <div class="col-sm-12 col-md-12">
            <div class="row">
                @for($i=0;$i<4;$i++)
                    <div class="col-6 mb-6 mt-3">
                        <img src="{{asset('/images/ICON/Rectangle 1352.png')}}" class="img-fluid w-100" />
                    </div>
                @endfor
            </div>

        </div>
        </div>
    </div>
</div>






<script>
    $(document).on('click','.ProductSubImage',function(){
        var srcAttr=$(this).attr("src");
        $("#MainImgClass").attr("src",srcAttr);
    })
    $('.product-carusal').slick({
  slidesToShow: 4,
  slidesToScroll: 4
});

var filtered = false;

$('.js-filter').on('click', function(){
  if (filtered === false) {
    $('.product-carusal').slick('slickFilter',':even');
    $(this).text('Unfilter Slides');
    filtered = true;
  } else {
    $('.product-carusal').slick('slickUnfilter');
    $(this).text('Filter Slides');
    filtered = false;
  }
});

</script>