@if ($errors->any())
    <div class="alert alert-danger">
        @if(sizeof($errors->all() )>0)
        @foreach ($errors->all() as $error)
            <script>

                    const toast = swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                        padding: '2em'
                    });
                    toast({
                        type: 'error',
                        title: '{{$error}}',
                        padding: '2em',
                    })
            </script>

        @endforeach
            @endif
    </div>
@endif

