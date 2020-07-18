<?php

function is_loged_in()
{
  $taji = get_instance();
  if (!$taji->session->userdata('email')) {
    redirect('auth');
  } else {
    $role_id = $taji->session->userdata('role_id');
    $menu = $taji->uri->segment(1);

    $queryMenu = $taji->db->get_where('user_menu', ['url' => $menu])->row_array();

    $menu_id = $queryMenu['menu_id'];

    $userAccess = $taji->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

    if ($userAccess->num_rows() < 1) {
      redirect('auth/blocked');
    }
  }
}
