@if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}
        <a href="#" class="close" data-dismiss="alert">&times;</a></div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}
        <a href="#" class="close" data-dismiss="alert">&times;</a></div>
@endif
@if (Session::has('warning'))
    <div class="alert alert-warning">{{ Session::get('warning') }}
        <a href="#" class="close" data-dismiss="alert">&times;</a></div>
@endif
@if (Session::has('message'))
    <div class="alert alert-primary">{{ Session::get('message') }}
        <a href="#" class="close" data-dismiss="alert">&times;</a></div>
@endif
@if (Session::has('info'))
    <div class="alert alert-info">{{ Session::get('info') }}
        <a href="#" class="close" data-dismiss="alert">&times;</a></div>
@endif