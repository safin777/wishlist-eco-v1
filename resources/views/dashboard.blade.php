@extends('shopify-app::layouts.default')

@section('content')
<?php
 $products = $count_products->count();
?>
 
 @include('index.report')

 
   
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
            title: 'Dashboard',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
        
        
        
    </script>
@endsection