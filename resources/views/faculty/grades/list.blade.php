<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- logo page -->
    <link rel="shorcut icon" href="{{asset('assets/img/school-logo.png')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">


    <!-- Style -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/notify.css')}}">



    <title>Masoli High School</title>

    
  </head>

  <body>

  <x-notify::notify />


    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-blue fixed-top">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
 data-bs-target="#sidebar"
          aria-controls="offcanvasExample">
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#"
          ><img class="m-2" src="{{asset('assets/img/school-logo.png')}}" alt="logo" style="height:40px;">MASOLI PORTAL</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
              <span style="color:white;font-weight:bold; margin-right:10px;">{{Auth::user()->name}}</span>
              <i class="fa-solid fa-user"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">


            <li>
            <a href="/faculty/dashboard" class="nav-link active px-3 pt-3 mt-2">
                <span class="me-2"><i class="fa-solid fa-chart-pie"></i></span>
                <span>Dashboard</span></a>

            <a href="/faculty/request/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-book me-2"></i></span>
                <span>Request List</span></a>

              <a href="/faculty/subject/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-layer-group  me-2"></i></span>
                <span>Subject</span></a>

            <a href="/faculty/enroll/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-restroom me-2"></i></span>
                <span>Request Enroll</span></a>

            <a href="/faculty/school_year/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-calendar-days me-2"></i></span>
                <span>School Year</span></a>
            
            <a href="/faculty/class/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-school me-2"></i></span>
                <span>Class</span></a>
              <br>
                <li class="menu-header small text-uppercase">
                   <span class="menu-header-text" style="padding-left:80px; padding-top:20px; color:white;">Records</span>
              </li>

              <a href="/faculty/grades/list" class="nav-link  px-3 pt-3">
                          <span class="me-2"><i class="fa-solid fa-file-lines me-2"></i></span>
                              <span>Academic Records</span></i>
                        </a>

                          <!-- second item -->
                        <a href="/faculty/student/list" class="nav-link  px-3 pt-3">
                          <span class="me-2"><i class="fa-solid fa-school me-2"></i></span>
                              <span>Student List</span></i>
                        </a>
              <br>

              <a href="{{ url('logout') }}" class="nav-link px-3 bg-danger pt-3">
                <span class="me-2"><i class="fas fa-power-off me-2"></i></span>
                <span>Logout</span></a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Student Grades Records</h4>

            <div class="card-header">
                <h6 class="card-title">Search Student Grades</h6>
              </div>
              <form action="" method="get" >
                <div class="card-body">
                    <div class="row">

                    <div class="form-group col-md-3">
                      <label>LRN</label>
                      <input type="text" name="lrn" value="{{ Request::get('lrn') }}" class="form-control" placeholder="LRN Number">
                    </div>

                    <div class="form-group col-md-3">
                      <label>Name</label>
                      <input type="text" name="name" value="{{ Request::get('name') }}" class="form-control" placeholder="Name">
                    </div>

                    <div class="form-group col-md-3">
                      <label>Grade</label>
                      <select class="form-select" name="grade" placeholder="Select Grade" value="{{ Request::get('grade') }}">
                              <option></option>
                              <option value=7>7</option>
                              <option value=8>8</option>
                              <option value=9>9</option>
                              <option value=10>10</option>
                          </select>

                    </div>

                
                    <div class="form-group col-md-3">
                
                      <button class="btn btn-primary" type="submit" style="margin-top:24px;">Search</button>
                      <a href="{{ url('faculty/student/list')}}" class="btn btn-success" style="margin-top:24px;">Reset</a>
                    </div>

                  </div>
                <!-- /.card-body -->
                </div>
              </form>
            </div>
            
          
             <!-- /.card-header -->
             <div class="card-body">
                <table class="table table-sm table-bordered">
                  <thead>
                    <tr>
                      <th>LRN</th>
                      <th>Name</th>
                      <th>Grade</th>
                      <th>Email</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($data['getStudentProfile'] as $student)
                    <tr>
                      <td class="text-center">{{$student->lrn}}</td>
                      <td class="text-center">{{$student->last_name}} {{$student->name}}   {{$student->middle_name}}.</td>
                      <td class="text-center">{{$student->grade}}</td>
                      <td class="text-center">{{$student->email}}</td>
                      <td class="text-center"> 
                    
                      <a href="{{ url('faculty/grades/list_grades'.$student->student_profile_id) }}" class="btn btn-success btn-sm" style="color:white;"><i class="fa-regular fa-eye p-1" style="color: #fafafa;"></i>View Records</a>
                      </td>
                    </tr>
                    @include('faculty/student/modal_view')
                    @endforeach
                  </tbody>
                  
                </table>
                <div style="float:right;">
                {!! $data['getStudentProfile']->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
                </div>
                <!-- End of pagination -->

            </div>


          </div>
        </div>
    
</main>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{asset('assets/js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap5.min.js')}}"></script>
    <script>
        $(document).ready(function(){

            $('.sub-btn').click(function(){
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
          });

        })
    </script>
    
    <!-- Scripts -->
    <script src="{{asset('assets/js/script.js')}}"></script>
    
    @notifyJs
    
  </body>
</html>
