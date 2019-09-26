<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        // $this->load->library('custom_function');
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('back_office/login');
        }
    }


    public function index()
    {
        $data['header']    = $this->load->view('templates_bo/topbar', null, TRUE);
        $data['sidebar']   = $this->load->view('templates_bo/sidebar', null, TRUE);
        $data['footer']    = $this->load->view('templates_bo/footer', null, TRUE);
        $this->load->view('banner/v_banner', $data);
    }

    function get_all_banner()
    {
        $this->db->where('status !=', "D");
        $result = $this->db->get('banner')->result_array();
        $json = array();
        $no = 1;
        foreach ($result as $row) {
            $data['no']             = $no;
            $data['banner_id']      = $row['banner_id'];
            $data['nama_banner']    = $row['nama_banner'];
            $data['image']          = $row['image'];
            $data['status']         = ($row['status'] == "Y") ? "Aktif" : "Non AKtif";
            $no++;
            $json[] = $data;
        }
        header('Content-Type: application/json');
        $jTableResult = array();
        $jTableResult['Result'] = "sukses";
        $jTableResult['data'] = $json;
        print json_encode($jTableResult);
    }

    public function modalbanner()
    {
        $this->load->view('modal/banner', null, FALSE);
    }

    public function modal_update_banner($id)
    {
        $this->db->where('banner_id', $id);
        $banner = $this->db->get('banner')->row();
        $data['banner']    = $banner;
        $this->load->view('modal/banner', $data, FALSE);
    }

    public function create_banner()
    {
        $nama_banner = $this->input->post('nama_banner');
        $status = $this->input->post('status');
        $iduser = $this->session->userdata('user_id');

        $config['upload_path'] = './assets/images/banner/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size']  = '10476717';
        $config['file_name']     = $this->input->post('image') . '-' . date('YmdHis');
        $this->load->library('upload', $config);
        // script upload file pertama
        if (!$this->upload->do_upload('image')) {
            $data = array("status" => FALSE, 'msg' => 'gagal melakukan upload gambar');
            echo json_encode($data);
        } else {
            $config2['image_library']  = 'gd2';
            $config2['source_image']   = $this->upload->upload_path . $this->upload->file_name;
            $config['create_thumb']    = TRUE;
            $config['maintain_ratio']  = TRUE;
            $config['overwrite']       = TRUE;
            $config2['width']          = 1920;
            $config2['height']         = 950;

            $this->load->library('image_lib', $config2);
            $this->image_lib->resize();
            $this->upload->data();

            $data = array(
                'nama_banner' => $nama_banner,
                'status' => $status,
                'image' => implode('', explode('./', $config['upload_path'])) . $this->upload->file_name,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $iduser
            );
            $this->db->insert('banner', $data);
            $this->db->insert_id();
            echo json_encode(array("status" => TRUE, 'msg' => 'Insert Data Banner Berhasil'));
        }
    }

    public function update_banner()
    {
        $id = $this->input->post('banner_id');
        $nama_banner = $this->input->post('nama_banner');
        $status = $this->input->post('status');
        $iduser = $this->session->userdata('user_id');

        $config['upload_path'] = './assets/images/banner/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size']  = '10476717';
        $config['file_name']     = $this->input->post('image') . '-' . date('YmdHis');
        $this->load->library('upload', $config);
        // script upload file pertama
        $this->upload->do_upload('image');
        $foto = $this->upload->data();
        $config2['image_library']  = 'gd2';
        $config2['source_image']   = $this->upload->upload_path . $this->upload->file_name;
        $config['create_thumb']    = TRUE;
        $config['maintain_ratio']  = TRUE;
        $config['overwrite']       = TRUE;
        $config2['width']          = 1920;
        $config2['height']         = 950;
        $this->load->library('image_lib', $config2);
        $this->image_lib->resize();
        $this->upload->data();

        $size = $foto['file_size'];
        if ($size == NULL) {
            $foto1 = NULL;
        } else {
            $foto1 = $foto['file_name'];
        }

        if ($foto1 != NULL) {
            $this->db->where('banner_id', $id);
            $a = $this->db->get('banner')->row();
            if ($a->image != NULL) {
                unlink($a->image);
            }
            $data = array(
                'nama_banner' => $nama_banner,
                'status' => $status,
                'image' => implode('', explode('./', $config['upload_path'])) . $this->upload->file_name,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $iduser
            );
        } else {
            $data = array(
                'nama_banner' => $nama_banner,
                'status' => $status,
                'status' => $status,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $iduser
            );
        }
        $this->db->where('banner_id', $id);
        $this->db->update('banner', $data);
        echo json_encode(array("status" => TRUE, 'msg' => 'Update Data Banner Berhasil'));
    }

    public function delete_banner($id)
    {
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'status'     => "D",
            'updated_by' => $iduser,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('banner_id', $id);
        $this->db->update('banner', $data);
        echo json_encode(array("status" => TRUE));
    }
}

/* End of file Home.php */
