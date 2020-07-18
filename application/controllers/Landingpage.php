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
    if ($this->form_validation->run() == false) {
      $data['layanan'] = $this->db->get('layanan_wo')->result_array();
      $this->load->view('landingpage/index', $data);
    } else {
      $input = $this->input->post(NULL, TRUE);
      $data['layanan'] = $this->db->where('harga <=', $input['harga']);
      $data['layanan'] = $this->db->get('layanan_wo')->result_array();
      $this->load->view('landingpage/index', $data);
    }
  }
}
