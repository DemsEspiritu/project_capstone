<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- bootstrap css llink -->
   
        <link rel="shorcut icon" href="{{asset('assets/img/school-logo.png')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

          <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <title>Masoli High School</title>
</head>
<body>  
    
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="m-2" src="{{asset('assets/img/school-logo.png')}}" alt="logo" style="height:70px;">Masoli High School</h4></a>
                    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"           aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                            {{-- Nav-Bar Code --}}

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active m-3 link-style" href="#Home">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active m-3 link-style "  href="#About">About</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active m-3 link-style"  href="#Contact">Contact</a>
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

    

    <style>
        .carousel-item{
            height: 32rem;
            background: #777;
            height: 95vh;
            background-position: center;
            position: relative;
            background-size:cover;
            color: white;
        }

        .carousel-item h1{
            font-size: 70px;
            color:white;
        }

        .carousel-item p{
            font-size: 30px;
        }
       
        .container{
            position: absolute;
            bottom: 0;
            left:0;
            right: 0;
            padding-bottom: 50px;
        }
        .about{

            color: white;
           
            background-position: center;
            color: white;
            align-items: center;
 
        }
        .about h2{
            text-align: center;
            font-style: italic;
            font-size: 50px;
        }

        .about p{
            text-align: center;
            padding: 25px 50px;
            font-size: 20px;
            font-style: italic;

         
        }

        .c-carousel{
            padding-top: 55px;
        }

        .c-about{
            padding-top: 100px;
            padding-bottom: 10%;
            margin-top: 0;
            margin-top: 20px;
            height: 32rem;
            height: 95vh;
            background-position: center;
            position: relative;
            background-size:cover;
       
        }

        .c-about h5{
            font-size: 50px;
            padding-bottom: 5%;
           
        }

        
        .c-contact{
            background: #404957;
            padding-bottom: 20%;
        }

        .c-contact h1{
            color: white;
            
        }
       

    </style>
    <div class="c-carousel" id="Home">
<div class="carousel slide" id="MyCarousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#MyCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#MyCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#MyCarousel" data-bs-slide-to="2"></button>
        </div>
    <div class="carousel-inner">

            <div class="carousel-item active" style="background-image :url('{{ asset('assets/img/slide1.jpg')}}'); ">
                <div class="container">
                    <h1>Welcome to Masoli High School</h1>
                    <p>Be Part of our School</p>
                    <a href="/home/enroll" class="btn btn-lg btn-primary">Enroll Now</a>
            </div>
            </div>

            <div class="carousel-item" style="background-image :url('{{ asset('assets/img/slide2.jpg')}}'); ">
                <div class="container">
                <h1>Welcome to Masoli High School</h1>
                    <p>Be Part of our School</p>
                    <a href="/home/enroll" class="btn btn-lg btn-primary">Enroll Now</a>
            </div>
            </div>

            
            <div class="carousel-item" style="background-image :url('{{ asset('assets/img/slide3.jpg')}}'); ">
                <div class="container">
                <h1>Welcome to Masoli High School</h1>
                    <p>Be Part of our School</p>
                    <a href="/home/enroll" class="btn btn-lg btn-primary">Enroll Now</a>
            </div>
            </div>

    </div>
</div>
    </div>

        <div class="container-fluid c-about " style="background-image :url('{{ asset('assets/img/ba2.jpg')}}'); ">
            <div class="about"  id="About">
                <h5 class="text-center">About Us</h5>

                    <h2 >Vission</h2>
                        <p>By 2014, Masoli High School is an educational institution developing students who are God-Loving, responsible and productive individual.</p>

                    <h2>Mission</h2>
                        <p>To provide quality education through responsive and innovative Secondary Education Curriculum which produces self-motivated students inbued with positive attitudes with the help of empowered and effective teachers, dynamic School Head and supportive stakeholders.</p>
            </div>
        </div>

        <div class="container-fluid c-contact">
                <h1 class="text-center p-5 mb-5 " id="Contact">Contact Us</h1>

                <div class="row row-cols-1 row-cols-md-3 g-3 card-row">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center bg-light">
                    <i class="fa-solid fa-phone"></i>
                      <h5 class="card-title">Phone Number</h5>
                      <p class="card-text">+639456842746</p>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center bg-light">
                    <i class="fa-solid fa-location-dot"></i>
                      <h5 class="card-title">Location</h5>
                      <p class="card-text">Bato Camarines Sur</p>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center bg-light">
                    <i class="fa-solid fa-envelope"></i>
                      <h5 class="card-title">Mail</h5>
                      <p class="card-text">masolihighschool@gmail.com</p>
                    </div>
                  </div>
            </div>
        </div>
                </div>
         
        </div>



          

    

    <!-- Script  Link-->
    <script src="{{asset('assets/js/script.js')}}"></script>
    <!-- bootstrap  Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>