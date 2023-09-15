
<script src="{{ $url}}{{app()->getLocale()}}/plugins/sweetalerts/sweetalert2.min.js"></script>
<script src="{{ $url}}{{app()->getLocale()}}/plugins/sweetalerts/custom-sweetalert.js"></script>
@if (session('success'))


        <script>
            Swal.fire(
                        " {{ session('success') }}",
                        '',
                        'success'
            )

        </script>


        @endif
@if (session('error'))
    <script>
        Swal.fire(
            {
                icon: 'error',
                title: 'Oops...',
                text: '@lang('site.not_found')',
                type: 'question',
                padding: '2em'
            }
                {{--" {{ session('success') }}",--}}
                {{--'',--}}
                {{--'success'--}}
        )
        //     Swal.fire({
        //         title: 'Custom width, padding, background.',
        //         width: 600,
        //         padding: '3em',
        //         background: '#fff url(https://sweetalert2.github.io/images/trees.png)',
        //         backdrop: `
        // rgba(0,0,123,0.4)
        // url("https://sweetalert2.github.io/images/nyan-cat.gif")
        // left top
        // no-repeat

        //   rgba(0,0,123,0.4)
        //   url("/images/nyan-cat.gif")
        //   left top
        //   no-repeat
        // `
        //       })
        {{--new Noty({--}}
        {{--    type: 'success',--}}
        {{--    layout: 'topRight',--}}
        {{--    text: "{{ session('success') }}",--}}
        {{--    timeout: 4000,--}}
        {{--    killer: true--}}
        {{--}).show();--}}
    </script>

@endif
