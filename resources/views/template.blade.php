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
    <script src="{{ asset('assets/js/ajax.js') }}"></script>
    <script>
        $( document ).ready(function() {
            
            getPage()
            checkAmount()
            
            function getPage() {
                var page = $('#info-page').data('page')
                $('#nav-'+page).addClass('active')
            }

            function checkAmount() {
                if($("#amount").val() !== '') {
                    $('#text-amount').html('<div class="spinner-border spinner-border-sm" role="status"></div>');

                    setTimeout(() => {
                        $('#text-amount').html(formatRupiah($("#amount").val()));
                    }, 600);
                    
                }
            }

            function formatRupiah(angka, prefix){
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split   		= number_string.split(','),
                sisa     		= split[0].length % 3,
                rupiah     		= split[0].substr(0, sisa),
                ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
            
                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if(ribuan){
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
            
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }

            $("#amount").keyup(function(e){
                $('#text-amount').html(formatRupiah($(this).val()));
            });


        });
    </script>
  </body>
</html>