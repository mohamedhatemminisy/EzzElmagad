@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">تفاصيل المدير</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">{{ trans('admin.home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">المدراء</a>
                            </li>
                            <li class="breadcrumb-item active">تفاصيل المدير</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Body -->
        <div class="content-body">
            <section id="admin-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h4 class="card-title mb-0"><i class="la la-user"></i> تفاصيل المدير</h4>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">@lang('admin.name')</label>
                                        <p class="border p-2">{{ $user->name }}</p>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">@lang('admin.email')</label>
                                        <p class="border p-2">{{ $user->email }}</p>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">@lang('admin.phone')</label>
                                        <p class="border p-2">{{ $user->phone }}</p>
                                    </div>

                                    <!-- Roles -->
                                    {{-- <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">@lang('admin.role')</label>
                                        <p class="border p-2">
                                            @foreach($user->roles as $role)
                                                <span class="badge badge-primary">{{ $role->name }}</span>
                                            @endforeach
                                        </p>
                                    </div> --}}
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">
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
