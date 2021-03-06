@extends('layouts.mainlayout')

@section('content')

    @Push('css')
        <style>
            .col-lg-1,
            .col-lg-10,
            .col-lg-11,
            .col-lg-12,
            .col-lg-2,
            .col-lg-3,
            .col-lg-4,
            .col-lg-5,
            .col-lg-6,
            .col-lg-7,
            .col-lg-8,
            .col-lg-9,
            .col-md-1,
            .col-md-10,
            .col-md-11,
            .col-md-12,
            .col-md-2,
            .col-md-3,
            .col-md-4,
            .col-md-5,
            .col-md-6,
            .col-md-7,
            .col-md-8,
            .col-md-9,
            .col-sm-1,
            .col-sm-10,
            .col-sm-11,
            .col-sm-12,
            .col-sm-2,
            .col-sm-3,
            .col-sm-4,
            .col-sm-5,
            .col-sm-6,
            .col-sm-7,
            .col-sm-8,
            .col-sm-9,
            .col-xs-1,
            .col-xs-10,
            .col-xs-11,
            .col-xs-12,
            .col-xs-2,
            .col-xs-3,
            .col-xs-4,
            .col-xs-5,
            .col-xs-6,
            .col-xs-7,
            .col-xs-8,
            .col-xs-9 {
                position: relative;
                min-height: 1px;
                padding-right: 5px !important;
                padding-left: 5px !important;
            }

            #pie-chart canvas {
                height: 352px !important;
            }

        </style>

        @if (App::currentLocale() == 'ar')
            <style>
                .social-edu-ctn {
                    margin-right: 15px;
                }
            </style>
        @endif
    @endpush
    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                @if (Auth::user()->Role->name == 'user' || Auth::user()->Role->name == 'admin')
                    <div
                        class="col-lg-3 col-md-6 col-sm-6 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>{{ __('Current Balance') }}</h5>
                                <h2><span class="counter">{{ $current_balance }}</span>{{ ' ' . __('Points') }}<span
                                        class="tuition-fees">{{ __('Remained') }}</span></h2>
                                <span class="text-success">{{ $current_balance_rate }}</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100" style="width:{{ $current_balance_rate }};">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-6 col-sm-6 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>{{ __('Consumed Balance') }}</h5>
                                <h2><span class="counter">{{ $consumed_balance }}</span>{{ ' ' . __('Points') }}<span
                                        class="tuition-fees">{{ __('Consumed') }}</span></h2>
                                <span class="text-danger">{{ $consumed_balance_rate }}</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width:{{ $consumed_balance_rate }};">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-6 col-sm-6 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>{{ __('Total Balance') }}</h5>
                                <h2><span class="counter">{{ $total_balance }}</span>{{ ' ' . __('Points') }} <span
                                        class="tuition-fees">{{ __('Full Balance') }}</span></h2>
                                <span class="text-info">100%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span
                                            class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-6 col-sm-6 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>{{ __('Payment Operations') }}</h5>
                                <h2>
                                    @if (App()->currentLocale() != 'ar')
                                        <span class="tuition-fees"
                                            style="margin-left: 10px;margin-right:10px;">{{ __('Operations') }}</span>
                                    @endif
                                    <span
                                        class="counter">{{ isset(Auth::user()->Enterprise->payments) ? Auth::user()->Enterprise->payments->count() : '' }}</span>

                                    @if (App()->currentLocale() == 'ar')
                                        <span class="tuition-fees"
                                            style="margin-left: 10px;margin-right:10px;">{{ __('Operations') }}</span>
                                    @endif
                                </h2>
                                <span
                                    class="text-inverse">{{ isset(Auth::user()->Enterprise->payments) && App\Models\Payment::all()->count() != 0 ? Auth::user()->Enterprise->payments->count() / App\Models\Payment::all()->count() . '%' : '0%' }}</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width:{{ isset(Auth::user()->Enterprise->payments) && App\Models\Payment::all()->count() != 0 ? Auth::user()->Enterprise->payments->count() / App\Models\Payment::all()->count() . '%' : '0%' }};">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (Auth::user()->Role->name == "dri_user")

                @else

                @endif
            </div>
        </div>
    </div>
    <div class="product-sales-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div
                        class="col-lg-6 col-md-9 col-sm-12 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span
                                                class="caption-subject"><b>{{ __('Certifications Statistics') }}</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp graph-rp-dl">
                                            <p>{{ __('All Certificate Statistics') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline cus-product-sl-rp">
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #006DF0;"></i>{{ __('GZALE') }}</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #933EC5;"></i>{{ __('ACP-TUNISIE') }}
                                    </h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #65b12d;"></i>{{ __('FORM-A-EN') }}</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #EEF116;"></i>{{ __('FORMULE-A-FR') }}</h5>
                                </li>
                            </ul>
                            <div id="extra-area-chart" style="height: 356px;"></div>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-6 col-sm-12 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}">
                        <div class="charts-single-pro responsive-mg-b-30">
                            <div class="alert-title">
                                <h2>{{ __('Balance Statistics') }}</h2>
                                <p>{{ __('All balance transactions') }}</p>
                            </div>
                            <div id="pie-chart">
                                <canvas id="piechart"></canvas>
                            </div>
                        </div>
                    </div>

                    @if (Auth::user()->Role->name == 'user' || Auth::user()->Role->name == 'admin')
                        <div
                            class="col-lg-3 col-md-3 col-sm-3 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}">
                            <div class="white-box analytics-info-cs mg-b-10 res-mg-b-15 tb-sm-res-d-n dk-res-t-d-n">
                                <h3 class="box-title">{{ __('Total Requests') }}</h3>
                                <ul class="list-inline two-part-sp">
                                    <li>
                                        <div id="sparklinedash2"></div>
                                    </li>
                                    <li class="text-right graph-two-ctn"><i class="fa fa-level-up" aria-hidden="true"></i>
                                        <span class="counter text-purple">{{ $total_requests }}</span></li>
                                </ul>
                            </div>
                            <div class="white-box analytics-info-cs mg-b-10 res-mg-b-15 tb-sm-res-d-n dk-res-t-d-n">
                                <h3 class="box-title">{{ __('Total Products') }}</h3>
                                <ul class="list-inline two-part-sp">
                                    <li>
                                        <div id="sparklinedash3"></div>
                                    </li>
                                    <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i>
                                        <span class="counter text-info">{{ $total_products }}</span></li>
                                </ul>
                            </div>
                            <div
                                class="white-box analytics-info-cs mg-b-10 res-mg-b-15 res-mg-t-15 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                                <h3 class="box-title">{{ __('Total weight of products') }}</h3>
                                <ul class="list-inline two-part-sp">
                                    <li>
                                        <div id="sparklinedash"></div>
                                    </li>
                                    <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span
                                            class="counter text-success">{{ $total_products_weight }}</span>
                                        {{ __('Kg') }}
                                    </li>
                                </ul>
                            </div>
                            <div class="white-box analytics-info-cs table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                                <h3 class="box-title">{{ __('Total Importers') }}</h3>
                                <ul class="list-inline two-part-sp">
                                    <li>
                                        <div id="sparklinedash4"></div>
                                    </li>
                                    <li class="text-right graph-four-ctn"><i class="fa fa-level-down"
                                            aria-hidden="true"></i> <span class="text-danger"><span
                                                class="counter">{{ $total_importers }}</span></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @elseif (Auth::user()->Role->name == "dri_user")

                    @else

                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="traffic-analysis-area  reso-mg-b-30 mg-b-10-c">
        <div class="container-fluid">
            <div class="row">
                <div
                    class="col-lg-3 col-md-6 col-sm-6 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}">
                    <div class="social-media-edu">
                        <i class="fa fa-wpforms"></i>
                        <div class="social-edu-ctn">
                            <h3>{{ $total_certificates }} {{ __('Certificates') }}</h3>
                            <p>{{ __('Total Certificates') }}</p>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-6 col-sm-6 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}">
                    <div class="social-media-edu twitter-cl res-mg-t-30 table-mg-t-pro-n">
                        <i class="fa fa-edit"></i>
                        <div class="social-edu-ctn">
                            <h3>{{ $signed_certificates }} {{ __('Certificates') }}</h3>
                            <p>{{ __('Signed Certificates') }}</p>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-6 col-sm-6 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}">
                    <div class="social-media-edu youtube-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <i class="fa fa-minus-square-o"></i>
                        <div class="social-edu-ctn">
                            <h3>{{ $rejected_certificates }} {{ __('Certificates') }}</h3>
                            <p>{{ __('Rejected Certificates') }}</p>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->Role->name == 'user' || Auth::user()->Role->name == 'admin')
                    <div
                        class="col-lg-3 col-md-6 col-sm-6 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}">
                        <div class="white-box analytics-info-cs table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">{{ __('Total Countries') }}</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash5"></div>
                                </li>
                                <li class="text-right graph-three-ctn"><i class="fa fa-level-down" aria-hidden="true"></i>
                                    <span class="text-info"><span
                                            class="counter text-info">{{ $total_countries }}</span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                @elseif (Auth::user()->Role->name == "dri_user")

                @else

                @endif
            </div>
        </div>
    </div>
    <div class="product-sales-area mg-tb-10" style="display:none">
        <div class="container-fluid">
            <div class="row">
                <div
                    class="col-lg-9 col-md-12 col-sm-12 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}">
                    <div class="product-sales-chart">
                        <div class="portlet-title">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="caption pro-sl-hd">
                                        <span class="caption-subject"><b>Adminsion Statistic</b></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="actions graph-rp actions-graph-rp">
                                        <a href="#" class="btn btn-dark btn-circle active tip-top" data-toggle="tooltip"
                                            title="Refresh">
                                            <i class="fa fa-reply" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-blue-grey btn-circle active tip-top"
                                            data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline cus-product-sl-rp">
                            <li>
                                <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Python</h5>
                            </li>
                            <li>
                                <h5><i class="fa fa-circle" style="color: #933EC5;"></i>PHP</h5>
                            </li>
                            <li>
                                <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Java</h5>
                            </li>
                        </ul>
                        <div id="morris-area-chart"></div>
                    </div>
                </div>
                <div
                    class="col-lg-3 col-md-3 col-sm-3 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}">
                    <div
                        class="analysis-progrebar res-mg-t-30 mg-ub-10 res-mg-b-15 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                        <div class="analysis-progrebar-content">
                            <h5>Usage</h5>
                            <h2 class="storage-right"><span class="counter">90</span>%</h2>
                            <div class="progress progress-mini ug-1">
                                <div style="width: 68%;" class="progress-bar"></div>
                            </div>
                            <div class="m-t-sm small">
                                <p>Server down since 1:32 pm.</p>
                            </div>
                        </div>
                    </div>
                    <div class="analysis-progrebar reso-mg-b-15 res-mg-b-15 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                        <div class="analysis-progrebar-content">
                            <h5>Memory</h5>
                            <h2 class="storage-right"><span class="counter">70</span>%</h2>
                            <div class="progress progress-mini ug-2">
                                <div style="width: 78%;" class="progress-bar"></div>
                            </div>
                            <div class="m-t-sm small">
                                <p>Server down since 12:32 pm.</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="analysis-progrebar reso-mg-b-15 res-mg-b-15 res-mg-t-15 mg-ub-10 tb-sm-res-d-n dk-res-t-d-n">
                        <div class="analysis-progrebar-content">
                            <h5>Data</h5>
                            <h2 class="storage-right"><span class="counter">50</span>%</h2>
                            <div class="progress progress-mini ug-3">
                                <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                            </div>
                            <div class="m-t-sm small">
                                <p>Server down since 8:32 pm.</p>
                            </div>
                        </div>
                    </div>
                    <div class="analysis-progrebar res-mg-t-30 table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                        <div class="analysis-progrebar-content">
                            <h5>Space</h5>
                            <h2 class="storage-right"><span class="counter">40</span>%</h2>
                            <div class="progress progress-mini ug-4">
                                <div style="width: 28%;" class="progress-bar progress-bar-danger"></div>
                            </div>
                            <div class="m-t-sm small">
                                <p>Server down since 5:32 pm.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="display:none;" id="morris_area" data-morris-area="{{ json_encode($certificates_morris_area) }}"></div>
