<?php
//error_reporting(0); //menyembunyikan error
class home_model extends CI_model
{
    //fungsi ambil data tabel employ
    public function getemploy($user)
    {
        //ambil data berdasarkan username yang login
        $user = $this->db->get_where("user", array("username" => $user))->row_array();
        $id_employ = $user["id_employ"];
        return $this->db->get_where("employe", array("id_employ" => $id_employ))->row_array();
    }

    //fungsi ambil data tabel task
    public function gettask()
    {
        return $this->db->get("task")->result_array();
    }

    //fungsi ambil data tabel user
    public function getuser($id_employ)
    {
        //mendapatkan data berdasarkan id_employ
        return $this->db->get_where("user", array("id_employ" => $id_employ))->row_array();
    }

    //fungsi ambil data tabel employ
    public function getemploytiket($id_employ)
    {
        //ambil data berdasarkan id_emoloy
        return $this->db->get_where("employe", array("id_employ" => $id_employ))->row_array();
    }

    //fungsi ambil data table employ
    public function getemploydept($id_dept)
    {
        if($id_dept != "ceo"){ //jika yang login dari CEO
            $this->db->order_by('nama_departemen', 'ASC'); //sort hasil menurut nama_departemen
            $this->db->order_by('status_employ', 'ASC'); //sort hasil menurut status employ 
            //join tabel departemen ke tabel employ dimana employe.id_departemen = departemen.id_departemen
            $this->db->join("departemen", "employe.id_departemen = departemen.id_departemen"); 
            //ambil data employ menurut id_departemen
            return $this->db->get_where("employe", array("employe.id_departemen" => $id_dept))->result_array();
        }else{
            $this->db->order_by('nama_departemen', 'ASC');
            $this->db->order_by('status_employ', 'ASC');
            $this->db->join("departemen", "employe.id_departemen = departemen.id_departemen");
            return $this->db->get_where("employe")->result_array();
        }
        
    }

    //fungsi ambil data tabel pelanggan
    public function getpelanggan()
    {
        return $this->db->get("pelanggan")->result_array();
    }

    //fungsi ambil data tabel layanan
    public function getlayanan()
    {
        return $this->db->get("layanan_pelanggan")->result_array();
    }

    // //fungsi ambil jumlah data tabel layanan
    // public function getsumlayanan()
    // {
    //     return $this->db->count_all("layanan_pelanggan");
    // }

    //fungsi ambil data tabel pelanggan berdasarkan id pelanggan
    public function getpelangganbyid($id)
    {
        return $this->db->get_where("pelanggan", array("id_pelanggan" => $id))->row_array();
    }

    //fungsi ambil data tabel layanan berdasarkan id layanan
    public function getlayananbyid($id)
    {
        $this->db->join("pelanggan", "pelanggan.id_pelanggan = layanan_pelanggan.id_pelanggan"); //join tabel pelanggan dengan layanan
        return $this->db->get_where("layanan_pelanggan", array("id_layanan" => $id))->row_array();
    }

    //fungsi ambil data tabel departemen berdasarkan id departemen
    public function getdepartemen($id_departemen)
    {
        return $this->db->get_where("departemen", array("id_departemen" => $id_departemen))->row_array();
    }

    //fungsi ambil data task selesai berdarakan id_employ_tujuan(PJ task)
    public function gettaskselesai($id_employ,$dept)
    {
        if($dept == "Chief Executive Officer "){ //jika CEO yang login
            return $this->db->get_where('task', array("status" => "Selesai"))->result_array();
        }else{
            return $this->db->get_where('task', array('id_employ_tujuan' => $id_employ, "status" => "Selesai"))->result_array();
        }
        
    }

    //fungsi ambil data task belum selesai berdarakan id_employ_tujuan(PJ task)
    public function gettaskbelum($id_employ,$dept)
    {
        if($dept == "Chief Executive Officer "){ //jika CEO yang login
            return $this->db->get_where('task', array('status' => "Belum Selesai"))->result_array();
        }else{
            return $this->db->get_where('task', array('id_employ_tujuan' => $id_employ, 'status' => "Belum Selesai"))->result_array();
        }
    }

    //fungsi ambil data tabel task untuk tiket berdarakan id_employ_tujuan(PJ task)
    public function gettiket($id_employ)
    {
        $this->db->join("employe", "employe.id_employ = task.id_employ_tujuan"); //join tabel employe ke task
        return $this->db->get_where('task', array('id_employ_kirim' => $id_employ))->result_array();
    }

