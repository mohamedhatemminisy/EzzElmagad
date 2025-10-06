@extends('layouts.admin')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">

        <!-- Page Header -->
        <div class="content-header row mb-2">
            <div class="col-12">
                <h2>لوحة التحكم</h2>
            </div>
        </div>

        <!-- Dashboard Stats -->
        <div class="row">
            <div class="col-md-3 mb-2">
                <div class="card text-white bg-success">
                    <!-- Changed from bg-dark -->
                    <div class="card-body">
                        <h5>إجمالي المبالغ المستلمة</h5>
                        <h3>{{ number_format($totalReceived, 2) }} ريال</h3>
                    </div>
                </div>
            </div>


            <div class="col-md-3 mb-2">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5>عدد المستخدمين</h5>
                        <h3>{{ $usersCount }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <h5>عدد الطلبات</h5>
                        <h3>{{ $ordersCount }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5>قيد الانتظار</h5>
                        <h3>{{ $pendingCount }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5>تحت المراجعة</h5>
                        <h3>{{ $underReviewCount }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5>مقبول</h5>
                        <h3>{{ $acceptedCount }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-2">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <h5>مرفوض</h5>
                        <h3>{{ $rejectedCount }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Orders Table -->
        <div class="card mt-4">
            <div class="card-header">
                <h4>آخر 5 طلبات</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th>المستخدم</th>
                                <th>البريد</th>
                                <th>الحالة</th>
                                <th>السعر</th>
                                <th>تاريخ الطلب</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestOrders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name ?? '-' }}</td>
                                <td>{{ $order->user_email }}</td>
                                <td>
                                    @switch($order->status)
                                    @case('pending') قيد الانتظار @break
                                    @case('under_review') تحت المراجعة @break
                                    @case('accepted') مقبول @break
                                    @case('rejected') مرفوض @break
                                    @default -
                                    @endswitch
                                </td>
                                <td>{{ number_format($order->price, 2) }} ريال</td>
                                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">لا توجد طلبات بعد</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection