<!-- Modal Mapel-->
<div class="modal fade" id="modal-tambah-mapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <label for="name" class="control-label">Mata Pelajaran</label>
                  <input type="text" class="form-control" id="idmapel">
                  <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
              </div>

              <div class="form-group">
                  <label for="name" class="control-label">Keterangan</label>
                  <input type="text" class="form-control" id="idketerangan">
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
    $('#table-mapel').on('DOMSubtreeModified', function() {
        updateRowNumbers();
    })


      //open modal
      $('#modal-tambah-mapel').modal('show');
  });

  //action create post
  $('#store').click(function(e) {
      e.preventDefault();

      //define variable
      let mata_pelajaran   = $('#idmapel').val();
      let keterangan = $('#idketerangan').val();
      let token   = $("meta[name='csrf-token']").attr("content");
      
      //ajax
      $.ajax({

          url: `/mapelajax`,
          type: "POST",
          cache: false,
          data: {
              "mata_pelajaran": mata_pelajaran,
              "keterangan": keterangan,
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
                      <td>${response.data.mata_pelajaran}</td>
                      <td>${response.data.keterangan}</td>
                      <td class="text-center">
                          <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                          <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                      </td>
                  </tr>
              `;
              
              //append to table
              $('#table-mapel').append(post);
              
              //clear form
              $('#idmapel').val('');
              $('#idketerangan').val('');

              //close modal
              $('#modal-tambah-mapel').modal('hide');
              

          },
          error:function(error){
              
              if(error.responseJSON.mata_pelajaran[0]) {

                  //show alert
                  $('#alert-title').removeClass('d-none');
                  $('#alert-title').addClass('d-block');

                  //add message to alert
                  $('#alert-title').html(error.responseJSON.mata_pelajaran[0]);
              } 

              if(error.responseJSON.keterangan[0]) {

                  //show alert
                  $('#alert-content').removeClass('d-none');
                  $('#alert-content').addClass('d-block');

                  //add message to alert
                  $('#alert-content').html(error.responseJSON.keterangan[0]);
              }

          }

      });

  });
  // Initialize row counter on page load based on existing rows
  $(document).ready(function() {
    rowCounter = $('#table-mapel tr').length; // Set counter based on existing rows
    updateRowNumbers(); // Initial update of row numbers
});

</script>