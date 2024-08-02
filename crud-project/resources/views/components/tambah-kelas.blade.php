<!-- Modal -->
<div class="modal fade" id="modal-tambah-kelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <label for="name" class="control-label">Nama Kelas</label>
                  <input type="text" class="form-control" id="idkelas">
                  <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
              </div>

              <div class="form-group">
                  <label for="name" class="control-label">Jurusan</label>
                  <input type="text" class="form-control" id="idjurusan">
                  <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-content"></div>
              </div>

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
  $('body').on('click', '#btn-tambah-ajax', function () {
     // Global counter for row numbers
     let rowCounter = 5;
    
    // Function to update row numbers
    function updateRowNumbers() {
        $('#table-kelas tr').each(function(index) {
            var rowNumber = $(this).attr('data-row');
            $(this).find('th').first().text(rowNumber); // Set row number
        });
    }

    // Call the function to update row numbers on page load
    updateRowNumbers();

    // Update row numbers when a row is added or removed
    $('#table-kelas').on('DOMSubtreeModified', function() {
        updateRowNumbers();
    })


      //open modal
      $('#modal-tambah-kelas').modal('show');
  });

  //action create post
  $('#store').click(function(e) {
      e.preventDefault();

      //define variable
      let nama_kelas   = $('#idkelas').val();
      let jurusan = $('#idjurusan').val();
      let token   = $("meta[name='csrf-token']").attr("content");
      
      //ajax
      $.ajax({

          url: `/kelasajax`,
          type: "POST",
          cache: false,
          data: {
              "nama_kelas": nama_kelas,
              "jurusan": jurusan,
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
                      <td>${response.data.nama_kelas}</td>
                      <td>${response.data.jurusan}</td>
                      <td>${response.data.jumlah_siswa}</td>
                      <td class="text-center">
                          <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                          <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                      </td>
                  </tr>
              `;
              
              //append to table
              $('#table-kelas').append(post);
              
              //clear form
              $('#idkelas').val('');
              $('#idjurusan').val('');

              //close modal
              $('#modal-tambah-kelas').modal('hide');
              

          },
          error:function(error){
              
              if(error.responseJSON.nama_kelas[0]) {

                  //show alert
                  $('#alert-title').removeClass('d-none');
                  $('#alert-title').addClass('d-block');

                  //add message to alert
                  $('#alert-title').html(error.responseJSON.nama_kelas[0]);
              } 

              if(error.responseJSON.jurusan[0]) {

                  //show alert
                  $('#alert-content').removeClass('d-none');
                  $('#alert-content').addClass('d-block');

                  //add message to alert
                  $('#alert-content').html(error.responseJSON.jurusan[0]);
              }

          }

      });

  });
  // Initialize row counter on page load based on existing rows
  $(document).ready(function() {
    rowCounter = $('#table-kelas tr').length; // Set counter based on existing rows
    updateRowNumbers(); // Initial update of row numbers
});

</script>