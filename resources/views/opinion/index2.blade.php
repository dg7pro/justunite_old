<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">

    <style>
        /*.wrapper > ul#results li {
            margin-bottom: 1px;
            background: #f9f9f9;
            padding: 20px;
            list-style: none;
        }*/
        .ajax-loading{
            text-align: center;
        }
    </style>

</head>
<body>

<div class="container">
    <br><br>
    <div class="row">
        <div class="col-md-9">

            {{--<div class="wrapper">
                <ul id="results"><!-- results appear here --></ul>
                <div class="ajax-loading"><img src="{{ asset('images/loading.gif') }}" /></div>
            </div>--}}


            <div id="results">


            </div>
            <div class="ajax-loading"><img src="{{ asset('images/loading.gif') }}" /></div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>






        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    var page = 1; //track user scroll as page number, right now page number is 1
    load_more(page); //initial content load
    $(window).scroll(function() { //detect page scroll
        if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
            page++; //page number increment
            load_more(page); //load content
        }
    });
    function load_more(page){
        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                datatype: "html",
                beforeSend: function()
                {
                    $('.ajax-loading').show();
                }
            })
            .done(function(data)
            {
                if(data.length == 0){
                    console.log(data.length);

                    //notify user if nothing to load
                    $('.ajax-loading').html("No more records!");
                    return;
                }
                $('.ajax-loading').hide(); //hide loading animation once data is received
                $("#results").append(data); //append data into #results element
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('No response from server');
            });
    }
</script>

</body>
</html>