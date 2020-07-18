<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardadmin extends CI_Controller
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
    $data['title'] = 'Dashboard Admin';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['admin'] = $this->db->where('role_id =', '2');
    $data['admin'] = $this->db->get('user')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('dashboardadmin/index', $data);
    $this->load->view('template/footer');
  }

  public function tambahadmin()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'This email has already registered!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password1]', [
      'matches' => 'Password not Match!',
      'min_length' => 'Password too short'
    ]);
    $this->form_validation->set_rules('password1', 'Password1', 'required|trim|matches[password]');

    if ($this->form_validation->run() == false) {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['title'] = 'Dashboard Admin';
      $this->load->view('template/header', $data);
      $this->load->view('dashboardadmin/tambahadmin', $data);
      $this->load->view('template/footer');
    } else {
      $email = $this->input->post('email', true);
      $data = [
        'username' => htmlspecialchars($this->input->post('username', true)),
        'email' => htmlspecialchars($email),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'image' => 'default.png',
        'role_id' => 2,
        'is_active' => 1,
        'date_created' => time()
      ];

      $this->db->insert('user', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your Account has been created!</div>');
      redirect('dashboardadmin');
    }
  }

  public function turnon($id)
  {
    $data = [
      'is_active' => '1'
    ];

    $this->db->where('id', $id);
    $this->db->update('user', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has been edit!</div>');
    redirect('dashboardadmin');
  }

  public function turnoff($id)
  {
    $data = [
      'is_active' => '0'
    ];

    $this->db->where('id', $id);
    $this->db->update('user', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has been edit!</div>');
    redirect('dashboardadmin');
  }

  public function changepassword()
  {
    $data['title'] = 'Dashboard Admin';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('currentpassword', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('newpassword1', 'New Password', 'required|trim|min_length[3]|matches[newpassword2]');
    $this->form_validation->set_rules('newpassword2', ' Confirm New Password', 'required|trim|min_length[3]|matches[newpassword1]');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('dashboardadmin/index', $data);
      $this->load->view('template/footer');
    } else {
      $curent_password = $this->input->post('currentpassword');
      $new_password = $this->input->post('newpassword1');
      if (!password_verify($curent_password, $data['user']['password'])) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password!</div>');
        redirect('dashboardadmin/changepassword');
      } else {
        if ($curent_password == $new_password) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password cannot be the same as current password!</div>');
          redirect('dashboardadmin/changepassword');
        } else {
          // pasword oke
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('user');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pasword Change!</div>');
          redirect('dashboardadmin');
        }
      }
    }
  }
}
