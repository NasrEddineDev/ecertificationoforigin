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
   <!-- notification JS ============================================ -->
   <script src="js/notifications/Lobibox.js"></script>

   {{-- <script src="{{ URL::asset('../resources/js/app.js') }}"></script> --}}

   <script type="text/javascript" href="{{ URL::asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>

   {{-- <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
    
    <script src="{{ asset('pusher-js/dist/web/pusher.js') }}"></script>

    <script src="{{ asset('laravel-echo/dist/echo.iife.js') }}"></script>
    <script type="module" src="{{ asset('laravel-echo/dist/echo.js') }}"></script> --}}

   <script src="{{ asset('js/app.js') }}"></script>
   <script type="text/javascript">
       // window.Echo = new Echo({
       //     broadcaster: 'pusher',
       //     // key: process.env.MIX_PUSHER_APP_KEY,
       //     key: 'exampleKey',
       //     // cluster: 'mt1',
       //     // cluster: process.env.MIX_PUSHER_APP_CLUSTER,
       //     wsHost: window.location.hostname,
       //     wsPort: 6001,
       //     forceTLS: false,
       //     // disableStats: true,
       // });

       var lang = '{{ App()->currentLocale() }}';

       var $loading = $('#loadingDiv').hide();

       $(document).ajaxStart(function() {
           var curr = $('body').height();
           $('.spinner-border').height(curr);
           $loading.show();
       }).ajaxStop(function() {
           $loading.hide();
       });



       $(document).on('click', '.not-active', function(e) {
           e.preventDefault();
           $(this).off("click").attr('href', "javascript: void(0);");
           Lobibox.notify('info', {
               showClass: 'fadeInDown',
               hideClass: 'fadeUpDown',
               title: '{{ __('Your request is in process') }}',
               position: 'bottom left',
               sound: 'eventually-590', // info, swiftly-610
               // img: 'img/notification/1.jpg',
               msg: '{{ __('Please wait until we check your submitted information that are correct and activate your account') }}'
           });
       });
       // $(document).ready(function() {
       //     $('.sidebar-nav .metismenu li a').click(function(e) {
       //         $('.sidebar-nav .metismenu li.active').removeClass('active');
       //         var $parent = $(this).parent();
       //         $parent.addClass('active');
       //         // e.preventDefault();
       //     });
       // });
       // var route = '{{ Route::currentRouteName() }}';
       // if (route.lastIndexOf('.') != -1) route = route.substr(0, route.lastIndexOf('.'));
       // console.log(route);
       // $('.bread-blod').text('{{ __(ucwords(preg_replace("/\.[^.]+$/", '', Route::currentRouteName()))) }}');
       // window.Echo = new Echo({
       //     broadcaster: 'pusher',
       //     key: 'exampleKey',
       //     cluster: 'mt1',
       //     forceTLS: false
       // });

       // Echo.channel('pending-certificate-channel')
       // .listen('CertificatePendingEvent', (e) => {
       //     //  console.log('success');
       //      console.log(e);
       // })
       $(document).ready(function() {

           // Echo.channel('ch1')
           // .listen('CertificatePendingEvent', (e) => {
           //     console.log('success');
           // }); 
           // Pusher.log = function(msg) {
           //     // console.log('msg');
           //     // alert('msg');
           // };
           // Echo.channel('pending-certificate-channel').listen('CertificatePendingEvent', (e) => {
           //     console.log(e);
           // })
           // Echo.join(`pending-certificate-channel`)
           //     .listen('CertificatePendingEvent', (notifications) => {
           //         console.log('hi echo listen');
           //         console.log(notifications);
           //     })
           //     .here((notifications) => {
           //         console.log('hi echo here');
           //         console.log(notifications);
           //     })
           //     .joining((notifications) => {
           //         console.log('hi echo joining');
           //         console.log(notifications);
           //     })
           //     .leaving((notifications) => {
           //         console.log('hi echo leaving');
           //         console.log(notifications);
           //     })
           //     .error((error) => {
           //         console.log('hi echo error');
           //         console.error(error);
           //     });

           // console.log('result'+'{{ Auth::check() && Auth::user()->role->name == 'dri_user' }}');
        // //    if ('{{ Auth::check() && Auth::user()->role->name == 'dri_user' }}' == '1') {
        // //        Echo.private(`pending-certificate-channel`)
        // //            .listen('CertificatePendingEvent', (e) => {
        // //                $('.indicator-nt').text('{{ Auth::user()->unreadNotifications->count() + 1 }}');
        // //                //    console.log(e);
        // //                var newNotification =
        // //                    '<li><a href="#"><div class="notification-icon"><span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true">' +
        // //                    '<i class="fa fa-wpforms" style="font-size:19px;"></i></span></div><div class="notification-content"><span class="notification-date">' +
        // //                    '{{ date('d-M', strtotime(now())) }}</span><h2>' +
        // //                    '{{ __('App\\Notifications\\CertificatePendingNotification') }}' + '</h2><p>' + e
        // //                    .enterprise_name + '</p></div></a></li>'
        // //                $("ul.notification-menu #mCSB_2_container").append(newNotification);
        // //                if ('{{ explode('.', \Request::route()->getName())[0] }}' == 'certificates') {
        // //                    $table.bootstrapTable('insertRow', {
        // //                        index: 0,
        // //                        row: {
        // //                            state: false,
        // //                            id: e.certificate.code,
        // //                            importer: e.certificate.importer.name,
        // //                            status: '<button class="btn ' + (e.certificate.status == 'DRAFT' ?
        // //                                    'btn-warning' : (e.certificate.status == 'PENDING' ?
        // //                                        'btn-info' : (e.certificate.status == 'SIGNED' ?
        // //                                            'btn-success' : 'btn-danger'))) +
        // //                                '"style="font-size: 14px;padding:0px;">' + e.status +
        // //                                '</button>',
        // //                            type: '<button class="btn btn-warning" style="font-size: 14px;padding:0px;">' +
        // //                                e.certificate.type + '</button>',
        // //                            type_hidden: e.certificate.type,
        // //                            signature_date: e.certificate.signature_date,
        // //                            dri_signature_date: e.certificate.dri_signature_date,
        // //                            net_weight: e.certificate.net_weight,
        // //                            real_weight: e.certificate.real_weight,
        // //                            invoice: e.certificate.invoice
        // //                        }
        // //                    });
        // //                }
        // //            });
        // //    } else if ('{{ Auth::check() && Auth::user()->role->name == "user" }}' == '1') {
        // //        Echo.private('user.{{ Auth::user()->id }}').listen('CertificateSignedEvent', (e) => {
        // //            $('.indicator-nt').text('{{ Auth::user()->unreadNotifications->count() + 1 }}');
        // //            var newNotification =
        // //                '<li><a href="#"><div class="notification-icon"><span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true">' +
        // //                '<i class="fa fa-wpforms" style="font-size:19px;"></i></span></div><div class="notification-content"><span class="notification-date">' +
        // //                '{{ date('d-M', strtotime(now())) }}</span><h2>' +
        // //                '{{ __('App\\Notifications\\CertificateSignedNotification') }}' + '</h2><p>' + e
        // //                .enterprise_name + '</p></div></a></li>'
        // //            $("ul.notification-menu #mCSB_2_container").append(newNotification);
        // //            if ('{{ explode('.', \Request::route()->getName())[0] }}' == 'certificates') {
        // //                $table.bootstrapTable('removeByUniqueId', e.certificate.code);
        // //                 $table.bootstrapTable('updateByUniqueId', {
        // //                     id: e.certificate.code,
        // //                     row: {
        // //                            state: false,
        // //                            id: e.certificate.code,
        // //                            importer: e.certificate.importer.name,
        // //                            status: '<button class="btn btn-success" style="font-size: 14px;padding:0px;">' + e.status +'</button>',
        // //                            type: '<button class="btn btn-warning" style="font-size: 14px;padding:0px;">' +
        // //                                e.certificate.type + '</button>',
        // //                            type_hidden: e.certificate.type,
        // //                            signature_date: e.certificate.signature_date,
        // //                            dri_signature_date: e.dri_signature_date,
        // //                            net_weight: e.certificate.net_weight,
        // //                            real_weight: e.certificate.real_weight,
        // //                            invoice: e.certificate.invoice
        // //                     }
        // //                 })
        // //            }
        // //        });
        // //    }
           $("#markAsReadNotifications").click(function(e) {
               $.ajax({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   url: '{{ route('notifications.mark-as-read') }}',
                   type: 'GET',
                   success: function(response) {
                       $('.indicator-nt').text('0');
                   }
               });
           });

       });
   </script>
