<?php
defined('BASEPATH') or exit('No direct script access allowed');
require("App.php");
class SubDepartment extends APP_Controller
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
  }
  public function index()
  {
    $this->load->view('sub_department');
  }
  public function addSubDepartment()
  {
    $response = array('status' => 500, 'msg' => 'Some Internal Error');
    $required = ['dept_no', 'sub_department_name'];
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
      $session_id = ($this->session->userdata('logged_session')['id']);
      $dept_no = $this->input->post('dept_no');
      $id = $this->input->post('id');
      $sub_dept_name = $this->input->post('sub_department_name');
      $dataStatus = 'New';
      if (isset($id) && !empty($id)) {
        $dataStatus = 'Update';
        $this->db->where('id', $id);
        $this->db->update(
          'sub_department',
          array('sub_department_name' => $sub_dept_name, 'dept_no' => $dept_no, 'updated_by' => $session_id),
        );
      } else {
        $this->db->insert('sub_department', array('sub_department_name' => $sub_dept_name, 'dept_no' => $dept_no, 'created_by' => $session_id));
      }


      if ($this->db->affected_rows() > 0) {
        $disp_msg = "Data Added Sucessfully";
        if ($dataStatus != "New") {
          $disp_msg = "Data Updated Sucessfully";
        }
        $response = array('status' => 200, 'msg' => $disp_msg);
      }
    }
    echo json_encode($response);
  }
  public function getAllSubDepartment()
  {
    $data['subdepartmentdata'] = $this->SubDepartment_model->getAllSubDepartmentData();
    $this->load->view('sub_department_data', $data);
  }

  public function getSubDepartmentModal($value = '')
  {
    if ($this->input->is_ajax_request()) {

      $id = $this->input->post('id');
      $sub_department_data = [];
      if (!empty($id)) {
        $sub_department_data = $this->SubDepartment_model->getSubDepartmentDataById($id);
      }
      $data['departmentdata'] = $this->Department_model->getAllDepartmentData();
      $data['sub_department_data'] = $sub_department_data;
      $this->load->view('sub_department_add_modal', $data);
    }
  }

  public function deleteSubDepatmentData($value = '')
  {
    $response = array('status' => 500, 'msg' => 'Some Internal Error');
    $id = $this->input->post('id');
    if (!empty($id)) {
      $session_id = ($this->session->userdata('logged_session')['id']);
      $this->db->where('id', $id);
      $this->db->update(
        'sub_department',
        array('is_deleted' => 1, 'updated_by' => $session_id),
      );
      $response = array('status' => 200, 'msg' => 'Data Deleted Sucessfully');
    }
    echo json_encode($response);
  }
}
