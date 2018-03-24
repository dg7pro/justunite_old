<html lang="en">
<head>
    <title>Laravel - jquery ajax crop image before upload using croppie plugins</title>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.5.0/croppie.min.js"></script>--}}
    {{-- <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
     <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">--}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.5.0/croppie.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


<body>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Laravel crop image before upload using croppie plugins</div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-12 text-center">
                    <div id="upload-demo"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="padding-top:30px;">
                    <strong>Select Image:</strong>
                    <br/>
                    <input type="file" id="upload" name="image">
                    <br/>
                    <button class="btn btn-success upload-result">Upload Image</button>
                </div>


                <div class="col-md-8" style="">
                    <div id="upload-demo-i" style="background:#e1e1e1;width:612px;padding:30px;height:256px;margin-top:30px"></div>
                </div>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 612,
            height: 256,
            type: 'square'
        },
        boundary: {
            width: 1024,
            height: 512
        }
    });

    $('#upload').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
            $.ajax({
                url: "slider-image-crop",
                type: "POST",
                data: {"image":resp},
                success: function (data) {
                    html = '<img src="' + resp + '" />';
                    $("#upload-demo-i").html(html);
                }
            });
        });
    });

</script>

</body>
</html>