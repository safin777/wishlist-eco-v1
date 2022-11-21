@extends('shopify-app::layouts.default')

@section('content')
 @include('index.report')
 <div x-data="{ show: false }">
    <button @click="show = !show">Show</button>
    <h1 x-show="show">Hello Alpine.js</h1>
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
            title: 'Dashboard',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
    </script>
@endsection