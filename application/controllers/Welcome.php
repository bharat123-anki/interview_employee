<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
  }
  public function index()
  {
    $this->load->view('login');
  }
  public function checkEmailUser()
  {

    if ($this->input->is_ajax_request()) {
      $response = array('status' => 500, 'msg' => 'Some Internal Error');
      $email =  $this->input->post('email');
      if (empty($email)) {
        $response = array('status' => 201, 'msg' => 'Email Field Is Required','field'=>'email');
      } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = array('status' => 202, 'msg' => 'Invalid Email');
      } else {
        $this->load->model('User_model');
        $return_query = $this->User_model->checkEmailAddress($email);
          $this->session->set_tempdata('user_email', $email , 900);
        if (empty($return_query)) {
          $response = array('status' => 203, 'msg' => 'Email Does Not Exist In System You Will Redirect Shortly In Signup Page');
        } else {
          $response = array('status' => 200, 'msg' => 'Success Email... You Will Redirect Shortly', 'data' => $return_query);
        }
      }
      echo json_encode($response);
    }
  }
  public function getPasswordPage()
  {
    if (!empty($this->session->tempdata('user_email'))) {
      $this->load->view('login_password');
    } else {
      $this->index();
    }
  }
  public function checkEmailPassword()
  {
    if ($this->input->is_ajax_request()) {
      $response = array('status' => 500, 'msg' => 'Internal Error');
      $password =  $this->input->post('password');
      $email = $this->session->tempdata('user_email');
      if (empty($email)) {
        $response = array('status' => 404, 'msg' => 'Session Expired');
      } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = array('status' => 500, 'msg' => 'Internal Error');
      } else if (empty($password)) {
        $response = array('status' => 201, 'msg' => 'Please Enter Password');
      } else {
        $this->load->model('User_model');
        $return_query = $this->User_model->checkEmailAndPassword($email, $password);
        if (empty($return_query)) {
          $response = array('status' => 203, 'msg' => 'Password Does Not Match Our System...');
        } else {
          $response = array('status' => 200, 'msg' => 'Success... You will Be Redirected To Dashboard Shortly', 'data' => $return_query);
          $data = $return_query;
          $this->session->set_userdata('logged_session', $data);
        }
      }
      echo json_encode($response);
    }
  }

  public function logout($value = '')
  {
    $this->session->unset_userdata('logged_session');
    $this->load->view('login');
  }
}
