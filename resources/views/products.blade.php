@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
<?php
 $products = $shop_product->products;  

?>
<div>
        @include('products.product_table')
</div>

@endsection

@section('scripts')
    @parent
    
    <!-- <script type="text/javascript">
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script> -->

    <script type="text/javascript">
        var AppBridge = window['app-bridge'];
        var actions = AppBridge.actions;
        var TitleBar = actions.TitleBar;
        var Button = actions.Button;
        var Redirect = actions.Redirect;
        var titleBarOptions = {
            title: 'Products',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
    </script>
@endsection