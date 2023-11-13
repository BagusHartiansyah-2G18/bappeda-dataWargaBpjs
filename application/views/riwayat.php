<section class="wrapper" style="color:black;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Data Permohonan Riwayat
                    </div>
                    <div class="panel-body">                                  <?php echo $this->session->flashdata("k");?>
                    <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                    <th>No</th>
                  <th>No Register</th>
                  <th>Jenis Permohonan</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  
  	  	$no 	= 1;
  			foreach ($data as $b) {
  		?>
  		<tr>
        <td><?php echo $no ?></td>
        <td><?php echo $b->noreg;?></td>
        <td><?php echo $b->jenis;?></td>
        <td>
        <?php
                                    if ($b->status=='Proses Batal')
                                    {
                                        ?>
                                        <span class="badge badge-danger d-inline-block ml-2"><?php echo $b->status;?></span>
                                        <p><?php echo $b->batal_alasan;?></p>
                                        <?php
                                    }else
                                    {
                                        ?>
                                        <span class="badge badge-success d-inline-block ml-2"><?php echo $b->status;?></span>
                                        <?php
                                    }
                                    ?>

        </td>
        <td>
        <?php
                                    if ($b->jenis=='Permohonan Pindah Antar Kab/Kota/Provinsi' || $b->jenis=='Permohonan Pindah Datang Kab/Kota/Provinsi' )
                                    {
                                        $pin=$b->noreg;
                                        $cek	= $this->db->query("SELECT * FROM tb_out_surat WHERE noreg = '$pin'")->row_array();
                                        if (empty($cek))
                                        {

                                        }else
                                        {
                                            ?>
                                        <a target="_blank" href="<?php echo base_url() ?>/surat_pindah/<?php echo $cek['file'];?>"><span class="badge badge-info d-inline-block ml-2">Download Surat Pindah</span></a>
                                        <?php
                                        }
                                        
                                    }else
                                    {
                                        ?>
                                        
                                        <?php
                                    }
                                    ?>


        </td>
  		</tr>
  		<?php
  			$no++;
  			}
  		?>
                  
                  </tbody>
                </table>

                    </div>
                </div>
            </div>
        </div>
        
    </section>