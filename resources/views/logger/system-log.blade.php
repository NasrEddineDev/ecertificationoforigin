@extends('layouts.mainlayout')
@Push('css')
    <!-- normalize CSS ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-table.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-editable.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/modals.css') }}" />
    <style>
        .not-active {
            /* pointer-events: none; */
            cursor: default;
            text-decoration: none;
            background-color: gray !important;
        }

        tr td:last-child {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 50%;
            /* Extend the cell as much as possible */
            max-width: 0;
            /* Avoid resizing beyond table width */
        }
        
        .sparkline13-graph{
            height:500px;
        }
        .sparkline13-graph object {
            width: 90%;
            margin: 5px;
            height:500px;
            background-color: rgba(167, 167, 167, 0.685) !important;
        }
        pre {
            color:#26bd00 !important;
        }

        .sparkline13-graph object {
            height: 90%;
        }

        #log-viewer{
            overflow:scroll;
            height:500px;
            color:#26bd00;
            font-weight: 700;
            background-color: black;
        }
    </style>
@endpush

@section('content')

    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>{{ __('Activities List') }}</h1>
                                <h1>{{ __('System Log') }}</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <object style="width:100%;" id="object" data="{{ $url }}" type="text/plain">
                            </object>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="DangerModalhdbgcl" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-4">
                    <h4 class="modal-title">{{ __('Delete the payment') }}</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <div class="modal-body">
                    <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                    <h2>{{ __('Remove Permanently!') }}</h2>
                    <p>{{ __('Do you want to delete the payment') }} <strong id="PaymentName"
                            style="color: #d80027!important;"></strong> {{ __('forever') }} ?</p>
                </div>
                <div class="modal-footer danger-md">
                    <a data-dismiss="modal" href="#" style="background-color: #d80027!important;">{{ __('No') }}</a>
                    <a id="Delete" href="#" style="background-color: #d80027!important;">{{ __('Yes') }}</a>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@Push('js')
    <!-- // this is for internal js -->
    <!-- data table JS ============================================ -->
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/tableExport.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/data-table-active.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-editable.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-resizable.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/colResizable-1.5.source.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-export.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-ar-SA.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-en-US.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-fr-FR.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#DangerModalhdbgcl').on('shown.bs.modal', function(e) {
                var link = $(e.relatedTarget),
                    url = link.data("url"),
                    payment_name = link.data("payment_name");
                $("#Delete").attr("href", url);
                $("#PaymentName").text(payment_name);
            });

            $("#Delete").click(function(e) {
                e.preventDefault();
                var url = $("#Delete").attr("href");
                var id = url.substring(url.lastIndexOf('/') + 1);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'DELETE',
                    success: function(result) {
                        $('#DangerModalhdbgcl').modal('toggle');
                        $('table#table tr#' + id).remove();
                    }
                });
            });

            $('tr td:last-child').bind('mouseenter', function() {
                var $this = $(this);

                if (this.offsetWidth < this.scrollWidth && !$this.attr('title')) {
                    $this.attr('title', $this.text());
                }
            });

            var w = window,
                d = document,
                e = d.documentElement,
                g = d.getElementsByTagName('body')[0],
                y = w.innerHeight || e.clientHeight || g.clientHeight;

            var object = document.getElementById("log-viewer");
            object.height = y * 8 / 10;
            console.log(y * 8 / 10);
            $("#log-viewer").height = y * 8 / 10;

            $(".sparkline13-graph object pre")attr('style', 'color:#26bd00 !important');

        });
    </script>
@endpush
