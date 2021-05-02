<?php
defined('BASEPATH') or exit('No direct script access allowed');
require("App.php");
class Department extends APP_Controller
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

    $this->load->view('department');
  }
  public function addDepartment()
  {
    $response = array('status' => 500, 'msg' => 'Some Internal Error');
    $dept_name = $this->input->post('department_name');
    if (empty($dept_name)) {
      $response = array('status' => 201, 'msg' => 'Department Name Cannot Be Empty');
    } else {
      $this->db->insert('department', array('dept_name' => $dept_name));
      if ($this->db->affected_rows() > 0) {
        $response = array('status' => 200, 'msg' => 'Department Added Sucessfully');
      }
    }
    echo json_encode($response);
  }
  public function getAllDepartment()
  {
    $data['department_data'] = $this->Department_model->getAllDepartmentData();
    $this->load->view('department_data', $data);
  }
}
