<?php
defined('BASEPATH') or exit('No direct script access allowed');
include('Super.php');

class Nilai extends Super
{

    function __construct()
    {
        parent::__construct();
        $this->language       = 'english';
        /** Indonesian / english **/
        $this->tema           = "flexigrid";
        /** datatables / flexigrid **/
        $this->tabel          = "nilai_karyawan";
        $this->active_id_menu = "nilai_karyawan";
        $this->nama_view      = "Nilai Karayawan";
        $this->status         = true;
        $this->field_tambah   = array();
        $this->field_edit     = array();
        $this->field_tampil   = array();
        $this->folder_upload  = 'assets/uploads/files';
        $this->add            = true;
        $this->edit           = true;
        $this->delete         = true;
        $this->crud;
    }

    function index()
    {
        $data = [];
        /** Bagian GROCERY CRUD USER**/


        /** Relasi Antar Tabel 
         * @parameter (nama_field_ditabel_ini, tabel_relasi, field_dari_tabel_relasinya)
         **/
        $this->crud->set_relation('id_karyawan', 'karyawan', 'nama');

        /** Upload **/
        // $this->crud->set_field_upload('nama_field_upload',$this->folder_upload);  

        /** Ubah Nama yang akan ditampilkan**/
        // $this->crud->display_as('nama','Nama Setelah di Edit')
        //     ->display_as('email','Email Setelah di Edit'); 
        $this->crud->display_as('id_karyawan', 'Pilih Karyawan');

        /** Akhir Bagian GROCERY CRUD Edit Oleh User**/
        $data = array_merge($data, $this->generateBreadcumbs());
        $data = array_merge($data, $this->generateData());
        $this->generate();
        $data['output'] = $this->crud->render();
        $this->load->view('admin/' . $this->session->userdata('theme') . '/v_index', $data);
    }

    private function generateBreadcumbs()
    {
        $data['breadcumbs'] = array(
            array(
                'nama' => 'Dashboard',
                'icon' => 'fa fa-dashboard',
                'url' => 'admin/dashboard'
            ),
            array(
                'nama' => 'Admin',
                'icon' => 'fa fa-users',
                'url' => 'admin/useradmin'
            ),
        );
        return $data;
    }
}
