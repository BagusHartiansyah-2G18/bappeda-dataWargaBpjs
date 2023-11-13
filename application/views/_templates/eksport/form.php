<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-1.2.3.js"></script>
<script type="text/javascript">
$(document).ready(function() {

  $('#myForm').submit(function() {
    $.ajax({
      type: 'POST',
      url: $(this).attr('action'),
      data: $(this).serialize(),
      beforeSend: function(){
        // Show image container
        $("#loader").show();
       },
      success: function(data) {
        $('#muncul').html(data);
      },
      complete:function(data){
        // Hide image container
        $("#loader").hide();
       }
    })
    return false;
  });
})
</script>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1><?php echo $judul;?></h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $subjudul;?></li>
            </ol>
        </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Aplikasi Data Warga</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?=base_url('server/eksport/lihat');?>" class="form-horizontal row-form" id="myForm">
                            <table cellspacing="5" cellpadding="5" border="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="kecamatan" id="kecamatan" class="form-control select2" style="width: 100%!important">
                                                <option value="">Pilih Kecamatan </option>
                                                <?php foreach ($kecamatan as $row) : ?>
                                                <option value="<?=$row->id_kecamatan?>"><?=$row->nama_kecamatan?></option>   
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <select name="kelurahan" id="kelurahan" class="form-control select2" style="width: 100%!important">
                                                <option value="">Pilih Desa/Kelurahan </option>
                                            </select>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td><button class="btn btn-success" type="submit"><i class="fa fa-download"></i> LIHAT</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <hr>
                       
                    </div>

                    <div class="card-body">
                        <div id="muncul"></div>
                        <center>
                        <div id='loader' style='display: none;'>
                          <img src='<?php echo base_url(); ?>assets/reload.gif' width='32px' height='32px'>
                        </div>
                        </center>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function(){
    $('#kecamatan').change(function(){
        var kecamatan_id = $('#kecamatan').val();
        if(kecamatan_id != '')
        {
            $.ajax({
                url:"<?php echo base_url(); ?>server/eksport/fetch_state",
                method:"POST",
                data:{kecamatan_id:kecamatan_id},
                success:function(data)
                {
                    $('#kelurahan').html(data);
                }
            });
        }
        else
        {
            $('#kelurahan').html('<option value="">Pilih Desa/Kelurahan</option>');
        }
    });
});
</script>