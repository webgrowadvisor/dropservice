<!DOCTYPE html>
<html lang="zxx">

@include('admin.partials.head')

<body>
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="auth-creative-wrapper">
        <div class="auth-creative-inner">
            <div class="creative-card-wrapper">
                <div class="card my-4 overflow-hidden" style="z-index: 1">
                    <div class="row flex-1 g-0">
                        <div class="col-lg-6 h-100 my-auto">
                            <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-50 start-50">
                                <img src="assets/images/logo-abbr.png" alt="" class="img-fluid">
                            </div>
                            <div class="creative-card-body card-body p-sm-5">
                                <h2 class="fs-20 fw-bolder mb-4">Register</h2>
                                <h4 class="fs-13 fw-bold mb-2">Manage all your Duralux crm</h4>
                                <p class="fs-12 fw-medium text-muted">Let's get you all setup, so you can verify your personal account and begine setting up your profile.</p>
                                <form action="{{ route('admin.register') }}" method="POST" class="w-100 mt-4 pt-2">
                                    @csrf
                                    <div class="mb-4">
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Full Name" required>
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required>
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <input type="tel" name="mobile" class="form-control" value="{{ old('mobile') }}" placeholder="mobile" required>
                                        @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
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
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password again" required>
                                        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mt-4">
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="receiveMial" >
                                            <label class="custom-control-label c-pointer text-muted" for="receiveMial" style="font-weight: 400 !important">
                                                Yes, I wnat to receive Duralux community emails</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="termsCondition" >
                                            <label class="custom-control-label c-pointer text-muted" for="termsCondition" style="font-weight: 400 !important">
                                                I agree to all the <a href="">Terms &amp; Conditions</a> and <a href="">Fees</a>.</label>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <button type="submit" class="btn btn-lg btn-primary w-100">Create Account</button>
                                    </div>
                                </form>
                                <div class="mt-5 text-muted">
                                    <span>Already have an account?</span>
                                    <a href="{{ route('admin.login') }}" class="fw-bold">Login</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 bg-primary">
                            <div class="h-100 d-flex align-items-center justify-content-center">
                                <img src="assets/images/auth/auth-user.png" alt="" class="img-fluid">
                            </div>
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