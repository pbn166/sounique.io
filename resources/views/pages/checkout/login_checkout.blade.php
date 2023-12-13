@extends('layout')
@section('content_category')



						<style type="text/css">

							ul.list-login {
							    margin: 25px;
							    padding: 0;
                                text-align: center;
							}
							ul.list-login li {
							    display: inline;
							    margin: 5px;
							}
                            body{
                    /* Đường dẫn đến hình ảnh bạn muốn sử dụng */
                    background-image: url('/../public/uploads/bg-login.jpg');

                    /* Các thuộc tính sau đây là tùy chọn để tùy chỉnh hiển thị của hình ảnh */
                    background-size: cover; /* Phù hợp kích thước hình ảnh với phần tử */
                    background-position: center; /* Canh chỉnh vị trí hiển thị hình ảnh */
                    /* Nếu bạn muốn lặp lại hình ảnh, bạn có thể sử dụng: */
                    /* background-repeat: repeat; */
}


						</style>



<section class="user">
  <div class="user_options-container">
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title">Bạn chưa có tài khoản</h2>
        <p class="user_unregistered-text">Hãy đăng ký tài khoản để sử dụng đầy đủ tính năng của website</p>
        <button class="user_unregistered-signup" id="signup-button">Đăng ký</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">Bạn đã có tài khoản?</h2>
        <p class="user_registered-text">Đăng nhập ngay để có trải nghiệm mua hàng tuyệt vời</p>
        <button class="user_registered-login" id="login-button">Đăng nhập</button>
      </div>
    </div>

    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
                     @if(session()->has('message'))
							<div class="alert alert-success">
								{!! session()->get('message') !!}
							</div>
							@elseif(session()->has('error'))
							<div class="alert alert-danger">
								{!! session()->get('error') !!}
							</div>
						@endif
        <h2 class="forms_title">Đăng nhập</h2>
        <ul class="list-login">

							<li>
								<a href="{{url('login-customer-google')}}">
									<img width="10%" alt="Đăng nhập bằng tài khoản google"  src="{{asset('public/frontend/images/gg.png')}}">
								</a>
							</li>

							<li>
								<a href="{{url('login-facebook-customer')}}">
									<img width="10%" alt="Đăng nhập bằng tài khoản facebook"  src="{{asset('public/frontend/images/fb.png')}}">
								</a>
							</li>
						</ul>
        <form class="forms_form"  action="{{URL::to('/login-customer')}}" method="POST">
          <fieldset class="forms_fieldset">
          {{csrf_field()}}
            <div class="forms_field">
              <input type="text" name="email_account"placeholder="Email" class="forms_field-input" required autofocus />
            </div>
            <div class="forms_field">
              <input type="password" name="password_account" placeholder="Password" class="forms_field-input" required />
            </div>
          </fieldset>
          <a href="{{url('/quen-mat-khau')}}">Forgot your password?</a>
          <div class="forms_buttons">

            <!-- <button  href="{{url('/quen-mat-khau')}}" type="button" class="forms_buttons-forgot">Forgot password?</button> -->
            <input type="submit" value="Đăng nhập" class="forms_buttons-action">
          </div>
        </form>
      </div>
      <div class="user_forms-signup">
        <h2 class="forms_title">Đăng ký</h2>
        <form class="forms_form" action="{{URL::to('/add-customer')}}" method="POST">
        {{ csrf_field() }}
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" name="customer_name"placeholder="Họ và tên" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input  type="email" name="customer_email" placeholder="Email" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="password" name="customer_password" placeholder="Password" class="forms_field-input" required />
            </div>
              <div class="forms_field">
              <input type="text" name="customer_phone" placeholder="Phone" class="forms_field-input" required/>
            </div>
          </fieldset>
          <div class="forms_buttons">
            <input type="submit" value="Đăng ký" class="forms_buttons-action">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
        <style>
            /**
 * * General variables
 * */
/**
 * * General configs
 * */
* {
  box-sizing: border-box;
}

/* body {
  font-family: "Montserrat", sans-serif;
  font-size: 12px;
  line-height: 1em;
} */

button {
  background-color: transparent;
  padding: 0;
  border: 0;
  outline: 0;
  cursor: pointer;
}

