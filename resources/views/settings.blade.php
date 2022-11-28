@extends('shopify-app::layouts.default')

@section('content')
<?php
 $scripts = $shop_script_tag_api->script_tags; 
 $max = $ma;
 $min = $mi;
?>

@include('progressbar.progressListTable')



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
            title: 'Settings',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
    </script>
@endsection