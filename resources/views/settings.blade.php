@extends('shopify-app::layouts.default')

@section('content')
  
<div>
    <form method="GET" action="{{ url('submit/apidata') }}">
        @csrf
    <button type="submit" class="p-4 bg-gray-800 text-blue-100">Add Progress bar in Cart</a>
   </form>
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
            title: 'Settings',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
    </script>
@endsection