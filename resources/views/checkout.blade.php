@extends('layout')

@section('title', 'Checkout')

@section('content')
 <div class="container clearfix">
       @if(session('error'))
           <div class="alert alert-danger">
               {{ session('error') }}
           </div>
       @endif
       <h2 class="title-page">Checkout</h2>
    </div>
    <div class="container">
        <!-- <a href="{{ route('cart') }}">Back to cart</a> -->
        <form action="{{ route('checkout.place.order') }}" method="POST" role="form">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8">
                    <!-- <div class="card"> -->
                        <header class="card-header">
                            <h4 class="card-title mt-2">Shipping Details</h4>
                        </header>
                            <div class="form-group">
                                <label >Email Address</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Shipping Address1</label>
                                <input type="text" class="form-control" name="shopping_address1">
                            </div>
                            <div class="form-group">
                                <label>Shipping Address2</label>
                                <input type="text" class="form-control" name="shopping_address2">
                            </div>
                            <div class="form-group">
                                <label>Shipping Address3</label>
                                <input type="text" class="form-control" name="shopping_address3">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" name="city">
                            </div>
                            <div class="form-group">
                                <label>Country Code</label>
                                <input type="text" class="form-control" name="country_code">
                            </div>
                            <div class="form-group">
                                <label>Post Code</label>
                                <input type="text" class="form-control" name="zip_postal_code">
                            </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')


    <script type="text/javascript">

        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var quantity = parent_row.find(".quantity").val();

            var product_subtotal = parent_row.find("span.product-subtotal");

            var cart_total = $(".cart-total");

            var loading = parent_row.find(".btn-loading");

            loading.show();

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity},
                dataType: "json",
                success: function (response) {

                    loading.hide();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                    $("#header-bar").html(response.data);

                    product_subtotal.text(response.subTotal);

                    cart_total.text(response.total);
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var cart_total = $(".cart-total");

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    dataType: "json",
                    success: function (response) {

                        parent_row.remove();

                        $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                        $("#header-bar").html(response.data);

                        cart_total.text(response.total);
                    }
                });
            }
        });

    </script>

@endsection
