        <footer class="container-fluid hapolearn-footer mt-5">
            <div class="row p-lg-5 p-md-4 p-3 d-flex justify-content-lg-around">
                <div class="col-md-4 col-8 order-md-0 order-1 no-gutters-custom mb-2 mb-md-0">
                    <img src="{{ asset('storage/images/Hapo_Learn_white1.png') }}" class="img-fluid">
                    <p class="hapolearn-footer-quote pl-5 pl-md-0 ">Interactive lessons, "on-the-go"<br>practice, peer support.</p>
                </div>
                <div class="col-lg-4 col-md-5 col-12 d-flex flex-row justify-content-between order-0 order-md-1 mb-4 mb-md-0">
                    <ul class="hapolearn-footer-ul">
                        <li class="hapolearn-footer-ul-item"><a href="#" class="hapolearn-footer-ul-link">Home</a></li>
                        <li class="mt-4"><a href="#" class="hapolearn-footer-ul-link">Features</a></li>
                        <li class="mt-4"><a href="#" class="hapolearn-footer-ul-link">Courses</a></li>
                        <li class="mt-4"><a href="#" class="hapolearn-footer-ul-link">Blog</a></li></li>
                    </ul>
                    <ul class="hapolearn-footer-ul">
                        <li><a href="#" class="hapolearn-footer-ul-link">Contact</a></li>
                        <li class="mt-4"><a href="#" class="hapolearn-footer-ul-link">Terms of Use</a></li>
                        <li class="mt-4"><a href="#" class="hapolearn-footer-ul-link">FAQ</a></li>
                        <li class="mt-4"></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-3 col-4 d-flex justify-content-md-center align-items-md-center order-md-2 order-2 mt-3 mt-md-0">
                    <img src="{{ asset('storage/images/fb.png') }}" class="hapolearn-footer-icon" data-toggle="tooltip" data-placement="top" title="facebook.com/tuyen.dung.haposoft">
                    <img src="{{ asset('storage/images/phone.png') }}" class="hapolearn-footer-icon" data-toggle="tooltip" data-placement="top" title="+84-85-645-9898">
                    <img src="{{ asset('storage/images/mail.png') }}" class="hapolearn-footer-icon" data-toggle="tooltip" data-placement="top" title="info@haposoft.comm">
                </div>
            </div>
            <div class="row hapolearn-copyright d-flex justify-content-center align-items-center">
                <p class="hapolearn-copyright-text text-center w-100 no-gutters-custom p-2">© 2020 HapoLearn, Inc. All rights reserved.</p>
            </div>
        </footer>
        <section class="hapolearn-messenger row">
            <div class="hapolearn-messenger-chatbox p-2 col-12" id="chat">
                <div class="hapolearn-messenger-chatbox-name col-9 m-auto pt-1">Hapo Learn</div>
                <div class="hapolearn-messenger-chatbox-text row">
                    <img src="{{ asset('storage/images/ower-small.png') }}" alt="" class="col m-auto">
                    <p class="col-8">HapoLearn xin chào bạn.<br> Bạn có cần chúng tôi hỗ trợ gì không?</p>
                    <i class="fas fa-times-circle col-2" id="close-btn"></i>
                </div>
                <div class="hapolearn-messenger-chatbox-login col-10 m-auto pt-3">
                    <button class="btn btn-primary w-100 hapolearn-messenger-btnlogin p-2"><img src="{{ asset('storage/images/messeger.png') }}" class="mr-1">Đăng nhập vào Messenger</button>
                    <p class="mt-2">Chat với HapoLearn trong Messenger</p>
                </div>
            </div>
            <div class="col-12 pr-0">
                <img src="{{ asset('storage/images/messengerz.png') }}" class="float-right hapolearn-messenger-icon" id="btn-mess">
            </div>
        </section>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
