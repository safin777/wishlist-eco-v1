<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
        <link rel="shortcut icon" href="" type="image/x-icon">  
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
         <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
        <title>{{ \Osiset\ShopifyApp\Util::getShopifyConfig('app_name') }}</title>
        @vite('resources/css/app.css')
        <script src="https://unpkg.com/turbolinks"></script>
        @yield('styles')
    </head>

    <body class="bg-gray-100 app-wrapper">
       @include('partial.nav')
       <div class="h-screen flex flex-row flex-wrap app-content">
         @include('partial.sidebar')
         <div class="bg-gray-100 flex-1 p-6 md:mt-16"> 
           @yield('content')
         </div>
        @if(\Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_enabled') && \Osiset\ShopifyApp\Util::useNativeAppBridge())
            <script src="https://unpkg.com/@shopify/app-bridge{{ \Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
            <script src="https://unpkg.com/@shopify/app-bridge-utils{{ \Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
            <script
                @if(\Osiset\ShopifyApp\Util::getShopifyConfig('turbo_enabled'))
                    data-turbolinks-eval="false"
                @endif
            >
                var AppBridge = window['app-bridge'];
                var actions = AppBridge.actions;
                var utils = window['app-bridge-utils'];
                var createApp = AppBridge.default;
                var app = createApp({
                    apiKey: "{{ \Osiset\ShopifyApp\Util::getShopifyConfig('api_key', $shopDomain ?? Auth::user()->name ) }}",
                    shopOrigin: "{{ $shopDomain ?? Auth::user()->name }}",
                    host: "{{ \Request::get('host') }}",
                    forceRedirect: true,
                });
            </script>

            @include('shopify-app::partials.token_handler')
            @include('shopify-app::partials.flash_messages')
        @endif
       </div>
        @yield('scripts')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script type="text/javascript">
        
        </script>
        
<!-- end script -->
  </body>
</html>
