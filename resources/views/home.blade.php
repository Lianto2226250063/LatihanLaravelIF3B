@extends('layout.main')
@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <p class="card-title">Dashboard</p>
            <div class="row mb-3">
                <div class="col-md-7">
                    <div class="d-flex justify-content-between traffic-status">
                        <div class="item">
                            <p class="mb-">Fakultas</p>
                            <h5 class="font-weight-bold mb-0">{{ count($fakultas) }}</h5>
                            <div class="color-border"></div>
                        </div>
                        <div class="item">
                            <p class="mb-">Prodi</p>
                            <h5 class="font-weight-bold mb-0">{{ count($prodi) }}</h5>
                            <div class="color-border"></div>
                        </div>
                        <div class="item">
                            <p class="mb-">Mahasiswa</p>
                            <h5 class="font-weight-bold mb-0">{{ count($mahasiswa) }}</h5>
                            <div class="color-border"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <ul class="nav nav-pills nav-pills-custom justify-content-md-end" id="pills-tab-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab-custom" data-toggle="pill" href="#pills-health" role="tab" aria-controls="pills-home" aria-selected="true">
                                Day
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab-custom" data-toggle="pill" href="#pills-career" role="tab" aria-controls="pills-profile" aria-selected="false">
                                Week
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-music" role="tab" aria-controls="pills-contact" aria-selected="false">
                                Month
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- <canvas id="audience-chart" width="819" height="409" style="display: block; width: 819px; height: 409px;" class="chartjs-render-monitor"></canvas> --}}
            {{-- HTML --}}
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description">
                </p>
            </figure>

            {{-- CSS --}}
            <style>
            .highcharts-figure,
            .highcharts-data-table table {
                min-width: 310px;
                max-width: 800px;
                margin: 1em auto;
            }
            #container {
                height: 400px;
            }
            .highcharts-data-table table {
                font-family: Verdana, sans-serif;
                border-collapse: collapse;
                border: 1px solid #ebebeb;
                margin: 10px auto;
                text-align: center;
                width: 100%;
                max-width: 500px;
            }
            .highcharts-data-table caption {
                padding: 1em 0;
                font-size: 1.2em;
                color: #555;
            }
            .highcharts-data-table th {
                font-weight: 600;
                padding: 0.5em;
            }
            .highcharts-data-table td,
            .highcharts-data-table th,
            .highcharts-data-table caption {
                padding: 0.5em;
            }
            .highcharts-data-table thead tr,
            .highcharts-data-table tr:nth-child(even) {
                background: #f8f8f8;
            }
            .highcharts-data-table tr:hover {
                background: #f1f7ff;
            }
            </style>

            {{-- Javascript --}}
            <script>
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Jumlah Mahasiswa per Program Studi',
                        align: 'center'
                    },
                    xAxis: {
                        categories: [
                            @foreach ($grafik_mhs as $item)
                                '{{ $item->nama }}',
                            @endforeach
                        ],
                        crosshair: true,
                        accessibility: {
                            description: 'Prodi'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Jumlah Mahasiswa'
                        }
                    },
                    tooltip: {
                        valueSuffix: ' (Mahasiswa)'
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [
                    {
                        name: 'Jumlah Mahasiswa',
                        data: [
                            @foreach ($grafik_mhs as $item)
                                {{ $item->jumlah }},
                            @endforeach
                        ]
                    },
                ]
            });
            </script>
        </div>
    </div>

@endsection
