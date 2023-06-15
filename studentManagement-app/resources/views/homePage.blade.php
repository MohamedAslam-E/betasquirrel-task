<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .sidebar{
            margin: 0;
            padding: 0;
        }
        *{
          margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><h1>Student Magement System</h1></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
            <div class="row">
              <div class="col-3 sidebar">
                <nav
                    id="sidebarMenu"
                    class="collapse d-lg-block sidebar collapse bg-white"
                    >
                 <div class="position-sticky">
                   <div class="list-group list-group-flush  mt-4">
                     <a
                        href="{{url('/student')}}"
                        class="list-group-item list-group-item-action py-4 ripple"
                        aria-current="true"
                        >
                        <i class="bi bi-person-lines-fill px-1"></i></i
                         ><span>Student</span>
                     </a>
                     <a
                        href="#"
                        class="list-group-item list-group-item-action py-4 ripple d-flex"
                        ><i class="bi bi-person-badge-fill px-1"></i><span>Teacher</span></a
                       >
                     <a
                        href="#"
                        class="list-group-item list-group-item-action py-4 ripple d-flex"
                        ><i class="bi bi-book px-1"></i><span>course</span></a
                       >
                     <a
                        href="#"
                        class="list-group-item list-group-item-action py-4 ripple"
                        >
                        <i class="bi bi-patch-plus-fill px-1"></i><span>Enrollment</span>
                     </a>
                     <a
                        href="#"
                        class="list-group-item list-group-item-action py-4 ripple"
                        ><i class="bi bi-credit-card px-1"></i></i><span>Payment</span></a
                       >
                   </div>
                 </div>
               </nav>
              </div>
              <div class="col-md-12 col-lg-9">
                 @yield('content')
              </div>
            </div>
        </div>
    </header>    
</body>
</html>