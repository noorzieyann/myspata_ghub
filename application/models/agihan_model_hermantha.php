<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Agihan_model extends CI_Model {

    function get_kementerian() {  //dapatkan list kementerian
        $this->db->select('idkem, namakem');
        $this->db->order_by("namakem", "ASC");
        $query = $this->db->get('lkp_kementerian');


        $kementerian = array();



        if ($query->result()) {

            $kementerian[''] = '- Pilih Kementerian -';    // default selection item
            foreach ($query->result() as $kem) {
                $kementerian[$kem->idkem] = $kem->namakem;
            }
            return $kementerian;
        }
    }

    function get_namakem($idkem) {
        $this->db->select('namakem');
        $this->db->where('idkem', $idkem);
        $get_namakem = $this->db->get('lkp_kementerian');

        return $get_namakem->result();
    }

    function get_jabatan() {  //dapatkan list jabatan
        $this->db->select('idjab_agensi, nama_jab_agensi');
        $this->db->order_by('nama_jab_agensi', 'ASC');
        $query = $this->db->get('lkp_jab_agensi');

        $jabatan = array();


        if ($query->result()) {

            $jabatan[''] = '- Pilih Jabatan/Agensi -';    // default selection item
            foreach ($query->result() as $jab) {
                $jabatan[$jab->idjab_agensi] = $jab->nama_jab_agensi;
            }
            return $jabatan;
        }
    }

    function get_namajab_agensi($idjab_agensi) {
        $this->db->select('nama_jab_agensi');
        $this->db->where('idjab_agensi', $idjab_agensi);
        $get_namajab_agensi = $this->db->get('lkp_jab_agensi');

        return $get_namajab_agensi->result();
    }

    function get_premis() {  //dapatkan list jabatan
        $this->db->select('idpremis_kategori, jenis_premis');
        $this->db->order_by("jenis_premis", "ASC");
        $query = $this->db->get('lkp_premis_kategori');


        $premis = array();


        if ($query->result()) {

            $premis[''] = '- Pilih Premis -';    // default selection item
            foreach ($query->result() as $prem) {
                $premis[$prem->idpremis_kategori] = $prem->jenis_premis;
            }
            return $premis;
        }
    }

    function get_status() {  //dapatkan list jabatan
        $this->db->select('status_id, nama_status');
        $this->db->order_by("nama_status", "ASC");
        $query = $this->db->get('lkp_status');


        $status = array();


        if ($query->result()) {

            $status[''] = '- Pilih Status -';    // default selection item
            foreach ($query->result() as $sta) {
                $status[$sta->status_id] = $sta->nama_status;
            }
            return $status;
        }
    }

    function get_negeri() {  //dapatkan list jabatan
        $this->db->select('idnegeri, namanegeri');
        $this->db->order_by("namanegeri", "ASC");
        $query = $this->db->get('lkp_negeri');


        $negeri = array();


        if ($query->result()) {

            $negeri[''] = '- Pilih Negeri -';    // default selection item
            foreach ($query->result() as $neg) {
                $negeri[$neg->idnegeri] = $neg->namanegeri;
            }
            return $negeri;
        }
    }

    function get_daerah() {  //dapatkan list jabatan
        $this->db->select('iddaerah, nama_daerah');
        $this->db->order_by("nama_daerah", "ASC");
        $query = $this->db->get('lkp_daerah');


        $daerah = array();


        if ($query->result()) {

            $daerah[''] = '- Pilih Daerah -';    // default selection item
            foreach ($query->result() as $dae) {
                $daerah[$dae->iddaerah] = $dae->nama_daerah;
            }
            return $daerah;
        }
    }

    function get_namadaerah($iddaerah) {
        $this->db->select('nama_daerah');
        $this->db->where('iddaerah', $iddaerah);
        $get_namadaerah = $this->db->get('lkp_daerah');

        return $get_namadaerah->result();
    }

    function get_kat_peng_pej() {  //dapatkan list jabatan
        $this->db->select('kat_alat_pej_id, alat_pej');
        $this->db->order_by("alat_pej", "ASC");
        $query = $this->db->get('lkp_kat_alat_pej');


        $alatpejabat = array();


        if ($query->result()) {

            $alatpejabat[''] = '- Pilih Alat Pengurusan Pejabat -';    // default selection item
            foreach ($query->result() as $alatpej) {
                $alatpejabat[$alatpej->kat_alat_pej_id] = $alatpej->alat_pej;
            }
            return $alatpejabat;
        }
    }

    function get_kat_alat_keje() {  //dapatkan list jabatan
        $this->db->select('kat_alat_keje_id, alat_keje');
        $this->db->order_by("alat_keje", "ASC");
        $query = $this->db->get('lkp_kat_alat_keje');


        $alatkeje = array();


        if ($query->result()) {

            $alatkeje[''] = '- Pilih Peralatan Kerja -';    // default selection item
            foreach ($query->result() as $alatkej) {
                $alatkeje[$alatkej->kat_alat_keje_id] = $alatkej->alat_keje;
            }
            return $alatkeje;
        }
    }

    function get_pspao() {

        $getPspao = $this->db->get('tbl_pspao');
        return $getPspao->result();
    }

    function get_myspatauser() {

        $getMyspatauser1 = $this->db->get('tbl_myspata_user');
         $this->db->where('iddaerah', $iddaerah);
        $res = $getMyspatauser1->result();
        //print_r($res);
        return $getMyspatauser1->result();
    }

    function get_abm() {
        $this->db->select('*');
        $array = array('idkem' => $this->session->userdata('user_kemid'));
        $this->db->where($array);
        $getAbm = $this->db->get('tbl_abm_agihan');

        return $getAbm->result();
    }

    /**
     * 
     * Super Class  Belanjawan
     * @module      Agihan_model 
     * @metod       set_terima 
     * @category    Module 
     * @author      Hemantha Wijesinghe
     * @email       hwijesinghe@hotmail.com
     * @link        http://www.onlinedesignstudio.net 
     * @date        06 October 2013
     * 
     * */
    function set_terima() {

        $user_data = $this->get_abm();

        $data = array('abm_agihan_id' => '',
            'jum_kos_mohon' => $this->input->post('txt_mohon'),
            'jum_kos_terima' => $this->input->post('txt_terima'),
            'level_id' => $user_data[0]->level_id,
            'idjab_agensi' => $user_data[0]->idjab_agensi,
            'idkem' => $user_data[0]->idkem
        );

        $panel = $this->db->insert('tbl_abm_agihan', $data);
        return $panel;
    }

    /**
     * 
     * Super Class  Belanjawan
     * @module      Agihan_model 
     * @metod       get_ptf_myspatauser 
     * @category    Module 
     * @author      Hemantha Wijesinghe
     * @email       hwijesinghe@hotmail.com
     * @link        http://www.onlinedesignstudio.net 
     * @date        06 October 2013
     * 
     * */
    function get_ptf_myspatauser($role_id) {

        $sql = "SELECT * FROM tbl_myspata_user_to_matrix 
        LEFT JOIN tbl_myspata_user ON tbl_myspata_user.myspata_userid = tbl_myspata_user_to_matrix.myspata_userid 
        LEFT JOIN lkp_role_pengguna ON tbl_myspata_user_to_matrix.role_pengguna_id = lkp_role_pengguna.role_pengguna_id 
        WHERE lkp_role_pengguna.role_pengguna_id = $role_id";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }


    function get_ppd_myspatauser($role_id) {

        $sql = "SELECT * FROM tbl_myspata_user_to_matrix 
        LEFT JOIN tbl_myspata_user ON tbl_myspata_user.myspata_userid = tbl_myspata_user_to_matrix.myspata_userid 
        LEFT JOIN lkp_role_pengguna ON tbl_myspata_user_to_matrix.role_pengguna_id = lkp_role_pengguna.role_pengguna_id 
        WHERE lkp_role_pengguna.role_pengguna_id = $role_id";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    /**
     * 
     * Super Class  Belanjawan
     * @module      Agihan_model 
     * @metod       get_ministry_agency 
     * @category    Module 
     * @author      Hemantha Wijesinghe
     * @email       hwijesinghe@hotmail.com
     * @link        http://www.onlinedesignstudio.net 
     * @date        08 October 2013
     * 
     * */
    function get_ministry_agency($user_kemid, $idjab_agensi) {
        //$array = array('idkem' => $user_kemid, 'idjab_agensi' => $idjab_agensi);
        $array = array('idkem' => $this->session->userdata('user_kemid'));
        $this->db->select('*');
        $this->db->where($array);
        $get_all_ajency = $this->db->get('tbl_pspao');
        //echo $this->db->last_query();    
        return $get_all_ajency->result();
    }

    /**
     * 
     * Super Class  Belanjawan
     * @module      Agihan_model 
     * @metod       get_total_cost_ptra
     * @description Total cost calculation for ptra and amount listing for display 
     * @category    Module 
     * @author      Hemantha Wijesinghe
     * @email       hwijesinghe@hotmail.com
     * @link        http://www.onlinedesignstudio.net 
     * @date        09 October 2013
     * 
     * */
    function get_total_cost_ptra() {

        $array = array('tbl_pspao.idkem' => $this->session->userdata('user_kemid'));
        $this->db->select('SUM( tbl_ptra_pata_f6_1b1c.f6_1b1c_anggaran_kos_perolehan + tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_alat_kerja + tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_urus_pej + tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_sumber_man ) AS total');
        $this->db->from('tbl_pspao');
        $this->db->join('tbl_ptra', 'tbl_pspao.pspa_id = tbl_ptra.pspa_id');
        $this->db->join('tbl_ptra_pata_f6_1b1c', 'tbl_ptra.ptra_id = tbl_ptra_pata_f6_1b1c.ptra_id');
        $this->db->where($array);
        $query = $this->db->get();
        //echo $this->db->last_query();     // This will display the query for above sql statement
        $row = $query->result();
        return $row;


        /* Thisi row sql statement for calculation of sum 

          SELECT
          tbl_pspao.pspa_id,
          tbl_pspao.idkem,
          tbl_ptra.ptra_id,
          tbl_ptra.idkem,
          tbl_ptra.pspa_id,
          tbl_ptra_pata_f6_1b1c.ptra_id,
          tbl_ptra_pata_f6_1b1c.f6_1b1c_anggaran_kos_perolehan,
          tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_alat_kerja,
          tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_urus_pej,
          tbl_ptra_pata_f6_1b1c.bajet_aktvt,
          tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_sumber_man,
          SUM( tbl_ptra_pata_f6_1b1c.f6_1b1c_anggaran_kos_perolehan + tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_alat_kerja + tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_urus_pej + tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_sumber_man ) AS total
          FROM
          tbl_pspao
          Inner Join tbl_ptra ON tbl_pspao.pspa_id = tbl_ptra.pspa_id
          Inner Join tbl_ptra_pata_f6_1b1c ON tbl_ptra.ptra_id = tbl_ptra_pata_f6_1b1c.ptra_id
          WHERE
          tbl_pspao.idkem =  '4'

         */
    }

    /**
     * 
     * Super Class  Belanjawan
     * @module      Agihan_model 
     * @metod       get_total_cost_ptra_perrow
     * @description Total cost calculation for ptra and amount listing for display per row
     * @category    Module 
     * @author      Hemantha Wijesinghe
     * @email       hwijesinghe@hotmail.com
     * @link        http://www.onlinedesignstudio.net 
     * @date        09 October 2013
     * 
     * */
    function get_total_cost_ptra_perrow() {

        $array = array('tbl_pspao.idkem' => $this->session->userdata('user_kemid'));
        $this->db->select('tbl_pspao.pspa_id,
          tbl_pspao.idkem,
          tbl_ptra.ptra_id,
          tbl_ptra.idkem,
          tbl_ptra.pspa_id,
          tbl_ptra_pata_f6_1b1c.ptra_id,
          tbl_ptra_pata_f6_1b1c.f6_1b1c_anggaran_kos_perolehan,
          tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_alat_kerja,
          tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_urus_pej,
          tbl_ptra_pata_f6_1b1c.bajet_aktvt,
          tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_sumber_man,
          SUM( tbl_ptra_pata_f6_1b1c.f6_1b1c_anggaran_kos_perolehan + tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_alat_kerja + tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_urus_pej + tbl_ptra_pata_f6_1b1c.f6_1b1c_kos_sumber_man ) AS total
          ');
        $this->db->from('tbl_pspao');
        $this->db->join('tbl_ptra', 'tbl_pspao.pspa_id = tbl_ptra.pspa_id');
        $this->db->join('tbl_ptra_pata_f6_1b1c', 'tbl_ptra.ptra_id = tbl_ptra_pata_f6_1b1c.ptra_id');
        $this->db->where($array);
        $this->db->group_by('tbl_ptra_pata_f6_1b1c.ptra_pata_f6_1b1c_id');
        $query = $this->db->get();
        //echo $this->db->last_query();    // This will display the query for above sql statement 
        $row = $query->result();
        return $row;
    }

    /**
     * 
     * Super Class  Belanjawan
     * @module      Agihan_model 
     * @metod       get_total_cost_popa
     * @description Total cost calculation for popa and amount listing for display 
     * @category    Module 
     * @author      Hemantha Wijesinghe
     * @email       hwijesinghe@hotmail.com
     * @link        http://www.onlinedesignstudio.net 
     * @date        09 October 2013
     * 
     * */
    function get_total_cost_popa() {

        $array = array('tbl_pspao.idkem' => $this->session->userdata('user_kemid'));
        $this->db->select('SUM(tbl_popa_pata_f7_1b1c.f7_1b1c_kos_sumber_man + tbl_popa_pata_f7_1b1c.f7_1b1c_kos_alat_kerja + tbl_popa_pata_f7_1b1c.f7_1b1c_kos_urus_pej + tbl_popa_pata_f7_1b1c.bajet_aktvt) AS total');
        $this->db->from('tbl_pspao');
        $this->db->join('tbl_popa', 'tbl_pspao.pspa_id = tbl_popa.pspa_id');
        $this->db->join('tbl_popa_pata_f7_1b1c', 'tbl_popa.popa_id = tbl_popa_pata_f7_1b1c.popa_id');
        $this->db->where($array);
        $query = $this->db->get();
        //echo $this->db->last_query();     // This will display the query for above sql statement
        $row = $query->result();
        return $row;

        /*
          SELECT
          tbl_pspao.pspa_id,
          tbl_pspao.idkem,
          tbl_popa.pspa_id,
          tbl_popa.idkem,
          tbl_popa.popa_id,
          tbl_popa_pata_f7_1b1c.popa_id,
          tbl_popa_pata_f7_1b1c.f7_1b1c_kos_sumber_man,
          tbl_popa_pata_f7_1b1c.f7_1b1c_kos_alat_kerja,
          tbl_popa_pata_f7_1b1c.f7_1b1c_kos_urus_pej,
          tbl_popa_pata_f7_1b1c.bajet_aktvt,
          SUM(tbl_popa_pata_f7_1b1c.f7_1b1c_kos_sumber_man + tbl_popa_pata_f7_1b1c.f7_1b1c_kos_alat_kerja + tbl_popa_pata_f7_1b1c.f7_1b1c_kos_urus_pej + tbl_popa_pata_f7_1b1c.bajet_aktvt) AS total
          FROM
          tbl_pspao
          Inner Join tbl_popa ON tbl_pspao.pspa_id = tbl_popa.pspa_id
          Inner Join tbl_popa_pata_f7_1b1c ON tbl_popa.popa_id = tbl_popa_pata_f7_1b1c.popa_id
          WHERE
          tbl_pspao.idkem =  '4'

         */
    }

    /**
     * 
     * Super Class  Belanjawan
     * @module      Agihan_model 
     * @metod       get_total_cost_popa_perrow
     * @description Total cost calculation for ppun and amount listing for display per row
     * @category    Module 
     * @author      Hemantha Wijesinghe
     * @email       hwijesinghe@hotmail.com
     * @link        http://www.onlinedesignstudio.net 
     * @date        09 October 2013
     * 
     * */
    function get_total_cost_popa_perrow() {

        $array = array('tbl_pspao.idkem' => $this->session->userdata('user_kemid'));
        $this->db->select('tbl_pspao.pspa_id,
          tbl_pspao.idkem,
          tbl_popa.pspa_id,
          tbl_popa.idkem,
          tbl_popa.popa_id,
          tbl_popa_pata_f7_1b1c.popa_id,
          tbl_popa_pata_f7_1b1c.f7_1b1c_kos_sumber_man,
          tbl_popa_pata_f7_1b1c.f7_1b1c_kos_alat_kerja,
          tbl_popa_pata_f7_1b1c.f7_1b1c_kos_urus_pej,
          tbl_popa_pata_f7_1b1c.bajet_aktvt,
          SUM(tbl_popa_pata_f7_1b1c.f7_1b1c_kos_sumber_man + tbl_popa_pata_f7_1b1c.f7_1b1c_kos_alat_kerja + tbl_popa_pata_f7_1b1c.f7_1b1c_kos_urus_pej + tbl_popa_pata_f7_1b1c.bajet_aktvt) AS total');
        $this->db->from('tbl_pspao');
        $this->db->join('tbl_popa', 'tbl_pspao.pspa_id = tbl_popa.pspa_id');
        $this->db->join('tbl_popa_pata_f7_1b1c', 'tbl_popa.popa_id = tbl_popa_pata_f7_1b1c.popa_id');
        $this->db->where($array);
        $this->db->group_by('tbl_popa_pata_f7_1b1c.popa_pata_f7_1b1c_id');
        $query = $this->db->get();
        //echo $this->db->last_query();     // This will display the query for above sql statement
        $row = $query->result();
        return $row;
    }

    /**
     * 
     * Super Class  Belanjawan
     * @module      Agihan_model 
     * @metod       get_total_cost_ppun
     * @description Total cost calculation for ppun and amount listing for display 
     * @category    Module 
     * @author      Hemantha Wijesinghe
     * @email       hwijesinghe@hotmail.com
     * @link        http://www.onlinedesignstudio.net 
     * @date        09 October 2013
     * 
     * */
    function get_total_cost_ppun() {

        $array = array('tbl_pspao.idkem' => $this->session->userdata('user_kemid'));
        $this->db->select('SUM(tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_sumber_man + tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_alat_kerja + tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_urus_pej + tbl_ppun_pata_f9_1b1c.bajet_aktvt) AS total');
        $this->db->from('tbl_pspao');
        $this->db->join('tbl_ppun', 'tbl_pspao.pspa_id = tbl_ppun.pspa_id');
        $this->db->join('tbl_ppun_pata_f9_1b1c', 'tbl_ppun.ppun_id = tbl_ppun_pata_f9_1b1c.ppun_id');
        $this->db->where($array);
        $query = $this->db->get();
        //echo $this->db->last_query();     // This will display the query for above sql statement
        $row = $query->result();
        return $row;

        /*
          SELECT
          tbl_pspao.pspa_id,
          tbl_pspao.idkem,
          tbl_ppun.pspa_id,
          tbl_ppun.idkem,
          tbl_ppun.popa_id,
          tbl_ppun_pata_f7_1b1c.popa_id,
          tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_sumber_man,
          tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_alat_kerja,
          tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_urus_pej,
          tbl_ppun_pata_f9_1b1c.bajet_aktvt,
          SUM(tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_sumber_man + tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_alat_kerja + tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_urus_pej + tbl_ppun_pata_f9_1b1c.bajet_aktvt) AS total
          FROM
          tbl_pspao
          Inner Join tbl_ppun ON tbl_pspao.pspa_id = tbl_ppun.pspa_id
          Inner Join tbl_ppun_pata_f9_1b1c ON tbl_ppun.ppun_id = tbl_ppun_pata_f9_1b1c.ppun_id
          WHERE
          tbl_pspao.idkem =  '4'

         */
    }

    /**
     * 
     * Super Class  Belanjawan
     * @module      Agihan_model 
     * @metod       get_total_cost_ppun_perrow
     * @description Total cost calculation for ppun and amount listing for display per row
     * @category    Module 
     * @author      Hemantha Wijesinghe
     * @email       hwijesinghe@hotmail.com
     * @link        http://www.onlinedesignstudio.net 
     * @date        09 October 2013
     * 
     * */
    function get_total_cost_ppun_perrow() {

        $array = array('tbl_pspao.idkem' => $this->session->userdata('user_kemid'));
        $this->db->select('tbl_pspao.pspa_id,
          tbl_pspao.idkem,
          tbl_ppun.pspa_id,
          tbl_ppun.idkem,
          tbl_ppun.ppun_id,
          tbl_ppun_pata_f9_1b1c.ppun_id,
          tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_sumber_man,
          tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_alat_kerja,
          tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_urus_pej,
          tbl_ppun_pata_f9_1b1c.bajet_aktvt,
          SUM(tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_sumber_man + tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_alat_kerja + tbl_ppun_pata_f9_1b1c.f9_1b1c_kos_urus_pej + tbl_ppun_pata_f9_1b1c.bajet_aktvt) AS total');
        $this->db->from('tbl_pspao');
        $this->db->join('tbl_ppun', 'tbl_pspao.pspa_id = tbl_ppun.pspa_id');
        $this->db->join('tbl_ppun_pata_f9_1b1c', 'tbl_ppun.ppun_id = tbl_ppun_pata_f9_1b1c.ppun_id');
        $this->db->where($array);
        $this->db->group_by('tbl_ppun_pata_f9_1b1c.ppun_pata_f9_1b1c_id');
        $query = $this->db->get();
        //echo $this->db->last_query();     // This will display the query for above sql statement
        $row = $query->result();
        return $row;    
        
    }
    
    
    /**
     * 
     * Super Class  Belanjawan
     * @module      Agihan_model 
     * @metod       get_total_cost_pnpa
     * @description Total cost calculation for pnpa and amount listing for display 
     * @category    Module 
     * @author      Hemantha Wijesinghe
     * @email       hwijesinghe@hotmail.com
     * @link        http://www.onlinedesignstudio.net 
     * @date        09 October 2013
     * 
     * */
    function get_total_cost_pnpa() {

        $array = array('tbl_pspao.idkem' => $this->session->userdata('user_kemid'));
        $this->db->select('SUM(tbl_pnpa_pata_f8_1b1c.f8_1b1c_kos_sumber_man + tbl_pnpa_pata_f8_1b1c.f8_1b1c_kos_alat_kerja + tbl_pnpa_pata_f8_1b1c.f8_1b1c_kos_urus_pej + tbl_pnpa_pata_f8_1b1c.bajet_aktvt) AS total');
        $this->db->from('tbl_pspao');
        $this->db->join('tbl_pnpa', 'tbl_pspao.pspa_id = tbl_pnpa.pspa_id');
        $this->db->join('tbl_pnpa_pata_f8_1b1c', 'tbl_pnpa.pnpa_id = tbl_pnpa_pata_f8_1b1c.pnpa_id');
        $this->db->where($array);
        $query = $this->db->get();
        //echo $this->db->last_query();     // This will display the query for above sql statement
        $row = $query->result();
        return $row;

        /*
          SELECT
          tbl_pspao.pspa_id,
          tbl_pspao.idkem,
          tbl_pnpa.pspa_id,
          tbl_pnpa.idkem,
          tbl_pnpa.pnpa_id,
          tbl_pnpa_pata_f8_1b1c.popa_id,
          tbl_pnpa_pata_f8_1b1c.f9_1b1c_kos_sumber_man,
          tbl_pnpa_pata_f8_1b1c.f9_1b1c_kos_alat_kerja,
          tbl_pnpa_pata_f8_1b1c.f9_1b1c_kos_urus_pej,
          tbl_pnpa_pata_f8_1b1c.bajet_aktvt,
          SUM(tbl_pnpa_pata_f8_1b1c.f9_1b1c_kos_sumber_man + tbl_pnpa_pata_f8_1b1c.f9_1b1c_kos_alat_kerja + tbl_pnpa_pata_f8_1b1c.f9_1b1c_kos_urus_pej + tbl_pnpa_pata_f8_1b1c.bajet_aktvt) AS total
          FROM
          tbl_pspao
          Inner Join tbl_pnpa ON tbl_pspao.pspa_id = tbl_pnpa.pspa_id
          Inner Join tbl_pnpa_pata_f8_1b1c ON tbl_ppun.pnpa_id = tbl_pnpa_pata_f8_1b1c.pnpa_id
          WHERE
          tbl_pspao.idkem =  '4'

         */
    }

    /**
     * 
     * Super Class  Belanjawan
     * @module      Agihan_model 
     * @metod       get_total_cost_ppun_perrow
     * @description Total cost calculation for ppun and amount listing for display per row
     * @category    Module 
     * @author      Hemantha Wijesinghe
     * @email       hwijesinghe@hotmail.com
     * @link        http://www.onlinedesignstudio.net 
     * @date        09 October 2013
     * 
     * */
    function get_total_cost_pnpa_perrow() {

        $array = array('tbl_pspao.idkem' => $this->session->userdata('user_kemid'));
        $this->db->select('tbl_pspao.pspa_id,
          tbl_pspao.idkem,
          tbl_pnpa.pspa_id,
          tbl_pnpa.idkem,
          tbl_pnpa.pnpa_id,
          tbl_pnpa_pata_f8_1b1c.pnpa_id,
          tbl_pnpa_pata_f8_1b1c.f8_1b1c_kos_sumber_man,
          tbl_pnpa_pata_f8_1b1c.f8_1b1c_kos_alat_kerja,
          tbl_pnpa_pata_f8_1b1c.f8_1b1c_kos_urus_pej,
          tbl_pnpa_pata_f8_1b1c.bajet_aktvt,
          SUM(tbl_pnpa_pata_f8_1b1c.f8_1b1c_kos_sumber_man + tbl_pnpa_pata_f8_1b1c.f8_1b1c_kos_alat_kerja + tbl_pnpa_pata_f8_1b1c.f8_1b1c_kos_urus_pej + tbl_pnpa_pata_f8_1b1c.bajet_aktvt) AS total');
        $this->db->from('tbl_pspao');
        $this->db->join('tbl_pnpa', 'tbl_pspao.pspa_id = tbl_pnpa.pspa_id');
        $this->db->join('tbl_pnpa_pata_f8_1b1c', 'tbl_pnpa.pnpa_id = tbl_pnpa_pata_f8_1b1c.pnpa_id');
        $this->db->where($array);
        $this->db->group_by('tbl_pnpa_pata_f8_1b1c.pnpa_pata_f8_1b1c_id');
        $query = $this->db->get();
        //echo $this->db->last_query();     // This will display the query for above sql statement
        $row = $query->result();
        return $row;    
        
    }
    
    
    
    /**
     * 
     * Super Class  Belanjawan
     * @module      Agihan_model 
     * @metod       get_total_cost_pla
     * @description Total cost calculation for pla and amount listing for display 
     * @category    Module 
     * @author      Hemantha Wijesinghe
     * @email       hwijesinghe@hotmail.com
     * @link        http://www.onlinedesignstudio.net 
     * @date        09 October 2013
     * 
     * */
    function get_total_cost_pla() {

        $array = array('tbl_pspao.idkem' => $this->session->userdata('user_kemid'));
        $this->db->select('SUM(tbl_pla_pata_f10_1b1c.f10_1b1c_kos_sumber_man + tbl_pla_pata_f10_1b1c.f10_1b1c_kos_alat_kerja + tbl_pla_pata_f10_1b1c.f10_1b1c_kos_urus_pej + tbl_pla_pata_f10_1b1c.bajet_aktvt) AS total');
        $this->db->from('tbl_pspao');
        $this->db->join('tbl_pla', 'tbl_pspao.pspa_id = tbl_pla.pspa_id');
        $this->db->join('tbl_pla_pata_f10_1b1c', 'tbl_pla.pla_id = tbl_pla_pata_f10_1b1c.pla_id');
        $this->db->where($array);
        $query = $this->db->get();
        //echo $this->db->last_query();     // This will display the query for above sql statement
        $row = $query->result();
        return $row;

        /*
          SELECT
          tbl_pspao.pspa_id,
          tbl_pspao.idkem,
          tbl_pla.pspa_id,
          tbl_pla.idkem,
          tbl_pla.pnpa_id,
          tbl_pla_pata_f8_1b1c.popa_id,
          tbl_pla_pata_f8_1b1c.f10_1b1c_kos_sumber_man,
          tbl_pla_pata_f8_1b1c.f10_1b1c_kos_alat_kerja,
          tbl_pla_pata_f8_1b1c.f10_1b1c_kos_urus_pej,
          tbl_pla_pata_f10_1b1c.bajet_aktvt,
          SUM(tbl_pla_pata_f10_1b1c.f10_1b1c_kos_sumber_man + tbl_pla_pata_f10_1b1c.f10_1b1c_kos_alat_kerja + tbl_pla_pata_f10_1b1c.f10_1b1c_kos_urus_pej + tbl_pla_pata_f10_1b1c.bajet_aktvt) AS total
          FROM
          tbl_pspao
          Inner Join tbl_pla ON tbl_pspao.pspa_id = tbl_pla.pspa_id
          Inner Join tbl_pla_pata_f10_1b1c ON tbl_ppun.pla_id = tbl_pla_pata_f10_1b1c.pla_id
          WHERE
          tbl_pspao.idkem =  '4'

         */
    }

    /**
     * 
     * Super Class  Belanjawan
     * @module      Agihan_model 
     * @metod       get_total_cost_pla_perrow
     * @description Total cost calculation for pla and amount listing for display per row
     * @category    Module 
     * @author      Hemantha Wijesinghe
     * @email       hwijesinghe@hotmail.com
     * @link        http://www.onlinedesignstudio.net 
     * @date        09 October 2013
     * 
     * */
    function get_total_cost_pla_perrow() {

        $array = array('tbl_pspao.idkem' => $this->session->userdata('user_kemid'));
        $this->db->select('tbl_pspao.pspa_id,
          tbl_pspao.idkem,
          tbl_pla.pspa_id,
          tbl_pla.idkem,
          tbl_pla.pla_id,
          tbl_pla_pata_f10_1b1c.pla_id,
          tbl_pla_pata_f10_1b1c.f10_1b1c_kos_sumber_man,
          tbl_pla_pata_f10_1b1c.f10_1b1c_kos_alat_kerja,
          tbl_pla_pata_f10_1b1c.f10_1b1c_kos_urus_pej,
          tbl_pla_pata_f10_1b1c.bajet_aktvt,
          SUM(tbl_pla_pata_f10_1b1c.f10_1b1c_kos_sumber_man + tbl_pla_pata_f10_1b1c.f10_1b1c_kos_alat_kerja + tbl_pla_pata_f10_1b1c.f10_1b1c_kos_urus_pej + tbl_pla_pata_f10_1b1c.bajet_aktvt) AS total');
        $this->db->from('tbl_pspao');
        $this->db->join('tbl_pla', 'tbl_pspao.pspa_id = tbl_pla.pspa_id');
        $this->db->join('tbl_pla_pata_f10_1b1c', 'tbl_pla.pla_id = tbl_pla_pata_f10_1b1c.pla_id');
        $this->db->where($array);
        $this->db->group_by('tbl_pla_pata_f10_1b1c.pla_pata_f10_1b1c_id');
        $query = $this->db->get();
        //echo $this->db->last_query();     // This will display the query for above sql statement
        $row = $query->result();
        return $row;    
        
    }

}

?>
