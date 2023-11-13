<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function tanggal_mysql($tanggal) {
    return date('Y-m-d', strtotime($tanggal));
    }

    function getNIKPribadi($id){
        $CI =& get_instance();
        $hasil=$CI->db->query("select * from t_pribadi where nik='$id'")->row_array();
        return $hasil;
    }

    function getJumlahKKAwal($id){
        $CI =& get_instance();
        $hasil=$CI->db->query("select * from t_keluarga where kategori='Kepala' and status_data='0' and id_kelurahan='$id'")->num_rows();
        $hasilx=$CI->db->query("select * from t_pribadi where status_data='0' and id_kecamatan='$id'")->num_rows();
        return [
            "kk"=>$hasil,
            "anggota"=>$hasilx
        ];
    }
    function getJumlahKKAkhir($kecamatan){
        $dtot=array();
        foreach ($kecamatan as $key => $v) {
            $CI =& get_instance();
            $hasil=$CI->db->query("select * from t_keluarga where status_data='1' and id_kecamatan='".$v['id_kecamatan']."' group by no_kk")->num_rows();
            $hasilx=$CI->db->query("select * from t_pribadi where status_data='1' and id_kecamatan='".$v['id_kecamatan']."'")->num_rows();
            $dtot[$v['id_kecamatan']]=[
                "kk"=>$hasil,
                "anggota"=>$hasilx,
                "desa"=>[]
            ];

            $desa=$CI->db->query("select * from m_desa where id_kecamatan='".$v['id_kecamatan']."'")->result_array();
            foreach ($desa as $key1 => $v1) {
                $dtot[$v['id_kecamatan']]["desa"][$v1['id_desa']]=getJumlahKKAkhirDesa($v['id_kecamatan'],$v1['id_desa']);
            }
        }
        return $dtot;
    }
    function getJumlahKKAkhirDesa($kecamatan,$kdDesa){
        $CI =& get_instance();
        $hasil=$CI->db->query("select * from t_keluarga where status_data='1' and id_kelurahan='".$kdDesa."' and id_kecamatan='".$kecamatan."'  group by no_kk")->num_rows();
        $hasilx=$CI->db->query("select * from t_pribadi where status_data='1' and id_desa='".$kdDesa."' and id_kecamatan='".$kecamatan."' ")->num_rows();
        $dtot=[
            "kk"=>$hasil,
            "anggota"=>$hasilx
        ];
        return $dtot;
    }

    function getKkAnggota($id){
        $CI =& get_instance();
        $hasil=$CI->db->query("select * from t_keluarga where kategori='Kepala' and id_kelurahan='$id'")->num_rows();
        return $hasil;
    }

    function getJumlahBpjs($id)
          {
          $CI =& get_instance();
          $hasil=$CI->db->query("select * from t_keluarga inner join t_bpjs on t_keluarga.key_nik=t_bpjs.key_nik where t_keluarga.id_kelurahan='$id'")->num_rows();
          return $hasil;
          }

    function getDataAwal($id)
          {
          $CI =& get_instance();
          $hasil=$CI->db->query("select * from t_pribadi where status_data='0' and id_kecamatan='$id'")->num_rows();
          return $hasil;
          }
    function getDataValid($id)
          {
          $CI =& get_instance();
          $hasil=$CI->db->query("select * from t_pribadi where status_data<>'0' and id_kecamatan='$id'")->num_rows();
          return $hasil;
          }

    function getLegendValidasi($id)
        {
          $CI =& get_instance();
          $semua=$CI->db->query("select * from t_pribadi where id_kecamatan='$id'")->num_rows();
          $valid=$CI->db->query("select * from t_pribadi where status_data<>'0' and id_kecamatan='$id'")->num_rows();

          
          $prosen=($semua!=0)?($valid/$semua) * 100:0;
          if (($prosen>0) and ($prosen<=30))
          {
              $nilai=1;
          }else if (($prosen>31) and ($prosen<=60))
          {
            $nilai=2;
          }else if (($prosen>61) and ($prosen<=100))
          {
            $nilai=3;
          }else
          {
            $nilai=1;
          }
          return $nilai;
        }

    function getPekerjaan($id)
          {
          $CI =& get_instance();
          $hasil=$CI->db->query("select nama_jenis from m_jenis_peserta where id='$id'")->row_array();
          return $hasil['nama_jenis'];
          }

    function getNoKK($id){
        $CI =& get_instance();
        $hasil=$CI->db->query("select * from t_keluarga where key_nik='".$id."'")->row_array();
        $pot=$hasil['no_kk'];
        return $pot;
    }

    function getKelurahan($id){
        $CI =& get_instance();
        $hasil=$CI->db->query("select * from m_desa where id_desa='".$id."'")->row_array();
        $pot=$hasil['nama_desa'];
        return $pot;
    }

    function getKecamatan($id){
        $CI =& get_instance();
        $hasil=$CI->db->query("select * from m_kecamatan where id_kecamatan='".$id."'")->row_array();
        $pot=$hasil['nama_kecamatan'];
        return $pot;
    }

    function getMaxVerifikasi($id){
        $CI =& get_instance();
        $hasil=$CI->db->query("select max(created_at) as waktu from t_pribadi where id_user='".$id."'")->row_array();
        $pot=$hasil['waktu'];
        return $pot;
    }

    function getKepala($id){
        $CI =& get_instance();
        $hasil=$CI->db->query("select * from t_keluarga where nik_kepala='".$id."'")->row_array();
        return $hasil;
    }

    function getKepala1($id){
        $CI =& get_instance();
        $hasil=$CI->db->query("select * from t_keluarga where nik_kepala='".$id."'")->row_array();
        return $hasil['nama_kepala'];
    }

    function getno_kk($id){
        $CI =& get_instance();
        $hasil=$CI->db->query("select * from t_keluarga where nik_kepala='".$id."'")->row_array();
        return $hasil['no_kk'];
    }

    if ( ! function_exists('generatehtml'))
    {
	    function rp($x){
            if(is_int($x)==FALSE)
            {
                return '';
            }
            else
            {
                return number_format((int)$x,0,",",".");
            }
        }
        function jml_minggu($tgl_awal, $tgl_akhir){
            $detik = 24 * 3600;
            $tgl_awal = strtotime($tgl_awal);
            $tgl_akhir = strtotime($tgl_akhir);

            $minggu = 0;
            for ($i=$tgl_awal; $i < $tgl_akhir; $i += $detik)
            {
                if (date("w", $i) == "0"){
                    $minggu++;
                }
            }
            return $minggu+1;
        }

       function waktu(){
           date_default_timezone_set('Asia/Jakarta');
           return date("Y-m-d H:i:s");
       }

       function tgl_indo($tgl){
            return substr($tgl, 8, 2).' '.getbln(substr($tgl, 5,2)).' '.substr($tgl, 0, 4);
       }

        function tgl_indojam($tgl,$pemisah){
            return substr($tgl, 8, 2).' '.getbln(substr($tgl, 5,2)).' '.substr($tgl, 0, 4).' '.$pemisah.' '.  substr($tgl, 11,8);
        }


        function getbln($bln){
            switch ($bln)
            {

                case 1:
                    return "Januari";
                break;

                case 2:
                    return "Februari";
                break;

                case 3:
                    return "Maret";
                break;

                case 4:
                    return "April";
                break;

                case 5:
                    return "Mei";
                break;

                case 6:
                    return "Juni";
                break;

                case 7:
                    return "Juli";
                break;

                case 8:
                    return "Agustus";
                break;

                case 9:
                    return "September";
                break;

                case 10:
                    return "Oktober";
                break;

                case 11:
                    return "November";
                break;

                case 12:
                    return "Desember";
                break;
            }

        }

        function selisihTGl($tgl1,$tgl2){
            $pecah1 = explode("-", $tgl1);
            $date1 = $pecah1[2];
            $month1 = $pecah1[1];
            $year1 = $pecah1[0];

            // memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
            // dari tanggal kedua

            $pecah2 = explode("-", $tgl2);
            $date2 = $pecah2[2];
            $month2 = $pecah2[1];
            $year2 =  $pecah2[0];

            // menghitung JDN dari masing-masing tanggal

            $jd1 = GregorianToJD($month1, $date1, $year1);
            $jd2 = GregorianToJD($month2, $date2, $year2);

            // hitung selisih hari kedua tanggal

            $selisih = $jd2 - $jd1;
            return $selisih;
        }

        function seoString($s){
            $c = array (' ');
            $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

            $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d

            $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
            return $s;
        }


        function breacumb($link){
            $CI =& get_instance();
            $main=$CI->db->get_where('mainmenu',array('link'=>$link));
            if($main->num_rows()>0)
            {
                $main=$main->row_array();
                return $main['nama_mainmenu'];
            }
            else
            {
                $sub=$CI->db->get_where('submenu',array('link'=>$link));
                if($sub->num_rows()>0)
                {
                    $sub=$sub->row_array();
                    return $sub['nama_submenu'];
                }
                else
                {
                    return 'tidak diketahui';
                }
            }
        }

        function jmlPaging(){
            return 10;
        }

        function getusersLogin($idusers,$field){
            $CI =& get_instance();
            $row=$CI->db->get_where('app_users',array('id_users'=>$idusers));
            if($row->num_rows()>0)
            {
                $row=$row->row_array();
                return $row[$field];
            }
            else
            {
                return '';
            }
        }

        function ubahtanggal($tanggal){
            return $newtanggal= substr($tanggal,8,2).'-'.substr($tanggal, 5,2).'-'.substr($tanggal, 0,4);
        }

        function ubahtanggal2($tanggal){
            return $newtanggal=substr($tanggal,8,2 ).'/'.  substr($tanggal, 5,2).'/'.  substr($tanggal, 0,4);
        }

        function getpengguna($id){
            $CI =& get_instance();
            $hasil=$CI->db->query("select * from tb_user where id='$id' ")->row_array();
            $nama=$hasil['nama'];
            return $nama;
        }
        function getnik($id){
            $CI =& get_instance();
            $hasil=$CI->db->query("select nik from tb_user where id='$id' ")->row_array();
            $nama=$hasil['nik'];
            return $nama;
        }
        function activity_log($tipe, $aksi, $item, $assign_to, $assign_type){
            $CI =& get_instance();
        
            $param['log_user'] = $CI->session->userdata('admin_username');
            $param['log_tipe'] = $tipe; //asset, asesoris, komponen, inventori
            $param['log_aksi'] = $aksi; //membuat, menambah, menghapus, mengubah,
            $param['log_item'] = $item; //nama item
            $param['log_assign_to']= $assign_to; //target
            $param['log_assign_type']= $assign_type; //target
            $param['log_time']= date('Y-m-d H:i:s'); //target
        
            //load model log
            $CI->load->model('m_log');
        
            //save to database
            // $CI->m_log->save_log($param);
        
        }
    }