@endsection

@Push('js')

    <script>
        $(document).ready(function() {
            /*----------------------------------------*/
            /*  1.  pie Chart
            /*----------------------------------------*/

            var gzale_rate = "{{ $gzale_rate }}",
                acp_tunisie_rate = "{{ $acp_tunisie_rate }}",
                formule_a_fr_rate = "{{ $formule_a_fr_rate }}",
                form_a_en_rate = "{{ $form_a_en_rate }}",
                total_certificates = "{{ $total_certificates }}",
                other_rate = 0;
            if (total_certificates != 0) {
                other_rate = 100 - parseFloat(gzale_rate) - parseFloat(acp_tunisie_rate) -
                    parseFloat(form_a_en_rate) - parseFloat(formule_a_fr_rate);
            }
            var ctx = document.getElementById("piechart");
            var piechart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["GZALE", "FORM A EN", "FORMULE A FR", "ACP ALGERIA TUNISIE", "OTHER"],
                    datasets: [{
                        label: 'pie Chart',
                        backgroundColor: [
                            '#006DF0',
                            '#65b12d',
                            '#EEF116',
                            '#933EC5',
                            '#303030',
                            '#D80027'
                        ],
                        data: [parseFloat(gzale_rate), parseFloat(form_a_en_rate), parseFloat(
                                formule_a_fr_rate),
                            parseFloat(acp_tunisie_rate), parseFloat(other_rate)
                        ]
                    }]
                },
                options: {
                    responsive: true
                }
            });

            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var morris_area = $('#morris_area').data('morris-area');
            Morris.Area({
                element: 'extra-area-chart',
                data: morris_area,
                xkey: 'month',
                parseTime: false,
                ykeys: ['GZALE', 'ACP-TUNISIE', 'FORM-A-EN', 'FORMULE-A-FR'],
                labels: ['GZALE', 'ACP TUNISIE', 'FORM A EN', 'FORMULE A FR'],
                xLabelFormat: function(x) {
                    var index = parseInt(x.src.month);
                    return monthNames[index - 1];
                },
                xLabels: "month",
                pointSize: 3,
                fillOpacity: 0,
                pointStrokeColors: ['#006DF0', '#933EC5', '#65b12d', '#EEF116'],
                behaveLikeLine: true,
                gridLineColor: '#e0e0e0',
                lineWidth: 1,
                hideHover: 'auto',
                lineColors: ['#006DF0', '#933EC5', '#65b12d', '#EEF116'],
                resize: true

            });
            
        });
    </script>

    <!-- Charts JS
                ============================================ -->
    <script src="js/charts/Chart.js"></script>
    <script src="js/charts/rounded-chart.js"></script>
@endpush
