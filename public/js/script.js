$('.mydatatable').DataTable({
            order: [
                [0, 'asc']
            ],
            pagingType: 'full_numbers'
        });

        const  flashData = $('.flash-data').data('flashdata');
        if (flashData) {
          Swal.fire({
            title: 'Data Manajement',
            text: 'Berhasil ' + flashData,
            icon: 'success',
            type: 'success'
          })
        } 
          $('.tombol-hapus').on('click', function(e){

          e.preventDefault();
          const href = $(this).attr('href');

          const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Yakin di Hapus?',
          text: "Data Akan Hilang Permanen",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Hapus',
          cancelButtonText: 'Batal',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
              document.location.href = href;
          } else if (
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'BATAL',
              'Data Anda Aman ',
              'error'
            )
          }
        })


        });

        $('.tombol-end').on('click', function(e){

          e.preventDefault();
          const href = $(this).attr('href');

          const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Projek Udah Selesai?',
          text: "Data Akan Masuk Di List Projek",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Selesai',
          cancelButtonText: 'Batal',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
              document.location.href = href;
          } else if (
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'BATAL DISELESAIKAN',
              'Data Anda Kembali ',
              'error'
            )
          }
        })


        }); 


        

