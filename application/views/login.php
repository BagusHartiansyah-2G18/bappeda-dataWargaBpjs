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

    <form class="form-signin" method="POST" action="<?php echo base_URL(); ?>front/do_login">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
        <div class="form-signin-heading text-center">
            <a href="">
            <h2 style="float: left; margin-left: 37px;"><span style="color: #58d868;">Login</span><span style="color: #ff9a19"> Masyarakat</span></h2><br><br>
            </a>
        </div>
        <div class="login-wrap" style="padding-left: 20px;padding-right: 20px;">
        <?php echo $this->session->flashdata("k");?>
             <div class="form-group">
                <div class="col-lg-12">
                    <input type="text" name="email" class="form-control" placeholder="Email" style="border-color: #6bc5a4;" />
                                    </div>
                <div class="col-lg-12">
                    <input type="password" name="password" class="form-control" placeholder="Password" style="border-color: #6bc5a4" />
                                    </div>
            </div>
            
            <center style="margin-bottom: 10px"><a data-toggle="modal" href="#myModal" style="color: grey">Lupa Kata Sandi?</a><br></center>
            <center><button class="btn btn-lg" type="submit" name="login_user" value="login_user" style="background-color: #ff6700;color: white;width: 50%;margin-bottom: 30px">
               Masuk
            </button></center>
            <div class="registration">
                <center style="color: #383131;margin-bottom: 10px">Belum Punya Akun?</center>
                <a href="<?=base_url('front/registrasi')?>" style="color: #ff6700">
                    Daftar Disini
                </a>
            </div>
        </div>
    </form>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #1d8880;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Lupa Kata Sandi ?</h4>
            </div>
            <form action="https://apok.batam.go.id/login/send_reset_password" method="POST">
                <div class="modal-body">
                    <p>Masukkan alamat e-mail Anda di bawah ini untuk mereset kata sandi.</p>
                    <input type="text" name="useremail" placeholder="Email" class="form-control" style="border-color: #6bc5a4;height: 40px;" required>
                </div><br><br>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-lg" type="button" style="background-color: #c50000;color: white;">Batal</button>
                    <button class="btn btn-lg" type="submit" style="background-color: #ff6700;color: white;">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>