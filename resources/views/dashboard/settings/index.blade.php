@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">

        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">إعدادات الموقع</h3>
            </div>
        </div>

        <div class="content-body">
            @include('dashboard.includes.alerts.success')
            @include('dashboard.includes.alerts.errors')

            <section>
                <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>اسم الموقع *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $setting->name ?? '') }}" required>
                    </div>

                    <div class="form-group">
                        <label>البريد الإلكتروني</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $setting->email ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>رقم الهاتف</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $setting->phone ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>العنوان</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address', $setting->address ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>تصنيف الشركة</label>
                        <input type="text" name="company_category" class="form-control" value="{{ old('company_category', $setting->company_category ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>الرقم التجاري</label>
                        <input type="text" name="commercial_number" class="form-control" value="{{ old('commercial_number', $setting->commercial_number ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>اسم الممثل</label>
                        <input type="text" name="representer" class="form-control" value="{{ old('representer', $setting->representer ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>شعار الموقع</label>
                        <input type="file" name="site_logo" class="form-control">
                        @if(!empty($setting->site_logo))
                            <div class="mt-2">
                                <img src="{{ asset($setting->site_logo) }}" alt="logo" height="80">
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="la la-save"></i> حفظ
                    </button>
                </form>
            </section>
        </div>
    </div>
</div>

@stop