input {
  background-color: transparent;
  padding: 0;
  border: 0;
  outline: 0;
}
input[type=submit] {
  cursor: pointer;
}
/* input::-moz-placeholder {
  font-size: 0.85rem;
  font-family: "Montserrat", sans-serif;
  font-weight: 300;
  letter-spacing: 0.1rem;
  color: #ccc;
}
input:-ms-input-placeholder {
  font-size: 0.85rem;
  font-family: "Montserrat", sans-serif;
  font-weight: 300;
  letter-spacing: 0.1rem;
  color: #ccc;
}
input::placeholder {
  font-size: 0.85rem;
  font-family: "Montserrat", sans-serif;
  font-weight: 300;
  letter-spacing: 0.1rem;
  color: #ccc; */
}

/**
 * * Bounce to the left side
 * */
@-webkit-keyframes bounceLeft {
  0% {
    transform: translate3d(100%, -50%, 0);
  }
  50% {
    transform: translate3d(-30px, -50%, 0);
  }
  100% {
    transform: translate3d(0, -50%, 0);
  }
}
@keyframes bounceLeft {
  0% {
    transform: translate3d(100%, -50%, 0);
  }
  50% {
    transform: translate3d(-30px, -50%, 0);
  }
  100% {
    transform: translate3d(0, -50%, 0);
  }
}
/**
 * * Bounce to the left side
 * */
@-webkit-keyframes bounceRight {
  0% {
    transform: translate3d(0, -50%, 0);
  }
  50% {
    transform: translate3d(calc(100% + 30px), -50%, 0);
  }
  100% {
    transform: translate3d(100%, -50%, 0);
  }
}
@keyframes bounceRight {
  0% {
    transform: translate3d(0, -50%, 0);
  }
  50% {
    transform: translate3d(calc(100% + 30px), -50%, 0);
  }
  100% {
    transform: translate3d(100%, -50%, 0);
  }
}
/**
 * * Show Sign Up form
 * */
@-webkit-keyframes showSignUp {
  100% {
    opacity: 1;
    visibility: visible;
    transform: translate3d(0, 0, 0);
  }
}
@keyframes showSignUp {
  100% {
    opacity: 1;
    visibility: visible;
    transform: translate3d(0, 0, 0);
  }
}
/**
 * * Page background
 * */
.user {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100vh;
  /* background: #ccc; */
  background-size: cover;
}
.user_options-container {
  position: relative;
  width: 80%;
}
.user_options-text {
  display: flex;
  justify-content: space-between;
  width: 100%;
  background-color: rgba(34, 34, 34, 0.85);
  border-radius: 3px;
}

/**
 * * Registered and Unregistered user box and text
 * */
.user_options-registered,
.user_options-unregistered {
  width: 50%;
  padding: 75px 45px;
  color: #fff;
  font-weight: 300;
}

.user_registered-title,
.user_unregistered-title {
  margin-bottom: 15px;
  /* font-size: 1.66rem; */
  line-height: 1em;
  font-weight: 500;
}

.user_unregistered-text,
.user_registered-text {
  /* font-size: 0.83rem; */
  line-height: 1.4em;
  color: #fff;
}

.user_registered-login,
.user_unregistered-signup {
  margin-top: 30px;
  border: 1px solid #ccc;
  border-radius: 3px;
  padding: 10px 30px;
  color: #fff;
  text-transform: uppercase;
  line-height: 1em;
  letter-spacing: 0.2rem;
  transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
}
.user_registered-login:hover,
.user_unregistered-signup:hover {
  color: rgba(34, 34, 34, 0.85);
  background-color: #ccc;
}

/**
 * * Login and signup forms
 * */
.user_options-forms {
  position: absolute;
  top: 50%;
  left: 30px;
  width: calc(50% - 30px);
  min-height: 420px;
  background-color: #fff;
  border-radius: 3px;
  box-shadow: 2px 0 15px rgba(0, 0, 0, 0.25);
  overflow: hidden;
  transform: translate3d(100%, -50%, 0);
  transition: transform 0.4s ease-in-out;
}
.user_options-forms .user_forms-login {
  transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out;
}
.user_options-forms .forms_title  {
    margin-bottom: 15px;
    /* font-size: 2rem; */
    font-weight: 600;
    line-height: 1em;
    text-transform: uppercase;
    color: #F6941C;
    letter-spacing: 0.1rem;
    text-align: center;
}

