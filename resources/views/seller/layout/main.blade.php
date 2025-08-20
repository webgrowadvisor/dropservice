<!DOCTYPE html>
<html lang="zxx">

@include('seller.partials.head')

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
    @include('seller.partials.left-sidebar')

    <!-- Header Section Start -->
    @include('seller.partials.header')
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">

        @yield('content')

        <!--<< Footer Section Start >>-->
        @include('seller.partials.footer')

    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
    <!--<< Footer Section Start >>-->
    @include('seller.partials.theme-customizer')
    <!--<< All JS Plugins >>-->
    @include('seller.partials.homepage-script')

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

    {{-- <script>
        function searchData() {
            let query = document.getElementById("search").value;

            if (query.length > 1) {
                fetch("{{ route('search') }}?query=" + query)
                    .then(response => response.json())
                    .then(data => {
                        let searchResults = document.querySelector(".search-items-wrapper");
                        searchResults.innerHTML = "";

                        // 1️⃣ Show Leads (CRM projects, etc.)
                        if (data.leads.length > 0) {
                            searchResults.innerHTML += `
                                <div class="recent-result px-4 py-2">
                                    <p class="fs-11 fw-medium text-muted">I'm searching for...</p>
                            `;
                            data.leads.forEach(lead => {
                                searchResults.innerHTML += `
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text rounded">
                                                <i class="feather-airplay"></i>
                                            </div>
                                            <div>
                                                <a href="{{ route('leads_view', '') }}/${lead.id}" class="font-body fw-bold 
                                                d-block mb-1">${lead.full_name}</a>
                                                <p class="fs-11 text-muted mb-0">${lead.email}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="{{ route('leads_view', '') }}/${lead.id}" class="badge border rounded text-dark">/<i class="feather-command ms-1 fs-10"></i></a>
                                        </div>
                                    </div>
                                `;
                            });
                            searchResults.innerHTML += `</div><div class="dropdown-divider my-3"></div>`;
                        }

                        // 2️⃣ Show Users
                        if (data.users.length > 0) {
                            searchResults.innerHTML += `
                                <div class="users-result px-4 py-2">
                                    <h4 class="fs-13 fw-normal text-gray-600 mb-3">Users <span class="badge small bg-gray-200 rounded ms-1 text-dark">${data.users.length}</span></h4>
                            `;
                            data.users.forEach(user => {
                                searchResults.innerHTML += `
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text rounded">
                                                <i class="feather-airplay"></i>
                                            </div>                                            
                                            <div>
                                                <a href="{{ route('user_view', '') }}/${user.id}" class="font-body fw-bold 
                                                d-block mb-1">${user.name}</a>
                                                <p class="fs-11 text-muted mb-0">${user.email}</p>
                                            </div>
                                        </div>
                                        <a href="{{ route('user_view', '') }}/${user.id}" class="avatar-text avatar-md">
                                            <i class="feather-chevron-right"></i>
                                        </a>
                                    </div>
                                `;
                            });
                            searchResults.innerHTML += `</div>`;
                        }

                        // 3️⃣ "Load More" Button
                        searchResults.innerHTML += `
                            <div class="dropdown-divider mt-3 mb-0"></div>
                            <a href="{{ route('leads') }}" class="p-3 fs-10 fw-bold text-uppercase text-center d-block">Load More</a>
                        `;
                    })
                    .catch(error => console.error("Error fetching search data:", error));
            }
        }    
    </script> --}}

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