<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>@yield('title' , 'forget password')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link
      rel="stylesheet"
      href="/assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css"
    />

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .custom-checkbox .form-check-input:checked {
          background-color: red !important;
          border-color: red !important;
      }
    </style>
  </head>

  <body>
@yield('content')
    
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/main.js"></script>
    
    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
</html>
