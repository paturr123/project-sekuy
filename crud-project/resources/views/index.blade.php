<!DOCTYPE html>
<head>
          <title>CRUD</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
          
</head>
<body>

          {{-- columns --}}
          <div class="container" style="margin-right: 183px;">
              <div class="row align-items-start">
                <div class="col-2">
                        
                  {{-- side bar --}}
                  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 290px; height:660px; outline:1px solid black;">
                  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <svg class="bi me-2" width="10" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-3 fw-bold">|MENU UTAMA|</span>
                  </a>                  

                  <hr style="height: 3px;">                    
                  <ul class="nav flex-column mb-auto">
                  <li class="nav-item mt-4" style="outline:1px solid black; border-radius: 0.3rem;">
                    <a href="#" class="nav-link link-warning" aria-current="page" type="button">
                    <svg class="bi me-2 " width="16" height="16"><use xlink:href="#home"></use></svg>
                        Kelas                        
                    </a>
                  </li>

                  <li class="nav-item mt-2" style="outline:1px solid black; border-radius: 0.3rem;">
                    <a href="#" class="nav-link link-dark">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        Murid
                    </a>
                  </li>

                  <li class="nav-item mt-2 mb-3" style="outline:1px solid black; border-radius: 0.3rem;">
                    <a href="#" class="nav-link link-dark">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                        Mata Pelajaran
                    </a>
                  </li>                    
                     
                  {{-- bottom --}}
                  <hr style="height: 18px;">
                  <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

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

                  {{-- navbar --}}                  
                  <div class="flex-column flex-shrink-0 p-3 bg-light" style=" width: 1020px; height:74px; margin-left: 10px; outline:1px solid black;">
                    <a class="align-items-right mb-3 me-md-auto link-dark text-decoration-none">
                      <svg style="margin-top: 3px;" class="bi me-3" width="10" height="32"><use xlink:href="#bootstrap"></use></svg>
                        <span class="fs-4" style="margin-top: 8px;">KELAS</span>
                          
                      <button type="button" class="btn btn-outline-secondary " style="margin-left: 730px; margin-bottom: 10px; outline:1px solid black;">Logout</button>
                    </a>
                  </div>
                      
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert" style="margin-left: 50px; margin-top: 30px; width: 920px; height: 70px;">
                      {{ $message }}
                    </div>
                  @endif
          
          
          {{-- table --}}                  
          <div class="card m-5" style="outline: 1px solid black ; margin-left: 8px;  width: 920px; border-radius: 1rem;">
          <div class="card-header" style="outline: 1px solid black ; border-radius: 1rem;">
            
              {{-- button kanan --}}    
                  <div class="container d-flex justify-content-between">
                    <div class="navbar-brand mt-1 ">Kelas</div>
                      <button class="btn btn-outline-secondary d-flex justify-content-end " type="submit" style="outline:1px solid black; border-radius: 0.8rem;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">tambah kelas</button>
                </div>
              </div>     

              {{-- dropdown --}}
              <div class="card-body">
                <div class="btn-group d-flex">
                  <button class="btn btn-sm me-1" type="button" style="outline:2px solid grey; margin-left: 15px;">
                    5
                  </button>
                  <button type="button" class="btn btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" style="outline:2px solid grey;">
                    <span class="visually-hidden">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">CIWAWA</a></li>
                    <li><a class="dropdown-item" href="#">BABAYO</a></li>
                    <li><a class="dropdown-item" href="#">INI BAPAK BUDI</a></li>                    
                  </ul>                

                {{-- search bar --}}
                <div class="container justify-content-end" style="margin-left: 550px;">
                  <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style=" width: 150px;">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                  </form>
                </div>
              </div>
                


              {{-- table isi --}}
              <div class="card-body">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Kelas</th>
                      <th scope="col">Jurusan</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>                  
                  <tbody>
                    @foreach ($kelas as $user)
                    <tr>
                      <th scope="row">{{ $user->id }}</th>
                      <td>{{ $user->nama_kelas }}</td>
                      <td>{{ $user->jurusan }}</td>
                      <td>
                        <button type="button" class="btn btn-primary">Lihat Data</button> 
                        <a href="/tampildata/{{ $user->id }}" class="btn btn-primary">Edit Data</a> 
                        <button type="button" class="btn btn-danger">Hapus Data</button> 
                        
                      </td>
                    </tr>                                            
                    @endforeach
                  </tbody>

                </table>
                {{-- bottom table --}}
                <div class="list-inline d-flex">
                  <div class="p-2 flex-grow-1">Showing 1 to 10 out of 20</div>
                    <div class="p-2 btn btn-outline-dark me-3" style="border-radius: 1rem; width: 70px;">Prev</div>
                  <div class="p-2 btn btn-outline-dark" style="border-radius: 1rem; width: 70px;">Next</div>
                </div>

              </div>
              </div>
            </div>

            {{-- penutup columns --}}
            </div>  
          </div>

          {{-- modal --}}
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <form action="/insertdata" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Nama Kelas:</label>
                      <input type="text" name="nama_kelas" class="form-control" id="recipient-name">
                    </div>

                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Jurusan:</label>
                      <input type="text" name="jurusan" class="form-control" id="recipient-name">
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                  </form>
                </div>

                </div>
              </div>
            </div>
          </div>

          
          
                


                   

          
          
                    
                    









          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>