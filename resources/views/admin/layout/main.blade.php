<!DOCTYPE html>
<html lang="zxx">

@include('admin.partials.head')

@yield('css')

<script>
    const XCSRF_Token = "{{ csrf_token() }}";
</script>

<style>
    .submit-fix {
        bottom: 150px;
        right: 0;
        z-index: 1030;
        position: fixed;
    }
</style>

<body>
    <!-- Left sidebar -->
    @include('admin.partials.left-sidebar')

    <!-- Header Section Start -->
    @include('admin.partials.header')
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">

        @yield('content')

        <!--<< Footer Section Start >>-->
        @include('admin.partials.footer')

    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
    <!--<< Footer Section Start >>-->
    @include('admin.partials.theme-customizer')
    <!--<< All JS Plugins >>-->
    @include('admin.partials.homepage-script')

    <div class="modal fade" tabindex="-1" id="taskinfo" aria-labelledby="taskinfoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Comments</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body informationbox">
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" onload="this.rel='stylesheet'" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('script')

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    @if(session()->has('success_msg'))
        <script> toastr.success(@json(session()->get('success_msg'))); </script>
    @endif
    @if(session()->has('error_msg'))
        <script> toastr.error(@json(session()->get('error_msg'))); </script>
    @endif

</body>

</html>