    //fungsi ambil data tabel task untuk tiket berdarakan id_employ_tujuan(PJ task)
    public function gettiketsaya($id_employ)
    {
        return $this->db->get_where('task', array('id_employ_kirim' => $id_employ,'id_employ_tujuan' => NULL))->result_array();
    }

    //fungsi ambil data tabel task untuk request task berdarakan nama_dept_tujuan(departemen PJ task)
    public function gettaskdihead($nama_departemen)
    {
        $departemen = array($nama_departemen, "umum");
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('dateline', 'ASC');
        $this->db->join("employe", "employe.id_employ = task.id_employ_tujuan"); //join tabel employe dengan task
        $this->db->where_in('nama_dept_tujuan', $departemen); //clause where_in
        return $this->db->get('task')->result_array();
    }

    //fungsi ambil data tabel task untuk tugas saya berdarakan nama_dept_tujuan(departemen PJ task)
    public function gettaskparent($nama_departemen)
    {
        $departemen = array($nama_departemen, "umum");
        $this->db->join("employe", "employe.id_employ = task.id_employ_tujuan");
        if($nama_departemen != "Chief Executive Officer "){
            $this->db->where_in('nama_dept_tujuan', $departemen);
        }
        $this->db->where('id_parent', "");
        return $this->db->get('task')->result_array();
    }

    //fungsi ambil data tabel task untuk tugas saya berdarakan nama_dept_tujuan(departemen PJ task) dan id_employ_tujuan
    public function gettasksaya($id_employ,$dept)
    {
        $this->db->where('id_parent', "");
        $this->db->join("employe", "employe.id_employ = task.id_employ_tujuan");
        if($dept != "Chief Executive Officer "){ //jika bukan CEO yang login
            $this->db->where('id_employ_tujuan', $id_employ);
        }
        return $this->db->get('task')->result_array();
    }

    //ambil data tabel task untuk data request task
    public function gettaskdiheadkosong($nama_departemen)
    {
        $departemen = array($nama_departemen, "umum");
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('dateline', 'ASC');
        $this->db->where_in('nama_dept_tujuan', $departemen);
        return $this->db->get('task')->result_array();
    }

    //fungsi update db task
    public function updatestatus($id)
    {
        //update
        date_default_timezone_set('Asia/Bangkok');
        $this->db->set('status', "Selesai"); //set status jadi selesai
        $this->db->set('waktu_selesai', date("Y-m-d H-i-s")); //set waktu_selesai menjadi waktu saat ini
        $this->db->where('id_task', $id);
        $this->db->update('task');
        //akhir update
        //data user
        $task = $this->db->get_where("task", array("id_task" => $id))->row_array();
        $employ = $this->db->get_where("employe", array("id_employ" => $task["id_employ_tujuan"]))->row_array();
        $user = $this->db->get_where("user", array("id_employ" => $employ["id_employ"]))->row_array();
        //akhir data user
        return $user["username"];
    }

     //fungsi update status layanan
     public function updatestatuslayanan($id_employ,$id,$status){
        $this->db->set('status', $status);
        $this->db->where('id_layanan', $id);
        $this->db->update('layanan_pelanggan');

        $user = $this->db->get_where("user", array("id_employ" => $id_employ))->row_array();
        return $user["username"];
     }

    //fungsi search tabel pelanggan untuk searching dan sorting tabel pelanggan
    public function getsearch($status, $search)
    {
            if ($status == "semua") {
                
            } else {
                $this->db->where("status", $status);
            }
        
        $this->db->like('nama_layanan', $search);
        return $this->db->get("layanan_pelanggan")->result_array();
    }

    //fungsi search departemen di report
    // public function getsearchreport($dept, $tglend, $tglstart)
    // {
    //     $this->db->where("nama_dept_tujuan", $dept);
    //     $this->db->where("dateline", $tglend);
    //     $this->db->select("count(task.status),id_employ_tujuan,nama,status_employ");
    //     $this->db->join("employe", "employe.id_employ = task.id_employ_tujuan");
    //     $this->db->group_by("id_employ_tujuan");
    //     return $this->db->get("task")->result_array();
    // }

    public function insert_task($data_task)
    {
        return $this->db->insert("task", $data_task);
    }

    //fungsi insert add layanan
    public function insert_layanan($data_layanan)
    {
        return $this->db->insert("layanan_pelanggan", $data_layanan);
    }

