<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Challenge App - @yield('title')</title>

    <!-- CSS files -->
    <link href="{{ asset('assets/css/tabler.min.css?1674944402') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/tabler-flags.min.css?1674944402') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/tabler-payments.min.css?1674944402') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/tabler-vendors.min.css?1674944402') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/demo.min.css?1674944402') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/icons-webfont/tabler-icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}">

  </head>
  <body class=" layout-fluid">
    <script src="{{ asset('assets/js/demo-theme.min.js?1674944402') }}"></script>
    <div class="page">

        <!-- HEADER -->
        @include('layouts.header') 

        <div class="page-wrapper">

            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Overview
                            </div>
                            <h2 class="page-title">
                                @yield('title')
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-body">
                    <div class="container-xl">
                        @yield('content')
                    </div>
            </div>
            

            <!-- FOOTER -->
            @include('layouts.footer') 

        </div>

    </div>

    <!-- Tabler Core -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/tabler.min.js?1674944402') }}" defer></script>
    <script src="{{ asset('assets/js/demo.min.js?1674944402') }}" defer></script>
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script>
        $( document ).ready(function() {
            
            getPage()
            
            function getPage() {
                var page = $('#info-page').data('page')
                $('#nav-'+page).addClass('active')
            }

            $(".del-nasabah").click(function(){
                let id = $(this).data('id');
                let token   = $("#token").data("token");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({

                            url: `/nasabah/${id}`,
                            type: "DELETE",
                            cache: false,
                            data: {
                                "_token": token
                            },
                            success:function(response){ 

                                //show success message
                                Swal.fire({
                                    type: 'success',
                                    icon: 'success',
                                    title: `${response.message}`,
                                    showConfirmButton: false,
                                    timer: 1000
                                });

                                //remove post on table
                                $(`#index_${id}`).remove();
                            }
                        });
                    }
                })
            });

            $(".del-transaction").click(function(){
                let id = $(this).data('id');
                let token   = $("#token").data("token");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({

                            url: `/transaction/${id}`,
                            type: "DELETE",
                            cache: false,
                            data: {
                                "_token": token
                            },
                            success:function(response){ 

                                //show success message
                                Swal.fire({
                                    type: 'success',
                                    icon: 'success',
                                    title: `${response.message}`,
                                    showConfirmButton: false,
                                    timer: 1000
                                });

                                //remove post on table
                                $(`#index_${id}`).remove();
                            }
                        });
                    }
                })
            });

        });
    </script>
  </body>
</html>