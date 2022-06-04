<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{

    function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        parent::__construct();
        set_timezone("Asia/Jayapura");
    }

    public function index()
    {
        echo "[status: true: response: []]";
        return TRUE;
    }

    public function getNotifikasi()
    {
        $this->load->model("Notifikasi_view_model");
        $result = $this->Notifikasi_view_model->get_hari_ini();
        echo json_encode($result);
        return TRUE;
    }

    public function setTerkirim()
    {
        $this->load->model("Jadwal_model");
        $data = [
            'terkirim' => "1"
        ];
        $this->Jadwal_model->update($this->input->post("kode_jadwal"), $data);
        echo "[status: true: response: []]";
    }
    public function input_tentang_action()
    {
        $tentang = $this->input->post('tentang');

        $config['upload_path'] = './assets/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']  = '1239501';
        $config['max_width']  = '100204';
        $config['max_height']  = '700068';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('img')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->library('session');
            $this->session->set_flashdata('msg', $error['error']);
            redirect(base_url('admin/Dashboard/input_tentang'));
        } else {
            $this->upload->data('file_name');
            $foto = $this->upload->data();
            $foto = $foto['file_name'];
            $data = array(
                'img' => $foto,
                'tentang' => $tentang
            );
            $this->db->empty_table('upload_tentang');
            $this->db->insert('upload_tentang', $data);
            $this->session->set_flashdata('msg', 'Upload Success');
            redirect(base_url('admin/Dashboard/input_tentang'));
        }
    }
    public function getTime()
    {
        echo json_encode(array('time'=>strtotime("+2 hours")));
    }
}
