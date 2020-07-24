<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
{

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
    $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
    $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim');
    if ($this->form_validation->run() == false) {
      $data['filter'] = "Belum ada filter Harga";
      $data['filter2'] = "Belum ada filter Kapasitas";
      $data['layanan'] = $this->db->get('layanan_wo')->result_array();
      $this->load->view('landingpage/index', $data);
    } else {
      $input = $this->input->post(NULL, TRUE);

      if ($input['harga'] == "a") {
        if ($input['kapasitas'] == "a") {
          $data['filter'] = "Belum ada filter Harga";
          $data['filter2'] = "Belum ada filter Kapasitas";
          $data['layanan'] = $this->db->get('layanan_wo')->result_array();
          $this->load->view('landingpage/index', $data);
        } else {
          $kapasitas = $this->db->where('id_filter =', $input['kapasitas']);
          $kapasitas = $this->db->get('filter_2')->row_array();

          $data['filter'] = "tidak ada filter harga";
          $data['filter2'] = $kapasitas['nama_filter'];
          $data['layanan'] = $this->db->where('kapasitas =', $kapasitas['kapasitas']);
          $data['layanan'] = $this->db->get('layanan_wo')->result_array();
          $this->load->view('landingpage/index', $data);
        }
      } else {
        if ($input['kapasitas'] == "a") {
          $harga = $this->db->where('id_filter =', $input['harga']);
          $harga = $this->db->get('filterwo')->row_array();

          $data['filter'] = $harga['nama_filter'];
          $data['filter2'] = "tidak ada filter kapasitas";
          $data['layanan'] = $this->db->where('harga <=', $harga['batas_atas']);
          $data['layanan'] = $this->db->where('harga >=', $harga['batas_bawah']);
          $data['layanan'] = $this->db->get('layanan_wo')->result_array();
          $this->load->view('landingpage/index', $data);
        } else {
          $harga = $this->db->where('id_filter =', $input['harga']);
          $harga = $this->db->get('filterwo')->row_array();
          $kapasitas = $this->db->where('id_filter =', $input['kapasitas']);
          $kapasitas = $this->db->get('filter_2')->row_array();

          $data['filter'] = $harga['nama_filter'];
          $data['filter2'] = $kapasitas['nama_filter'];
          $data['layanan'] = $this->db->where('harga <=', $harga['batas_atas']);
          $data['layanan'] = $this->db->where('harga >=', $harga['batas_bawah']);
          $data['layanan'] = $this->db->where('kapasitas =', $kapasitas['kapasitas']);
          $data['layanan'] = $this->db->get('layanan_wo')->result_array();
          $this->load->view('landingpage/index', $data);
        }
      }
    }
  }
}
