<!--phone-->
<div class="wrapper shidden">
    <div class="row" style="max-height: 150px;margin-top:-50px;">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="containers ones">
                <div class="bk l">
                    <div class="arrows tops"></div> 
                    <div class="arrows bottoms"></div>
                </div>
                <div class="skew l"></div>
                <div class="mains" >
                    <div><p class="text-center" style="font-weight: 600;font-family: 'Open Sans', sans-serif;font-size:18px;margin: 11px 0 10px;color:black">PILIH JENIS PELAYANAN</p></div>   
                </div>
                <div class="skew r"></div>
                <div class="bk r">
                    <div class="arrows tops"></div> 
                    <div class="arrows bottoms"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <style type="text/css">
            .panel-body {
                padding: 14px;
                padding-top: 190px;
            }
            img:hover {
              background-color: #34b3b3;
            }
            .carousel-inner h3 {
                color:#525252;
                font-weight: 600;
                font-size: 20px;
                margin: 5px;
            }
            .popover .fade .top .in{
                z-index: 999;
            }
        </style>
                
                <?php foreach ($pelayanan as $data)
                {
                    ?>
                    <center><div class="col-md-3" style="padding-bottom: 50px">
            <section class="panel" style="height: 332px;width: 240px;border-radius: 22px;background-image: url('<?=base_url()?>icon/<?=$data['icon']?>');background-repeat: no-repeat;background-size: auto;background-position: center;background-size: cover;box-shadow: 12px 15px 15px #3cafa691;">
                <div class="carousel slide auto panel-body" id="c-slide0" style="min-height: 332px;max-height: 332px">
                    <div class="carousel-inner">
                        <div class="item text-center active">
                            <a href="<?=base_url($data['url'])?>"><h3 style="font-size: 18px;margin:10px;"><?php echo $data['nama_pelayanan']?> </h3></a>
                            <p></p>
                            <small class="text-muted popovers" data-trigger="hover" data-placement="bottom" data-content="<?php echo $data['deskripsi']?>" data-original-title="Keterangan"><?php echo substr($data['deskripsi'],0,100)?></small>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center" style="margin-top: -10px;background-color: rgba(245, 245, 245, 0);border-top: 0px solid #ddd;">
                    <a href="<?=base_url($data['url'])?>" class="btn tooltips" data-original-title="Daftar" data-toggle="tooltip" data-placement="top"><img src="<?=base_url()?>assets/templates/images/custom/icon_daftar.png" width="30px" height="30px"><br><span style="font-size: 10px;color:white;">Daftar</span></a>
                    <a href="#" class="btn tooltips flip-modal" data-content='<?php echo $data['nama_pelayanan']?>' data-original-title="Persyaratan" data-toggle="tooltip" data-title="Persyaratan <?php echo $data['nama_pelayanan']?>" data-placement="top"><img src="<?=base_url()?>assets/templates/images/custom/icon_persyaratan.png" width="30px" height="30px"><br><span style="font-size: 10px;color:white;">Persyaratan</span></a>
                    <a href="#" class="btn tooltips" data-original-title="Biaya Rp0" data-toggle="tooltip" data-placement="top"><img src="<?=base_url()?>assets/templates/images/custom/icon_biaya.png" width="30px" height="30px"><br><span style="font-size: 10px;color:white;">Biaya</span></a>
                </div>
            </section>
        </div></center>
                    <?php
                }
                ?>
                
                
                
                
                
                
                
            </div>
</div>

<!--desktop-->
<div class="wrapper xshidden">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="containers ones">
                <div class="bk l">
                    <div class="arrows tops"></div> 
                    <div class="arrows bottoms"></div>
                </div>
                <div class="skew l"></div>
                <div class="mains" >
                    <div><p class="text-center" style="font-weight: 600;font-family: 'Open Sans', sans-serif;font-size:18px;margin: 11px 0 10px;color:black">PILIH JENIS PELAYANAN</p></div>   
                </div>
                <div class="skew r"></div>
                <div class="bk r">
                    <div class="arrows tops"></div> 
                    <div class="arrows bottoms"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
    <?php foreach ($pelayanan as $data)
                {
                    ?>
                    <div class="col-md-3 col-sm-4" style="padding-bottom: 50px;">
            <section class="panel" style="margin-top: 30px;height: 332px;width: 240px;border-radius: 22px;background-image: url('<?=base_url()?>icon/<?=$data['icon']?>');background-repeat: no-repeat;background-size: auto;background-position: center;background-size: cover;box-shadow: 12px 15px 15px #3cafa691;">
                <div class="carousel slide auto panel-body" id="d-slide0" style="min-height: 332px;">
                    <div class="carousel-inner">
                        <div class="item text-center active">
                            <a href="<?=base_url($data['url'])?>"><h3 style="font-size: 18px;margin:10px;"><?php echo $data['nama_pelayanan']?></h3></a>
                            <p></p>
                            <small class="text-muted popovers" data-trigger="hover" data-placement="bottom" data-content="<?php $data['deskripsi']?>" data-original-title="Keterangan"><?php echo substr($data['deskripsi'],0,100)?></small>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center" style="margin-top: -5px;background-color: rgba(245, 245, 245, 0);border-top: 0px solid #ddd;">
                    <a href="<?=base_url($data['url'])?>" class="btn tooltips" data-original-title="Daftar" data-toggle="tooltip" data-placement="top"><img src="<?=base_url()?>assets/templates/images/custom/icon_daftar.png" width="30px" height="30px">
                    <br><span style="font-size: 10px;color:white;">Daftar</span></a>
                    <a href="#" class="btn tooltips flip-modal" data-content='<?php echo $data['persyaratan']?>' data-original-title="Persyaratan" data-toggle="tooltip" data-title="Persyaratan <?php echo $data['nama_pelayanan']?>" data-placement="top"><img src="<?=base_url()?>assets/templates/images/custom/icon_persyaratan.png" width="30px" height="30px"><br><span style="font-size: 10px;color:white;">Persyaratan</span></a>
                    <a href="#" class="btn tooltips" data-original-title="Biaya Rp0" data-toggle="tooltip" data-placement="top"><img src="<?=base_url()?>assets/templates/images/custom/icon_biaya.png" width="30px" height="30px"><br><span style="font-size: 10px;color:white;">Biaya</span></a>
                </div>
            </section>
        </div>
                    <?php
                }
                ?>
              
              
              
                     
                  
             
              
               
                    </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="details_persyaratan" class="modal fade">
    <div class="modal-dialog modal-ku">
        <div class="modal-content">
            <div class="modal-header" style="background: #1d8880;">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button" style="font-size:26px;">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body" style="font-size:16px;padding:40px;"></div>
            
        </div>
    </div>
</div>