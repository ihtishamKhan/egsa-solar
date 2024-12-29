

<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Dashboards
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Dashboard
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?>
        <div class="row">
            <div class="col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-primary-subtle" style="background-color: #d4dbf9;">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Dépannage Dashboard</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <img src="assets/images/users/avatar-1.jpg" alt=""
                                        class="img-thumbnail rounded-circle">
                                </div>
                                <h5 class="font-size-15 text-truncate"><?php echo e(Auth::user()->name); ?></h5>
                                
                            </div>

                            <div class="col-sm-8">
                                <div class="pt-4">
                                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin|Employee')): ?>
                                        <div class="row">
                                            <div class="col-6">
                                                
                                                <p class="text-muted mb-0">Projects</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="font-size-15">$1245</h5>
                                                <p class="text-muted mb-0">Revenue</p>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="javascript: void(0);"
                                                class="btn btn-primary waves-effect waves-light btn-sm">View
                                                Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin|Employee')): ?>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Projects</p>
                                            
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Clients</p>
                                            
                                        </div>

                                        <div class="flex-shrink-0 align-self-center ">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Employees</p>
                                            <h4 class="mb-0"><?php echo e($employees_count); ?></h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">Email Sent</h4>
                                <div class="ms-auto">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Week</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Year</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div id="stacked-column-chart" class="apex-charts"
                                data-colors="[&quot;--bs-primary&quot;, &quot;--bs-warning&quot;, &quot;--bs-success&quot;]"
                                dir="ltr" style="min-height: 375px;">
                                <div id="apexchartsm3b2r1jg" class="apexcharts-canvas apexchartsm3b2r1jg apexcharts-theme-light"
                                    style="width: 1022px; height: 360px;"><svg id="SvgjsSvg1791" width="1022" height="360"
                                        xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                        transform="translate(0, 0)" style="background: transparent;">
                                        <foreignObject x="0" y="0" width="1022" height="360">
                                            <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                                xmlns="http://www.w3.org/1999/xhtml"
                                                style="inset: auto 0px 1px; position: absolute; max-height: 180px;">
                                                <div class="apexcharts-legend-series" rel="1" seriesname="SeriesxA"
                                                    data:collapsed="false" style="margin: 2px 5px;"><span
                                                        class="apexcharts-legend-marker" rel="1" data:collapsed="false"
                                                        style="background: rgb(85, 110, 230) !important; color: rgb(85, 110, 230); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 2px;"></span><span
                                                        class="apexcharts-legend-text" rel="1" i="0"
                                                        data:default-text="Series%20A" data:collapsed="false"
                                                        style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Series
                                                        A</span></div>
                                                <div class="apexcharts-legend-series" rel="2" seriesname="SeriesxB"
                                                    data:collapsed="false" style="margin: 2px 5px;"><span
                                                        class="apexcharts-legend-marker" rel="2" data:collapsed="false"
                                                        style="background: rgb(241, 180, 76) !important; color: rgb(241, 180, 76); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 2px;"></span><span
                                                        class="apexcharts-legend-text" rel="2" i="1"
                                                        data:default-text="Series%20B" data:collapsed="false"
                                                        style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Series
                                                        B</span></div>
                                                <div class="apexcharts-legend-series" rel="3" seriesname="SeriesxC"
                                                    data:collapsed="false" style="margin: 2px 5px;"><span
                                                        class="apexcharts-legend-marker" rel="3" data:collapsed="false"
                                                        style="background: rgb(52, 195, 143) !important; color: rgb(52, 195, 143); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 2px;"></span><span
                                                        class="apexcharts-legend-text" rel="3" i="2"
                                                        data:default-text="Series%20C" data:collapsed="false"
                                                        style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Series
                                                        C</span></div>
                                            </div>
                                            <style type="text/css">
                                                .apexcharts-legend {
                                                    display: flex;
                                                    overflow: auto;
                                                    padding: 0 10px;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom,
                                                .apexcharts-legend.apx-legend-position-top {
                                                    flex-wrap: wrap
                                                }

                                                .apexcharts-legend.apx-legend-position-right,
                                                .apexcharts-legend.apx-legend-position-left {
                                                    flex-direction: column;
                                                    bottom: 0;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                .apexcharts-legend.apx-legend-position-right,
                                                .apexcharts-legend.apx-legend-position-left {
                                                    justify-content: flex-start;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                    justify-content: center;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                    justify-content: flex-end;
                                                }

                                                .apexcharts-legend-series {
                                                    cursor: pointer;
                                                    line-height: normal;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                                .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                                    display: flex;
                                                    align-items: center;
                                                }

                                                .apexcharts-legend-text {
                                                    position: relative;
                                                    font-size: 14px;
                                                }

                                                .apexcharts-legend-text *,
                                                .apexcharts-legend-marker * {
                                                    pointer-events: none;
                                                }

                                                .apexcharts-legend-marker {
                                                    position: relative;
                                                    display: inline-block;
                                                    cursor: pointer;
                                                    margin-right: 3px;
                                                    border-style: solid;
                                                }

                                                .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                                .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                                    display: inline-block;
                                                }

                                                .apexcharts-legend-series.apexcharts-no-click {
                                                    cursor: auto;
                                                }

                                                .apexcharts-legend .apexcharts-hidden-zero-series,
                                                .apexcharts-legend .apexcharts-hidden-null-series {
                                                    display: none !important;
                                                }

                                                .apexcharts-inactive-legend {
                                                    opacity: 0.45;
                                                }
                                            </style>
                                        </foreignObject>
                                        <g id="SvgjsG1951" class="apexcharts-yaxis" rel="0"
                                            transform="translate(14.427978515625, 0)">
                                            <g id="SvgjsG1952" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1954"
                                                    font-family="Helvetica, Arial, sans-serif" x="20" y="31.5" text-anchor="end"
                                                    dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1955">100</tspan>
                                                    <title>100</title>
                                                </text><text id="SvgjsText1957" font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="84.1988" text-anchor="end" dominant-baseline="auto" font-size="11px"
                                                    font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1958">80</tspan>
                                                    <title>80</title>
                                                </text><text id="SvgjsText1960" font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="136.8976" text-anchor="end" dominant-baseline="auto" font-size="11px"
                                                    font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1961">60</tspan>
                                                    <title>60</title>
                                                </text><text id="SvgjsText1963" font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="189.59640000000002" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1964">40</tspan>
                                                    <title>40</title>
                                                </text><text id="SvgjsText1966" font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="242.29520000000002" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1967">20</tspan>
                                                    <title>20</title>
                                                </text><text id="SvgjsText1969" font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="294.994" text-anchor="end" dominant-baseline="auto" font-size="11px"
                                                    font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1970">0</tspan>
                                                    <title>0</title>
                                                </text></g>
                                        </g>
                                        <g id="SvgjsG1793" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(44.427978515625, 30)">
                                            <defs id="SvgjsDefs1792">
                                                <linearGradient id="SvgjsLinearGradient1796" x1="0" y1="0"
                                                    x2="0" y2="1">
                                                    <stop id="SvgjsStop1797" stop-opacity="0.4"
                                                        stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                    <stop id="SvgjsStop1798" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop1799" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                </linearGradient>
                                                <clipPath id="gridRectMaskm3b2r1jg">
                                                    <rect id="SvgjsRect1801" width="971.572021484375" height="267.494" x="-2"
                                                        y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskm3b2r1jg"></clipPath>
                                                <clipPath id="nonForecastMaskm3b2r1jg"></clipPath>
                                                <clipPath id="gridRectMarkerMaskm3b2r1jg">
                                                    <rect id="SvgjsRect1802" width="971.572021484375" height="267.494" x="-2"
                                                        y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                            </defs>
                                            <rect id="SvgjsRect1800" width="12.094650268554688" height="263.494"
                                                x="114.36900583902995" y="0" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1796)"
                                                class="apexcharts-xcrosshairs" y2="263.494" filter="none" fill-opacity="0.9"
                                                x1="114.36900583902995" x2="114.36900583902995"></rect>
                                            <line id="SvgjsLine1889" x1="0" y1="264.494" x2="0"
                                                y2="270.494" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1890" x1="80.63100179036458" y1="264.494"
                                                x2="80.63100179036458" y2="270.494" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1891" x1="161.26200358072916" y1="264.494"
                                                x2="161.26200358072916" y2="270.494" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1892" x1="241.89300537109375" y1="264.494"
                                                x2="241.89300537109375" y2="270.494" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1893" x1="322.5240071614583" y1="264.494"
                                                x2="322.5240071614583" y2="270.494" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1894" x1="403.1550089518229" y1="264.494"
                                                x2="403.1550089518229" y2="270.494" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1895" x1="483.78601074218744" y1="264.494"
                                                x2="483.78601074218744" y2="270.494" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1896" x1="564.417012532552" y1="264.494" x2="564.417012532552"
                                                y2="270.494" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1897" x1="645.0480143229166" y1="264.494"
                                                x2="645.0480143229166" y2="270.494" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1898" x1="725.6790161132812" y1="264.494"
                                                x2="725.6790161132812" y2="270.494" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1899" x1="806.3100179036459" y1="264.494"
                                                x2="806.3100179036459" y2="270.494" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1900" x1="886.9410196940105" y1="264.494"
                                                x2="886.9410196940105" y2="270.494" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1901" x1="967.5720214843751" y1="264.494"
                                                x2="967.5720214843751" y2="270.494" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <g id="SvgjsG1885" class="apexcharts-grid">
                                                <g id="SvgjsG1886" class="apexcharts-gridlines-horizontal">
                                                    <line id="SvgjsLine1903" x1="0" y1="52.698800000000006"
                                                        x2="967.572021484375" y2="52.698800000000006" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                                    </line>
                                                    <line id="SvgjsLine1904" x1="0" y1="105.39760000000001"
                                                        x2="967.572021484375" y2="105.39760000000001" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                                    </line>
                                                    <line id="SvgjsLine1905" x1="0" y1="158.09640000000002"
                                                        x2="967.572021484375" y2="158.09640000000002" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                                    </line>
                                                    <line id="SvgjsLine1906" x1="0" y1="210.79520000000002"
                                                        x2="967.572021484375" y2="210.79520000000002" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                                    </line>
                                                </g>
                                                <g id="SvgjsG1887" class="apexcharts-gridlines-vertical"></g>
                                                <line id="SvgjsLine1909" x1="0" y1="263.494" x2="967.572021484375"
                                                    y2="263.494" stroke="transparent" stroke-dasharray="0"
                                                    stroke-linecap="butt">
                                                </line>
                                                <line id="SvgjsLine1908" x1="0" y1="1" x2="0"
                                                    y2="263.494" stroke="transparent" stroke-dasharray="0"
                                                    stroke-linecap="butt">
                                                </line>
                                            </g>
                                            <g id="SvgjsG1888" class="apexcharts-grid-borders">
                                                <line id="SvgjsLine1902" x1="0" y1="0" x2="967.572021484375"
                                                    y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1907" x1="0" y1="263.494" x2="967.572021484375"
                                                    y2="263.494" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1950" x1="0" y1="264.494" x2="967.572021484375"
                                                    y2="264.494" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1"
                                                    stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG1803" class="apexcharts-bar-series apexcharts-plot-series">
                                                <g id="SvgjsG1804" class="apexcharts-series" seriesName="SeriesxA"
                                                    rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath1808"
                                                        d="M34.268175760904946 263.495L34.268175760904946 147.55764000000002L46.36282602945963 147.55764000000002L46.36282602945963 263.495L34.268175760904946 263.495C34.268175760904946 263.495 34.268175760904946 263.495 34.268175760904946 263.495C34.268175760904946 263.495 34.268175760904946 263.495 34.268175760904946 263.495C34.268175760904946 263.495 34.268175760904946 263.495 34.268175760904946 263.495C34.268175760904946 263.495 34.268175760904946 263.495 34.268175760904946 263.495C34.268175760904946 263.495 34.268175760904946 263.495 34.268175760904946 263.495C34.268175760904946 263.495 34.268175760904946 263.495 34.268175760904946 263.495C34.268175760904946 263.495 34.268175760904946 263.495 34.268175760904946 263.495C34.268175760904946 263.495 34.268175760904946 263.495 34.268175760904946 263.495 "
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 34.268175760904946 263.495 L 34.268175760904946 147.55764000000002 L 46.36282602945963 147.55764000000002 L 46.36282602945963 263.495 z"
                                                        pathFrom="M 34.392843119303386 263.495 L 34.392843119303386 263.495 L 46.5314936319987 263.495 L 46.5314936319987 263.495 z L 34.268175760904946 263.495 L 46.36282602945963 263.495 L 46.36282602945963 263.495 L 46.36282602945963 263.495 L 46.36282602945963 263.495 L 46.36282602945963 263.495 L 34.268175760904946 263.495 z"
                                                        cy="147.55664000000002" cx="114.89917755126953" j="0" val="44"
                                                        barHeight="115.93736000000001" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1810"
                                                        d="M114.89917755126953 263.495L114.89917755126953 118.57330000000002L126.99382781982422 118.57330000000002L126.99382781982422 263.495L114.89917755126953 263.495C114.89917755126953 263.495 114.89917755126953 263.495 114.89917755126953 263.495C114.89917755126953 263.495 114.89917755126953 263.495 114.89917755126953 263.495C114.89917755126953 263.495 114.89917755126953 263.495 114.89917755126953 263.495C114.89917755126953 263.495 114.89917755126953 263.495 114.89917755126953 263.495C114.89917755126953 263.495 114.89917755126953 263.495 114.89917755126953 263.495C114.89917755126953 263.495 114.89917755126953 263.495 114.89917755126953 263.495C114.89917755126953 263.495 114.89917755126953 263.495 114.89917755126953 263.495C114.89917755126953 263.495 114.89917755126953 263.495 114.89917755126953 263.495 "
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 114.89917755126953 263.495 L 114.89917755126953 118.57330000000002 L 126.99382781982422 118.57330000000002 L 126.99382781982422 263.495 z"
                                                        pathFrom="M 115.31717987060546 263.495 L 115.31717987060546 263.495 L 127.45583038330076 263.495 L 127.45583038330076 263.495 z L 114.89917755126953 263.495 L 126.99382781982422 263.495 L 126.99382781982422 263.495 L 126.99382781982422 263.495 L 126.99382781982422 263.495 L 126.99382781982422 263.495 L 114.89917755126953 263.495 z"
                                                        cy="118.57230000000001" cx="195.5301793416341" j="1" val="55"
                                                        barHeight="144.92170000000002" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1812"
                                                        d="M195.5301793416341 263.495L195.5301793416341 155.46246000000002L207.62482961018878 155.46246000000002L207.62482961018878 263.495L195.5301793416341 263.495C195.5301793416341 263.495 195.5301793416341 263.495 195.5301793416341 263.495C195.5301793416341 263.495 195.5301793416341 263.495 195.5301793416341 263.495C195.5301793416341 263.495 195.5301793416341 263.495 195.5301793416341 263.495C195.5301793416341 263.495 195.5301793416341 263.495 195.5301793416341 263.495C195.5301793416341 263.495 195.5301793416341 263.495 195.5301793416341 263.495C195.5301793416341 263.495 195.5301793416341 263.495 195.5301793416341 263.495C195.5301793416341 263.495 195.5301793416341 263.495 195.5301793416341 263.495C195.5301793416341 263.495 195.5301793416341 263.495 195.5301793416341 263.495 "
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 195.5301793416341 263.495 L 195.5301793416341 155.46246000000002 L 207.62482961018878 155.46246000000002 L 207.62482961018878 263.495 z"
                                                        pathFrom="M 196.24151662190752 263.495 L 196.24151662190752 263.495 L 208.38016713460283 263.495 L 208.38016713460283 263.495 z L 195.5301793416341 263.495 L 207.62482961018878 263.495 L 207.62482961018878 263.495 L 207.62482961018878 263.495 L 207.62482961018878 263.495 L 207.62482961018878 263.495 L 195.5301793416341 263.495 z"
                                                        cy="155.46146000000002" cx="276.16118113199866" j="2" val="41"
                                                        barHeight="108.03254000000001" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1814"
                                                        d="M276.16118113199866 263.495L276.16118113199866 86.95402000000001L288.25583140055335 86.95402000000001L288.25583140055335 263.495L276.16118113199866 263.495C276.16118113199866 263.495 276.16118113199866 263.495 276.16118113199866 263.495C276.16118113199866 263.495 276.16118113199866 263.495 276.16118113199866 263.495C276.16118113199866 263.495 276.16118113199866 263.495 276.16118113199866 263.495C276.16118113199866 263.495 276.16118113199866 263.495 276.16118113199866 263.495C276.16118113199866 263.495 276.16118113199866 263.495 276.16118113199866 263.495C276.16118113199866 263.495 276.16118113199866 263.495 276.16118113199866 263.495C276.16118113199866 263.495 276.16118113199866 263.495 276.16118113199866 263.495C276.16118113199866 263.495 276.16118113199866 263.495 276.16118113199866 263.495 "
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 276.16118113199866 263.495 L 276.16118113199866 86.95402000000001 L 288.25583140055335 86.95402000000001 L 288.25583140055335 263.495 z"
                                                        pathFrom="M 277.1658533732096 263.495 L 277.1658533732096 263.495 L 289.3045038859049 263.495 L 289.3045038859049 263.495 z L 276.16118113199866 263.495 L 288.25583140055335 263.495 L 288.25583140055335 263.495 L 288.25583140055335 263.495 L 288.25583140055335 263.495 L 288.25583140055335 263.495 L 276.16118113199866 263.495 z"
                                                        cy="86.95302000000001" cx="356.7921829223632" j="3" val="67"
                                                        barHeight="176.54098000000002" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1816"
                                                        d="M356.7921829223632 263.495L356.7921829223632 205.52632000000003L368.8868331909179 205.52632000000003L368.8868331909179 263.495L356.7921829223632 263.495C356.7921829223632 263.495 356.7921829223632 263.495 356.7921829223632 263.495C356.7921829223632 263.495 356.7921829223632 263.495 356.7921829223632 263.495C356.7921829223632 263.495 356.7921829223632 263.495 356.7921829223632 263.495C356.7921829223632 263.495 356.7921829223632 263.495 356.7921829223632 263.495C356.7921829223632 263.495 356.7921829223632 263.495 356.7921829223632 263.495C356.7921829223632 263.495 356.7921829223632 263.495 356.7921829223632 263.495C356.7921829223632 263.495 356.7921829223632 263.495 356.7921829223632 263.495C356.7921829223632 263.495 356.7921829223632 263.495 356.7921829223632 263.495 "
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 356.7921829223632 263.495 L 356.7921829223632 205.52632000000003 L 368.8868331909179 205.52632000000003 L 368.8868331909179 263.495 z"
                                                        pathFrom="M 358.09019012451165 263.495 L 358.09019012451165 263.495 L 370.228840637207 263.495 L 370.228840637207 263.495 z L 356.7921829223632 263.495 L 368.8868331909179 263.495 L 368.8868331909179 263.495 L 368.8868331909179 263.495 L 368.8868331909179 263.495 L 368.8868331909179 263.495 L 356.7921829223632 263.495 z"
                                                        cy="205.52532000000002" cx="437.4231847127278" j="4" val="22"
                                                        barHeight="57.968680000000006" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1818"
                                                        d="M437.4231847127278 263.495L437.4231847127278 150.19258000000002L449.5178349812825 150.19258000000002L449.5178349812825 263.495L437.4231847127278 263.495C437.4231847127278 263.495 437.4231847127278 263.495 437.4231847127278 263.495C437.4231847127278 263.495 437.4231847127278 263.495 437.4231847127278 263.495C437.4231847127278 263.495 437.4231847127278 263.495 437.4231847127278 263.495C437.4231847127278 263.495 437.4231847127278 263.495 437.4231847127278 263.495C437.4231847127278 263.495 437.4231847127278 263.495 437.4231847127278 263.495C437.4231847127278 263.495 437.4231847127278 263.495 437.4231847127278 263.495C437.4231847127278 263.495 437.4231847127278 263.495 437.4231847127278 263.495C437.4231847127278 263.495 437.4231847127278 263.495 437.4231847127278 263.495 "
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 437.4231847127278 263.495 L 437.4231847127278 150.19258000000002 L 449.5178349812825 150.19258000000002 L 449.5178349812825 263.495 z"
                                                        pathFrom="M 439.0145268758137 263.495 L 439.0145268758137 263.495 L 451.15317738850905 263.495 L 451.15317738850905 263.495 z L 437.4231847127278 263.495 L 449.5178349812825 263.495 L 449.5178349812825 263.495 L 449.5178349812825 263.495 L 449.5178349812825 263.495 L 449.5178349812825 263.495 L 437.4231847127278 263.495 z"
                                                        cy="150.19158000000002" cx="518.0541865030924" j="5" val="43"
                                                        barHeight="113.30242000000001" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1820"
                                                        d="M518.0541865030924 263.495L518.0541865030924 168.63716000000002L530.1488367716471 168.63716000000002L530.1488367716471 263.495L518.0541865030924 263.495C518.0541865030924 263.495 518.0541865030924 263.495 518.0541865030924 263.495C518.0541865030924 263.495 518.0541865030924 263.495 518.0541865030924 263.495C518.0541865030924 263.495 518.0541865030924 263.495 518.0541865030924 263.495C518.0541865030924 263.495 518.0541865030924 263.495 518.0541865030924 263.495C518.0541865030924 263.495 518.0541865030924 263.495 518.0541865030924 263.495C518.0541865030924 263.495 518.0541865030924 263.495 518.0541865030924 263.495C518.0541865030924 263.495 518.0541865030924 263.495 518.0541865030924 263.495C518.0541865030924 263.495 518.0541865030924 263.495 518.0541865030924 263.495 "
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 518.0541865030924 263.495 L 518.0541865030924 168.63716000000002 L 530.1488367716471 168.63716000000002 L 530.1488367716471 263.495 z"
                                                        pathFrom="M 519.9388636271158 263.495 L 519.9388636271158 263.495 L 532.0775141398111 263.495 L 532.0775141398111 263.495 z L 518.0541865030924 263.495 L 530.1488367716471 263.495 L 530.1488367716471 263.495 L 530.1488367716471 263.495 L 530.1488367716471 263.495 L 530.1488367716471 263.495 L 518.0541865030924 263.495 z"
                                                        cy="168.63616000000002" cx="598.685188293457" j="6" val="36"
                                                        barHeight="94.85784000000001" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1822"
                                                        d="M598.685188293457 263.495L598.685188293457 126.47812000000002L610.7798385620117 126.47812000000002L610.7798385620117 263.495L598.685188293457 263.495C598.685188293457 263.495 598.685188293457 263.495 598.685188293457 263.495C598.685188293457 263.495 598.685188293457 263.495 598.685188293457 263.495C598.685188293457 263.495 598.685188293457 263.495 598.685188293457 263.495C598.685188293457 263.495 598.685188293457 263.495 598.685188293457 263.495C598.685188293457 263.495 598.685188293457 263.495 598.685188293457 263.495C598.685188293457 263.495 598.685188293457 263.495 598.685188293457 263.495C598.685188293457 263.495 598.685188293457 263.495 598.685188293457 263.495C598.685188293457 263.495 598.685188293457 263.495 598.685188293457 263.495 "
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 598.685188293457 263.495 L 598.685188293457 126.47812000000002 L 610.7798385620117 126.47812000000002 L 610.7798385620117 263.495 z"
                                                        pathFrom="M 600.8632003784179 263.495 L 600.8632003784179 263.495 L 613.0018508911132 263.495 L 613.0018508911132 263.495 z L 598.685188293457 263.495 L 610.7798385620117 263.495 L 610.7798385620117 263.495 L 610.7798385620117 263.495 L 610.7798385620117 263.495 L 610.7798385620117 263.495 L 598.685188293457 263.495 z"
                                                        cy="126.47712000000001" cx="679.3161900838217" j="7" val="52"
                                                        barHeight="137.01688000000001" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1824"
                                                        d="M679.3161900838217 263.495L679.3161900838217 200.25644000000003L691.4108403523763 200.25644000000003L691.4108403523763 263.495L679.3161900838217 263.495C679.3161900838217 263.495 679.3161900838217 263.495 679.3161900838217 263.495C679.3161900838217 263.495 679.3161900838217 263.495 679.3161900838217 263.495C679.3161900838217 263.495 679.3161900838217 263.495 679.3161900838217 263.495C679.3161900838217 263.495 679.3161900838217 263.495 679.3161900838217 263.495C679.3161900838217 263.495 679.3161900838217 263.495 679.3161900838217 263.495C679.3161900838217 263.495 679.3161900838217 263.495 679.3161900838217 263.495C679.3161900838217 263.495 679.3161900838217 263.495 679.3161900838217 263.495C679.3161900838217 263.495 679.3161900838217 263.495 679.3161900838217 263.495 "
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 679.3161900838217 263.495 L 679.3161900838217 200.25644000000003 L 691.4108403523763 200.25644000000003 L 691.4108403523763 263.495 z"
                                                        pathFrom="M 681.78753712972 263.495 L 681.78753712972 263.495 L 693.9261876424154 263.495 L 693.9261876424154 263.495 z L 679.3161900838217 263.495 L 691.4108403523763 263.495 L 691.4108403523763 263.495 L 691.4108403523763 263.495 L 691.4108403523763 263.495 L 691.4108403523763 263.495 L 679.3161900838217 263.495 z"
                                                        cy="200.25544000000002" cx="759.9471918741863" j="8" val="24"
                                                        barHeight="63.23856000000001" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1826"
                                                        d="M759.9471918741863 263.495L759.9471918741863 216.06608000000003L772.041842142741 216.06608000000003L772.041842142741 263.495L759.9471918741863 263.495C759.9471918741863 263.495 759.9471918741863 263.495 759.9471918741863 263.495C759.9471918741863 263.495 759.9471918741863 263.495 759.9471918741863 263.495C759.9471918741863 263.495 759.9471918741863 263.495 759.9471918741863 263.495C759.9471918741863 263.495 759.9471918741863 263.495 759.9471918741863 263.495C759.9471918741863 263.495 759.9471918741863 263.495 759.9471918741863 263.495C759.9471918741863 263.495 759.9471918741863 263.495 759.9471918741863 263.495C759.9471918741863 263.495 759.9471918741863 263.495 759.9471918741863 263.495C759.9471918741863 263.495 759.9471918741863 263.495 759.9471918741863 263.495 "
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 759.9471918741863 263.495 L 759.9471918741863 216.06608000000003 L 772.041842142741 216.06608000000003 L 772.041842142741 263.495 z"
                                                        pathFrom="M 762.7118738810221 263.495 L 762.7118738810221 263.495 L 774.8505243937175 263.495 L 774.8505243937175 263.495 z L 759.9471918741863 263.495 L 772.041842142741 263.495 L 772.041842142741 263.495 L 772.041842142741 263.495 L 772.041842142741 263.495 L 772.041842142741 263.495 L 759.9471918741863 263.495 z"
                                                        cy="216.06508000000002" cx="840.5781936645509" j="9" val="18"
                                                        barHeight="47.428920000000005" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1828"
                                                        d="M840.5781936645509 263.495L840.5781936645509 168.63716000000002L852.6728439331056 168.63716000000002L852.6728439331056 263.495L840.5781936645509 263.495C840.5781936645509 263.495 840.5781936645509 263.495 840.5781936645509 263.495C840.5781936645509 263.495 840.5781936645509 263.495 840.5781936645509 263.495C840.5781936645509 263.495 840.5781936645509 263.495 840.5781936645509 263.495C840.5781936645509 263.495 840.5781936645509 263.495 840.5781936645509 263.495C840.5781936645509 263.495 840.5781936645509 263.495 840.5781936645509 263.495C840.5781936645509 263.495 840.5781936645509 263.495 840.5781936645509 263.495C840.5781936645509 263.495 840.5781936645509 263.495 840.5781936645509 263.495C840.5781936645509 263.495 840.5781936645509 263.495 840.5781936645509 263.495 "
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 840.5781936645509 263.495 L 840.5781936645509 168.63716000000002 L 852.6728439331056 168.63716000000002 L 852.6728439331056 263.495 z"
                                                        pathFrom="M 843.6362106323243 263.495 L 843.6362106323243 263.495 L 855.7748611450196 263.495 L 855.7748611450196 263.495 z L 840.5781936645509 263.495 L 852.6728439331056 263.495 L 852.6728439331056 263.495 L 852.6728439331056 263.495 L 852.6728439331056 263.495 L 852.6728439331056 263.495 L 840.5781936645509 263.495 z"
                                                        cy="168.63616000000002" cx="921.2091954549155" j="10" val="36"
                                                        barHeight="94.85784000000001" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1830"
                                                        d="M921.2091954549155 263.495L921.2091954549155 137.01788000000002L933.3038457234702 137.01788000000002L933.3038457234702 263.495L921.2091954549155 263.495C921.2091954549155 263.495 921.2091954549155 263.495 921.2091954549155 263.495C921.2091954549155 263.495 921.2091954549155 263.495 921.2091954549155 263.495C921.2091954549155 263.495 921.2091954549155 263.495 921.2091954549155 263.495C921.2091954549155 263.495 921.2091954549155 263.495 921.2091954549155 263.495C921.2091954549155 263.495 921.2091954549155 263.495 921.2091954549155 263.495C921.2091954549155 263.495 921.2091954549155 263.495 921.2091954549155 263.495C921.2091954549155 263.495 921.2091954549155 263.495 921.2091954549155 263.495C921.2091954549155 263.495 921.2091954549155 263.495 921.2091954549155 263.495 "
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 921.2091954549155 263.495 L 921.2091954549155 137.01788000000002 L 933.3038457234702 137.01788000000002 L 933.3038457234702 263.495 z"
                                                        pathFrom="M 924.5605473836264 263.495 L 924.5605473836264 263.495 L 936.6991978963217 263.495 L 936.6991978963217 263.495 z L 921.2091954549155 263.495 L 933.3038457234702 263.495 L 933.3038457234702 263.495 L 933.3038457234702 263.495 L 933.3038457234702 263.495 L 933.3038457234702 263.495 L 921.2091954549155 263.495 z"
                                                        cy="137.01688000000001" cx="1001.8401972452801" j="11" val="48"
                                                        barHeight="126.47712000000001" barWidth="12.094650268554688"></path>
                                                    <g id="SvgjsG1806" class="apexcharts-bar-goals-markers">
                                                        <g id="SvgjsG1807" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1809" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1811" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1813" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1815" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1817" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1819" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1821" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1823" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1825" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1827" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1829" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1831" class="apexcharts-series" seriesName="SeriesxB"
                                                    rel="2" data:realIndex="1">
                                                    <path id="SvgjsPath1835"
                                                        d="M34.268175760904946 147.55864000000003L34.268175760904946 113.30442000000002L46.36282602945963 113.30442000000002L46.36282602945963 147.55864000000003L34.268175760904946 147.55864000000003C34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003C34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003C34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003C34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003C34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003C34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003C34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003C34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003 34.268175760904946 147.55864000000003 "
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 34.268175760904946 147.55864000000003 L 34.268175760904946 113.30442000000002 L 46.36282602945963 113.30442000000002 L 46.36282602945963 147.55864000000003 z"
                                                        pathFrom="M 34.392843119303386 263.495 L 34.392843119303386 194.98656000000003 L 46.5314936319987 194.98656000000003 L 46.5314936319987 263.495 z L 34.268175760904946 147.55864000000003 L 46.36282602945963 147.55864000000003 L 46.36282602945963 147.55864000000003 L 46.36282602945963 147.55864000000003 L 46.36282602945963 147.55864000000003 L 46.36282602945963 147.55864000000003 L 34.268175760904946 147.55864000000003 z"
                                                        cy="113.30342000000002" cx="114.89917755126953" j="0" val="13"
                                                        barHeight="34.254220000000004" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1837"
                                                        d="M114.89917755126953 118.57430000000002L114.89917755126953 57.970680000000016L126.99382781982422 57.970680000000016L126.99382781982422 118.57430000000002L114.89917755126953 118.57430000000002C114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002C114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002C114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002C114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002C114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002C114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002C114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002C114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002 114.89917755126953 118.57430000000002 "
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 114.89917755126953 118.57430000000002 L 114.89917755126953 57.97068000000001 L 126.99382781982422 57.97068000000001 L 126.99382781982422 118.57430000000002 z"
                                                        pathFrom="M 115.31717987060546 263.495 L 115.31717987060546 142.28776000000002 L 127.45583038330076 142.28776000000002 L 127.45583038330076 263.495 z L 114.89917755126953 118.57430000000002 L 126.99382781982422 118.57430000000002 L 126.99382781982422 118.57430000000002 L 126.99382781982422 118.57430000000002 L 126.99382781982422 118.57430000000002 L 126.99382781982422 118.57430000000002 L 114.89917755126953 118.57430000000002 z"
                                                        cy="57.96968000000001" cx="195.5301793416341" j="1" val="23"
                                                        barHeight="60.60362000000001" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1839"
                                                        d="M195.5301793416341 155.46346000000003L195.5301793416341 102.76466000000002L207.62482961018878 102.76466000000002L207.62482961018878 155.46346000000003L195.5301793416341 155.46346000000003C195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003C195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003C195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003C195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003C195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003C195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003C195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003C195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003 195.5301793416341 155.46346000000003 "
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 195.5301793416341 155.46346000000003 L 195.5301793416341 102.76466000000002 L 207.62482961018878 102.76466000000002 L 207.62482961018878 155.46346000000003 z"
                                                        pathFrom="M 196.24151662190752 263.495 L 196.24151662190752 158.09740000000002 L 208.38016713460283 158.09740000000002 L 208.38016713460283 263.495 z L 195.5301793416341 155.46346000000003 L 207.62482961018878 155.46346000000003 L 207.62482961018878 155.46346000000003 L 207.62482961018878 155.46346000000003 L 207.62482961018878 155.46346000000003 L 207.62482961018878 155.46346000000003 L 195.5301793416341 155.46346000000003 z"
                                                        cy="102.76366000000002" cx="276.16118113199866" j="2" val="20"
                                                        barHeight="52.698800000000006" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1841"
                                                        d="M276.16118113199866 86.95502000000002L276.16118113199866 65.87550000000002L288.25583140055335 65.87550000000002L288.25583140055335 86.95502000000002L276.16118113199866 86.95502000000002C276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002C276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002C276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002C276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002C276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002C276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002C276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002C276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002 276.16118113199866 86.95502000000002 "
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 276.16118113199866 86.95502000000002 L 276.16118113199866 65.87550000000002 L 288.25583140055335 65.87550000000002 L 288.25583140055335 86.95502000000002 z"
                                                        pathFrom="M 277.1658533732096 263.495 L 277.1658533732096 221.33596000000003 L 289.3045038859049 221.33596000000003 L 289.3045038859049 263.495 z L 276.16118113199866 86.95502000000002 L 288.25583140055335 86.95502000000002 L 288.25583140055335 86.95502000000002 L 288.25583140055335 86.95502000000002 L 288.25583140055335 86.95502000000002 L 288.25583140055335 86.95502000000002 L 276.16118113199866 86.95502000000002 z"
                                                        cy="65.87450000000001" cx="356.7921829223632" j="3" val="8"
                                                        barHeight="21.079520000000002" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1843"
                                                        d="M356.7921829223632 205.52732000000003L356.7921829223632 171.27310000000003L368.8868331909179 171.27310000000003L368.8868331909179 205.52732000000003L356.7921829223632 205.52732000000003C356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003C356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003C356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003C356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003C356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003C356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003C356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003C356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003 356.7921829223632 205.52732000000003 "
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 356.7921829223632 205.52732000000003 L 356.7921829223632 171.27310000000003 L 368.8868331909179 171.27310000000003 L 368.8868331909179 205.52732000000003 z"
                                                        pathFrom="M 358.09019012451165 263.495 L 358.09019012451165 194.98656000000003 L 370.228840637207 194.98656000000003 L 370.228840637207 263.495 z L 356.7921829223632 205.52732000000003 L 368.8868331909179 205.52732000000003 L 368.8868331909179 205.52732000000003 L 368.8868331909179 205.52732000000003 L 368.8868331909179 205.52732000000003 L 368.8868331909179 205.52732000000003 L 356.7921829223632 205.52732000000003 z"
                                                        cy="171.27210000000002" cx="437.4231847127278" j="4" val="13"
                                                        barHeight="34.254220000000004" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1845"
                                                        d="M437.4231847127278 150.19358000000003L437.4231847127278 79.05020000000002L449.5178349812825 79.05020000000002L449.5178349812825 150.19358000000003L437.4231847127278 150.19358000000003C437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003C437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003C437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003C437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003C437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003C437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003C437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003C437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003 437.4231847127278 150.19358000000003 "
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 437.4231847127278 150.19358000000003 L 437.4231847127278 79.05020000000002 L 449.5178349812825 79.05020000000002 L 449.5178349812825 150.19358000000003 z"
                                                        pathFrom="M 439.0145268758137 263.495 L 439.0145268758137 121.20824000000002 L 451.15317738850905 121.20824000000002 L 451.15317738850905 263.495 z L 437.4231847127278 150.19358000000003 L 449.5178349812825 150.19358000000003 L 449.5178349812825 150.19358000000003 L 449.5178349812825 150.19358000000003 L 449.5178349812825 150.19358000000003 L 449.5178349812825 150.19358000000003 L 437.4231847127278 150.19358000000003 z"
                                                        cy="79.04920000000001" cx="518.0541865030924" j="5" val="27"
                                                        barHeight="71.14338000000001" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1847"
                                                        d="M518.0541865030924 168.63816000000003L518.0541865030924 121.20924000000002L530.1488367716471 121.20924000000002L530.1488367716471 168.63816000000003L518.0541865030924 168.63816000000003C518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003C518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003C518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003C518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003C518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003C518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003C518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003C518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003 518.0541865030924 168.63816000000003 "
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 518.0541865030924 168.63816000000003 L 518.0541865030924 121.20924000000002 L 530.1488367716471 121.20924000000002 L 530.1488367716471 168.63816000000003 z"
                                                        pathFrom="M 519.9388636271158 263.495 L 519.9388636271158 168.63716000000002 L 532.0775141398111 168.63716000000002 L 532.0775141398111 263.495 z L 518.0541865030924 168.63816000000003 L 530.1488367716471 168.63816000000003 L 530.1488367716471 168.63816000000003 L 530.1488367716471 168.63816000000003 L 530.1488367716471 168.63816000000003 L 530.1488367716471 168.63816000000003 L 518.0541865030924 168.63816000000003 z"
                                                        cy="121.20824000000002" cx="598.685188293457" j="6" val="18"
                                                        barHeight="47.428920000000005" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1849"
                                                        d="M598.685188293457 126.47912000000002L598.685188293457 68.51044000000002L610.7798385620117 68.51044000000002L610.7798385620117 126.47912000000002L598.685188293457 126.47912000000002C598.685188293457 126.47912000000002 598.685188293457 126.47912000000002 598.685188293457 126.47912000000002C598.685188293457 126.47912000000002 598.685188293457 126.47912000000002 598.685188293457 126.47912000000002C598.685188293457 126.47912000000002 598.685188293457 126.47912000000002 598.685188293457 126.47912000000002C598.685188293457 126.47912000000002 598.685188293457 126.47912000000002 598.685188293457 126.47912000000002C598.685188293457 126.47912000000002 598.685188293457 126.47912000000002 598.685188293457 126.47912000000002C598.685188293457 126.47912000000002 598.685188293457 126.47912000000002 598.685188293457 126.47912000000002C598.685188293457 126.47912000000002 598.685188293457 126.47912000000002 598.685188293457 126.47912000000002C598.685188293457 126.47912000000002 598.685188293457 126.47912000000002 598.685188293457 126.47912000000002 "
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 598.685188293457 126.47912000000002 L 598.685188293457 68.51044000000002 L 610.7798385620117 68.51044000000002 L 610.7798385620117 126.47912000000002 z"
                                                        pathFrom="M 600.8632003784179 263.495 L 600.8632003784179 147.55764000000002 L 613.0018508911132 147.55764000000002 L 613.0018508911132 263.495 z L 598.685188293457 126.47912000000002 L 610.7798385620117 126.47912000000002 L 610.7798385620117 126.47912000000002 L 610.7798385620117 126.47912000000002 L 610.7798385620117 126.47912000000002 L 610.7798385620117 126.47912000000002 L 598.685188293457 126.47912000000002 z"
                                                        cy="68.50944000000001" cx="679.3161900838217" j="7" val="22"
                                                        barHeight="57.968680000000006" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1851"
                                                        d="M679.3161900838217 200.25744000000003L679.3161900838217 173.90804000000003L691.4108403523763 173.90804000000003L691.4108403523763 200.25744000000003L679.3161900838217 200.25744000000003C679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003C679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003C679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003C679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003C679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003C679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003C679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003C679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003 679.3161900838217 200.25744000000003 "
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 679.3161900838217 200.25744000000003 L 679.3161900838217 173.90804000000003 L 691.4108403523763 173.90804000000003 L 691.4108403523763 200.25744000000003 z"
                                                        pathFrom="M 681.78753712972 263.495 L 681.78753712972 210.79620000000003 L 693.9261876424154 210.79620000000003 L 693.9261876424154 263.495 z L 679.3161900838217 200.25744000000003 L 691.4108403523763 200.25744000000003 L 691.4108403523763 200.25744000000003 L 691.4108403523763 200.25744000000003 L 691.4108403523763 200.25744000000003 L 691.4108403523763 200.25744000000003 L 679.3161900838217 200.25744000000003 z"
                                                        cy="173.90704000000002" cx="759.9471918741863" j="8" val="10"
                                                        barHeight="26.349400000000003" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1853"
                                                        d="M759.9471918741863 216.06708000000003L759.9471918741863 173.90804000000003L772.041842142741 173.90804000000003L772.041842142741 216.06708000000003L759.9471918741863 216.06708000000003C759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003C759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003C759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003C759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003C759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003C759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003C759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003C759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003 759.9471918741863 216.06708000000003 "
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 759.9471918741863 216.06708000000003 L 759.9471918741863 173.90804000000003 L 772.041842142741 173.90804000000003 L 772.041842142741 216.06708000000003 z"
                                                        pathFrom="M 762.7118738810221 263.495 L 762.7118738810221 179.17692000000002 L 774.8505243937175 179.17692000000002 L 774.8505243937175 263.495 z L 759.9471918741863 216.06708000000003 L 772.041842142741 216.06708000000003 L 772.041842142741 216.06708000000003 L 772.041842142741 216.06708000000003 L 772.041842142741 216.06708000000003 L 772.041842142741 216.06708000000003 L 759.9471918741863 216.06708000000003 z"
                                                        cy="173.90704000000002" cx="840.5781936645509" j="9" val="16"
                                                        barHeight="42.159040000000005" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1855"
                                                        d="M840.5781936645509 168.63816000000003L840.5781936645509 105.39960000000002L852.6728439331056 105.39960000000002L852.6728439331056 168.63816000000003L840.5781936645509 168.63816000000003C840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003C840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003C840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003C840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003C840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003C840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003C840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003C840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003 840.5781936645509 168.63816000000003 "
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 840.5781936645509 168.63816000000003 L 840.5781936645509 105.39960000000002 L 852.6728439331056 105.39960000000002 L 852.6728439331056 168.63816000000003 z"
                                                        pathFrom="M 843.6362106323243 263.495 L 843.6362106323243 137.01788000000002 L 855.7748611450196 137.01788000000002 L 855.7748611450196 263.495 z L 840.5781936645509 168.63816000000003 L 852.6728439331056 168.63816000000003 L 852.6728439331056 168.63816000000003 L 852.6728439331056 168.63816000000003 L 852.6728439331056 168.63816000000003 L 852.6728439331056 168.63816000000003 L 840.5781936645509 168.63816000000003 z"
                                                        cy="105.39860000000002" cx="921.2091954549155" j="10" val="24"
                                                        barHeight="63.23856000000001" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1857"
                                                        d="M921.2091954549155 137.01888000000002L921.2091954549155 79.05020000000002L933.3038457234702 79.05020000000002L933.3038457234702 137.01888000000002L921.2091954549155 137.01888000000002C921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002C921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002C921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002C921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002C921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002C921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002C921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002C921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002 921.2091954549155 137.01888000000002 "
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 921.2091954549155 137.01888000000002 L 921.2091954549155 79.05020000000002 L 933.3038457234702 79.05020000000002 L 933.3038457234702 137.01888000000002 z"
                                                        pathFrom="M 924.5605473836264 263.495 L 924.5605473836264 147.55764000000002 L 936.6991978963217 147.55764000000002 L 936.6991978963217 263.495 z L 921.2091954549155 137.01888000000002 L 933.3038457234702 137.01888000000002 L 933.3038457234702 137.01888000000002 L 933.3038457234702 137.01888000000002 L 933.3038457234702 137.01888000000002 L 933.3038457234702 137.01888000000002 L 921.2091954549155 137.01888000000002 z"
                                                        cy="79.04920000000001" cx="1001.8401972452801" j="11" val="22"
                                                        barHeight="57.968680000000006" barWidth="12.094650268554688"></path>
                                                    <g id="SvgjsG1833" class="apexcharts-bar-goals-markers">
                                                        <g id="SvgjsG1834" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1836" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1838" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1840" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1842" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1844" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1846" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1848" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1850" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1852" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1854" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1856" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1858" class="apexcharts-series" seriesName="SeriesxC"
                                                    rel="3" data:realIndex="2">
                                                    <path id="SvgjsPath1862"
                                                        d="M34.268175760904946 113.30542000000003L34.268175760904946 89.32108000000002C34.268175760904946 86.82108000000002 36.768175760904946 84.32108000000002 39.268175760904946 84.32108000000002L41.36282602945963 84.32108000000002C43.86282602945963 84.32108000000002 46.36282602945963 86.82108000000002 46.36282602945963 89.32108000000002L46.36282602945963 113.30542000000003L34.268175760904946 113.30542000000003C34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003C34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003C34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003C34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003C34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003C34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003C34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003C34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003 34.268175760904946 113.30542000000003 "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 34.268175760904946 113.30542000000003 L 34.268175760904946 89.32108000000002 C 34.268175760904946 86.82108000000002 36.768175760904946 84.32108000000002 39.268175760904946 84.32108000000002 L 41.36282602945963 84.32108000000002 C 43.86282602945963 84.32108000000002 46.36282602945963 86.82108000000002 46.36282602945963 89.32108000000002 L 46.36282602945963 113.30542000000003 z "
                                                        pathFrom="M 34.392843119303386 194.98756000000003 L 34.392843119303386 142.01888000000002 C 34.392843119303386 139.51888000000002 36.892843119303386 137.01888000000002 39.392843119303386 137.01888000000002 L 41.5314936319987 137.01888000000002 C 44.0314936319987 137.01888000000002 46.5314936319987 139.51888000000002 46.5314936319987 142.01888000000002 L 46.5314936319987 194.98756000000003 z  L 34.268175760904946 113.30542000000003 L 46.36282602945963 113.30542000000003 L 46.36282602945963 113.30542000000003 L 46.36282602945963 113.30542000000003 L 46.36282602945963 113.30542000000003 L 46.36282602945963 113.30542000000003 L 34.268175760904946 113.30542000000003 z"
                                                        cy="84.32008000000002" cx="114.89917755126953" j="0" val="11"
                                                        barHeight="28.984340000000003" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1864"
                                                        d="M114.89917755126953 57.971680000000006L114.89917755126953 18.1777C114.89917755126953 15.677700000000002 117.39917755126953 13.177700000000002 119.89917755126953 13.177700000000002L121.99382781982422 13.177700000000002C124.49382781982422 13.177700000000002 126.99382781982422 15.677700000000002 126.99382781982422 18.1777L126.99382781982422 57.971680000000006L114.89917755126953 57.971680000000006C114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006C114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006C114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006C114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006C114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006C114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006C114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006C114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006 114.89917755126953 57.971680000000006 "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 114.89917755126953 57.971680000000006 L 114.89917755126953 18.1777 C 114.89917755126953 15.677700000000002 117.39917755126953 13.177700000000003 119.89917755126953 13.177700000000003 L 121.99382781982422 13.177700000000003 C 124.49382781982422 13.177700000000003 126.99382781982422 15.677700000000002 126.99382781982422 18.1777 L 126.99382781982422 57.971680000000006 z "
                                                        pathFrom="M 115.31717987060546 142.28876000000002 L 115.31717987060546 57.70080000000001 C 115.31717987060546 55.20080000000001 117.81717987060546 52.70080000000001 120.31717987060546 52.70080000000001 L 122.45583038330076 52.70080000000001 C 124.95583038330076 52.70080000000001 127.45583038330076 55.20080000000001 127.45583038330076 57.70080000000001 L 127.45583038330076 142.28876000000002 z  L 114.89917755126953 57.971680000000006 L 126.99382781982422 57.971680000000006 L 126.99382781982422 57.971680000000006 L 126.99382781982422 57.971680000000006 L 126.99382781982422 57.971680000000006 L 126.99382781982422 57.971680000000006 L 114.89917755126953 57.971680000000006 z"
                                                        cy="13.176700000000004" cx="195.5301793416341" j="1" val="17"
                                                        barHeight="44.793980000000005" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1866"
                                                        d="M195.5301793416341 102.76566000000003L195.5301793416341 68.24156000000002C195.5301793416341 65.74156000000002 198.0301793416341 63.241560000000014 200.5301793416341 63.241560000000014L202.62482961018878 63.241560000000014C205.12482961018878 63.241560000000014 207.62482961018878 65.74156000000002 207.62482961018878 68.24156000000002L207.62482961018878 102.76566000000003L195.5301793416341 102.76566000000003C195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003C195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003C195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003C195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003C195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003C195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003C195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003C195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003 195.5301793416341 102.76566000000003 "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 195.5301793416341 102.76566000000003 L 195.5301793416341 68.24156000000002 C 195.5301793416341 65.74156000000002 198.0301793416341 63.241560000000014 200.5301793416341 63.241560000000014 L 202.62482961018878 63.241560000000014 C 205.12482961018878 63.241560000000014 207.62482961018878 65.74156000000002 207.62482961018878 68.24156000000002 L 207.62482961018878 102.76566000000003 z "
                                                        pathFrom="M 196.24151662190752 158.09840000000003 L 196.24151662190752 84.05020000000002 C 196.24151662190752 81.55020000000002 198.74151662190752 79.05020000000002 201.24151662190752 79.05020000000002 L 203.38016713460283 79.05020000000002 C 205.88016713460283 79.05020000000002 208.38016713460283 81.55020000000002 208.38016713460283 84.05020000000002 L 208.38016713460283 158.09840000000003 z  L 195.5301793416341 102.76566000000003 L 207.62482961018878 102.76566000000003 L 207.62482961018878 102.76566000000003 L 207.62482961018878 102.76566000000003 L 207.62482961018878 102.76566000000003 L 207.62482961018878 102.76566000000003 L 195.5301793416341 102.76566000000003 z"
                                                        cy="63.240560000000016" cx="276.16118113199866" j="2" val="15"
                                                        barHeight="39.524100000000004" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1868"
                                                        d="M276.16118113199866 65.87650000000002L276.16118113199866 31.352400000000017C276.16118113199866 28.852400000000017 278.66118113199866 26.352400000000017 281.16118113199866 26.352400000000017L283.25583140055335 26.352400000000017C285.75583140055335 26.352400000000017 288.25583140055335 28.852400000000017 288.25583140055335 31.352400000000017L288.25583140055335 65.87650000000002L276.16118113199866 65.87650000000002C276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002C276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002C276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002C276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002C276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002C276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002C276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002C276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002 276.16118113199866 65.87650000000002 "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 276.16118113199866 65.87650000000002 L 276.16118113199866 31.352400000000014 C 276.16118113199866 28.852400000000014 278.66118113199866 26.352400000000014 281.16118113199866 26.352400000000014 L 283.25583140055335 26.352400000000014 C 285.75583140055335 26.352400000000014 288.25583140055335 28.852400000000014 288.25583140055335 31.352400000000014 L 288.25583140055335 65.87650000000002 z "
                                                        pathFrom="M 277.1658533732096 221.33696000000003 L 277.1658533732096 147.28876000000002 C 277.1658533732096 144.78876000000002 279.6658533732096 142.28876000000002 282.1658533732096 142.28876000000002 L 284.3045038859049 142.28876000000002 C 286.8045038859049 142.28876000000002 289.3045038859049 144.78876000000002 289.3045038859049 147.28876000000002 L 289.3045038859049 221.33696000000003 z  L 276.16118113199866 65.87650000000002 L 288.25583140055335 65.87650000000002 L 288.25583140055335 65.87650000000002 L 288.25583140055335 65.87650000000002 L 288.25583140055335 65.87650000000002 L 288.25583140055335 65.87650000000002 L 276.16118113199866 65.87650000000002 z"
                                                        cy="26.351400000000012" cx="356.7921829223632" j="3" val="15"
                                                        barHeight="39.524100000000004" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1870"
                                                        d="M356.7921829223632 171.27410000000003L356.7921829223632 120.94036000000003C356.7921829223632 118.44036000000003 359.2921829223632 115.94036000000003 361.7921829223632 115.94036000000003L363.8868331909179 115.94036000000003C366.3868331909179 115.94036000000003 368.8868331909179 118.44036000000003 368.8868331909179 120.94036000000003L368.8868331909179 171.27410000000003L356.7921829223632 171.27410000000003C356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003C356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003C356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003C356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003C356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003C356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003C356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003C356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003 356.7921829223632 171.27410000000003 "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 356.7921829223632 171.27410000000003 L 356.7921829223632 120.94036000000003 C 356.7921829223632 118.44036000000003 359.2921829223632 115.94036000000003 361.7921829223632 115.94036000000003 L 363.8868331909179 115.94036000000003 C 366.3868331909179 115.94036000000003 368.8868331909179 118.44036000000003 368.8868331909179 120.94036000000003 L 368.8868331909179 171.27410000000003 z "
                                                        pathFrom="M 358.09019012451165 194.98756000000003 L 358.09019012451165 89.32008000000002 C 358.09019012451165 86.82008000000002 360.59019012451165 84.32008000000002 363.09019012451165 84.32008000000002 L 365.228840637207 84.32008000000002 C 367.728840637207 84.32008000000002 370.228840637207 86.82008000000002 370.228840637207 89.32008000000002 L 370.228840637207 194.98756000000003 z  L 356.7921829223632 171.27410000000003 L 368.8868331909179 171.27410000000003 L 368.8868331909179 171.27410000000003 L 368.8868331909179 171.27410000000003 L 368.8868331909179 171.27410000000003 L 368.8868331909179 171.27410000000003 L 356.7921829223632 171.27410000000003 z"
                                                        cy="115.93936000000002" cx="437.4231847127278" j="4" val="21"
                                                        barHeight="55.333740000000006" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1872"
                                                        d="M437.4231847127278 79.05120000000002L437.4231847127278 47.16204000000001C437.4231847127278 44.66204000000001 439.9231847127278 42.16204000000001 442.4231847127278 42.16204000000001L444.5178349812825 42.16204000000001C447.0178349812825 42.16204000000001 449.5178349812825 44.66204000000001 449.5178349812825 47.16204000000001L449.5178349812825 79.05120000000002L437.4231847127278 79.05120000000002C437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002C437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002C437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002C437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002C437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002C437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002C437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002C437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002 437.4231847127278 79.05120000000002 "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 437.4231847127278 79.05120000000002 L 437.4231847127278 47.16204000000001 C 437.4231847127278 44.66204000000001 439.9231847127278 42.16204000000001 442.4231847127278 42.16204000000001 L 444.5178349812825 42.16204000000001 C 447.0178349812825 42.16204000000001 449.5178349812825 44.66204000000001 449.5178349812825 47.16204000000001 L 449.5178349812825 79.05120000000002 z "
                                                        pathFrom="M 439.0145268758137 121.20924000000002 L 439.0145268758137 52.43092000000001 C 439.0145268758137 49.93092000000001 441.5145268758137 47.43092000000001 444.0145268758137 47.43092000000001 L 446.15317738850905 47.43092000000001 C 448.65317738850905 47.43092000000001 451.15317738850905 49.93092000000001 451.15317738850905 52.43092000000001 L 451.15317738850905 121.20924000000002 z  L 437.4231847127278 79.05120000000002 L 449.5178349812825 79.05120000000002 L 449.5178349812825 79.05120000000002 L 449.5178349812825 79.05120000000002 L 449.5178349812825 79.05120000000002 L 449.5178349812825 79.05120000000002 L 437.4231847127278 79.05120000000002 z"
                                                        cy="42.161040000000014" cx="518.0541865030924" j="5" val="14"
                                                        barHeight="36.889160000000004" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1874"
                                                        d="M518.0541865030924 121.21024000000003L518.0541865030924 97.22590000000002C518.0541865030924 94.72590000000002 520.5541865030924 92.22590000000002 523.0541865030924 92.22590000000002L525.1488367716471 92.22590000000002C527.6488367716471 92.22590000000002 530.1488367716471 94.72590000000002 530.1488367716471 97.22590000000002L530.1488367716471 121.21024000000003L518.0541865030924 121.21024000000003C518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003C518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003C518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003C518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003C518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003C518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003C518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003C518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003 518.0541865030924 121.21024000000003 "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 518.0541865030924 121.21024000000003 L 518.0541865030924 97.22590000000002 C 518.0541865030924 94.72590000000002 520.5541865030924 92.22590000000002 523.0541865030924 92.22590000000002 L 525.1488367716471 92.22590000000002 C 527.6488367716471 92.22590000000002 530.1488367716471 94.72590000000002 530.1488367716471 97.22590000000002 L 530.1488367716471 121.21024000000003 z "
                                                        pathFrom="M 519.9388636271158 168.63816000000003 L 519.9388636271158 115.66948000000002 C 519.9388636271158 113.16948000000002 522.4388636271158 110.66948000000002 524.9388636271158 110.66948000000002 L 527.0775141398111 110.66948000000002 C 529.5775141398111 110.66948000000002 532.0775141398111 113.16948000000002 532.0775141398111 115.66948000000002 L 532.0775141398111 168.63816000000003 z  L 518.0541865030924 121.21024000000003 L 530.1488367716471 121.21024000000003 L 530.1488367716471 121.21024000000003 L 530.1488367716471 121.21024000000003 L 530.1488367716471 121.21024000000003 L 530.1488367716471 121.21024000000003 L 518.0541865030924 121.21024000000003 z"
                                                        cy="92.22490000000002" cx="598.685188293457" j="6" val="11"
                                                        barHeight="28.984340000000003" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1876"
                                                        d="M598.685188293457 68.51144000000002L598.685188293457 26.082520000000013C598.685188293457 23.582520000000013 601.185188293457 21.082520000000013 603.685188293457 21.082520000000013L605.7798385620117 21.082520000000013C608.2798385620117 21.082520000000013 610.7798385620117 23.582520000000013 610.7798385620117 26.082520000000013L610.7798385620117 68.51144000000002L598.685188293457 68.51144000000002C598.685188293457 68.51144000000002 598.685188293457 68.51144000000002 598.685188293457 68.51144000000002C598.685188293457 68.51144000000002 598.685188293457 68.51144000000002 598.685188293457 68.51144000000002C598.685188293457 68.51144000000002 598.685188293457 68.51144000000002 598.685188293457 68.51144000000002C598.685188293457 68.51144000000002 598.685188293457 68.51144000000002 598.685188293457 68.51144000000002C598.685188293457 68.51144000000002 598.685188293457 68.51144000000002 598.685188293457 68.51144000000002C598.685188293457 68.51144000000002 598.685188293457 68.51144000000002 598.685188293457 68.51144000000002C598.685188293457 68.51144000000002 598.685188293457 68.51144000000002 598.685188293457 68.51144000000002C598.685188293457 68.51144000000002 598.685188293457 68.51144000000002 598.685188293457 68.51144000000002 "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 598.685188293457 68.51144000000002 L 598.685188293457 26.082520000000013 C 598.685188293457 23.582520000000013 601.185188293457 21.082520000000013 603.685188293457 21.082520000000013 L 605.7798385620117 21.082520000000013 C 608.2798385620117 21.082520000000013 610.7798385620117 23.582520000000013 610.7798385620117 26.082520000000013 L 610.7798385620117 68.51144000000002 z "
                                                        pathFrom="M 600.8632003784179 147.55864000000003 L 600.8632003784179 57.70080000000001 C 600.8632003784179 55.20080000000001 603.3632003784179 52.70080000000001 605.8632003784179 52.70080000000001 L 608.0018508911132 52.70080000000001 C 610.5018508911132 52.70080000000001 613.0018508911132 55.20080000000001 613.0018508911132 57.70080000000001 L 613.0018508911132 147.55864000000003 z  L 598.685188293457 68.51144000000002 L 610.7798385620117 68.51144000000002 L 610.7798385620117 68.51144000000002 L 610.7798385620117 68.51144000000002 L 610.7798385620117 68.51144000000002 L 610.7798385620117 68.51144000000002 L 598.685188293457 68.51144000000002 z"
                                                        cy="21.081520000000012" cx="679.3161900838217" j="7" val="18"
                                                        barHeight="47.428920000000005" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1878"
                                                        d="M679.3161900838217 173.90904000000003L679.3161900838217 134.11506000000003C679.3161900838217 131.61506000000003 681.8161900838217 129.11506000000003 684.3161900838217 129.11506000000003L686.4108403523763 129.11506000000003C688.9108403523763 129.11506000000003 691.4108403523763 131.61506000000003 691.4108403523763 134.11506000000003L691.4108403523763 173.90904000000003L679.3161900838217 173.90904000000003C679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003C679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003C679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003C679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003C679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003C679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003C679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003C679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003 679.3161900838217 173.90904000000003 "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 679.3161900838217 173.90904000000003 L 679.3161900838217 134.11506000000003 C 679.3161900838217 131.61506000000003 681.8161900838217 129.11506000000003 684.3161900838217 129.11506000000003 L 686.4108403523763 129.11506000000003 C 688.9108403523763 129.11506000000003 691.4108403523763 131.61506000000003 691.4108403523763 134.11506000000003 L 691.4108403523763 173.90904000000003 z "
                                                        pathFrom="M 681.78753712972 210.79720000000003 L 681.78753712972 126.20924000000002 C 681.78753712972 123.70924000000002 684.28753712972 121.20924000000002 686.78753712972 121.20924000000002 L 688.9261876424154 121.20924000000002 C 691.4261876424154 121.20924000000002 693.9261876424154 123.70924000000002 693.9261876424154 126.20924000000002 L 693.9261876424154 210.79720000000003 z  L 679.3161900838217 173.90904000000003 L 691.4108403523763 173.90904000000003 L 691.4108403523763 173.90904000000003 L 691.4108403523763 173.90904000000003 L 691.4108403523763 173.90904000000003 L 691.4108403523763 173.90904000000003 L 679.3161900838217 173.90904000000003 z"
                                                        cy="129.11406000000002" cx="759.9471918741863" j="8" val="17"
                                                        barHeight="44.793980000000005" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1880"
                                                        d="M759.9471918741863 173.90904000000003L759.9471918741863 147.28976000000003C759.9471918741863 144.78976000000003 762.4471918741863 142.28976000000003 764.9471918741863 142.28976000000003L767.041842142741 142.28976000000003C769.541842142741 142.28976000000003 772.041842142741 144.78976000000003 772.041842142741 147.28976000000003L772.041842142741 173.90904000000003L759.9471918741863 173.90904000000003C759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003C759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003C759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003C759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003C759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003C759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003C759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003C759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003 759.9471918741863 173.90904000000003 "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 759.9471918741863 173.90904000000003 L 759.9471918741863 147.28976000000003 C 759.9471918741863 144.78976000000003 762.4471918741863 142.28976000000003 764.9471918741863 142.28976000000003 L 767.041842142741 142.28976000000003 C 769.541842142741 142.28976000000003 772.041842142741 144.78976000000003 772.041842142741 147.28976000000003 L 772.041842142741 173.90904000000003 z "
                                                        pathFrom="M 762.7118738810221 179.17792000000003 L 762.7118738810221 120.93936000000002 C 762.7118738810221 118.43936000000002 765.2118738810221 115.93936000000002 767.7118738810221 115.93936000000002 L 769.8505243937175 115.93936000000002 C 772.3505243937175 115.93936000000002 774.8505243937175 118.43936000000002 774.8505243937175 120.93936000000002 L 774.8505243937175 179.17792000000003 z  L 759.9471918741863 173.90904000000003 L 772.041842142741 173.90904000000003 L 772.041842142741 173.90904000000003 L 772.041842142741 173.90904000000003 L 772.041842142741 173.90904000000003 L 772.041842142741 173.90904000000003 L 759.9471918741863 173.90904000000003 z"
                                                        cy="142.28876000000002" cx="840.5781936645509" j="9" val="12"
                                                        barHeight="31.619280000000003" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1882"
                                                        d="M840.5781936645509 105.40060000000003L840.5781936645509 57.70180000000001C840.5781936645509 55.20180000000001 843.0781936645509 52.70180000000001 845.5781936645509 52.70180000000001L847.6728439331056 52.70180000000001C850.1728439331056 52.70180000000001 852.6728439331056 55.20180000000001 852.6728439331056 57.70180000000001L852.6728439331056 105.40060000000003L840.5781936645509 105.40060000000003C840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003C840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003C840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003C840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003C840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003C840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003C840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003C840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003 840.5781936645509 105.40060000000003 "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 840.5781936645509 105.40060000000003 L 840.5781936645509 57.70180000000001 C 840.5781936645509 55.20180000000001 843.0781936645509 52.70180000000001 845.5781936645509 52.70180000000001 L 847.6728439331056 52.70180000000001 C 850.1728439331056 52.70180000000001 852.6728439331056 55.20180000000001 852.6728439331056 57.70180000000001 L 852.6728439331056 105.40060000000003 z "
                                                        pathFrom="M 843.6362106323243 137.01888000000002 L 843.6362106323243 36.62128000000001 C 843.6362106323243 34.12128000000001 846.1362106323243 31.62128000000001 848.6362106323243 31.62128000000001 L 850.7748611450196 31.62128000000001 C 853.2748611450196 31.62128000000001 855.7748611450196 34.12128000000001 855.7748611450196 36.62128000000001 L 855.7748611450196 137.01888000000002 z  L 840.5781936645509 105.40060000000003 L 852.6728439331056 105.40060000000003 L 852.6728439331056 105.40060000000003 L 852.6728439331056 105.40060000000003 L 852.6728439331056 105.40060000000003 L 852.6728439331056 105.40060000000003 L 840.5781936645509 105.40060000000003 z"
                                                        cy="52.700800000000015" cx="921.2091954549155" j="10" val="20"
                                                        barHeight="52.698800000000006" barWidth="12.094650268554688"></path>
                                                    <path id="SvgjsPath1884"
                                                        d="M921.2091954549155 79.05120000000002L921.2091954549155 36.62228000000002C921.2091954549155 34.12228000000002 923.7091954549155 31.622280000000014 926.2091954549155 31.622280000000014L928.3038457234702 31.622280000000014C930.8038457234702 31.622280000000014 933.3038457234702 34.12228000000002 933.3038457234702 36.62228000000002L933.3038457234702 79.05120000000002L921.2091954549155 79.05120000000002C921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002C921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002C921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002C921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002C921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002C921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002C921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002C921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002 921.2091954549155 79.05120000000002 "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskm3b2r1jg)"
                                                        pathTo="M 921.2091954549155 79.05120000000002 L 921.2091954549155 36.62228000000002 C 921.2091954549155 34.12228000000002 923.7091954549155 31.622280000000014 926.2091954549155 31.622280000000014 L 928.3038457234702 31.622280000000014 C 930.8038457234702 31.622280000000014 933.3038457234702 34.12228000000002 933.3038457234702 36.62228000000002 L 933.3038457234702 79.05120000000002 z "
                                                        pathFrom="M 924.5605473836264 147.55864000000003 L 924.5605473836264 57.70080000000001 C 924.5605473836264 55.20080000000001 927.0605473836264 52.70080000000001 929.5605473836264 52.70080000000001 L 931.6991978963217 52.70080000000001 C 934.1991978963217 52.70080000000001 936.6991978963217 55.20080000000001 936.6991978963217 57.70080000000001 L 936.6991978963217 147.55864000000003 z  L 921.2091954549155 79.05120000000002 L 933.3038457234702 79.05120000000002 L 933.3038457234702 79.05120000000002 L 933.3038457234702 79.05120000000002 L 933.3038457234702 79.05120000000002 L 933.3038457234702 79.05120000000002 L 921.2091954549155 79.05120000000002 z"
                                                        cy="31.621280000000013" cx="1001.8401972452801" j="11" val="18"
                                                        barHeight="47.428920000000005" barWidth="12.094650268554688"></path>
                                                    <g id="SvgjsG1860" class="apexcharts-bar-goals-markers">
                                                        <g id="SvgjsG1861" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1863" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1865" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1867" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1869" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1871" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1873" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1875" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1877" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1879" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1881" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                        <g id="SvgjsG1883" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskm3b2r1jg)"></g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1805" class="apexcharts-datalabels" data:realIndex="0"></g>
                                                <g id="SvgjsG1832" class="apexcharts-datalabels" data:realIndex="1"></g>
                                                <g id="SvgjsG1859" class="apexcharts-datalabels" data:realIndex="2"></g>
                                            </g>
                                            <line id="SvgjsLine1910" x1="0" y1="0" x2="967.572021484375"
                                                y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1911" x1="0" y1="0" x2="967.572021484375"
                                                y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG1912" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG1913" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -4)">
                                                    <text id="SvgjsText1915" font-family="Helvetica, Arial, sans-serif"
                                                        x="40.31550089518229" y="292.494" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1916">Jan</tspan>
                                                        <title>Jan</title>
                                                    </text><text id="SvgjsText1918" font-family="Helvetica, Arial, sans-serif"
                                                        x="120.94650268554688" y="292.494" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1919">Feb</tspan>
                                                        <title>Feb</title>
                                                    </text><text id="SvgjsText1921" font-family="Helvetica, Arial, sans-serif"
                                                        x="201.57750447591147" y="292.494" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1922">Mar</tspan>
                                                        <title>Mar</title>
                                                    </text><text id="SvgjsText1924" font-family="Helvetica, Arial, sans-serif"
                                                        x="282.208506266276" y="292.494" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1925">Apr</tspan>
                                                        <title>Apr</title>
                                                    </text><text id="SvgjsText1927" font-family="Helvetica, Arial, sans-serif"
                                                        x="362.83950805664057" y="292.494" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1928">May</tspan>
                                                        <title>May</title>
                                                    </text><text id="SvgjsText1930" font-family="Helvetica, Arial, sans-serif"
                                                        x="443.47050984700513" y="292.494" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1931">Jun</tspan>
                                                        <title>Jun</title>
                                                    </text><text id="SvgjsText1933" font-family="Helvetica, Arial, sans-serif"
                                                        x="524.1015116373698" y="292.494" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1934">Jul</tspan>
                                                        <title>Jul</title>
                                                    </text><text id="SvgjsText1936" font-family="Helvetica, Arial, sans-serif"
                                                        x="604.7325134277344" y="292.494" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1937">Aug</tspan>
                                                        <title>Aug</title>
                                                    </text><text id="SvgjsText1939" font-family="Helvetica, Arial, sans-serif"
                                                        x="685.363515218099" y="292.494" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1940">Sep</tspan>
                                                        <title>Sep</title>
                                                    </text><text id="SvgjsText1942" font-family="Helvetica, Arial, sans-serif"
                                                        x="765.9945170084636" y="292.494" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1943">Oct</tspan>
                                                        <title>Oct</title>
                                                    </text><text id="SvgjsText1945" font-family="Helvetica, Arial, sans-serif"
                                                        x="846.6255187988282" y="292.494" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1946">Nov</tspan>
                                                        <title>Nov</title>
                                                    </text><text id="SvgjsText1948" font-family="Helvetica, Arial, sans-serif"
                                                        x="927.2565205891929" y="292.494" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="12px" font-weight="400"
                                                        fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1949">Dec</tspan>
                                                        <title>Dec</title>
                                                    </text>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1971"
                                                class="apexcharts-yaxis-annotations apexcharts-hidden-element-shown">
                                            </g>
                                            <g id="SvgjsG1972"
                                                class="apexcharts-xaxis-annotations apexcharts-hidden-element-shown">
                                            </g>
                                            <g id="SvgjsG1973"
                                                class="apexcharts-point-annotations apexcharts-hidden-element-shown">
                                            </g>
                                        </g>
                                    </svg>
                                    <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 164.844px; top: 113px;">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">Feb</div>
                                        <div class="apexcharts-tooltip-series-group apexcharts-active"
                                            style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(85, 110, 230);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label">Series A: </span><span
                                                        class="apexcharts-tooltip-text-y-value">55</span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 2; display: none;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(85, 110, 230);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label">Series A: </span><span
                                                        class="apexcharts-tooltip-text-y-value">55</span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 3; display: none;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(85, 110, 230);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label">Series A: </span><span
                                                        class="apexcharts-tooltip-text-y-value">55</span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>

    <!-- dashboard init -->
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\installed-application\laragon\www\egs-solar-1\resources\views/index.blade.php ENDPATH**/ ?>