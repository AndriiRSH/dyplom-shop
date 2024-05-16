{{--@extends('admin.layouts.main')--}}

{{--@section('content')--}}
{{--    <!-- Content Header (Page header) -->--}}
{{--    <div class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <h1 class="m-0">Головна</h1>--}}
{{--                </div><!-- /.col -->--}}
{{--                <div class="col-sm-6">--}}
{{--                    <ol class="breadcrumb float-sm-right">--}}
{{--                        <li class="breadcrumb-item active">Головна</li>--}}
{{--                    </ol>--}}
{{--                </div><!-- /.col -->--}}
{{--            </div><!-- /.row -->--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </div>--}}
{{--    <!-- /.content-header -->--}}

{{--    <!-- Main content -->--}}
{{--    <section class="content">--}}
{{--        <div class="container-fluid">--}}
{{--            <!-- Small boxes (Stat box) -->--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-3 col-6">--}}
{{--                    тут--}}
{{--                    <!-- small box -->--}}
{{--                    <div class="small-box bg-info">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>150</h3>--}}

{{--                            <p>Замовлення</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="ion ion-bag"></i>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="small-box-footer">Докладніше <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}
{{--            </div>--}}
{{--            <!-- /.row -->--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </section>--}}
{{--    <!-- /.content -->--}}
{{--@endsection--}}
@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Головна</h1>
                </div><!-- /.col -->
                {{--                <div class="col-sm-6">--}}
                {{--                    <ol class="breadcrumb float-sm-right">--}}
                {{--                        <li class="breadcrumb-item active">Головна</li>--}}
                {{--                    </ol>--}}
                {{--                </div><!-- /.col -->--}}
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="">
                    <!-- тут починається код для графіка -->
                    <canvas id="orderChart" width="700" height="500"></canvas>
                    <!-- кінець коду для графіка -->
                </div>
{{--                <div>--}}
{{--                    <div class="small-box bg-info">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>150</h3>--}}

{{--                            <p>Замовлення</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="ion ion-bag"></i>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="small-box-footer">Докладніше <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
        // Дані про замовлення
        // var ordersData = [10, 15, 20, 25, 30, 5, 10];
        var ordersData = <?php echo json_encode($ordersData); ?>;
        {{--var daysOfWeek = <?php echo json_encode($daysOfWeek); ?>;--}}
        // Малювання графіка
        var ctx = document.getElementById('orderChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Нд'],
                datasets: [{
                    label: 'Замовлення в день',
                    data: ordersData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(144, 122, 255, 0.2)',
                        'rgba(164, 132, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(144, 122, 255, 0.2)',
                        'rgba(164, 132, 255, 0.2)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
