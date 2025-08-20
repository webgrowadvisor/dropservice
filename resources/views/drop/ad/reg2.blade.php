<!DOCTYPE html>
<html lang="zxx">

@include('admin.partials.head')

<body>
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('assets/images/logo-abbr.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Register</h2>
                        <h4 class="fs-13 fw-bold mb-2">Manage all your crm</h4>
                        <p class="fs-12 fw-medium text-muted">Let's get you all setup, so you can verify your personal account and begine setting up your profile.</p>
                        <form action="{{ route('drop.register', ['level' => $level ?? 1]) }}" method="POST"  class="w-100 mt-4 pt-2">
                            @csrf
                            <div class="mb-4">
                                <input type="text" name="name" class="form-control" value="{{ old('name', dropinfo()->name ?? '') }}" placeholder="Full Name" required>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <input type="email" name="email" class="form-control" value="{{ old('email', dropinfo()->email ?? '') }}" placeholder="Email" required>
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <input type="tel" name="mobile" class="form-control" value="{{ old('mobile', dropinfo()->mobile ?? '') }}" placeholder="Mobile" required>
                                @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            @if($level == '2') 
                                <div class="mb-4">
                                    <input type="text" name="gst" class="form-control" value="{{ old('gst', dropinfo()->gst ?? '') }}" placeholder="GST" required >
                                    @error('gst') <span class="text-danger">{{ $message }}</span> @enderror
                                    <span class="text-danger">GST required *</span>
                                </div>
                            @endif
                            @if($level != '2')
                            <div class="mb-4 generate-pass">
                                <div class="input-group field">
                                    <input type="password" class="form-control password" name="password" id="newPassword" placeholder="Password Confirm">
                                    <div class="input-group-text c-pointer gen-pass" data-bs-toggle="tooltip" title="Generate Password"><i class="feather-hash"></i></div>
                                    <div class="input-group-text border-start bg-gray-2 c-pointer show-pass" data-bs-toggle="tooltip" title="Show/Hide Password"><i></i></div>
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="progress-bar mt-2">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Password again" required>
                                @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            @endif
                           
                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Create Account</button>
                            </div>
                        </form>
                        <div class="mt-5 text-muted">
                            <span>Already have an account?</span>
                            <a href="{{ route('drop.ad.login') }}" class="fw-bold">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
	<?php // include './partials/theme-customizer.php'?>
    @include('admin.partials.theme-customizer')
    @include('admin.partials.script')
	<!--<< All JS Plugins >>-->
	<?php // include './partials/script.php'?>	
</body>

</html>