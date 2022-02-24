<!DOCTYPE html>
<html lang="en">
    
<head>
        @include('fontend.inc.header')

        @include('fontend.inc.css')
        


    </head>
    <body class="cnt-home">
        <!-- ============================================== HEADER ============================================== -->
        @include('fontend.inc.topbar')

        <!-- ============================================== HEADER : END ============================================== -->
        @yield('fontend-content')

        @include('fontend.inc.product_view_modal')


    <!-- ============================================================= FOOTER ============================================================= -->
    @include('fontend.inc.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->


    <!-- For demo purposes – can be removed on production -->
    
    
    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    
    @include('fontend.inc.script')

</body>

</html>