.user_options-forms .forms_field:not(:last-of-type) {
  margin-bottom: 20px;
}
.user_options-forms .forms_field-input {
  width: 100%;
  border-bottom: 1px solid #ccc;
  padding: 6px 20px 6px 6px;
  font-family: "Montserrat", sans-serif;
  /* font-size: 1rem; */
  font-weight: 300;
  color: gray;
  letter-spacing: 0.1rem;
  transition: border-color 0.2s ease-in-out;
}
.user_options-forms .forms_field-input:focus {
  border-color: gray;
}
.user_options-forms .forms_buttons {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 35px;
}
.user_unregistered-title h2 {
    font-weight:500
}
.user_options-forms .forms_buttons-forgot {
  /* font-family: "Montserrat", sans-serif; */
  letter-spacing: 0.1rem;
  color: #ccc;
  text-decoration: underline;
  transition: color 0.2s ease-in-out;
}
.user_options-forms .forms_buttons-forgot:hover {
  color: #b3b3b3;
}
.user_options-forms .forms_buttons-action {
  background-color: #F6941C;
  border-radius: 3px;
  padding: 10px 35px;
  /* font-size: 1rem; */
  text-align: center;
  /* font-family: "Montserrat", sans-serif; */
  font-weight: 400;
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 0.1rem;
  display: flex;
  justify-content: center;
  transition: background-color 0.2s ease-in-out;
}
.user_options-forms .forms_buttons-action:hover {
  background-color: black;
}
.user_options-forms .user_forms-signup,
.user_options-forms .user_forms-login {
  position: absolute;
  top: 70px;
  left: 40px;
  width: calc(100% - 80px);
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out, transform 0.5s ease-in-out;
}
.button-container {
  display: flex;
  justify-content: center;
}

.user_options-forms .user_forms-signup {
  transform: translate3d(120px, 0, 0);
}
.user_options-forms .user_forms-signup .forms_buttons {
  justify-content: center;

}
.user_options-forms .user_forms-login {
  transform: translate3d(0, 0, 0);
  opacity: 1;
  visibility: visible;
}

/**
 * * Triggers
 * */
.user_options-forms.bounceLeft {
  -webkit-animation: bounceLeft 1s forwards;
          animation: bounceLeft 1s forwards;
}
.user_options-forms.bounceLeft .user_forms-signup {
  -webkit-animation: showSignUp 1s forwards;
          animation: showSignUp 1s forwards;
}
.user_options-forms.bounceLeft .user_forms-login {
  opacity: 0;
  visibility: hidden;
  transform: translate3d(-120px, 0, 0);
}
.user_options-forms.bounceRight {
  -webkit-animation: bounceRight 1s forwards;
          animation: bounceRight 1s forwards;
}

/**
 * * Responsive 990px
 * */
@media screen and (max-width: 990px) {
  .user_options-forms {
    min-height: 350px;
  }
  .user_options-forms .forms_buttons {
    flex-direction: column;
  }
  .user_options-forms .user_forms-login .forms_buttons-action {

    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 35px;
  }
  .user_options-forms .user_forms-signup,
.user_options-forms .user_forms-login {
    top: 40px;
  }

  .user_options-registered,
.user_options-unregistered {
    padding: 50px 45px;
  }
}
            </style>
            <script>
                /**
 * Variables
 */
const signupButton = document.getElementById("signup-button"),
  loginButton = document.getElementById("login-button"),
  userForms = document.getElementById("user_options-forms");

/**
 * Add event listener to the "Sign Up" button
 */
signupButton.addEventListener(
  "click",
  () => {
    userForms.classList.remove("bounceRight");
    userForms.classList.add("bounceLeft");
  },
  false
);

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener(
  "click",
  () => {
    userForms.classList.remove("bounceLeft");
    userForms.classList.add("bounceRight");
  },
  false
);
</script>

	</section><!--/form-->


@endsection
