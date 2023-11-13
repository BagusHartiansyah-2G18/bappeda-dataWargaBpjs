function submitajax(url, data, msg, btn) {
    $.ajax({
        url: url,
        data: data,
        type: 'POST',
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: function (response) {
            if (response.status) {
                Swal('Sukses', 'Data Samsat Berhasil dimasukan', 'success')
                    .then((result) => {
                        if (result.value) {
                            window.location.href = base_url+'admin/samsat';
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
        var btn = $('#btn-info');

        btn.attr('disabled', 'disabled').text('Tunggu');

        url = $(this).attr('action');
        data = new FormData(this);
        msg = "Data Samsat berhasil dimasukan";
        submitajax(url, data, msg, btn);
    });

  
});