@extends('layouts.main')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <form action="" method="post">
            {{ csrf_field() }}
            <h2>Add Product Name</h2>
        <div class="form-group {{ $errors->has('product_name') ? 'has-error': ''}}">
                <label for="product_name" class="control-label">Product Name </label>
            <input type="text" name="product_name" id="product_name" class="form-control" value="">
            @if ($errors->has('product_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('product_name') }}</strong>
                </span>
            @endif
            </div>

            <div class="form-group {{ $errors->has('quantity') ? 'has-error': ''}}">
            <label for="quantity" class="control-label" >Quantity in stock</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="">
                @if ($errors->has('quantity'))
                    <span class="help-block">
                        <strong>{{ $errors->first('quantity') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('price') ? 'has-error': ''}}">
                <label for="price" class="control-label" >Price</label>
                        <input type="text" name="price" id="price" class="form-control" value="">
                    @if ($errors->has('price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                </div>

                


            <input type="hidden" name="store_product" id="store_product" value="{{route('store')}}">

            <button  type="submit" class="btn btn-primary pull-right product-submitted">Add Product</button>

            <p><strong>Product Name:</strong> <span id="result_name"></span> </p>
            <p><strong>Quantity in stock:</strong> <span id="result_quantity"></span> </p>
            <p><strong>Price per item:</strong> <span id="result_price"></span> </p>
            <p><strong>Datetime submitted:</strong> <span id="result_date"></span> </p>
            <p><strong>Total value number.:</strong> <span id="result_total"></span> </p>
        </form>

    </div>
    </div>
@endsection

@section('scripts')


<script>
$.ajaxSetup({

headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

 $(".product-submitted").click(function(e){

e.preventDefault();



var product_name = $("input[name=product_name]").val();

var quantity = $("input[name=quantity]").val();

var price = $("input[name=price]").val();


var store = $("#store_product").val();
$.ajax({

   type:'POST',

   url: store,

   data:{product_name:product_name, quantity:quantity, price:price},

   success:function(data){
    
    $("#result_name").text(data.name);
    $("#result_price").text(data.price);
    $("#result_date").text(data.date);
    $("#result_quantity").text(data.quantity);
    $("#result_total").text(data.total);
    
       
   }

});



});



</script>

@endsection