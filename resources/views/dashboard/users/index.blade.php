@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">

        <!-- Page Header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">المستخدمين</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">{{ trans('admin.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active">المستخدمين</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Body -->
        <div class="content-body">
            <section id="users">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <!-- Card Header -->
                            <div class="card-header">
                                <h4 class="card-title">قائمة المستخدمين</h4>
                            </div>

                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')

                            <!-- Filter Form -->
                            <div class="card-body border mb-2 rounded shadow-sm">
                                <form action="{{ route('users') }}" method="GET">
                                    <div class="row">
                                        <div class="col-md-2 mb-2">
                                            <input type="text" name="name" class="form-control" placeholder="الاسم" value="{{ request('name') }}">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <input type="text" name="email" class="form-control" placeholder="البريد الإلكتروني" value="{{ request('email') }}">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <input type="text" name="address" class="form-control" placeholder="العنوان" value="{{ request('address') }}">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <input type="text" name="company_category" class="form-control" placeholder="فئة الشركة" value="{{ request('company_category') }}">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <input type="text" name="commercial_number" class="form-control" placeholder="الرقم التجاري" value="{{ request('commercial_number') }}">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <input type="text" name="representer" class="form-control" placeholder="الممثل" value="{{ request('representer') }}">
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary btn-block">تصفية</button>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{ route('users') }}" class="btn btn-secondary btn-block">إعادة تعيين</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /Filter Form -->

                            <!-- Users Table -->
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table display nowrap table-striped table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>الاسم</th>
                                                <th>البريد الإلكتروني</th>
                                                <th>العنوان</th>
                                                <th>فئة الشركة</th>
                                                <th>الرقم التجاري</th>
                                                <th>الممثل</th>
                                                <th>{{ trans('admin.action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->adress }}</td>
                                                <td>{{ $user->company_category }}</td>
                                                <td>{{ $user->commercial_number }}</td>
                                                <td>{{ $user->representer }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-outline-info" title="عرض التفاصيل">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('users.orders', $user->id) }}" class="btn btn-sm btn-outline-primary" title="عرض الطلبات">
                                                            <i class="fa fa-list"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Pagination -->
                                    <div class="justify-content-center d-flex mt-3">
                                        {{ $users->links('vendor.pagination.custom') }}
                                    </div>
                                </div>
                            </div>
                            <!-- /Users Table -->

                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>

@stop
