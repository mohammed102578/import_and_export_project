@extends('layouts.app')
@section('title')
    @lang('site.requests')
@endsection
@section('style')
<style>

</style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <nav class="breadcrumb-two" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('requests.index',$category_id)}}">@lang('site.requests')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('requests.create',$category_id) }}">
                    @lang('site.add')
                </a>
            </div>
        </div>
    </div>


    @include('flash::message')

    <div class="clearfix"></div>


    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing layout-top-spacing">
        <div class="widget-content widget-content-area ">
            @include('requests.table')


        </div>

    </div>

@endsection

@section('scripts')
    @include('inc.datatables_js')
    <script>
        function setHeight() {
           $('table').css('min-height','400px')
        }
        function addEvent(id,type,val,label){
            const toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                padding: '2em'
            });
            text=$('#'+type+'-'+id).text()
            console.log(text);
            $('table').css('min-height','auto')
            if(text=='') {

                    swal.mixin({

                        html:
                            '<select id="swal-input1" class="swal2-input" style="padding: 0;">'+
                               '<option value="0">{{__('site.not_agree')}}</option>'+
                               '<option value="1">{{__('site.agree')}}</option>'+
                               '<option value="2">{{__('site.not_competent')}}</option>'+
                            '</select>' +
                            '<input id="swal-input2" class="swal2-input" placeholder="{{__('site.note')}}">',
                        confirmButtonText: 'OK',
                        showLoaderOnConfirm: true,
                        showCancelButton: true,
                        padding: '2em',
                        preConfirm: () => {
                        return [
                          document.getElementById('swal-input1').value,
                          document.getElementById('swal-input2').value
                        ]
                      }
                    }).queue(
                        [
                            {

                                title: '{{__('site.create')}}(' + label + ')',
                                text: '{{__('site.name')}}'
                            },
                        ]).then(function (result) {

                        if (result.value[0] != '') {



                            $.ajax({
                                type: 'post',
                                url: "{{route('addManger')}}",
                                data: {
                                    'id': id,
                                    'type': type,
                                    'name': result.value[0][0],
                                    'note': result.value[0][1],
                                    _token: '{{csrf_token()}}'
                                },
                                success: function (data) {

                                    if (data.msg == 'add') {
                                        if(result.value[0][0] == 0){
                                            $('#'+type+'-'+id).text('{{__('site.not_agree')}}');
                                        }else if(result.value[0][0] == 1){
                                            $('#'+type+'-'+id).text('{{__('site.agree')}}');
                                        
                                    }else {
                                            $('#'+type+'-'+id).text('{{__('site.not_competent')}}');
                                        }


                                        toast({
                                            type: 'success',
                                            title: '{{__('site.Operation Done successfully')}}',
                                            padding: '2em',
                                        })
                                    } else {
                                        toast({
                                            type: 'error',
                                            title: '{{__('site.an Error Occur')}}',
                                            padding: '2em',
                                        })
                                    }
                                }, error: function (reject) {
                                }
                            });
                            // break;
                            return false
                        }else{
                            toast({
                                type: 'error',
                                title: '{{__('site.Name Field Required')}}',
                                padding: '2em',
                            })
                            div.prop('checked', false);
                            div.val(0);


                        }

                    })
                    // continue start

                // }
            }else{

                swal({
                    title: '{{__('site.Are you sure?')}}',
                    text: "{{__('site.You wont be able to revert this!')}}",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '{{__('site.delete')}}',
                    padding: '2em'
                }).then(function(result) {
                    if (result.value) {

                        $.ajax({
                    type: 'post',
                    url: "{{route('addManger')}}",
                    data: {
                        'id': id,
                        'type': type,
                        _token: '{{csrf_token()}}'
                    },
                            success: function (data) {
                                const toast = swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 4000,
                                    padding: '2em'
                                });
                                if (data.msg == 'add') {
                                    $('#'+type+'-'+id).text('')

                                    toast({
                                        type: 'success',
                                        title: '{{__('site.Operation Done successfully')}}',
                                        padding: '2em',
                                    })
                                } else {
                                    toast({
                                        type: 'error',
                                        title: '{{__('site.an Error Occur')}}',
                                        padding: '2em',
                                    })
                                    div.prop('checked', true);
                                    div.val(1);

                                }
                            }, error: function (reject) {
                    }
                });
                    }
                })
            }


        }


    </script>
@endsection
