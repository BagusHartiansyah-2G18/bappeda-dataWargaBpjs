<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model {
   
    function save_pribadi($person) {

        $this->db->insert('t_pribadi', $person);
        return $this->db->insert_id();
    }

    function save_bpjs($person) {

        $this->db->insert('t_bpjs', $person);
        return $this->db->insert_id();
    }

    function save_keluarga($person) {

        $this->db->insert('t_keluarga', $person);
        return $this->db->insert_id();
    }

    function update_pribadi($id, $person) {

        $this->db->where('nik', $id);
        $this->db->update('t_pribadi', $person);
    }

    function update_bpjs($id, $person) {

        $this->db->where('key_nik', $id);
        $this->db->update('t_bpjs', $person);
    }

    function update_keluarga($id, $person) {

        $this->db->where('key_nik', $id);
        $this->db->update('t_keluarga', $person);
    }

    public function create($table, $data, $batch = false)
    {
        if($batch === false){
            $insert = $this->db->insert($table, $data);
        }else{
            $insert = $this->db->insert_batch($table, $data);
        }
        return $insert;
    }

    public function update($table, $data, $pk, $id = null, $batch = false)
    {
        if($batch === false){
            $insert = $this->db->update($table, $data, array($pk => $id));
        }else{
            $insert = $this->db->update_batch($table, $data, $pk);
        }
        return $insert;
    }

    public function delete($table, $data, $pk)
    {
        $this->db->where_in($pk, $data);
        return $this->db->delete($table);
    }

    public function total($table)
    {
        $query = $this->db->get($table)->num_rows();
        return $query;
    }

    public function getPengguna()
    {

        $this->datatables->select('a.id,a.username,a.nama_lengkap,a.email,a.status,a.level,b.nama_level');
        $this->datatables->from('m_admin a');
        $this->datatables->join('m_level b', 'a.level=b.id_level');
        return $this->datatables->generate();
    }

    //LEVEL
    public function getLevel()
    {

        $this->datatables->select('a.id_level,a.nama_level,a.status_level,a.created');
        $this->datatables->from('m_level a');
        return $this->datatables->generate();
    }

    public function getLevelById($id)
    {
        $query = $this->db->get_where('m_level', array('id_level'=>$id));
        return $query->row();
    }

    public function getLevelAdd()
    {
        $query = $this->db->query("SELECT * from m_level")->result();
        return $query;
    }

    //PEKERJAAN
    public function getPekerjaanAll()
    {

        $this->datatables->select('a.id,a.nama_jenis,a.created_at');
        $this->datatables->from('m_jenis_peserta a');
        return $this->datatables->generate();
    }

    public function getPekerjaanById($id)
    {
        $query = $this->db->get_where('m_jenis_peserta', array('id'=>$id));
        return $query->row();
    }

    public function getPekerjaanAdd()
    {
        $query = $this->db->query("SELECT * from m_jenis_peserta")->result();
        return $query;
    }

    //DESA
    public function getDesa()
    {

        $this->datatables->select('a.id_desa,a.nama_desa,a.created_at,b.id_kecamatan,b.nama_kecamatan');
        $this->datatables->from('m_desa a');
        $this->datatables->join('m_kecamatan b', 'a.id_kecamatan = b.id_kecamatan', 'left');
        return $this->datatables->generate();
    }

    public function getDesaById($id)
    {
        $this->db->select('a.id_desa,a.nama_desa,a.created_at,b.id_kecamatan,b.nama_kecamatan');
        $this->db->join('m_kecamatan b', 'a.id_kecamatan = b.id_kecamatan', 'left');

        $this->db->where('a.id_desa', $id);
        return $this->db->get('m_desa a');
    }

    public function getDesaAdd()
    {
        $query = $this->db->query("SELECT * from m_desa")->result();
        return $query;
    }

    //KECAMATAN
    public function getKecamatanAll()
    {

        $this->datatables->select('a.id_kecamatan,a.nama_kecamatan,a.keterangan,a.created_at');
        $this->datatables->from('m_kecamatan a');
        return $this->datatables->generate();
    }

    public function getKecamatanById($id)
    {
        $this->db->select('a.id_kecamatan,a.nama_kecamatan,a.keterangan,a.created_at');

        $this->db->where('a.id_kecamatan', $id);
        return $this->db->get('m_kecamatan a');
    }

    public function getKecamatanAdd()
    {
        $query = $this->db->query("SELECT * from m_kecamatan")->result();
        return $query;
    }

    //Status
    public function getStatus()
    {

        $this->datatables->select('a.id_status,a.nama_status,a.status_status,a.created');
        $this->datatables->from('m_status a');
        return $this->datatables->generate();
    }

    public function getStatusById($id)
    {
        $query = $this->db->get_where('m_status', array('id_status'=>$id));
        return $query->row();
    }

    public function getStatusAdd()
    {
        $query = $this->db->query("SELECT * from m_status")->result();
        return $query;
    }

    // ADMIN

    public function getAdminById($id)
    {

        $this->db->select('a.id as iduser,username,a.nama_lengkap,a.email,a.status,a.level,b.id_desa,b.nama_desa,c.id_kecamatan,c.nama_kecamatan,d.id_level,d.nama_level');
        $this->db->join('m_desa b', 'a.id_kelurahan = b.id_desa');
        $this->db->join('m_kecamatan c', 'a.id_kecamatan = c.id_kecamatan');
        $this->db->join('m_level d', 'a.level = d.id_level');

        $this->db->where('a.id', $id);
        return $this->db->get('m_admin a');
    }

    public function getAdminPusatById($id)
    {

        $this->db->select('a.id as iduser,username,a.nama_lengkap,a.email,a.status,a.level,b.id_level,b.nama_level');
        $this->db->join('m_level b', 'a.level = b.id_level');

        $this->db->where('a.id', $id);
        return $this->db->get('m_admin a');
    }

    public function getWargaKK($id)
    {

        /* $this->datatables->select('a.id,a.nik,a.nama_lengkap,a.jenis_kelamin,a.verifikasi');
        $this->datatables->from('t_pribadi a');
        $this->datatables->add_column('no_kk','$1','getNoKK(nik)');
        $this->datatables->where_in('id_user',$id); */

        $this->datatables->select('a.id_keluarga,a.nik_kepala,a.no_kk,a.nama_kepala,b.alamat,b.rt,b.rw');
        $this->datatables->from('t_keluarga a');
        $this->datatables->join('t_pribadi b', 'a.nik_kepala = b.nik');
        $this->datatables->where_in('a.id_user',$id);
        $this->datatables->where_in('a.kategori','kepala');
        $this->datatables->where_in('b.status_data','0');
        return $this->datatables->generate();
    }

    public function getPribadi($id)
    {

        $this->datatables->select('a.id,a.nik,a.nama_lengkap,a.jenis_kelamin,a.verifikasi');
        $this->datatables->from('t_pribadi a');
        $this->datatables->join('t_keluarga b', 'a.no_kk = b.no_kk','right');
        $this->datatables->where('b.key_nik',$id);
        $this->db->group_by('a.nik');
        return $this->datatables->generate();
        
    }

    public function getWargaAdminKK()
    {

        /* $this->datatables->select('a.id,a.nik,a.nama_lengkap,a.jenis_kelamin,a.verifikasi');
        $this->datatables->from('t_pribadi a');
        $this->datatables->add_column('no_kk','$1','getNoKK(nik)');
        $this->datatables->where_in('id_user',$id); */

        $this->datatables->select('a.id_keluarga,a.nik_kepala,a.no_kk,a.nama_kepala,b.alamat,b.rt,b.rw');
        $this->datatables->from('t_keluarga a');
        $this->datatables->join('t_pribadi b', 'a.nik_kepala = b.nik');
        $this->datatables->where_in('a.kategori','kepala');
        $this->datatables->where_in('b.status_data','0');
        return $this->datatables->generate();
    }

    public function getPribadiAdmin()
    {

        $this->datatables->select('a.id,a.nik,a.nama_lengkap,a.jenis_kelamin,a.verifikasi');
        $this->datatables->from('t_pribadi a');
        $this->datatables->join('t_keluarga b', 'a.no_kk = b.no_kk');
        $this->datatables->where('b.key_nik',$id);
        $this->datatables->where('a.status_data','0');
        return $this->datatables->generate();
        
    }

    //LAPORAN
    public function getWargaAdminLaporanKK()
    {

        /* $this->datatables->select('a.id,a.nik,a.nama_lengkap,a.jenis_kelamin,a.verifikasi');
        $this->datatables->from('t_pribadi a');
        $this->datatables->add_column('no_kk','$1','getNoKK(nik)');
        $this->datatables->where_in('id_user',$id); */

        $this->datatables->select('a.id_user,c.nama_lengkap,b.nama_desa,IFNULL(c.jmldata,0) AS jmlverif, b.jmltarget, IFNULL((c.jmldata/b.jmltarget) * 100,0) AS jmlpersen');
        $this->datatables->from('t_pribadi AS a 
LEFT JOIN 
( 
SELECT a.id_user,c.nama_lengkap, b.nama_desa,COUNT(a.id) AS jmltarget FROM t_pribadi a, m_desa b, m_admin c WHERE a.id_desa = b.id_desa AND a.id_user = c.id AND a.status_data = "0" 
GROUP BY a.id_user 
) b ON a.id_user = b.id_user LEFT JOIN
(
SELECT a.id_user,c.nama_lengkap, b.nama_desa,COUNT(a.id) AS jmldata FROM t_pribadi a, m_desa b, m_admin c WHERE a.id_desa = b.id_desa 
AND a.id_user = c.id AND a.verifikasi = "Sudah Verifikasi" GROUP BY a.id_user
) c ON a.id_user = c.id_user GROUP BY a.id_user');
        return $this->datatables->generate(); 
    }

    public function getWargaAdminLaporanKecamatanKK()
    {

        /* $this->datatables->select('a.id,a.nik,a.nama_lengkap,a.jenis_kelamin,a.verifikasi');
        $this->datatables->from('t_pribadi a');
        $this->datatables->add_column('no_kk','$1','getNoKK(nik)');
        $this->datatables->where_in('id_user',$id); */

        $this->datatables->select('`a`.`id_kecamatan`, `b`.`nama_kecamatan`, IFNULL(c.jmldata,0) AS jmlverif, `b`.`jmltarget`, IFNULL((c.jmldata/b.jmltarget) * 100,0) AS jmlpersen');
        $this->datatables->from('t_pribadi as a 
                    LEFT JOIN 
                    ( 
                       SELECT a.id_kecamatan,b.nama_kecamatan,COUNT(a.id) AS jmltarget FROM t_pribadi a, m_kecamatan b WHERE a.id_kecamatan = b.id_kecamatan AND a.status_data = "0" GROUP BY a.id_kecamatan
                    ) b ON a.id_kecamatan = b.id_kecamatan LEFT JOIN  (
                    SELECT a.id_kecamatan,b.nama_kecamatan,COUNT(a.id) AS jmldata FROM t_pribadi a, m_kecamatan b WHERE a.id_kecamatan = b.id_kecamatan
                    AND a.`verifikasi` = "Sudah Verifikasi" GROUP BY a.id_kecamatan
                    ) c ON a.id_kecamatan = c.id_kecamatan GROUP BY a.id_kecamatan');
        return $this->datatables->generate(); 
    }

    public function getWargaAdminLaporanBpjsKK()
    {

        /* $this->datatables->select('a.id,a.nik,a.nama_lengkap,a.jenis_kelamin,a.verifikasi');
        $this->datatables->from('t_pribadi a');
        $this->datatables->add_column('no_kk','$1','getNoKK(nik)');
        $this->datatables->where_in('id_user',$id); */

        $this->datatables->select('`a`.`id_kecamatan`, `b`.`nama_kecamatan`, b.jmlkkkec, IFNULL(f.jmlikut,"") AS jmlikutbpjs , IFNULL(c.jmlpindah,"") AS jmlmeninggal, IFNULL(d.jmlganda,"") AS jmldata_ganda , 
IFNULL(e.jmlket,"") AS jmlketerangan');
        $this->datatables->from('t_keluarga AS a 
LEFT JOIN 
( 
SELECT `a`.`id_kecamatan`, `a`.`nama_kecamatan`, SUM(a.jmlkk) AS jmlkkkec FROM(
SELECT a.id_kecamatan,b.nama_kecamatan,COUNT(a.nik_kepala) AS jmlkk FROM t_keluarga a, m_kecamatan b WHERE a.id_kecamatan = b.id_kecamatan AND a.kategori = "kepala" AND a.status_data = "0" GROUP BY a.id_kecamatan
) AS a GROUP BY a.`id_kecamatan`
) b ON a.id_kecamatan = b.id_kecamatan LEFT JOIN  (
SELECT a.id_kecamatan,b.nama_kecamatan,COUNT(a.id_keluarga) AS jmlpindah FROM t_keluarga a, m_kecamatan b WHERE a.id_kecamatan = b.id_kecamatan
AND a.`pindah_meninggal` = "1" AND a.status_data = "1" GROUP BY a.id_kecamatan
) c ON a.id_kecamatan = c.id_kecamatan LEFT JOIN  (
SELECT a.id_kecamatan,b.nama_kecamatan,COUNT(a.id_keluarga) AS jmlganda FROM t_keluarga a, m_kecamatan b WHERE a.id_kecamatan = b.id_kecamatan
AND a.`data_ganda` = "1" AND a.status_data = "1" GROUP BY a.id_kecamatan
) d ON a.id_kecamatan = d.id_kecamatan LEFT JOIN  (
SELECT a.id_kecamatan,b.nama_kecamatan,COUNT(a.id_keluarga) AS jmlket FROM t_keluarga a, m_kecamatan b WHERE a.id_kecamatan = b.id_kecamatan
AND a.`keterangan_lain` != "" AND a.status_data = "1" GROUP BY a.id_kecamatan
) e ON a.id_kecamatan = e.id_kecamatan LEFT JOIN  (
SELECT a.id_kecamatan,COUNT(b.id_bpjs) AS jmlikut FROM t_keluarga a, t_bpjs b WHERE a.`key_nik` = b.key_nik AND b.keterangan = "1" AND a.status_data = "0" GROUP BY a.`id_kecamatan`
) f ON a.id_kecamatan = f.id_kecamatan GROUP BY a.id_kecamatan');
        return $this->datatables->generate(); 
    }

    public function getWargaAdminLaporanBpjsKKDesa($id)
    {

        /* $this->datatables->select('a.id,a.nik,a.nama_lengkap,a.jenis_kelamin,a.verifikasi');
        $this->datatables->from('t_pribadi a');
        $this->datatables->add_column('no_kk','$1','getNoKK(nik)');
        $this->datatables->where_in('id_user',$id); */

        $this->datatables->select('`a`.`id_desa`, `a`.`nama_desa`, IFNULL(b.jmlkkkec,"") as jmlkk, IFNULL(f.jmlikut,"") AS jmlikutbpjs , IFNULL(c.jmlpindah,"") AS jmlmeninggal, IFNULL(d.jmlganda,"") AS jmldata_ganda , 
IFNULL(e.jmlket,"") AS jmlketerangan');
        $this->datatables->from('m_desa AS a 
LEFT JOIN 
( 
SELECT `a`.`id_kelurahan`, `a`.`nama_desa`, SUM(a.jmlkk) AS jmlkkkec FROM(
SELECT a.id_kelurahan,b.nama_desa,COUNT(a.nik_kepala) AS jmlkk FROM t_keluarga a, m_desa b WHERE a.id_kelurahan = b.id_desa AND a.`id_kecamatan` = "'.$id.'" AND a.kategori = "kepala" AND a.status_data = "0" GROUP BY a.id_kelurahan
) AS a GROUP BY a.`id_kelurahan`
) b ON a.id_desa = b.id_kelurahan LEFT JOIN  (
SELECT a.id_kelurahan,b.nama_desa,COUNT(a.id_keluarga) AS jmlpindah FROM t_keluarga a, m_desa b WHERE a.id_kelurahan = b.id_desa AND a.`id_kecamatan` = "'.$id.'"
AND a.`pindah_meninggal` = "1" AND a.status_data = "1" GROUP BY a.id_kelurahan
) c ON a.id_desa = c.id_kelurahan LEFT JOIN  (
SELECT a.id_kelurahan,b.nama_desa,COUNT(a.id_keluarga) AS jmlganda FROM t_keluarga a, m_desa b WHERE a.id_kelurahan = b.id_desa AND a.`id_kecamatan` = "'.$id.'"
AND a.`data_ganda` = "1" AND a.status_data = "1" GROUP BY a.id_kelurahan
) d ON a.id_desa = d.id_kelurahan LEFT JOIN  (
SELECT a.id_kelurahan,b.nama_desa,COUNT(a.id_keluarga) AS jmlket FROM t_keluarga a, m_desa b WHERE a.id_kelurahan = b.id_desa AND a.`id_kecamatan` = "'.$id.'"
AND a.`keterangan_lain` != "" AND a.status_data = "1" GROUP BY a.id_kelurahan
) e ON a.id_desa = e.id_kelurahan LEFT JOIN  (
SELECT a.id_kelurahan,COUNT(b.id_bpjs) AS jmlikut FROM t_keluarga a, t_bpjs b WHERE a.`key_nik` = b.key_nik AND a.`id_kecamatan` = "'.$id.'" AND b.keterangan = "1" AND a.status_data = "0"  GROUP BY a.`id_kelurahan`
) f ON a.id_desa = f.id_kelurahan WHERE a.id_kecamatan = "'.$id.'" GROUP BY a.id_desa');
        return $this->datatables->generate(); 
    }

    public function getListSamsat()
    {

        $this->datatables->select('a.id,a.nama,a.address,a.aktif');
        $this->datatables->from('tb_samsat a');
        return $this->datatables->generate();
    }

    public function getListTransaksi()
    {

        $this->datatables->select('a.id,a.nopol,a.nama,a.alamat,a.id_transaksi');
        $this->datatables->from('tb_transaksi a');
        return $this->datatables->generate();
    }

    public function getListKuota()
    {
       
        
        $this->datatables->select('a.id,a.tanggal,a.jumlah_kuota,a.id_samsat');
        $this->datatables->from('tb_kuota a');
        $this->datatables->edit_column('tanggal','$1','tanggal_mysql(tanggal)');
        $this->datatables->add_column('kuota_sisa','$1','getKuotaPakai(tanggal)');
        $this->datatables->add_column('nama_samsat','$1','getSamsat(id_samsat)');
        return $this->datatables->generate();
    }

    

    public function getPribadiById($id)
    {
        $this->db->select('a.*, b.id as id_pekerjaan, b.nama_jenis,c.*,d.*');
        $this->db->join('m_jenis_peserta b', 'a.pekerjaan = b.id');
        $this->db->join('m_kecamatan c', 'a.id_kecamatan = c.id_kecamatan');
        $this->db->join('m_desa d', 'a.id_desa = d.id_desa');
        $this->db->where('a.nik', $id);
        $this->db->where('a.status_data', '0');
        $query = $this->db->get('t_pribadi a');
        return $query->row();
    }

    public function getBpjsById($id)
    {   
        $this->db->select('a.*, b.*,c.*');
        $this->db->join('m_hub_kel b', 'a.id_hubungan = b.id');
        $this->db->join('m_status c', 'a.keterangan = c.id_status');
        $this->db->where('a.key_nik', $id);
        $this->db->where('a.status_data', '0');
        $query = $this->db->get_where('t_bpjs a');
        return $query->row();
    }

    public function getKeluargaById($id)
    {
        $query = $this->db->get_where('t_keluarga', array('key_nik'=>$id, 'status_data'=>'0'));
        return $query->row();
    }

    public function getPribadiById2($id)
    {
        $this->db->select('a.*, b.id as id_pekerjaan, b.nama_jenis,c.*,d.*');
        $this->db->join('m_jenis_peserta b', 'a.pekerjaan = b.id');
        $this->db->join('m_kecamatan c', 'a.id_kecamatan = c.id_kecamatan');
        $this->db->join('m_desa d', 'a.id_desa = d.id_desa');
        $this->db->where('a.nik', $id);
        $this->db->where('a.status_data', '1');
        $query = $this->db->get('t_pribadi a');
        return $query->row();
    }

    public function getBpjsById2($id)
    {   
        $this->db->select('a.*, b.*,c.*');
        $this->db->join('m_hub_kel b', 'a.id_hubungan = b.id');
        $this->db->join('m_status c', 'a.keterangan = c.id_status');
        $this->db->where('a.key_nik', $id);
        $this->db->where('a.status_data', '1');
        $query = $this->db->get_where('t_bpjs a');
        return $query->row();
    }

    public function getKeluargaById2($id)
    {
        $query = $this->db->get_where('t_keluarga', array('key_nik'=>$id, 'status_data'=>'1'));
        return $query->row();
    }

    public function getHubungan()
    {
        $query = $this->db->query("SELECT * from m_hub_kel")->result();
        return $query;
    }

    public function getKeterangan()
    {
        $query = $this->db->query("SELECT * from m_status")->result();
        return $query;
    }

    public function getPekerjaan()
    {
        $query = $this->db->query("SELECT * from m_jenis_peserta")->result();
        return $query;
    }
    
    public function getKecamatan()
    {
        $query = $this->db->query("SELECT * from m_kecamatan")->result();
        return $query;
    }

    public function getKelurahan()
    {
        $query = $this->db->query("SELECT * from m_desa")->result();
        return $query;
    }

    public function getSamsatById($id)
    {
        $query = $this->db->get_where('tb_samsat', array('id'=>$id));
        return $query->row();
    }


    public function getListVoucher()
    {
        $this->datatables->set_database('utama');
        $this->datatables->select('a.id,a.id_transaksi,a.kdvoucher,a.status');
        $this->datatables->from('kdvoucher a');
        $this->datatables->add_column('tanggal_transaksi','$1','getTanggalTransaksi(id_transaksi)');
        $this->datatables->add_column('biaya_pengiriman','$1','getBiayaPengiriman(id_transaksi)');
        $this->datatables->add_column('nik','$1','getNIKVoucher(id_transaksi)');
        $this->datatables->add_column('nopol','$1','getNopolVoucher(id_transaksi)');
        $this->datatables->add_column('nohp','$1','getHPVoucher(id_transaksi)');
        return $this->datatables->generate();
    }


    public function getHistori($id)
    {
        $this->datatables->select('a.log_id,a.log_time,a.log_user,a.log_tipe,a.log_aksi,a.log_assign_to');
        $this->datatables->from('tb_log a');
        $this->datatables->where_in('a.log_assign_to',$id);
        return $this->datatables->generate();
    }

    public function getHistoriAll()
    {
        $this->datatables->select('a.log_id,a.log_time,a.log_user,a.log_tipe,a.log_aksi,a.log_assign_to');
        $this->datatables->from('tb_log a');
        return $this->datatables->generate();
    }


    public function getOperator()
    {

        $this->datatables->select('a.id,a.email,a.username,a.company,c.name,a.active');
        $this->datatables->from('users a');
        $this->datatables->join('users_groups b', 'a.id=b.user_id');
        $this->datatables->join('groups c', 'b.group_id=c.id');
        return $this->datatables->generate();
    }

    
    function menu_utama() {

        $query = $this->db->query("SELECT * from menu WHERE id_menu_induk = '0'")->result();
        return $query;
    }

    //MENU
    public function getMenu()
    {

        $this->datatables->select('a.id,a.nama,a.icon,a.permalink,a.urutan,a.id_menu_induk');
        $this->datatables->from('menu a');
        return $this->datatables->generate();
    }

    public function getMenuById($id)
    {
        $this->db->select('a.id,a.nama,a.icon,a.permalink,a.urutan,a.id_menu_induk,a.uri,a.aktif');
        $this->db->where('a.id', $id);
        $query = $this->db->get('menu a');
        return $query->row();
    }

    //MENU
    public function getPermission()
    {

        $id = $this->input->post('textbox');

        $this->datatables->select('a.id,b.nama_level,a.id_pengguna_grup');
        $this->datatables->from('menu_akses a');
        $this->datatables->join('m_level b', 'a.id_pengguna_grup = b.id_level', 'left');
        $this->db->group_by('a.id_pengguna_grup');
        return $this->datatables->generate();
    }

    public function getPermissionById($id)
    {
        $this->db->select('a.id_desa,a.nama_desa,a.created_at,b.id_kecamatan,b.nama_kecamatan');
        $this->db->join('m_kecamatan b', 'a.id_kecamatan = b.id_kecamatan', 'left');

        $this->db->where('a.id_desa', $id);
        return $this->db->get('m_desa a');
    }

    //GRUP
    public function getMenuGrup($id = '') {
        $query = "
            SELECT m.*, ma.id AS id_menu_akses 
            FROM menu AS m 
            LEFT JOIN (SELECT * FROM menu_akses WHERE id_pengguna_grup = '{$id}') AS ma  
                ON ma.id_menu = m.id 
            WHERE m.id_menu_induk = 0 OR m.id_menu_induk = 99
            ORDER BY m.id           
        ";
        return $this->db->query($query);
    }
    
    public function getSubmenuGrup($id = '') {
        $query = "
            SELECT m.*, ma.id AS id_menu_akses 
            FROM menu AS m 
            LEFT JOIN (SELECT * FROM menu_akses WHERE id_pengguna_grup = '{$id}') AS ma 
                ON ma.id_menu = m.id 
            WHERE m.id_menu_induk > 0 
            ORDER BY m.id       
        ";
        return $this->db->query($query);
    }

    // Get data

    public function getWargaAdminSSKK($postData=null){

        $response = array();

      ## Read value
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value

      // Custom search filter 
      $searchCity = $postData['kecamatanID'];
      $searchGender = $postData['kelurahanID'];

      ## Search 
      $search_arr = array();
      $searchQuery = "";
      if($searchValue != ''){
          $search_arr[] = " ( b.id_desa = '".$searchValue."' or 
                b.id_kecamatan = '".$searchValue."') ";
      }
      if($searchGender != ''){
          $search_arr[] = " b.id_desa='".$searchGender."' ";
      }
      if($searchCity != ''){
          $search_arr[] = " b.id_kecamatan='".$searchCity."' ";
      }
      if(count($search_arr) > 0){
          $searchQuery = implode(" AND ",$search_arr);
      }

      ## Total number of records without filtering
      $this->db->select('count(a.nik_kepala) as allcount');
      $this->db->join('t_pribadi b', 'a.nik_kepala = b.nik');
      $this->db->where('a.kategori','kepala');
      $this->db->where('b.status_data','0');
      $records = $this->db->get('t_keluarga a')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(a.nik_kepala) as allcount');
      $this->db->join('t_pribadi b', 'a.nik_kepala = b.nik');
      $this->db->where('a.kategori','kepala');
      $this->db->where('b.status_data','0');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('t_keluarga a')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      ## Fetch records
      $this->db->select('a.nik_kepala,a.no_kk,a.nama_kepala,b.alamat,b.rt,b.rw');
      $this->db->join('t_pribadi b', 'a.nik_kepala = b.nik');
      $this->db->where('a.kategori','kepala');
      $this->db->where('b.status_data','0');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->group_by('a.'.$columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('t_keluarga a')->result();

      $data = array();

      foreach($records as $record ){
         
          $data[] = array( 
              "nik_kepala"=>$record->nik_kepala,
              "nama_kepala"=>$record->nama_kepala,
              "alamat"=>$record->alamat,
              "rt"=>$record->rt,
              "rw"=>$record->rw,
              "rw"=>$record->rw,
              "nik_id"=>$record->nik_kepala,
          ); 
      }

      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
      );

      return $response; 
        
    }

    public function getWargaUserSSKK($postData=null,$id){

        $response = array();

      ## Read value
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value

      // Custom search filter 
      $searchCity = $postData['kecamatanID'];
      $searchGender = $postData['kelurahanID'];

      ## Search 
      $search_arr = array();
      $searchQuery = "";
      if($searchValue != ''){
          $search_arr[] = " ( b.id_desa = '".$searchValue."' or 
                b.id_kecamatan = '".$searchValue."') ";
      }
      if($searchCity != ''){
          $search_arr[] = " b.id_desa='".$searchGender."' ";
      }
      if($searchGender != ''){
          $search_arr[] = " b.id_kecamatan='".$searchCity."' ";
      }
      if(count($search_arr) > 0){
          $searchQuery = implode(" AND ",$search_arr);
      }

      ## Total number of records without filtering
      $this->db->select('count(a.nik_kepala) as allcount');
      $this->db->join('t_pribadi b', 'a.nik_kepala = b.nik','left');
      $this->db->where('a.kategori','kepala');
      $this->db->where('b.status_data','0');
      $this->db->where('b.id_user',$id);
      $records = $this->db->get('t_keluarga a')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(a.nik_kepala) as allcount');
      $this->db->join('t_pribadi b', 'a.nik_kepala = b.nik','left');
      $this->db->where('a.kategori','kepala');
      $this->db->where('b.status_data','0');
      $this->db->where('b.id_user',$id);
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('t_keluarga a')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      ## Fetch records
      $this->db->select('a.id_keluarga,a.nik_kepala,a.no_kk,a.nama_kepala,b.alamat,b.rt,b.rw');
      $this->db->join('t_pribadi b', 'a.nik_kepala = b.nik');
      $this->db->where('a.kategori','kepala');
      $this->db->where('b.status_data','0');
      $this->db->where('b.id_user',$id);
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->group_by('a.'.$columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('t_keluarga a')->result();

      $data = array();

      foreach($records as $record ){
         
          $data[] = array( 
              "nik_kepala"=>$record->nik_kepala,
              "nama_kepala"=>$record->nama_kepala,
              "alamat"=>$record->alamat,
              "rt"=>$record->rt,
              "rw"=>$record->rw,
              "rw"=>$record->rw,
              "nik_id"=>$record->nik_kepala,
          ); 
      }

      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
      );

      return $response; 
        
    }

    public function getWargaUserSSKKDesa($postData=null){

      $response = array();

      ## Read value
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value

      // Custom search filter 
      $searchCity = $postData['kecamatanID'];
      $searchGender = $postData['kelurahanID'];
      $searchDesa = $postData['desaID'];

      ## Search 
      $search_arr = array();
      $searchQuery = "";
      if($searchValue != ''){
          $search_arr[] = " ( b.id_desa = '".$searchValue."' or 
                b.id_kecamatan = '".$searchValue."') ";
      }
      if($searchCity != ''){
          $search_arr[] = " b.id_desa='".$searchGender."' ";
      }
      if($searchGender != ''){
          $search_arr[] = " b.id_kecamatan='".$searchCity."' ";
      }
      if(count($search_arr) > 0){
          $searchQuery = implode(" AND ",$search_arr);
      }

      ## Total number of records without filtering
      $this->db->select('count(a.nik_kepala) as allcount');
      $this->db->join('t_pribadi b', 'a.nik_kepala = b.nik','left');
      $this->db->where('a.kategori','kepala');
      $this->db->where('a.status_data','0');
      $this->db->where('a.id_kelurahan',$searchDesa);
      $records = $this->db->get('t_keluarga a')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(a.nik_kepala) as allcount');
      $this->db->join('t_pribadi b', 'a.nik_kepala = b.nik','left');
      $this->db->where('a.kategori','kepala');
      $this->db->where('a.status_data','0');
      $this->db->where('a.id_kelurahan',$searchDesa);
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('t_keluarga a')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      ## Fetch records
      $this->db->select('a.id_keluarga,a.nik_kepala,a.no_kk,a.nama_kepala,b.alamat,b.rt,b.rw');
      $this->db->join('t_pribadi b', 'a.nik_kepala = b.nik');
      $this->db->where('a.kategori','kepala');
      $this->db->where('a.status_data','0');
      $this->db->where('a.id_kelurahan',$searchDesa);
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->group_by('a.nik_kepala');
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('t_keluarga a')->result();

      $data = array();

      foreach($records as $record ){
         
          $data[] = array( 
              "nik_kepala"=>$record->nik_kepala,
              "nama_kepala"=>$record->nama_kepala,
              "alamat"=>$record->alamat,
              "rt"=>$record->rt,
              "rw"=>$record->rw,
              "rw"=>$record->rw,
              "nik_id"=>$record->nik_kepala,
          ); 
      }

      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
      );

      return $response; 
        
    }

    public function jmlDataAwal($id) {

        $sql = $this->db->query('SELECT DISTINCT id FROM t_pribadi WHERE status_data = "0" AND nik = "'.$id.'"');

        return $sql->num_rows();
    }

    public function jmlDataAkhir($id) {

        $sql = $this->db->query('SELECT DISTINCT id FROM t_pribadi WHERE status_data = "1" AND nik = "'.$id.'"');

        return $sql->num_rows();
    }

    function fetch_state($kecamatan_id) {
        $this->db->where('id_kecamatan', $kecamatan_id);
        $this->db->order_by('nama_desa', 'ASC');
        $query = $this->db->get('m_desa');
        $output = '<option value="">Pilih Desa/Kelurahan</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->id_desa.'">'.$row->nama_desa.'</option>';
        }
        return $output;
        }
    
}