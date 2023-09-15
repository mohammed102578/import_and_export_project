@extends('layouts.app')

@section('style')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('contractors.index')}}">@lang('site.contractors')</a></li>
                        <li class="breadcrumb-item "><a href="{{route('contractors.create')}}">@lang('site.add')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('contractors.index') }}">
                    @lang('site.contractor')
                </a>
            </div>
        </div>
    </div>


    <div class="content px-3 layout-top-spacing">

{{--        @include('adminlte-templates::common.errors')--}}

        <div class="card" style="width: 100%;display: block">

            {!! Form::open(['route' => 'contractors.store', 'files' => true,'class' =>"needs-validation " ,'novalidate']) !!}

            <div class="card-body">

                <div class="row">
                    @include('contractors.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('contractors.index') }}" class="btn btn-default">Cancel</a>
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
