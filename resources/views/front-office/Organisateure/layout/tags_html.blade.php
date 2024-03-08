<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper/saas/form-advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2024 20:29:59 GMT -->
<head>
        <meta charset="utf-8" />
        <title>@yield('title' , 'dashboard')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="/organisateur/assets/images/favicon.ico">

        <!-- Select2 css -->
        <link href="/organisateur/assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Daterangepicker css -->
        <link href="/organisateur/assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        
        <!-- Bootstrap Touchspin css -->
        <link href="/organisateur/assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Datepicker css -->
        <link href="/organisateur/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Timepicker css -->
        <link href="/organisateur/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />

        <!-- Flatpickr Timepicker css -->
        <link href="/organisateur/assets/vendor/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme Config Js -->
        <script src="/organisateur/assets/js/hyper-config.js"></script>
      


        <!-- App css -->
        <link href="/organisateur/assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="/organisateur/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/organisateur/assets/css/style.css" rel="stylesheet" type="text/css" />
        <style>
            .custom-checkbox .form-check-input:checked {
                background-color: red !important;
                border-color: red !important;
            }
          </style>
        </head>
    <body>
                <!-- Begin page -->
                <div class="wrapper">
                    @include('front-office/Organisateure/layout/nav_bar')
                    @include('front-office/Organisateure/layout/sid_bar');
                    <div class="content-page">
                        <div class="content">
        
                            <!-- Start Content-->
                            <div class="container-fluid">
                                 @yield('content')

                            </div>
                        </div>
                    </div>
                </div>

      <!-- Vendor js -->
      <script src="/organisateur/assets/js/vendor.min.js"></script>

      <!-- Code Highlight js -->
      <script src="/organisateur/assets/vendor/highlightjs/highlight.pack.min.js"></script>
      <script src="/organisateur/assets/vendor/clipboard/clipboard.min.js"></script>
      <script src="/organisateur/assets/js/hyper-syntax.js"></script>

      <!--  Select2 Plugin Js -->
      <script src="/organisateur/assets/vendor/select2/js/select2.min.js"></script>

      <!-- Daterangepicker Plugin js -->
      <script src="/organisateur/assets/vendor/daterangepicker/moment.min.js"></script>
      <script src="/organisateur/assets/vendor/daterangepicker/daterangepicker.js"></script>

      <!-- Bootstrap Datepicker Plugin js -->
      <script src="/organisateur/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

      <!-- Bootstrap Timepicker Plugin js -->
      <script src="/organisateur/assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

      <!-- Input Mask Plugin js -->
      <script src="/organisateur/assets/vendor/jquery-mask-plugin/jquery.mask.min.js"></script>

      <!-- Bootstrap Touchspin Plugin js -->
      <script src="/organisateur/assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

      <!-- Bootstrap Maxlength Plugin js -->
      <script src="/organisateur/assets/vendor/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

      <!-- Typehead Plugin js -->
      <script src="/organisateur/assets/vendor/handlebars/handlebars.min.js"></script>
      <script src="/organisateur/assets/vendor/typeahead.js/typeahead.bundle.min.js"></script>

      <!-- Flatpickr Timepicker Plugin js -->
      <script src="/organisateur/assets/vendor/flatpickr/flatpickr.min.js"></script>

      <!-- Typehead Demo js -->
      <script src="/organisateur/assets/js/pages/demo.typehead.js"></script>

      <!-- Timepicker Demo js -->
      <script src="/organisateur/assets/js/pages/demo.timepicker.js"></script>

      <!-- App js -->
      <script src="/organisateur/assets/js/app.min.js"></script>
      <script>
        $(document).ready(function() {
            // Handle checkbox click event
            $('input[type="checkbox"]').click(function() {
                // Uncheck other checkboxes
                $('input[type="checkbox"]').not(this).prop('checked', false);
            });
        });
    </script>
  </body>

<!-- Mirrored from coderthemes.com/hyper/saas/form-advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2024 20:30:03 GMT -->
</html>