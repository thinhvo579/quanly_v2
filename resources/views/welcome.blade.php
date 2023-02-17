@extends('layouts.master')
@section('content')

<div class="content container-fluid">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-sub-header">
                    <h3 class="page-title">Welcome Admin!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-comman w-100">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Số Lượng Nhân Viên</h6>
                            <h3>{{$countNv}}</h3>
                        </div>
                        <div class="db-icon">
                            <img src="{{url('/images/personal.png')}}" alt="Dashboard Icon" style="width:70px;height:70px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-comman w-100">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Số Lượng Phòng Ban</h6>
                            <h3>{{$countPb}}</h3>
                        </div>
                        <div class="db-icon">
                            <img src="assets/img/icons/dash-icon-03.svg" alt="Dashboard Icon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-6">

            <div class="card card-chart">
                
                <div class="card-body">
                    <div id="gender_chart" style="height: 200px; width: 100%"></div>
                    
                </div>
            </div>

        </div>
        <div class="col-md-12 col-lg-6">

            <div class="card card-chart">
                
                <div class="card-body">
                    <div id="age_chart" style="height: 200px; width: 100%"></div>
                    <script>
                        window.onload = function () {
                         
                        var chart1 = new CanvasJS.Chart("age_chart", {
                            animationEnabled: true,
                            theme: "light2", // "light1", "light2", "dark1", "dark2"
                            title: {
                                text: "Thống kê tuổi nhân viên"
                            },
                            axisY: {
                                title: ""
                            },
                            
                            data: [{
                                type: "column",
                                dataPoints: @php echo json_encode($dataAges, JSON_NUMERIC_CHECK) @endphp
                            }]
                        });

                        var chart2 = new CanvasJS.Chart("gender_chart", {
                            animationEnabled: true,
                            theme: "light2", // "light1", "light2", "dark1", "dark2"
                            title: {
                                text: "Thống kê giới tính nhân viên"
                            },
                            axisY: {
                                title: ""
                            },
                            
                            data: [{
                                type: "column",
                                dataPoints: @php echo json_encode($genderArr, JSON_NUMERIC_CHECK) @endphp
                            }]
                        });
                        chart1.render();
                        chart2.render();
                        }
                        </script>
                </div>
            </div>

        </div>
    </div>


</div>


@endsection

   
