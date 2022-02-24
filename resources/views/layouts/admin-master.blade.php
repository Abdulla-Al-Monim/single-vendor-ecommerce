<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.inc.header')

    @include('admin.inc.css')
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('admin.inc.leftbar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('admin.inc.topbar')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    @include('admin.inc.rightbar')
    <!-- ########## END: RIGHT PANEL ########## --->

    @yield('admin-content')

    @include('admin.inc.script')
  </body>
</html>
