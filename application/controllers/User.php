<?php
defined('BASEPATH') or exit('No direct script access allowed');
require("App.php");
class User extends CI_Controller
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
    $this->load->model('Department_model');
    $this->load->model('SubDepartment_model');
    $this->load->model('CandidateInfo_model');
  }
  public function index()
  {
    if(!empty($this->session->tempdata('user_email'))){
      $this->load->view('add_user');
    }else{
      redirect('/');
    }
  }

  public function add($value = '')
  {
    $response = array('status' => 500, 'msg' => 'Some Internal Error');
    $required = ['name', 'email', 'password'];
    $all_good = 1;
    foreach ($required as $key => $val) {
      if (empty($_POST[$val])) {
        $response = ['status' => 201, 'field' => $val, 'msg' => 'Field Is Required'];
        $all_good = 0;
        echo json_encode($response);
        exit;
      }
    }
    if ($all_good) {
      $name = $this->input->post('name');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $dataStatus = 'New';
      if (isset($id) && !empty($id)) {
        $dataStatus = 'Update';
      } else {
        $this->db->insert('users', array('name' => $name, 'email' => $email, 'password' => md5($password)));
      }


      if ($this->db->affected_rows() > 0) {
        $disp_msg = "Data Added Sucessfully You Will Redirect To Login Page Shortly";
        if ($dataStatus != "New") {
          $disp_msg = "Data Updated Sucessfully";
        }
        $response = array('status' => 200, 'msg' => $disp_msg);
      }
    }
    echo json_encode($response);
  }
}
