@extends('shopify-app::layouts.default')

@section('content')
   
<h1>Customers</h1>
@endsection

@section('scripts')
    @parent
    
    <script type="text/javascript">
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection