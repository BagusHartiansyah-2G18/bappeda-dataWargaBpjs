<!DOCTYPE html>
<html>

<head>
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" /> -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="<?=base_url()?>assets/maps/style.css" />
</head>

<body>
  <div class="container-fluid">
    <table class="datatable table table-hover table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Lengkap</th>
          <th>RT</th>
          <th>RW</th>
          <th>Jumlah Anggota KK</th>
          <th>BPJS</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th></th>
          <th>
            <input type="text" class="form-control input-sm filter-column">
          </th>
          <th>
            <input type="text" class="form-control input-sm filter-column" />
          </th>
          <th>
          <input type="text" class="form-control input-sm filter-column" />
          </th>
          <th>
            <input type="text" class="form-control input-sm filter-column" />
          </th>
          <th>
            <input type="text" class="form-control input-sm filter-column" />
          </th>
        </tr>
      </tfoot>
      <tbody>
        <?php
  		if (empty($pribadi)) {
  			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
  		} else {
  			$no 	= 1;
  			foreach ($pribadi as $k) {
  		?>
  		<tr>
        <td><?php echo $no ?></td>
        <td><?php echo $k['nama_lengkap'] ?></td>
        <td><?php echo $k['rt'] ?></td>
        <td><?php echo $k['rw'] ?></td>
        <td ><?php $digits = 1;$bpjs=rand(pow(10, $digits-1), pow(10, $digits)-1);echo $bpjs?></td>
        <td><?php $digits = 1;$bpjs=rand(pow(10, $digits-1), pow(10, $digits)-1);echo $bpjs?></td>
        
  		</tr>
  		<?php
  			$no++;
  			}
  		}
  		?>
      </tbody>
    </table>
  </div>
  
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <!-- Responsive extension -->
  <script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>
  <!-- Buttons extension -->
  <script src="//cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
  
  <script src="<?=base_url()?>assets/maps/script.js"></script>
</body>

</html>