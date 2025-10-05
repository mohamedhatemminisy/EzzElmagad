@extends('layouts.login')

@section('content')

<section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
                
                <!-- Card Header with Logo -->
                <div class="card-header border-0 text-center">
                    <div class="card-title">
                        <div class="p-1">
                            @if(!empty($settings?->logo))
                                <img src="{{ asset($settings->logo) }}" alt="Logo" style="max-width: 150px; max-height: 150px;">
                            @else
                                <h4 class="text-primary">لوحة التحكم</h4>
                            @endif
                        </div>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                        <span>@lang('admin.admin_login')</span>
                    </h6>
                </div>

                <!-- Alerts -->
                @include('dashboard.includes.alerts.errors')
                @include('dashboard.includes.alerts.success')

                <!-- Login Form -->
                <div class="card-content">
                    <div class="card-body">
                        <form class="form-horizontal form-simple" action="{{ route('admin.post.login') }}" method="POST" novalidate>
                            @csrf

                            <!-- Email -->
                            <fieldset class="form-group position-relative has-icon-left mb-2">
                                <input type="text" name="email" class="form-control form-control-lg"
                                       placeholder="@lang('admin.email')" value="{{ old('email') }}" required>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <!-- Password -->
                            <fieldset class="form-group position-relative has-icon-left mb-3">
                                <input type="password" name="password" class="form-control form-control-lg"
                                       placeholder="@lang('admin.password')" required>
                                <div class="form-control-position">
                                    <i class="la la-key"></i>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-info btn-lg btn-block">
                                <i class="ft-unlock"></i> @lang('admin.login')
                            </button>
                        </form>
                    </div>
                </div>

            </div> <!-- /card -->
        </div>
    </div>
</section>

@endsection
