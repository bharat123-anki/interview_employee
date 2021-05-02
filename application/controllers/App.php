<?php
defined('BASEPATH') or exit('No direct script access allowed');


class APP_Controller extends CI_Controller
{


  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *       http://example.com/index.php/welcome
   *   - or -
   *       http://example.com/index.php/welcome/index
   *   - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */


  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('logged_session'))) {
      $this->logout();
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('logged_session');
    redirect('/Welcome');
  }
}
