@extends('layouts.admin')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">

        <!-- Page Header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">
                    الطلبات
                    @isset($user)
                    - للمستخدم: {{ $user->name }}
                    @endisset
                </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">{{ trans('admin.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active">الطلبات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Body -->
        <div class="content-body">
            <section id="orders">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <!-- Card Header -->
                            <div class="card-header">
                                <h4 class="card-title">قائمة الطلبات</h4>
                            </div>

                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')

                            <!-- Filter Form -->
                            <div class="card-body border mb-2 rounded shadow-sm">
                                <form action="{{ route('orders.index') }}" method="GET">
                                    <div class="row">
                                        @if(isset($user))
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        @endif

                                        <div class="col-md-2 mb-2">
                                            <input type="text" name="user_name" class="form-control"
                                                placeholder="اسم المستخدم" value="{{ request('user_name') }}">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <input type="text" name="user_email" class="form-control"
                                                placeholder="البريد الإلكتروني" value="{{ request('user_email') }}">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <select name="status" class="form-control">
                                                <option value="">كل الحالات</option>
                                                <option value="pending" {{ request('status')=='pending' ? 'selected'
                                                    : '' }}>قيد الانتظار</option>
                                                <option value="under_review" {{ request('status')=='under_review'
                                                    ? 'selected' : '' }}>تحت المراجعة</option>
                                                <option value="accepted" {{ request('status')=='accepted' ? 'selected'
                                                    : '' }}>مقبول</option>
                                                <option value="rejected" {{ request('status')=='rejected' ? 'selected'
                                                    : '' }}>مرفوض</option>
                                            </select>
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <input type="number" step="0.01" name="min_price" class="form-control"
                                                placeholder="أقل سعر" value="{{ request('min_price') }}">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <input type="number" step="0.01" name="max_price" class="form-control"
                                                placeholder="أعلى سعر" value="{{ request('max_price') }}">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <input type="date" name="date_from" class="form-control"
                                                placeholder="من تاريخ" value="{{ request('date_from') }}">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <input type="date" name="date_to" class="form-control"
                                                placeholder="إلى تاريخ" value="{{ request('date_to') }}">
                                        </div>

                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary btn-block">تصفية</button>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{ isset($user) ? route('users.orders', $user->id) : route('orders.index') }}"
                                                class="btn btn-secondary btn-block">إعادة تعيين</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /Filter Form -->

                            <!-- Orders Table -->
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table display nowrap table-striped table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>رقم الطلب</th>
                                                <th>اسم المستخدم</th>
                                                <th>البريد الإلكتروني</th>
                                                <th>الحالة</th>
                                                <th>السعر</th>
                                                <th>تاريخ الإنشاء</th>
                                                <th>الاجراءات</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->user->name }}</td>
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
                                                <td>{{ $order->price }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>
                                                    @if($order->status == 'pending')
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-toggle="modal"
                                                        data-target="#updatePriceModal{{ $order->id }}">
                                                        تعديل السعر
                                                    </button>
                                                    @endif
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @foreach($orders as $order)
                                    <!-- Update Price Modal -->
                                    <div class="modal fade" id="updatePriceModal{{ $order->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="updatePriceLabel{{ $order->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('orders.updatePrice', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updatePriceLabel{{ $order->id }}">
                                                            تعديل السعر</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="إغلاق">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>السعر الجديد</label>
                                                            <input type="number" name="price" step="0.01"
                                                                class="form-control" value="{{ $order->price }}"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">تحديث</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">إلغاء</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach

                                    <!-- Pagination -->
                                    <div class="justify-content-center d-flex mt-3">
                                        {{ $orders->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                                    </div>
                                </div>
                            </div>
                            <!-- /Orders Table -->

                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>

@stop