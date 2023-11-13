$(document).ready(function(){
    $('form#login input').on('change', function(){
        $(this).parent().removeClass('has-error');  
        $(this).next().next().text('');
    });

    $('form#login').on('submit', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();

        var infobox = $('#infoMessage');
        infobox.addClass('callout callout-info').text('Checking...');

        var btnsubmit = $('#submit');
        btnsubmit.attr('disabled', 'disabled').val('Wait...');

        $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: $(this).serialize(),
        success: function(data){
            infobox.removeAttr('class').text('');
            btnsubmit.removeAttr('disabled').val('Login');
            if(data.status){
                infobox.addClass('callout callout-success text-center').text('Login Sukses');
                var go = base_url + data.url;
                window.location.href = go;
            }else{
                        infobox.addClass('callout callout-danger text-center').text('Terdapat Kesalahan');
                        
                }
            }
        });
    });
});