    // report tanpa periode
    //fungsi get report (untuk kolom request tugas)
    public function getreport($dept)
    {   
        $this->db->order_by('nama_dept_tujuan', 'ASC');
        $this->db->order_by('status_employ', 'ASC');
        if($dept != "Chief Executive Officer "){ //jika bukan CEO yang login
            $this->db->where("nama_dept_tujuan", $dept);
        }
        $this->db->select("count(task.status),id_employ_tujuan,nama,status_employ,id_departemen,nama_dept_tujuan"); //select kolom
        $this->db->join("employe", "employe.id_employ = task.id_employ_tujuan"); //join
        $this->db->group_by("id_employ_tujuan"); //group by 
        return $this->db->get("task")->result_array();
    }

    //fungsi get report (untuk kolom tugas selesai)
    public function gettugaspjselesai($dept)
    {
        if($dept != "Chief Executive Officer "){
            $this->db->where("nama_dept_tujuan", $dept);
        }
        $this->db->where("task.status", "Selesai");
        $this->db->where_not_in("id_employ_tujuan", ""); //clause where not in
        $this->db->select("count(task.status),id_employ_tujuan,nama,status_employ,id_departemen");
        $this->db->join("employe", "employe.id_employ = task.id_employ_tujuan");
        $this->db->group_by("id_employ_tujuan");
        return $this->db->get("task")->result_array();
    }

    //fungsi get report (untuk kolom on progres)
    public function gettugaspjbelum($dept)
    {
        if($dept != "Chief Executive Officer "){
            $this->db->where("nama_dept_tujuan", $dept);
        }
        $this->db->where("task.status", "Belum Selesai");
        $this->db->where_not_in("id_employ_tujuan", "");
        $this->db->select("count(task.status),id_employ_tujuan,nama,status_employ,id_departemen");
        $this->db->join("employe", "employe.id_employ = task.id_employ_tujuan");
        $this->db->group_by("id_employ_tujuan");
        return $this->db->get("task")->result_array();
    }
    // end report tanpa periode

    // report dengan periode
    //fungsi get report (untuk kolom request tugas) dengan periode
    public function getreport_periode($dept,$tgl_start,$tgl_end)
    {
        $this->db->order_by('nama_dept_tujuan', 'ASC');
        $this->db->order_by('status_employ', 'ASC');
        if($dept != "Chief Executive Officer "){
            $this->db->where("nama_dept_tujuan", $dept);
        }
        $this->db->where('date >=', $tgl_start); //where tanggal
        $this->db->where('date <=', $tgl_end); //where tanggan
        $this->db->select("count(task.status),id_employ_tujuan,nama,status_employ,nama_dept_tujuan"); //select kolom
        $this->db->join("employe", "employe.id_employ = task.id_employ_tujuan"); //join
        $this->db->group_by("id_employ_tujuan"); //group by
        return $this->db->get("task")->result_array();
    }
    
    //fungsi get report (untuk kolom tugas selesai) dengan periode
    public function gettugaspjselesai_periode($dept,$tgl_start,$tgl_end)
    {
        if($dept != "Chief Executive Officer "){
            $this->db->where("nama_dept_tujuan", $dept);
        }
        $this->db->where("task.status", "Selesai");
        $this->db->where('date >=', $tgl_start);
        $this->db->where('date <=', $tgl_end);
        $this->db->where_not_in("id_employ_tujuan", "");
        $this->db->select("count(task.status),id_employ_tujuan,nama,status_employ,id_departemen");
        $this->db->join("employe", "employe.id_employ = task.id_employ_tujuan");
        $this->db->group_by("id_employ_tujuan");
        return $this->db->get("task")->result_array();
    }
    
    //fungsi get report (untuk kolom on progres) dengan periode
    public function gettugaspjbelum_periode($dept,$tgl_start,$tgl_end)
    {
        if($dept != "Chief Executive Officer "){
            $this->db->where("nama_dept_tujuan", $dept);
        }
        $this->db->where("task.status", "Belum Selesai");
        $this->db->where('date >=', $tgl_start);
        $this->db->where('date <=', $tgl_end);
        $this->db->where_not_in("id_employ_tujuan", "");
        $this->db->select("count(task.status),id_employ_tujuan,nama,status_employ,id_departemen");
        $this->db->join("employe", "employe.id_employ = task.id_employ_tujuan");
        $this->db->group_by("id_employ_tujuan");
        return $this->db->get("task")->result_array();
    }
    // end report dengan periode
}
