<!DOCTYPE html>
<head>          
          <title>Edit Data</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

          <style>
            
          </style>
</head>
<body class="bg-secondary">
    <h1 class="text-center mt-4 mb-4">Edit Data</h1>
    <div class="container">
      <div class="row justify-content-center">
           <div class="card">
               <div class="card-body">

                <form action="/updatemurid/{{ $murids->id }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NIS:</label>
                    <input type="text" name="nis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $murids->nis }}">                    
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Murid:</label>
                    <input type="text" name="nama_murid" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $murids->nama_murid }}">                    
                  </div>                         

                  <label class="form-label">Kelas:</label>
                    <select class="form-select" aria-label="Default select example" name="kelas_id">

                    <option selected>Kelas</option>                    
                         @foreach ($kelas as $kls)
                             <option value="{{ $kls->id }}">{{ $kls->nama_kelas }} {{ $kls->jurusan }}</option>
                         @endforeach
                    </select>

                  <button type="submit" class="btn mt-4 btn-primary">Upload</button>
                </form>  
                
                
               </div>
           </div>
      </div>       
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>