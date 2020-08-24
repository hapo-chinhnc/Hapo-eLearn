<div class="modal fade p-0" id="login-register">
    <div class="modal-dialog">
      <div class="modal-content mt-3 m-auto">
        <div class="form-login-register d-flex flex-column ">
            <div class="w-100 d-flex justify-content-between">
                <a href="#" class="col-6 text-center selected text-decoration-none" id="login">Login</a>
                <a href="#" class="col-6 text-center not-select text-decoration-none" id="register">Register</a>
                <div class="btn-x d-flex justify-content-center align-items-center"><i class="fas fa-times"></i></div>
            </div>
            <div class="mx-auto form-login flex-column d-block" id="form-login">
                <form action="" class="d-flex flex-column" >
                    <label for="username" class="lable-input">User Name</label>
                    <input type="password"  id="username" class="input-text">
                    <label for="password"  class="lable-input">Password</label>
                    <input type="password" id="password" class="input-text">
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
                <form action="" class="d-flex flex-column" >
                    <label for="username" class="lable-input">User Name</label>
                    <input type="password" id="username" class="input-text">
                    <label for="email" class="lable-input">Email</label>
                    <input type="password" id="email" class="input-text">
                    <label for="password" class="lable-input">Password</label>
                    <input type="password" id="password" class="input-text">
                    <label for="re-password" class="lable-input">Repeat Password:</label>
                    <input type="password" id="re-password" class="input-text">
                    <input type="submit" value="Register" class="mb-3 login-btn mx-auto p-2 btn">
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
