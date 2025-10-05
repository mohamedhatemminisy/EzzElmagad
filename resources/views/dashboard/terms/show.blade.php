@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">بنود العقود</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">{{ trans('admin.home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('contract_terms.index') }}">بنود العقود</a>
                            </li>
                            <li class="breadcrumb-item active">تفاصيل البند</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Body -->
        <div class="content-body">
            <section id="contract-term-details">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h4 class="card-title mb-0"><i class="la la-info-circle"></i> تفاصيل البند</h4>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">وصف البند</label>
                                        <p class="border p-2">{{ $term->name }}</p>
                                    </div>

                                    <!-- Sort -->
                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">الترتيب</label>
                                        <p class="border p-2">{{ $term->sort }}</p>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6 mb-3">
                                        <label class="font-weight-bold">الحالة</label>
                                        <p class="border p-2">
                                            @if($term->status == 'active')
                                                <span class="badge badge-success">مفعل</span>
                                            @else
                                                <span class="badge badge-danger">غير مفعل</span>
                                            @endif
                                        </p>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-12 mb-3">
                                        <label class="font-weight-bold">تفاصيل البند</label>
                                        <div class="border p-3" style="background-color: #f9f9f9;">
                                            {!! $term->description !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('contract_terms.index') }}" class="btn btn-secondary">
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
