﻿@extends('layouts.head')
@section('title', '管理系统后台')
@section('keyword', '管理系统后台')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="p-2">
                            <div class="card-content bg-twitter p-2 rounded">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="mb-0 text-white">23K</h4>
                                        <p class="mb-0 text-white">Number of Fans</p>
                                    </div>
                                    <div class="w-icon"><i class="fa fa-users text-white"></i></div>
                                </div>
                                <div class="progress mt-3" style="height:4px;">
                                    <div class="progress-bar bg-white" style="width:50%"></div>
                                </div>
                                <p class="mb-0 mt-2 text-white"><span>Gained: 655</span> <span class="float-right">Lost: 56</span></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="p-2">
                            <div class="card-content bg-facebook p-2 rounded">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="mb-0 text-white">8K</h4>
                                        <p class="mb-0 text-white">Page Views</p>
                                    </div>
                                    <div class="w-icon"><i class="fa fa-eye text-white"></i></div>
                                </div>
                                <div class="progress mt-3" style="height:4px;">
                                    <div class="progress-bar bg-white" style="width:50%"></div>
                                </div>
                                <p class="mb-0 mt-2 text-white"><span>Unique Pageviews:</span> <span class="float-right"> 4.7K</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="p-2">
                            <div class="card-content bg-twitter p-2 rounded">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="mb-0 text-white">295</h4>
                                        <p class="mb-0 text-white">Total Actions</p>
                                    </div>
                                    <div class="w-icon"><i class="fa fa-mouse-pointer text-white"></i></div>
                                </div>
                                <div class="progress mt-3" style="height:4px;">
                                    <div class="progress-bar bg-white" style="width:50%"></div>
                                </div>
                                <p class="mb-0 mt-2 text-white"><span>To Prev. Period: 655</span> <span class="float-right">+72%</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="p-2">
                            <div class="card-content bg-facebook p-2 rounded">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="mb-0 text-white">22K</h4>
                                        <p class="mb-0 text-white">Post Likes</p>
                                    </div>
                                    <div class="w-icon"><i class="fa fa-thumbs-o-up text-white"></i></div>
                                </div>
                                <div class="progress mt-3" style="height:4px;">
                                    <div class="progress-bar bg-white" style="width:50%"></div>
                                </div>
                                <p class="mb-0 mt-2 text-white"><span>New Pagelikes:</span> <span class="float-right">655</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-3">
                    <div class="card">


                        </div>
                    </div>
                </div>
            <div class="p-2" id="mychat" style="width: 600px;height:400px;">
            </div><!--End Row-->
        </div>
        <!-- End container-fluid-->

    </div><!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
    <script src="{{asset('js/echarts.js')}}"></script>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('mychat'));

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: 'ECharts 入门示例'
            },
            tooltip: {},
            legend: {
                data:['销量']
            },
            xAxis: {
                data: [1,2,3,4,5,6,7]
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                name: '销量',
                type: 'line',
                data: [5, 20, 36, 10, 10, 200],
                smooth: true
            }]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
@endsection
