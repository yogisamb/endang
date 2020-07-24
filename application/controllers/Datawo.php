<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datawo extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_loged_in();
  }

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
    $data['title'] = 'Data WO';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['weddingorganizer'] = $this->db->get('data_wo')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('datawo/index', $data);
    $this->load->view('template/footer');
  }

  public function tambahwo()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('telp', 'Telp', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['title'] = 'Data WO';
      $this->load->view('template/header', $data);
      $this->load->view('datawo/tambahwo', $data);
      $this->load->view('template/footer');
    } else {
      $input = $this->input->post(NULL, TRUE);
      // cek jika ada gambar
      $upload_image = $_FILES['image']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['upload_path']   = './assets/image/wo_profile/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar tidak ada!</div>');
      }
      $data = [
        'nama_wo' => $input['nama'],
        'alamat_wo' => $input['alamat'],
        'telp_wo' => $input['telp'],
      ];
      $this->db->insert('data_wo', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! New Pasien created!</div>');
      redirect('datawo');
    }
  }

  public function editwo($id_wo)
  {
    $data['title'] = 'Data WO';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['wo'] = $this->db->where('id_wo =', $id_wo);
    $data['wo'] = $this->db->get('data_wo')->row_array();

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('telp', 'Telp', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('datawo/editwo', $data);
      $this->load->view('template/footer');
    } else {
      // cek jika ada gambar
      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['upload_path']   = './assets/image/wo_profile/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $old_image = $data['wo']['image'];
          unlink(FCPATH . './assets/image/wo_profile/' . $old_image);

          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $input = $this->input->post(NULL, TRUE);
      $data = [
        'nama_wo' => $input['nama'],
        'alamat_wo' => $input['alamat'],
        'telp_wo' => $input['telp'],
      ];
      $this->db->where('id_wo =', $id_wo);
      $this->db->update('data_wo', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has ben updated!</div>');
      redirect('datawo');
    }
  }

  public function layananwo($id_wo)
  {
    $data['title'] = 'Data WO';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['layananwo'] = $this->db->where('id_wo =', $id_wo);
    $data['layananwo'] = $this->db->get('layanan_wo')->result_array();

    $data['wo'] = $this->db->where('id_wo =', $id_wo);
    $data['wo'] = $this->db->get('data_wo')->row_array();

    $this->load->view('template/header', $data);
    $this->load->view('datawo/layananwo', $data);
    $this->load->view('template/footer');
  }

  public function tambahlayananwo($id_wo)
  {
    $data['wo'] = $this->db->where('id_wo =', $id_wo);
    $data['wo'] = $this->db->get('data_wo')->row_array();

    $this->form_validation->set_rules('layanan', 'Layanan', 'required');
    $this->form_validation->set_rules('detail', 'Detail', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
    $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['title'] = 'Data WO';
      $this->load->view('template/header', $data);
      $this->load->view('datawo/tambahlayananwo', $data);
      $this->load->view('template/footer');
    } else {
      $input = $this->input->post(NULL, TRUE);
      $data = [
        'id_wo' => $id_wo,
        'layanan' => $input['layanan'],
        'harga' => $input['harga'],
        'detail' => $input['detail'],
        'kapasitas' => $input['kapasitas']
      ];
      $this->db->insert('layanan_wo', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Layanan WO sudah ditambah!</div>');
      redirect('datawo/layananwo/' . $id_wo);
    }
  }

  public function editlayananwo($id_layanan_wo)
  {
    $data['lwo'] = $this->db->where('id_layanan_wo =', $id_layanan_wo);
    $data['lwo'] = $this->db->get('layanan_wo')->row_array();
    $this->form_validation->set_rules('layanan', 'Layanan', 'required');
    $this->form_validation->set_rules('detail', 'Detail', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
    $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['title'] = 'Data WO';
      $this->load->view('template/header', $data);
      $this->load->view('datawo/editlayananwo', $data);
      $this->load->view('template/footer');
    } else {
      $input = $this->input->post(NULL, TRUE);

      $data = [
        'id_wo' => $data['lwo']['id_wo'],
        'layanan' => $input['layanan'],
        'harga' => $input['harga'],
        'detail' => $input['detail'],
        'kapasitas' => $input['kapasitas']
      ];
      $this->db->where('id_layanan_wo =', $id_layanan_wo);
      $this->db->update('layanan_wo', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Layanan WO sudah ditambah!</div>');
      $lwo = $this->db->where('id_layanan_wo =', $id_layanan_wo);
      $lwo = $this->db->get('layanan_wo')->row_array();
      redirect('datawo/layananwo/' . $lwo['id_wo']);
    }
  }

  public function hapuslayananwo($id_layanan_wo)
  {
    $lwo = $this->db->where('id_layanan_wo =', $id_layanan_wo);
    $lwo = $this->db->get('layanan_wo')->row_array();
    $this->db->where('id_layanan_wo', $id_layanan_wo);
    $this->db->delete('layanan_wo');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Layanan WO sudah dihapus!</div>');
    redirect('datawo/layananwo/' . $lwo['id_wo']);
  }
}
