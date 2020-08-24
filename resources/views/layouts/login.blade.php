<div class="modal fade p-0" id="login-register">
    <div class="modal-dialog">
      <div class="modal-content mt-3 m-auto">
        <div class="form-login-register d-flex flex-column ">
            <div class="w-100 d-flex justify-content-between">
                <button class="btn col-6 text-center selected text-decoration-none" id="login">Login</button>
                <button class="btn col-6 text-center not-select text-decoration-none" id="register">Register</button>
                <div class="btn-x d-flex justify-content-center align-items-center"><i class="fas fa-times"></i></div>
            </div>
            <div class="mx-auto form-login flex-column d-block" id="form-login">
                <form action="{{ route('login') }}" class="d-flex flex-column" method="POST" id="form-login-input">
                    @csrf
                    <label for="email" class="lable-input">Email</label>
                    <input id="email" type="email" class="form-control @error('email_log') is-invalid @enderror" name="email_log" value="{{ old('email_log') }}" required autocomplete="email" autofocus>
                        @error('email_log')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label for="password"  class="lable-input">Password</label>
                    <input id="password" type="password" class="form-control @error('password_log') is-invalid @enderror" name="password_log" required autocomplete="current-password">
                        @error('password_log')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div class="form-group d-flex justify-content-between">
                        <div class="custom-control custom-checkbox ">
                            <input type="checkbox" class="custom-control-input" id="remember">
                            <label class="custom-control-label" for="remember">Remember me</label>
                        </div>
                        <a href="#" class="forgot-password">Forgot password</a>
                    </div>
                    <input type="submit" value="Login" class="login-btn btn mx-auto">
                </form>
                <p class="text-center">Login With</p>
                <button class="mb-3 w-100 login-google-btn btn p-2"><i class="fab fa-google-plus-g mr-2"></i>Google</button>
                <button class="mb-3 w-100 login-fb-btn btn p-2"><i class="fab fa-facebook-f mr-2"></i>Facebook</button>
            </div>
            <div class="form-register mx-auto d-none" id="form-register">
                <form action="{{ route('register') }}" class="d-flex flex-column" method="POST" id="form-register-input">
                    @csrf
                    <label for="name" class="lable-input">User Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label for="email" class="lable-input">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label for="password" class="lable-input">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label for="password-confirm" class="lable-input">Repeat Password:</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <button type="submit" class="mb-3 login-btn mx-auto p-2 btn">Register</button>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
