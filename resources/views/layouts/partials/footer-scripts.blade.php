    <!-- jquery ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <!-- wow JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/wow.min.js') }}"></script>
    <!-- price-slider JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
    <!-- sticky JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery.scrollUp.min.js') }}"></script>
    <!-- counterup JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/counterup/jquery.counterup.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/counterup/waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ URL::asset('js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/metisMenu/metisMenu.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- morrisjs JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/morrisjs/raphael-min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/morrisjs/morris.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/morrisjs/morris-active.js') }}"></script>
    <!-- morrisjs JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/sparkline/jquery.charts-sparkline.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/sparkline/sparkline-active.js') }}"></script>
    <!-- calendar JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/calendar/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/calendar/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/calendar/fullcalendar-active.js') }}"></script>
    <!-- plugins JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/plugins.js') }}"></script>
    <!-- main JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    <!-- tawk chat JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>


    <script type="text/javascript" href="{{ URL::asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script type="text/javascript">
        var $loading = $('#loadingDiv').hide();
        $(document)
            .ajaxStart(function() {
                var curr = $('body').height();
                $('.spinner-border').height(curr);
                $loading.show();
            })
            .ajaxStop(function() {
                $loading.hide();
            });

    </script>
