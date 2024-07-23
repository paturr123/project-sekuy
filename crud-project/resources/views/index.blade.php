<!DOCTYPE html>
<head>
          <title>CRUD</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
          
</head>
<body>

          {{-- columns --}}
          <div class="container" style="margin-right: 183px;">
                    <div class="row">
                      <div class="col-2">
                        
                      {{-- side bar --}}
                    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 290px; height:610px; outline:1px solid black;">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                      <svg class="bi me-2" width="10" height="32"><use xlink:href="#bootstrap"></use></svg>
                      <span class="fs-3 fw-bold">|MENU UTAMA|</span>
                    </a>

                    <hr style="height: 3px;">                    
                    <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                          Kelas
                        </a>
                    </li>

                    <li>
                        <a href="#" class="nav-link link-dark">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                          Murid

                        </a>

                    </li>

                    <li>
                        <a href="#" class="nav-link link-dark">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                          Mapel
                        </a>
                    </li>                    
                    
                    {{-- bottom --}}
                    <hr style="height: 18px;">
                    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

                    <div class="dropdown">
                      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">

                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>mdo</strong>
                      </a>
                      
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                              <li><a class="dropdown-item" href="#">New project...</a></li>
                              <li><a class="dropdown-item" href="#">Settings</a></li>
                              <li><a class="dropdown-item" href="#">Profile</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="#">Sign out</a></li>
                              </ul>
                              </div>
                    </div>
                    </div>
                    <div class="col-8" style="margin-left: 91px;">

                    {{-- container --}}
                    <div class="flex-column flex-shrink-0 p-3 bg-light" style=" width: 1001px; height:74px; margin-left: 10px; outline:1px solid black;">
                    <a class="align-items-right mb-3 me-md-auto link-dark text-decoration-none">
                      <svg style="margin-top: 3px;" class="bi me-3" width="10" height="32"><use xlink:href="#bootstrap"></use></svg>
                      <span class="fs-4" style="margin-top: 8px;">KELAS</span>                
                      
                      <button type="button" class="btn btn-primary" style="margin-left: 730px; margin-bottom: 10px;">Logout</button>
                    </a>
                    </div>
                    </div>                    
          </div>


                   

          
          
                    
                    









          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>