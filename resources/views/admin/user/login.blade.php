<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    section {
      position: relative;
      min-height: 100vh;
      background-color: #000000;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    section .container {
      position: relative;
      width: 800px;
      height: 500px;
      background: #fff;
      box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    section .container .user {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
    }

    section .container .user .imgBx {
      position: relative;
      width: 50%;
      height: 100%;
      background: #ff0;
      transition: 0.5s;
    }

    section .container .user .imgBx img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    section .container .user .formBx {
      position: relative;
      width: 50%;
      height: 100%;
      background: #fff;
      padding: 40px;
      transition: 0.5s;
    }

    section .container .user .formBx form h2 {
      font-size: 18px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 2px;
      text-align: center;
      width: 100%;
      margin-bottom: 10px;
      color: #555;
    }

    section .container .user .formBx form input {
      position: relative;
      width: 100%;
      padding: 10px;
      background: #f5f5f5;
      color: #333;
      border: none;
      outline: none;
      box-shadow: none;
      margin: 8px 0;
      font-size: 14px;
      letter-spacing: 1px;
      font-weight: 300;
    }

    section .container .user .formBx form button {
      max-width: 100px;
      background: #677eff;
      color: #fff;
      cursor: pointer;
      font-size: 14px;
      font-weight: 500;
      letter-spacing: 1px;
      transition: 0.5s;
      border: none;
      padding: 10px 20px;
    }

    section .container .user .formBx form .signup {
      position: relative;
      margin-top: 20px;
      font-size: 12px;
      letter-spacing: 1px;
      color: #555;
      text-transform: uppercase;
      font-weight: 300;
    }

    section .container .user .formBx form .signup a {
      font-weight: 600;
      text-decoration: none;
      color: #677eff;
    }

    section .container .signupBx {
      pointer-events: none;
    }

    section .container.active .signupBx {
      pointer-events: initial;
    }

    section .container .signupBx .formBx {
      left: 100%;
    }

    section .container.active .signupBx .formBx {
      left: 0;
    }

    section .container .signupBx .imgBx {
      left: -100%;
    }

    section .container.active .signupBx .imgBx {
      left: 0%;
    }

    section .container .signinBx .formBx {
      left: 0%;
    }

    section .container.active .signinBx .formBx {
      left: 100%;
    }

    section .container .signinBx .imgBx {
      left: 0%;
    }

    section .container.active .signinBx .imgBx {
      left: -100%;
    }

    @media (max-width: 991px) {
      section .container {
        max-width: 400px;
      }

      section .container .imgBx {
        display: none;
      }

      section .container .user .formBx {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <section>
    <div class="container">
      <div class="user signinBx">
        <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" /></div>
        {{-- <div class="card-header">{{ __('Login') }}</div> --}}
        <div class="formBx cardbody">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>Login In</h2>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button type="submit" >Login</button>
            <p class="signup">
              Don't have an account ?
              <a href="#" onclick="toggleForm();">Sign Up.</a>
            </p>
          </form>
        </div>
      </div>
      <div class="user signupBx">
       <div class="card-body formBx">
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">Address</label>
            <input type="text" name="adress" class="form-control" required>
          </div>

          <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>

          <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
              </button>
            </div>
          </div>
          <p class="signup">
            Don't have an account ?
            <a href="#" onclick="toggleForm();">Sign Up.</a>
          </p>
        </form>
      </div>
      <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img2.jpg" alt="" /></div>
    </div>
  </div>
</section>
<script type="text/javascript">
  const toggleForm = () => {
    const container = document.querySelector('.container');
    container.classList.toggle('active');
  };
</script>
</body>
</html>