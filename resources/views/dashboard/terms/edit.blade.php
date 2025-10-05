@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"> {{trans('admin.home')}}
                                </a></li>
                            <li class="breadcrumb-item"><a href="{{route('contract_terms.index')}}"> بنود العقر </a>
                            </li>
                            <li class="breadcrumb-item active">تعديل البند - {{ $term->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">تعديل البند - {{ $term->name }}</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')

                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form method="POST"
                                        action="{{ route('contract_terms.update', ['contract_term' => $term->id]) }}">
                                        @method('patch')
                                        @csrf

                                        <div class="mb-3">
                                            <label for="name" class="form-label"> البند</label>
                                            <input value="{{ old('name', $term->name) }}" type="text"
                                                class="form-control" name="name"
                                                placeholder="{{ trans('admin.description') }}">
                                            @error('name')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">تفاصيل البند</label>
                                            <textarea id="description" name="description" class="form-control" rows="4"
                                                dir="rtl">{{ old('description', $term->description) }}</textarea>

                                            @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="sort" class="form-label">الترتيب</label>
                                            <input value="{{ old('sort', $term->sort) }}" type="text"
                                                class="form-control" name="sort" placeholder="الترتيب">
                                            @error('sort')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="status" class="form-label">الحالة</label>
                                            <select name="status" class="form-control">
                                                <option value="active" {{ old('status', $term->status) == 'active' ?
                                                    'selected' : '' }}>مفعل</option>
                                                <option value="inactive" {{ old('status', $term->status) == 'inactive' ?
                                                    'selected' : '' }}>غير مفعل</option>
                                            </select>
                                            @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                                <i class="ft-x"></i> {{ trans('admin.reset') }}
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> {{ trans('admin.save') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>

@stop
@section('script')
    <script src="https://cdn.ckeditor.com/4.25.1/standard-all/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (document.getElementById('description')) {
                CKEDITOR.replace('description', {
                    contentsLangDirection: 'rtl',
                    language: 'ar',
                    contentsLanguage: 'ar',
                    toolbar: [
                        { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
                        { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
                        { name: 'alignment', items: ['JustifyRight', 'JustifyLeft', 'JustifyCenter'] },
                        { name: 'links', items: ['Link', 'Unlink'] },
                        { name: 'insert', items: ['Image', 'Table'] },
                        { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
                        { name: 'colors', items: ['TextColor', 'BGColor'] },
                        { name: 'tools', items: ['Maximize'] }
                    ]
                });
            }
        });
    </script>
@endsection
