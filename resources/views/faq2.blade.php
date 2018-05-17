@extends('layouts.master')

@section('extra-css')

    <style>
        .delBtn{
            /*-webkit-appearance: none;*/
            padding-top: 0rem;
            padding-right: 0rem;
            padding-bottom: 0rem;
            padding-left: 0rem;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <br>
        <div class="row">

            <div class="col-md-9">
                <br><br>
                <h2>
                    Just Unite
                    <small class="text-primary"><span class="badge badge-warning"> Frequently Asked Questions</span></small>
                    @can('manage_site')
                        <a href="{{url('faqs/create')}}" role="button" class="btn btn-sm btn-outline-success">Create</a>
                    @endcan

                </h2>
                <hr><br>

                {{--<h3 class="ml-2 mb-3">General Questions</h3>--}}

                <div class="accordion" id="accordion">

                    @foreach($tags as $tag)
                        <h3 class="ml-2 mb-3">{{$tag->name}}</h3>

                        @foreach($tag->faqs as $faq)
                            <div class="card mt-2">
                                <div class="card-header" id="heading{{$faq->id}}">
                                    <a href="#" role="button" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                                        <b class="text-primary">{{$faq->question}}</b>
                                    </a>
                                    <div class="pull-right form-inline">

                                        <a href="#" role="button" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                                            <i class="fa fa-{{$faq->icon}} text-{{$faq->color}} mt-1" aria-hidden="true"> </i>
                                        </a>

                                        @can('manage_site')
                                            {{'    |    '}}
                                            <a href="{{url('faqs/'.$faq->id.'/edit')}}" role="button">
                                                <i class="fa fa-pencil-square-o text-primary mt-1" aria-hidden="true"> </i>
                                            </a>
                                            {{'|'}}
                                            {{--<a href="{{url('faqs/'.$faq->id.'/delete')}}" role="button">
                                                <i class="fa fa-trash text-danger mt-1" aria-hidden="true"> </i>
                                            </a>--}}
                                            <form method="POST" action="{{url('faqs/'.$faq->id)}}" onsubmit="return ConfirmDelete()">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-link delBtn"><i class="fa fa-trash text-danger mt-1" aria-hidden="true"></i></button>
                                            </form>
                                        @endcan

                                    </div>
                                </div>

                                <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="heading{{$faq->id}}" data-parent="#accordion">
                                    <div class="card-body">
                                        {{$faq->answer}}

                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <br><br>

                    @endforeach


                    {{--New Collapse Entity--}}
                    {{--<div class="card mt-2">
                        <div class="card-header" id="headingOne">
                            <a href="#" role="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <b class="text-primary">Collapsible Group Item Anim pariatur cliche #1</b>
                            </a>
                            <a href="#" role="button" class="pull-right" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-recycle text-warning mt-1" aria-hidden="true"> </i>
                            </a>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>--}}


                    {{--New Collapse Entity--}}
                    {{--<div class="card mt-2">
                        <div class="card-header" id="headingTwo">
                            <a href="#" role="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <b class="text-primary">Collapsible Group Item Anim pariatur cliche #1</b>
                            </a>
                            <a href="#" role="button" class="pull-right" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <i class="fa fa-recycle text-warning mt-1" aria-hidden="true"> </i>
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>--}}

                    {{--New Collapse Entity--}}
                    {{--<div class="card mt-2">
                        <div class="card-header" id="headingThree">
                            <a href="#" role="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                <b class="text-primary">Collapsible Group Item Anim pariatur cliche #1</b>
                            </a>
                            <a href="#" role="button" class="pull-right" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                <i class="fa fa-recycle text-warning mt-1" aria-hidden="true"> </i>
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>--}}



                </div>

            </div>
            @include('layouts.partials.sidemenu')
        </div>
        <br>
        <br>
    </div>
@endsection

@section('extra-js')
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <script>
        function ConfirmDelete(){

            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>

    <script>
        function confirmKnow(){

            var x = confirm("Do you know this person?");
            if (x)
                return true;
            else
                return false;
        }
    </script>

    <script src="{{asset('js/initial.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.demo').initial({
                name: 'Name', // Name of the user
                charCount: 1, // Number of characherts to be shown in the picture.
                textColor: '#ffffff', // Color of the text
                seed: 1, // randomize background color
                height: 100,
                width: 100,
                fontSize: 70,
                fontWeight: 500,
                fontFamily: 'HelveticaNeue-Light,Helvetica Neue Light,Helvetica Neue,Helvetica, Arial,Lucida Grande, sans-serif',
                radius: 50,
            });
        })
    </script>

    <script type="text/javascript">

        $('.self-profile').on('click', function () {
            $.alert({
                title: 'Self Profile!',
                content: 'You can\'t like your profile!',
                type: 'red'
            });
        });
    </script>

    <script>
        jQuery(document).ready(function(){
            jQuery('#ajaxLike').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({

                    beforeSend: function(){
                        /*if(confirm("Are you sure you want to submit the value ?"))
                            return true;
                        else
                            return false;*/
                        jQuery.confirm({
                            title: 'Congratulations!',
                            content: 'Are you sure?',
                            type: 'green',
                            buttons: {
                                omg: {
                                    text: 'Thank you!',
                                    btnClass: 'btn-green'
                                },
                                close: function () {
                                }
                            }
                        });


                    },
                    url: "{{ url('/users/like') }}",
                    method: 'post',
                    data: {
                        userid: jQuery('#userId').val()
                    },
                    /*success: function(result){
                        console.log(result);
                    }});*/
                    success: function(result){
                        /*jQuery('#ajaxAlert').html(
                            "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n" +
                            result.message
                        );
                        jQuery('#ajaxAlert').show();*/
                        jQuery('#likeCount').text(result.kbc);
                        //jQuery('#ajaxLike').replaceWith("<button class=\"btn btn-info\" id=\"ajaxLike\" disabled=\"disabled\"><i class=\"fa fa-thumbs-up\" style=\"font-size:16px\"></i> You Liked</button>");
                        jQuery('#ajaxLike').replaceWith('<button class="btn btn-info" id="ajaxLike" disabled="disabled"><i class="fa fa-thumbs-up" style="font-size:16px"></i> You Liked</button>');

                        jQuery.confirm({
                            title: 'Congratulations!',
                            content: result.message,
                            type: 'green',
                            buttons: {
                                omg: {
                                    text: 'Thank you!',
                                    btnClass: 'btn-green'
                                },
                                close: function () {
                                }
                            }
                        });

                    }
                });
            });
        });
    </script>
@endsection
