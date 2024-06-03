@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Замовлення</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Головна</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
{{--                        <div class="card-header">--}}
{{--                            <a href="{{ route('product.create') }}" class="btn btn-primary">Додати</a>--}}
{{--                        </div>--}}

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Статус оплати</th>
                                    <th>Фінальна сума</th>
                                    <th>Товари</th>
                                    <th>Email</th>
                                    <th>Телефон</th>
                                    <th>Ім'я</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>
                                        @foreach($products[0] as $product)
                                            <a href="{{ route('product.show', $product->id) }}">{{ $product->title }}<br></a>
                                        @endforeach
                                        </td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>
                                            <form action="{{ route('order.delete', $order->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Видалити">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                {{--                                @foreach($orders as $order)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $order->id }}</td>--}}
{{--                                        <td>{{ $order->status }}</td>--}}
{{--                                        <td>{{ $order->total_price }}</td>--}}
{{--                                        <td><a href="{{ route('order.show', $order->id) }}">Замовлення</a></td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                @foreach($products[0] as $product)--}}
{{--                                    <tr>--}}
{{--                                        <td><a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a></td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
