<style type="text/css">
    .form-signin {
        max-width: 450px;
        background-image: url("assets/templates/img/bglogin2.png");
        background-position: 100% 100%;
        background-size: cover;  
    }

    .form-signin input[type="text"], .form-signin input[type="password"] {
        background: #eaeaec00;
    }

    .login-wrap {
        padding-left: 54px;
        padding-right: 54px;
        position: relative;
    }
</style>
<div class="container">

    <form class="form-signin" method="post" action="<?php echo base_url(); ?>front/simpan_registrasi">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
        <div class="form-signin-heading text-center">
            <a href="">
            <h2 style="float: left; margin-left: 37px;"><span style="color: #58d868;">Registrasi</span><span style="color: #ff9a19"> Masyarakat</span></h2><br><br>
            </a>
        </div>
        <div class="login-wrap" style="padding-left: 20px;padding-right: 20px;"></div>
        <?php echo $this->session->flashdata("k");?>
             <div class="form-group">
                <div class="col-lg-12">
                    <input type="text" name="nik" value=""  class="form-control" placeholder="NIK" style="border-color: #6bc5a4;" />
                </div>
                <div class="col-lg-12">
                    <input type="text" name="nama" value=""  class="form-control" placeholder="Nama Lengkap" style="border-color: #6bc5a4;" />
                </div>

                <div class="col-lg-12">
                    <textarea type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap" style="border-color: #6bc5a4;margin-bottom:10px;" ></textarea>
                </div>
                <div class="col-lg-12">
                    <input type="text" name="telepon" value=""  class="form-control" placeholder="No. HP / Telepon" style="border-color: #6bc5a4;" />
                </div>
                <div class="col-lg-12">
                    <input type="text" name="email" value=""  class="form-control" placeholder="Email" style="border-color: #6bc5a4;" />
                </div>
                <div class="col-lg-12">
                    <input type="password" name="password" value=""  class="form-control" placeholder="Password" style="border-color: #6bc5a4" />
                </div>
                <div class="col-lg-12">
                    <input type="password" name="password1" value=""  class="form-control" placeholder="Konfirmasi Password" style="border-color: #6bc5a4" />
                </div>
            </div>
            
            <center><button class="btn btn-lg" type="submit" name="login_user" value="login_user" style="background-color: #ff6700;color: white;width: 50%;margin-bottom: 30px">
               Daftar
            </button></center>
            <div class="registration">
                <center style="color: #383131;margin-bottom: 10px">Sudah Punya Akun?</center>
                <a href="<?=base_url('front/login')?>" style="color: #ff6700">
                    Login Disini
                </a>
            </div>
        </div>
    </form>
</div>