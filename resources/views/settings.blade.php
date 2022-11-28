@extends('shopify-app::layouts.default')

@section('content')
<?php
 $scripts = $shop_script_tag_api->script_tags;  
?>

@include('progressbar.progressListTable')
  
{{-- <div class="flex">
    
   <form method="GET" action="{{ url('delete/apidata') }}">
    @csrf
    <button type="submit" class="p-4 bg-red-800 text-blue-100">Remove Progress bar in Cart</button>
   </form>
</div> --}}


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