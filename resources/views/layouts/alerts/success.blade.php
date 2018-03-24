@if (Session::has('message'))
    <div class="alert alert-primary">{{ Session::get('message') }}
        <a href="#" class="close" data-dismiss="alert">&times;</a></div>
@endif