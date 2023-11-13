/*------------------------------------------------------------------
####################################################################
##||=========================COPYRIGHT==========================||##
##||    			                                            ||##
##||  			Author	 : Bram Fatdeli S.Kom                   ||##
##||    		Contact  : bramfatdeli@gmail.com            	||##
##||    		Website  : www.bramfatdeli.com              	||##
##||    		Address  : Batam, Kepualauan Riau           	||##
##||    			                                            ||##
##||=========================COPYRIGHT==========================||##
####################################################################
-------------------------------------------------------------------*/


$('.hanyaangka').keypress(function (e) {
    var keyCode = (e.which) ? e.which : event.keyCode
    return !(keyCode > 31 && (keyCode < 48 || keyCode > 57));
});

$('.hapusspasi').keypress(function (e) {
    if (e.which === 32)
        return false;
});

$('.showpass').click(function () {
    var int = $(this).data('int');
    var html = '<i class="fa fa-eye"></i>';
    var text = 'password';
    if ($(this).html() == html) {
        html = '<i class="fa fa-eye-slash"></i>';
        text = 'text';
    }
    $('#pass' + int).attr('type', text);
    $(this).html(html);
});

$(".edit-data").click(function () {
    swal({
        title: "Apakah anda yakin mengubah data ini?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: false,
    })
    .then((willEdit) => {
        if (willEdit) {
            window.location = $(this).data('url');
        }
    });
});

$(".hapus-data").click(function () {
    swal({
        title: "Apakah anda yakin menghapus data ini?",
        text: "",
        icon: "error",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location = $(this).data('url');
            }
        });
});


$(".swal-data").click(function () {
    swal({
        title: $(this).data('title'),
        text: "",
        icon: $(this).data('icon'),
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.location = $(this).data('url');
        }
    });
});

$(".swal-data-input").click(function () {
    swal({
        title: $(this).data('title'),
        text: "",
        icon: $(this).data('icon'),
        buttons: true,
        dangerMode: true,
    })
    .then((comfirm) => {
        if (comfirm) {
            $('#pelayananid').val($(this).data('pelayananid'));            
            $('#pelayananno').text($(this).data('pelayananno'));            
            $('#batalpermohonan').modal('show');
            // swal("masuk: " `${comfirm}`);
            // window.location = $(this).data('url');
        }
    });
});

