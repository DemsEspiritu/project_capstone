<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shorcut icon" href="{{asset('assets/img/school-logo.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <title>Masoli High School</title>
  </head>
  <body>
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
          <ul class="navbar-nav ms-auto ml-1"">
            <li class="nav-item dropdown"">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
              <span style="color:white;font-weight:bold; margin-right:10px;">{{Auth::user()->name}}</span>

              <i class="fa-solid fa-circle-user fa-2xl" style="color: #ffffff;"></i>
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
            <a href="#" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-regular fa-file-lines"></i></span>
                <span>Grades</span></a>

            <a href="/student/request/add" class="nav-link px-3 active pt-3">
                <span class="me-2"><i class="fa-solid fa-paperclip"></i></span>
                <span>Request Form</span>
              </a>

              <a href="{{ url('logout') }}" class="nav-link px-3 bg-danger pt-3">
                <span class="me-2"><i class="fas fa-power-off me-2"></i></span>
                <span>Logout</span>
              </a>
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
            <h4>Request</h4>

            @include('_message')

            <div class="form-group col-md-3">
              <a href="{{ url('/student/request/add') }}" class="btn btn-primary"><i class="fa-solid fa-plus  p-1" style="color: #ffffff;"></i>Add Request</a>
            </div>
            
          </div>
        </div>

        <!-- Start Table -->
        
      <div class="container-fluid mt-2">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">My Request</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th  class="text-center">Type</th>
                        <th  class="text-center">Submit Date</th>
                        <th  class="text-center">Action</th>
                        <th  class="text-center">Status</th>              
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($val as $ownRec)
                    <tr>
                      <td  class="text-center">{{ $ownRec->type }}</td>
                      <td  class="text-center">{{ date('d-m-Y H:i A', strtotime($ownRec->created_at)) }}</td>
                      <td  class="text-center">
                        <a href="#" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square p-1" style="color: #fafafa;"></i>Edit</a>
                        <a href="{{ url('student/request/myrequest/remove'.$ownRec->form_id) }}" class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can p-1" style="color: #fafafa;"></i>Delete</a>
                      </td>
                            <!-- status field -->
                      <td  class="text-center">{{ $ownRec->status }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- pagination -->
      
                <!-- End of pagination -->
              </div>
            </div>
          </div>
        </div>


        </div>
    




      </div>
    </main>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{asset('assets/js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
  </body>
</html>
