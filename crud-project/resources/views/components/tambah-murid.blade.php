<!-- Modal Mapel-->
<div class="modal fade" id="modal-tambah-murid" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">TAMBAH POST</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">

              <div class="form-group">
                  <label for="name" class="control-label">NIS</label>
                  <input type="text" class="form-control" id="nisInput">
                  <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nis"></div>
              </div>

              <div class="form-group">
                  <label for="name" class="control-label">Nama Murid</label>
                  <input type="text" class="form-control" id="namaMuridInput">
                  <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-murid"></div>
              </div>

              <label class="form-label">Kelas:</label>
              <select class="form-select" aria-label="Default select example" name="kelas_id" id="kelasSelect">
                  <option selected>Kelas</option>
                  @foreach ($kelas as $kls)
                      <option value="{{ $kls->id }}">{{ $kls->nama_kelas }} {{ $kls->jurusan }}</option>
                  @endforeach
              </select>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
              <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
          </div>
      </div>
  </div>
</div>

<script>
  //button create post event
  $('#btn-tambah-ajax').on('click', function () {

    // Global counter for row numbers
    let rowCounter = 5;
    
    // Function to update row numbers
    function updateRowNumbers() {
        $('#table-murid tr').each(function(index) {
            var rowNumber = $(this).attr('data-row');
            $(this).find('th').first().text(rowNumber); // Set row number
        });
    }

    // Call the function to update row numbers on page load
    updateRowNumbers();

    // Update row numbers when a row is added or removed
    $('#table-murid').on('DOMSubtreeModified', function() {
        updateRowNumbers();
    })

      //open modal
      $('#modal-tambah-murid').modal('show');
  });

  //action create post
  $('#store').on('click', function(e) {
      e.preventDefault();

      //define variable
      let nis = $('#nisInput').val();
      let namaMurid = $('#namaMuridInput').val();
      let kelasId = $('#kelasSelect').val();
      let token = $("meta[name='csrf-token']").attr("content");

      //ajax
      $.ajax({
          url: `/muridajax`,
          type: "POST",
          cache: false,
          data: {
              "nis": nis,
              "nama_murid": namaMurid,
              "kelas_id": kelasId,
              "_token": token
          },
          success:function(response){
              //show success message
              Swal.fire({
                  type: 'success',
                  icon: 'success',
                  title: `${response.message}`,
                  showConfirmButton: false,
                  timer: 3000
              });

              //data post
              let post = `
                <tr id="index_${response.data.id}" data-row="${++rowCounter}">
                    <th scope="row">${rowCounter}</th>
                      <td>${response.data.nis}</td>
                      <td>${response.data.nama_murid}</td>
                      <td>${response.data.kelas_id} ${response.data.jurusan}</td>
                      <td class="text-center">
                          <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                          <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                      </td>
                  </tr>
              `;
              
              //append to table
              $('#table-murid').append(post);
              
              //clear form
              $('#idnis').val('');
              $('#idnama').val('');
              $('#idkelas').val('');

              //close modal
              $('#modal-tambah-murid').modal('hide');
              

          },
          error:function(error){
              
              if(error.responseJSON.nis[0]) {

                  //show alert
                  $('#alert-title').removeClass('d-none');
                  $('#alert-title').addClass('d-block');

                  //add message to alert
                  $('#alert-title').html(error.responseJSON.nis[0]);
              } 

              if(error.responseJSON.nama_murid[0]) {

                  //show alert
                  $('#alert-content').removeClass('d-none');
                  $('#alert-content').addClass('d-block');

                  //add message to alert
                  $('#alert-content').html(error.responseJSON.nama_murid[0]);
              }

          }

      });

  });
  // Initialize row counter on page load based on existing rows
  $(document).ready(function() {
    rowCounter = $('#table-murid tr').length; // Set counter based on existing rows
    updateRowNumbers(); // Initial update of row numbers
});

</script>