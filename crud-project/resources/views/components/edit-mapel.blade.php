<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">EDIT POST</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">

              <input type="hidden" id="user_id">

              <div class="form-group">
                  <label for="name" class="control-label">Mata Pelajaran</label>
                  <input type="text" class="form-control" id="mapel-edit">
                  <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title-edit"></div>
              </div>
              
              <div class="form-group">
                  <label for="name" class="control-label">Keterangan</label>
                  <input type="text" class="form-control" id="keterangan-edit">
                  <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title-edit"></div>
              </div>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
              <button type="button" class="btn btn-primary" id="update">UPDATE</button>
          </div>
      </div>
  </div>
</div>

<script>
  //button create post event
  $('body').on('click', '#btn-edit', function () {

      let user_id = $(this).data('id');

      //fetch detail post with ajax
      $.ajax({
          url: `/mapelajax/${user_id}`,
          type: "GET",
          cache: false,
          success:function(response){

              //fill data to form
              $('#user_id').val(response.data.id);
              $('#mapel-edit').val(response.data.mata_pelajaran);
              $('#keterangan-edit').val(response.data.keterangan);

              //open modal
              $('#modal-edit').modal('show');
          }
      });
  });

  //action update post
  $('#update').click(function(e) {
      e.preventDefault();

      //define variable
      let user_id = $('#user_id').val();
      let mata_pelajaran   = $('#mapel-edit').val();
      let keterangan = $('#keterangan-edit').val();
      let token   = $("meta[name='csrf-token']").attr("content");
      
      //ajax
      $.ajax({

          url: `/mapelajax/${user_id}`,
          type: "PUT",
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
                  <tr>
                    <th id="index_${response.data.id}" scope="row">${response.data.id}</th>
                      <td>${response.data.mata_pelajaran}</td>
                      <td>${response.data.title}</td>
                      <td>${response.data.content}</td>
                      <td class="text-center">
                          <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                          <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                      </td>
                  </tr>
              `;
              
              //append to post data
              $(`#index_${response.data.id}`).replaceWith(post);

              //close modal
              $('#modal-edit').modal('hide');
              

          },
          error:function(error){
              
              if(error.responseJSON.mata_pelajaran[0]) {

                  //show alert
                  $('#alert-title-edit').removeClass('d-none');
                  $('#alert-title-edit').addClass('d-block');

                  //add message to alert
                  $('#alert-title-edit').html(error.responseJSON.mata_pelajaran[0]);
              } 

              if(error.responseJSON.keterangan[0]) {

                  //show alert
                  $('#alert-content-edit').removeClass('d-none');
                  $('#alert-content-edit').addClass('d-block');

                  //add message to alert
                  $('#alert-content-edit').html(error.responseJSON.keterangan[0]);
              } 

          }

      });

  });

</script>