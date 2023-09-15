@extends('layouts.app')

@section('style')
    <style>
        .red {
            font-size: 150%;
            border: red solid 3px;
            color: red;
        }
        .download_button {
            margin: 20px;
            text-decoration: none;
            display: block;
            width: 320px;
            height: 110px;
            padding: 1px;
            border: 1px solid #8ebd17;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            color: #2a3807;
            text-shadow: 0 0 15px #7da616;
            font-size: 16px;
        }

        .download_button .filename {
            font-size: 32px;
            margin: 10px 20px 0;
        }

        .download_button .filesize {
            margin: 10px 20px 0;
        }

        .download_button .downloads {
            margin: 5px 20px 0;
        }

        .download_button .downloadicon {
            position: relative;
            float: right;
            margin: 10px;
            width: 140px;
            height: 90px;
        }

        @-webkit-keyframes movedown {
            0% {
                -webkit-transform: translateY(-1.5em);
                opacity: 0;
            }
            50% {
                -webkit-transform: translateY(0);
                opacity: 1;
            }
            100% {
                -webkit-transform: translateY(1.5em);
                opacity: 0;
            }
        }

        @-moz-keyframes movedown {
            0% {
                transform: translateY(-1.5em);
                opacity: 0;
            }
            50% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(1.5em);
                opacity: 0;
            }
        }

        @-o-keyframes movedown {
            0% {
                -o-transform: translateY(-1.5em);
                opacity: 0;
            }
            50% {
                -o-transform: translateY(0);
                opacity: 1;
            }
            100% {
                -o-transform: translateY(1.5em);
                opacity: 0;
            }
        }

        @keyframes movedown {
            0% {
                transform: translateY(-1.5em);
                opacity: 0;
            }
            50% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(1.5em);
                opacity: 0;
            }
        }

        .download_button .cloud {
            width: 140px;
            height: 50px;
            background-color: #fff;
            border-radius: 30px;
            position: absolute;
            top: 40px;
        }

        .download_button .cloud:before {
            content: "";
            display: block;
            width: 50px;
            height: 50px;
            top: -30px;
            left: 70px;
            background-color: #fff;
            border-radius: 50%;
            position: absolute;
            box-shadow: -40px 0 0 10px #fff;
        }

        .download_button .cloud .arrowdown {
            background: #aedb3d;
            position: absolute;
            top: -10px;
            left: 60px;
            width: 10px;
            height: 40px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;

            -webkit-animation: movedown 2s infinite linear;
            -moz-animation: movedown 2s infinite linear;
            -o-animation: movedown 2s infinite linear;
            animation: movedown 2s infinite linear;
        }

        .download_button .cloud .arrowdown:before,
        .download_button .cloud .arrowdown:after {
            top: 14px;
            content: "";
            position: absolute;
            background: #aedb3d;
            position: absolute;
            width: 10px;
            height: 25px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .download_button .cloud .arrowdown:before {
            -webkit-transform: rotate(45deg);
            -webkit-transform-origin: 70% 90%;
        }

        .download_button .cloud .arrowdown:after {
            -webkit-transform: rotate(-45deg);
            -webkit-transform-origin: 30% 90%;
        }

        .download_button {

            background: #aedb3d; /* Old browsers */
            background: -moz-linear-gradient(top, #aedb3d 0%, #9fcb31 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #aedb3d), color-stop(100%, #9fcb31)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, #aedb3d 0%, #9fcb31 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top, #aedb3d 0%, #9fcb31 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top, #aedb3d 0%, #9fcb31 100%); /* IE10+ */
            background: linear-gradient(to bottom, #aedb3d 0%, #9fcb31 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#aedb3d', endColorstr='#9fcb31', GradientType=0); /* IE6-9 */


        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('suppliers.index')}}">@lang('site.suppliers')</a></li>
                        <li class="breadcrumb-item "><a href="{{route('suppliers.create')}}">@lang('site.add')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('suppliers.index') }}">
                    @lang('site.supplier')
                </a>
            </div>
        </div>
    </div>


    <div class="content px-3 layout-top-spacing">

{{--        @include('adminlte-templates::common.errors')--}}

        <div class="card" style="width: 100%;display: block">

            {!! Form::open(['route' => 'suppliers.store', 'files' => true,'class' =>"needs-validation " ,'novalidate']) !!}

            <div class="card-body">

                <div class="row">
                    @include('suppliers.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('suppliers.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@section('scripts')
    @include('inc.file')

    <script>
        var myFile = "";



        $('#file').on('change', function () {

            myFile = $("#file").val();
            // console.log(myFile);
            var upld = myFile.split('.').pop();
            if (upld != 'pdf' && upld!= '' ) {
                $('#mySecondImage').addClass("red");
                $('#show').show()

                swal({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Only allowed PDF File for material",
                    timer: 2000,
                    onOpen: function () {
                        swal.showLoading()
                    }
                }).then(function (result) {
                    if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.timer
                    ) {
                        $("html, body").animate({ scrollTop: 100 }, 1000);

                    }

                })


            }

        })
        $('#submit').on('click', function () {

            myFile = $("#file").val();
            // console.log(myFile);
            var upld = myFile.split('.').pop();
            if (upld != 'pdf' && upld!= '' ) {
                $('#mySecondImage').addClass("red");
                $('#show').show()
                $('#form').submit(function (evt) {
                    evt.preventDefault();
                });
                swal({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Only allowed PDF File for material",
                    timer: 2000,
                    onOpen: function () {
                        swal.showLoading()
                    }
                }).then(function (result) {
                    if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.timer
                    ) {
                        $("html, body").animate({ scrollTop: 100 }, 1000);

                    }

                })


            }

        })
        var f2 = flatpickr(document.getElementById('StartTime'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
        var f3 = flatpickr(document.getElementById('EndTime'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        $(document).ready(function () {
            $('.selectall').click(function () {
                if ($(this).is(':checked')) {
                    $('div input').attr('checked', true);
                } else {
                    $('div input').attr('checked', false);
                }
            });
        });
    </script>
@endsection
