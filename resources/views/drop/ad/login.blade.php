<!DOCTYPE html>
<html lang="zxx">

@include('drop.partials.head')

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
                        <h2 class="fs-20 fw-bolder mb-4">Login</h2>
                        <h4 class="fs-13 fw-bold mb-2">Login to your admin</h4>
                        @if(session('success_msg'))
                            <div class="alert alert-success">{{ session('success_msg') }}</div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif
                        <form action="{{ route('dropservice.check') }}" method="post" class="w-100 mt-4 pt-2">
                            @csrf
                            <div class="mb-4">
                                <input type="email" class="form-control" name="email" placeholder="Email or Username" 
                                value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" 
                                value="{{ old('password') }}" required>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" checked class="custom-control-input" id="rememberMe">
                                        <label class="custom-control-label c-pointer" for="rememberMe">Remember Me</label>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Login</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
   
	<!--<< All JS Plugins >>-->
    @include('drop.partials.script')
</body>

</html>