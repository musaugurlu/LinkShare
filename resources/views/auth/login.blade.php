<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Sign In - {{ config('app.name', 'New App') }}</title>
  <style>
    #loader {
      transition: all .3s ease-in-out;
      opacity: 1;
      visibility: visible;
      position: fixed;
      height: 100vh;
      width: 100%;
      background: #fff;
      z-index: 90000
    }

    #loader.fadeOut {
      opacity: 0;
      visibility: hidden
    }

    .spinner {
      width: 40px;
      height: 40px;
      position: absolute;
      top: calc(50% - 20px);
      left: calc(50% - 20px);
      background-color: #333;
      border-radius: 100%;
      -webkit-animation: sk-scaleout 1s infinite ease-in-out;
      animation: sk-scaleout 1s infinite ease-in-out
    }

    @-webkit-keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0)
      }

      100% {
        -webkit-transform: scale(1);
        opacity: 0
      }
    }

    @keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0);
        transform: scale(0)
      }

      100% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 0
      }
    }
  </style>
  <link href="{{mix('css/main.css')}}" rel="stylesheet">
</head>

<body class="app">
  <div id="loader">
    <div class="spinner"></div>
  </div>
  <script>window.addEventListener('load', function load() {
      const loader = document.getElementById('loader');
      setTimeout(function () {
        loader.classList.add('fadeOut');
      }, 300);
    });</script>
  <div class="peers ai-s fxw-nw h-100vh" id="app">
    <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv"
      style="background-image:url({{asset('images/bg.jpg')}})">
      <div class="pos-a centerXY">
        <div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px"><img class="pos-a centerXY"
            src="{{asset('images/logo.png')}}" alt=""></div>
      </div>
    </div>
    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
      <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group"><label class="text-normal text-dark">Email</label> <input type="email"
            class="form-control" placeholder="John.Doe@example.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus></div>
        <div class="form-group"><label class="text-normal text-dark">Password</label> <input type="password"
            class="form-control" placeholder="Password" name="password" required autocomplete="current-password"></div>
        <div class="form-group">
          <div class="peers ai-c jc-sb fxw-nw">
            <div class="peer">
              <div class="checkbox checkbox-circle checkbox-info peers ai-c"><input type="checkbox" id="inputCall1"
                  name="remember" class="peer"> <label for="inputCall1"
                  class="peers peer-greed js-sb ai-c"><span class="peer peer-greed">Remember Me</span></label></div>
            </div>
            <div class="peer"><button class="btn btn-primary">Login</button></div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="{{mix('js/main.js')}}"></script>
</body>

</html>