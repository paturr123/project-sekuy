<!DOCTYPE html>
<head>
          <title>CRUD</title>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
          <meta name="csrf-token" content="{{ csrf_token() }}">
          
          <style>
            .kiribar{              
              margin-left: 0%;                        
              z-index: 1;
              display: block;
              animation-delay: 1s;
            }

            .kiri{
              box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
              height: 634px;
            }

            .navdar{
              box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            }

            .tumbul{
              width: 220px;
              transition: width 1s;
            }

            .tumbul:hover{              
              background: linear-gradient(to right, #8d68c5, #e34494);
              width: 180px
            }
            
            .logbot{
              background: linear-gradient(to right, #8d68c5, #e34494);
              width: 100px;
              height: 37px;
              transition: width 1s;
            }

            .logbot:hover{              
              width: 120px;                  
            }            

              .wrapper .button{
                display: inline-block;
                height: 60px;
                width: 60px;
                float: left;
                margin: 0 5px;
                overflow: hidden;
                background: linear-gradient(to right, #8d68c5, #e34494);
                border-radius: 50px;
                transition: all 0.3s ease-out;             
              }

              .wrapper .button:hover{
                width: 200px;
              }
              
              .wrapper .button .icon{
                display: inline-block;
                width: 60px;
                height: 60px;
                text-align: center;
                border-radius: 50px;
                box-sizing: border-box;
                line-height: 60px;

              }

              .wrapper .button .icon i{
                font-size: 25px;
                line-height: 60px;

              }
              
              .wrapper .button span{
                font-size: 18px;
                font-weight: 500;
                line-height: 60px;
                margin-left: 10px;
              }
          </style>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          
</head>
<body class="bg-secondary">

          {{-- columns --}}
          <div class="kiribar">
              <div class="row align-items-start">
                <div class="col-2">
                        
                  {{-- side bar --}}
                  <div class="kiri flex-column p-3 bg-dark fixed-top" style="width: 290px;">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">                   
                      <div class="wrapper">
                        <div class="button mb-5">
                          <div class="icon"><i class="fas fa-home"></i></div>
                          <span class="link-light">HOME</span>
                        </div>
                      </div>
                    </a>

                  <hr class="bg-white mt-10" style="height: 3px;">                    
                  <ul class="nav flex-column mb-auto">
                  <li class="tumbul nav-item mt-4" style="margin-left: 20px; outline:1px solid rgb(255, 255, 255); border-radius: 1rem;">
                    <a href="/" class="nav-link link-light" aria-current="page" type="button">
                    <svg class="bi me-2 " width="16" height="16"><use xlink:href="#home"></use></svg>
                        Kelas                        
                    </a>
                  </li>

                  <li class="tumbul nav-item mt-4" style="margin-left: 20px; outline:1px solid rgb(255, 255, 255); border-radius: 1rem;">
                    <a href="/murid" class="nav-link link-light">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        Murid
                        <div class="spinner-grow spinner-grow-sm text-danger"></div>
                    </a>
                  </li>

                  <li class="tumbul nav-item mt-4" style="margin-left: 20px; outline:1px solid rgb(255, 255, 255); border-radius: 1rem;">
                    <a href="/guru" class="butkir nav-link link-light">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        Guru                        
                    </a>
                  </li>

                  <li class="tumbul nav-item mt-4 mb-3" style="margin-left: 20px; outline:1px solid rgb(255, 255, 255); border-radius: 1rem;">
                    <a href="/mapel" class="nav-link link-light">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                        Mata Pelajaran
                    </a>
                  </li>                    
                     
                  {{-- bottom --}}
                  <hr class="bg-white" style="height: 18px;">
                  

                  <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">

                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                      <strong>SMKN KAPAN LAGI</strong>
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
                  

                  <div class="col-8" style="margin-left: 59px; margin-top: 70px;">

                  {{-- navbar --}}                  
                  <div class="navdar flex-column flex-shrink-0 p-3 bg-dark fixed-top" style=" width: 1050px; height:74px; margin-left: 289px;">
                    <a class="align-items-right mb-3 me-md-auto link-light text-decoration-none p-1">
                      <svg style="margin-top: 3px;" class="bi me-3" width="10" height="32"><use xlink:href="#bootstrap"></use></svg>
                        <span class="fs-4" style="margin-top: 8px;">MURID</span>
                          
                      <button type="button" class="logbot btn btn-outline-light " style="margin-left: 800px; margin-bottom: 10px; outline:1px solid rgb(255, 255, 255);">Logout</button>
                    </a>
                  </div>
                      
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert" style="margin-left: 50px; margin-top: 30px; width: 920px; height: 70px;">
                      {{ $message }}
                    </div>
                  @endif
          
          
          {{-- table --}}                  
          <div class="tabel card m-5 bg-dark" style="outline: 1px solid black ; margin-left: 8px;  width: 920px; border-radius: 1rem;">
          <div class="card-header" style="outline: 1px solid rgb(255, 255, 255) ; border-radius: 1rem; height: 60px;">
            
              {{-- button kanan --}}    
                  <div class="container d-flex justify-content-between">
                    <div class="navbar-brand mt-2 text-white">Murid</div>
                      <button class="btn btn-outline-light d-flex justify-content-end mt-2" type="submit" style="outline:1px solid rgb(255, 255, 255); border-radius: 0.8rem;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah Murid</button>

                      {{-- button tambah AJAX --}}
                      <button class="btn btn-outline-light d-flex justify-content-end mt-2" type="submit" style="outline:1px solid rgb(255, 255, 255); border-radius: 0.8rem;" data-bs-toggle="modal" data-bs-target="#modal-tambah-murid" data-bs-whatever="@mdo" id="btn-tambah-ajax">Tambah Murid Ajax</button>
                      
                </div>
              </div>     

              {{-- dropdown --}}
              <div class="card-body mt-2">
                <div class="btn-group d-flex">
                  <button class="btn btn-sm me-1 text-white" type="button" style="outline:2px solid rgb(255, 255, 255); margin-left: 15px;">
                    5
                  </button>
                  <button type="button" class="btn btn-sm dropdown-toggle dropdown-toggle-split text-white" data-bs-toggle="dropdown" aria-expanded="false" style="outline:2px solid rgb(255, 255, 255);">
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
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style=" width: 150px;" name="search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                  </form>
                </div>
              </div>
                


              {{-- table isi --}}
              <div class="card-body mt-4 text-white">
                <table class="table text-center text-white">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">NIS</th>
                      <th scope="col">Nama Murid</th>                      
                      <th scope="col">Detail Kelas</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>                  
                  <tbody id="table-murid">

                    @php
                        $no = 1;
                    @endphp
                    
                    @foreach ($murids as $row)
                    
                    <tr class="tar">
                      <th scope="row">{{ $no++ }}</th>
                      <td>{{ $row->nis }}</td>
                      <td>{{ $row->nama_murid }}</td>                      
                      <td>{{ $row->kelas->nama_kelas }} {{ $row->kelas->jurusan }} </td>
                      <td>
                        <button class="btn btn-primary btn-sm" type="submit" id="btn-edit" data-id="{{ $row->id }}">Edit Ajax</button>
                        <button class="btn btn-danger btn-sm delete" data-id="{{ $row->id }}">Hapus Data Ajax</button>
                        <a href="/editmurid/{{ $row->id }}" class="btn btn-primary">Edit Data</a> 
                        <a href="/hapus/{{ $row->id }}" class="btn btn-danger delete">Hapus Data</a> 
                        
                      </td>
                    </tr> 
                    @endforeach
                  </tbody>

                </table>
                {{-- bottom table --}}
                <div class="list-inline d-flex">
                  <div class="p-2 flex-grow-1">Showing 1 to 10 out of 20</div>
                    <div class="p-2 btn btn-outline-light me-3" style="border-radius: 1rem; width: 70px;">Prev</div>
                  <div class="p-2 btn btn-outline-light" style="border-radius: 1rem; width: 70px;">Next</div>
                </div>

              </div>
              </div>
            </div>

            {{-- penutup columns --}}
            </div>  
          </div>

          {{-- modal --}}
          <div class="dong modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Murid</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <form action="/tambahdata" method="POST" enctype="multipart/form-data">                    
                    @csrf

                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">NIS:</label>
                      <input type="text" name="nis" class="form-control" id="recipient-name">
                    </div>

                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Nama Murid:</label>
                      <input type="text" name="nama_murid" class="form-control" id="recipient-name">
                    </div>                    
                    
                    <label class="form-label">Kelas:</label>
                    <select class="form-select" aria-label="Default select example" name="kelas_id">

                    <option selected>Kelas</option>                    
                         @foreach ($kelas as $kls)
                             <option value="{{ $kls->id }}">{{ $kls->nama_kelas }} {{ $kls->jurusan }}</option>
                         @endforeach
                    </select>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                
                  </form>
                </div>
            </div>

                </div>
              </div>
            </div>
          </div>

          {{-- modal edit --}}
          <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">Edit Murid</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="editForm">
                    @csrf
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                      <label for="edit-nis" class="col-form-label">NIS:</label>
                      <input type="text" name="nis" class="form-control" id="edit-nis">
                    </div>
                    <div class="mb-3">
                      <label for="edit-nama_murid" class="col-form-label">Nama Murid:</label>
                      <input type="text" name="nama_murid" class="form-control" id="edit-nama_murid">
                    </div>
                    <label class="form-label">Kelas:</label>
                    <select class="form-select" name="kelas_id" id="edit-kelas_id">
                      <option selected>Kelas</option>
                      @foreach ($kelas as $kls)
                        <option value="{{ $kls->id }}">{{ $kls->nama_kelas }} {{ $kls->jurusan }}</option>
                      @endforeach
                    </select>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          {{-- penutup modal edit --}}

          {{-- script edit --}}
          <script>
            $(document).ready(function() {
              // Handle Edit button click
              $(document).on('click', '#btn-edit', function() {
                var userId = $(this).data('id');
                
                // Fetch user data
                $.ajax({
                  url: '/api/murid/' + userId,
                  method: 'GET',
                  success: function(response) {
                    $('#edit-id').val(response.id);
                    $('#edit-nis').val(response.nis);
                    $('#edit-nama_murid').val(response.nama_murid);
                    $('#edit-kelas_id').val(response.kelas_id);
                    $('#editModal').modal('show');
                  }
                });
              });
          
              // Handle form submission
              $('#editForm').on('submit', function(event) {
                event.preventDefault();
                
                var formData = $(this).serialize();
                var userId = $('#edit-id').val();
                
                // Update user data
                $.ajax({
                  url: '/api/murid/' + userId,
                  method: 'PUT',
                  data: formData,
                  success: function(response) {
                    $('#editModal').modal('hide');
                    
                    // Update table row with new data
                    $('#table-murid').find('tr').each(function() {
                      var id = $(this).find('button[data-id]').data('id');
                      if (id == response.id) {
                        $(this).find('td:nth-child(2)').text(response.nis);
                        $(this).find('td:nth-child(3)').text(response.nama_murid);
                        $(this).find('td:nth-child(4)').text(response.kelas.kelas + ' ' + response.kelas.jurusan);
                      }
                    });
          
                    Swal.fire({
                      icon: 'success',
                      title: 'Data updated successfully',
                      showConfirmButton: false,
                      timer: 1500
                    });
                  }
                });
              });
            });
          </script>
          {{-- penutup script edit --}}

          {{-- script delete --}}
          <script>
            $(document).ready(function() {
              // Handle Delete button click
              $(document).on('click', '.delete', function() {
                var id = $(this).data('id');
                var row = $(this).closest('tr'); // Get the closest table row
            
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                      url: '/api/murid/' + id,
                      type: 'DELETE',
                      data: {
                        _token: '{{ csrf_token() }}' // Include CSRF token
                      },
                      success: function(response) {
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        ).then(() => {
                          row.remove(); // Remove the table row from the DOM
                        });
                      },
                      error: function(response) {
                        Swal.fire(
                          'Error!',
                          'Something went wrong.',
                          'error'
                        );
                      }
                    });
                  }
                });
              });
            });
            </script>
            {{-- penutup script delete --}}

          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
          @include('components.tambah-murid')
</body>
</html>