function submitajax(url, data, msg, btn) {
    $.ajax({
        url: url,
        data: data,
        type: 'POST',
        success: function (response) {
            if (response.status) {
                Swal('Sukses', 'Data Berhasil dimasukan', 'success')
                    .then((result) => {
                        if (result.value) {
                            window.location.href = base_url+'server/permission';
                        }
                    });
            } else {
                if (response.errors) {
                    $.each(response.errors, function (key, val) {
                        $('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                        $('[name="' + key + '"]').nextAll('.help-block').eq(0).text(val);
                        if (val === '') {
                            $('[name="' + key + '"]').closest('.form-group').removeClass('has-error');
                            $('[name="' + key + '"]').nextAll('.help-block').eq(0).text('');
                        }
                    });
                }
                if (response.msg) {
                    Swal({
                        "title": "Gagal",
                        "text": "Terdapat Kesalahan",
                        "type": "error"
                    });
                }
                btn.removeAttr('disabled').text('Ganti Password');
            }
            
        }
    });
}

$(document).ready(function () {
    $('form input, form select').on('change', function () {
        $(this).closest('.form-group').removeClass('has-error');
        $(this).nextAll('.help-block').eq(0).text('');
    });

    $('form#user_info').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        let btn = $('#btn-info');
        btn.attr('disabled', 'disabled').text('Process...');

        url = $(this).attr('action');
        data = $(this).serialize();
        msg = "Informasi warga berhasil dimasukan";
        submitajax(url, data, msg, btn);
    });

  
});