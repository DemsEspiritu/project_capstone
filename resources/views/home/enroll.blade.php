<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shorcut icon" href="{{asset('assets/img/school-logo.png')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/notify.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
    body {
            background-image:  url('{{ asset('assets/img/slide1.jpg') }}');
            /* Other CSS properties for the background */
            background-size: cover; /* Adjust this as needed */
            background-repeat: no-repeat;
            /* Add other styling for your content as needed */
        }
    </style>
    <title>Masoli High School</title>
</head>
<body>  
<x-notify::notify />
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
     
              <a class="navbar-brand" href="#"><img class="m-2" src="{{asset('assets/img/school-logo.png')}}" alt="logo" style="height:70px;">Masoli High School</h4></a>
                  
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                          {{-- Nav-Bar Code --}}

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                          <a class="nav-link active m-3 link-style"     href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active m-3 link-style "  href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active m-3 link-style"   href="/contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active m-3 link-style"   href="/home/enroll">Enroll</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active m-3 link-style"     href="/login">Log in</a>
                        </li>
                    </ul>
          </div>
    
</nav>

     

    <div class="container-fluid enroll-body">
 
        <div class="card card-primary enroll-form">
              <div class="card-header enroll-head">
                <h5 class="card-title "><img class="m-2" src="{{asset('assets/img/school-logo.png')}}" alt="logo" style="height:50px; padding-bottom: 5px;">Masoli High School</h5>
              </div>
              <!-- >
              <!-- form start -->
            <form action="" method="post">
              {{ csrf_field() }}
              <div class="card-body">

              <div class="m-2">
                  <div class="row g-3">
                  <div class="col-12">
                          <label>LRN #</label>
                          <input type="text" name="lrn" class="form-control" placeholder="LRN number" value="{{old('lrn')}}">
                          <span style="color:red; font-size:10px;">@error('lrn'){{ $message}} @enderror</span> 
                      </div>
                      <div class="col-3">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="First Name" value="{{old('name')}}">
                          <span style="color:red; font-size:10px;">@error('name'){{ $message}} @enderror</span> 
                      </div>
                      <div class="col-3">
                          <label>Last Name</label>
                          <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{old('last_name')}}">
                          <span style="color:red; font-size:10px;">@error('last_name'){{ $message}} @enderror</span> 
                      </div>
                      <div class="col-3">
                          <label>Middle Name</label>
                          <input type="text" name="middle_name" class="form-control" placeholder="Middle Name" value="{{old('middle_name')}}">
                          <span style="color:red; font-size:10px;">@error('last_name'){{ $message}} @enderror</span> 
                      </div>

                      <div class="col-2">
                          <label>Gender</label>
                          <select class="form-select" name="gender" value="{{old('gender')}}">
                              <option></option>
                              <option value="M">Male</option>
                              <option value="F">Female</option>
                          </select>
                          <span style="color:red; font-size:10px;">@error('sex'){{ $message}} @enderror</span> 
                      </div>

                      <div class="col-12">
                          <label>Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Address" value="{{old('address')}}">
                          <span style="color:red; font-size:10px;">@error('address'){{ $message}} @enderror</span> 
                        </div>

                        <div class="col-md-12">
                              <label>Place of Birth</label>
                              <input type="text" name="place_bdate" class="form-control" placeholder="Place of Birth" value="{{old('place_bdate')}}">
                              <span style="color:red; font-size:10px;">@error('place_bdate'){{ $message}} @enderror</span> 
                      </div>


                      <div class="col-md-6">
                        <label>Phone Number</label>
                          <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" value="{{old('phone_number')}}">
                          <span style="color:red; font-size:10px;">@error('phone'){{ $message}} @enderror</span> 
                        </div>
                        <div class="col-md-6">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                          <span style="color:red; font-size:10px;">@error('email'){{ $message}} @enderror</span> 
                        </div>
                      <div class="col-6">
                          <label>Grade</label>
                          <select class="form-select" name="grade" placeholder="Select Grade" value="{{old('grade')}}">
                              <option></option>
                              <option value=7>7</option>
                              <option value=8>8</option>
                              <option value=9>9</option>
                              <option value=10>10</option>
                          </select>
                              <span style="color:red; font-size:10px;">@error('grade'){{ $message}} @enderror</span> 
                      </div>
                      <div class="col-6">
                          <label>Type</label>
                              <select class="form-select" name="user_type" placeholder="Select Type" value="{{old('user_type')}}">
                              <option></option>
                              <option value="3">Student</option>
                              </select>
                              <span style="color:red; font-size:10px;">@error('user_type'){{ $message}} @enderror</span> 
                      </div>
                      <div class="col-md-4">
                              <label>Age</label>
                              <input type="number" name="age" class="form-control" placeholder="Age" value="{{old('age')}}">
                              <span style="color:red; font-size:10px;">@error('age'){{ $message}} @enderror</span> 
                      </div>

                      <div class="col-md-4">
                              <label>Birthdate</label>
                              <input type="date" name="birthdate" class="form-control" placeholder="Birthdate" value="{{old('birthdate')}}">
                              <span style="color:red; font-size:10px;">@error('birthdate'){{ $message}} @enderror</span> 
                      </div>


                  </div>
               </div>
                <!-- /.end card-body -->
                <!-- /.card-footer -->
                      <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
            </form>
          </div>
  </div>

  @notifyJs
</body>
</html>