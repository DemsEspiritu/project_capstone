<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shorcut icon" href="{{asset('assets/img/school-logo.png')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <title>Masoli High School</title>
    <style>
    body {
            background-image:  url('{{ asset('assets/img/ba3.jpg') }}');
            /* Other CSS properties for the background */
            background-size:cover; /* Adjust this as needed */
            background-repeat: no-repeat;
            /* Add other styling for your content as needed */
        }
    </style>
</head>
<body>  

       
<nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
              <a class="navbar-brand" href="#"><img class="m-2" src="{{asset('assets/img/school-logo.png')}}" alt="logo" style="height:70px;">Masoli High School</h4></a>
                  
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"           aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                          {{-- Nav-Bar Code --}}

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                          <a class="nav-link active m-3 link-style" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active m-3 link-style "  href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active m-3 link-style"  href="/contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active m-3 link-style"  href="/home/enroll">Enroll</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active m-3 link-style"  href="/login">Log in</a>
                      </li>
                    </ul>
          </div>
    </div>
</nav>

    <div class="container-fluid login-body">

              
    <div class="box-login">


                  
    @include('_message')
                <form action="{{ url('login') }}" method="post"  autocomplete="off">
                    {{csrf_field() }}
                    <div class="logo-image">
                        <img class="m-2" src="{{asset('assets/img/school-logo.png')}}"alt="logo" style="height:100px;">
                    </div>
                    <span style="font-weight: bold; font-size:25px;">Masoli High School</span>
                    <br>
                    <span style="font-weight: bold; font-size:15px;">Bato, Camarines Sur</span>
                    <div class="mb-3 mt-3">
                            <input  type="email"  placeholder="Email" name="email">
                        </div>

                        <div class="mb-3">
                            <input type="password"  placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                </form>

  </div>

    
</div>
</body>
</html>