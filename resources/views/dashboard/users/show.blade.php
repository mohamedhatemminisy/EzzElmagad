@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">تفاصيل المستخدم</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ trans('admin.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users') }}">المستخدمين</a></li>
                            <li class="breadcrumb-item active">تفاصيل المستخدم</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Body -->
        <div class="content-body">
            <section id="user-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h4 class="card-title mb-0"><i class="la la-user"></i> بيانات المستخدم</h4>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">الاسم</label>
                                        <p class="border p-2">{{ $user->name }}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">البريد الإلكتروني</label>
                                        <p class="border p-2">{{ $user->email }}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">الهاتف</label>
                                        <p class="border p-2">{{ $user->phone ?? '-' }}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">العنوان</label>
                                        <p class="border p-2">{{ $user->address }}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">فئة الشركة</label>
                                        <p class="border p-2">{{ $user->company_category }}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">الرقم التجاري</label>
                                        <p class="border p-2">{{ $user->commercial_number }}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">الممثل</label>
                                        <p class="border p-2">{{ $user->representer }}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">تاريخ الإنشاء</label>
                                        <p class="border p-2">{{ $user->created_at->format('Y-m-d H:i') }}</p>
                                    </div>

                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('users') }}" class="btn btn-secondary">
                                        <i class="la la-arrow-left"></i> الرجوع
                                    </a>
                                </div>
                            </div> <!-- /card-body -->
                        </div> <!-- /card -->
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@stop
