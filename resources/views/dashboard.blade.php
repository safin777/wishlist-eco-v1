@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
<h1>Dashboard</h1>
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection