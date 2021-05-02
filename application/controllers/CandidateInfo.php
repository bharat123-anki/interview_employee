<?php
defined('BASEPATH') or exit('No direct script access allowed');
require("App.php");
class CandidateInfo extends APP_Controller
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
    $this->load->view('candidate');
  }
  public function getAllCandidateInfo()
  {
    if ($this->input->is_ajax_request()) {
      $data['candidateInfo'] = $this->CandidateInfo_model->getAllCandidateInfoData();
      $this->load->view('candidate_data', $data);
    }
  }

  public function getCandidateAddModal($value = '')
  {
    if ($this->input->is_ajax_request()) {

      $id = $this->input->post('id');
      $candidate_data = [];
      $sub_dept_data = [];
      if (!empty($id)) {
        $candidate_data = $this->CandidateInfo_model->getCandidateDataById($id);
        $dept_id = ($candidate_data['dept_no']);
        $sub_dept_data = $this->SubDepartment_model->getSubDepartmentDataBydeptId($dept_id);
      }
      $data['departmentdata'] = $this->Department_model->getAllDepartmentData();
      $data['candidate_data'] = $candidate_data;
      $data['sub_dept_data'] = $sub_dept_data;
      $this->load->view('candidate_add_modal', $data);
    }
  }
  public function getCandidateSubDeprtmentOnDeptChange($value = '')
  {
    if ($this->input->is_ajax_request()) {
      $dept_id = $this->input->post('dept_id');
      $data['subdepartmentdata'] = $this->SubDepartment_model->getSubDepartmentDataBydeptId($dept_id);
      $this->load->view('dependend_sub_department_data', $data);
    }
  }

  public function candidateAdd()
  {
    $response = array('status' => 500, 'msg' => 'Some Internal Error');
    $required = ['name', 'dept_no', 'sub_dept_no'];
    $all_good = 1;
    foreach ($required as $key => $val) {
      if (empty($_POST[$val])) {
        $response = ['status' => 201, 'field' => $val, 'msg' => 'Field Is Required'];
        $all_good = 0;
        echo json_encode($response);
        exit;
      }
    }
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $dept_no = $this->input->post('dept_no');
    $sub_dept_no = $this->input->post('sub_dept_no');
    $session_id = ($this->session->userdata('logged_session')['id']);
    $type = "New";
    if (isset($id) && !empty($id)) {
      $type = "Update";
    }
    $image_path = "";
    if (!empty($_FILES['candidate_image']['name'])) {

      $config['upload_path']          = './uploads/candidate_images/';
      $config['allowed_types']        = 'jpg|png|jpeg';
      $config['max_size']             = 1000;
      $config['max_width']            = 2000;
      $config['max_height']           = 2000;

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('candidate_image')) {
        $response = ['status' => 203, 'field' => $val, 'msg' => $this->upload->display_errors()];
        echo json_encode($response);
        exit;
      } else {
        $path = $this->upload->data('file_name');
        $image_path = $path;
      }
    }

    if ($type == "New") {
      $this->db->insert('candidate_info', array('name' => $name, 'dept_no' => $dept_no, 'sub_department_id' => $sub_dept_no, 'candidate_image_path' => $image_path, 'created_by' => $session_id));
    } else {
      // for image manipulation
      $existing_user = $this->CandidateInfo_model->getCandidateDataById($id);
      $image_path_existing = ($existing_user['candidate_image_path']);
      if (empty($image_path)) {
        $image_path_to_update = $image_path_existing;
      } else {
        $image_path_to_update = $image_path;
        if (!empty($image_path_existing)) {
          $path = FCPATH . 'uploads/candidate_images/';
          $file_name = $path . $image_path_existing;
          unlink($file_name);
        }
      }
      $this->db->where('id', $id);
      $this->db->update('candidate_info', array('name' => $name, 'dept_no' => $dept_no, 'sub_department_id' => $sub_dept_no, 'candidate_image_path' => $image_path_to_update, 'updated_by' => $session_id));
    }

    if ($this->db->affected_rows() > 0) {
      $disp_msg = "Data Added Sucessfully";
      if ($type != "New") {
        $disp_msg = "Data Updated Sucessfully";
      }
      $response = array('status' => 200, 'msg' => $disp_msg);
    }

    echo json_encode($response);
  }
  public function deleteCandidateData($value = '')
  {
    $response = array('status' => 500, 'msg' => 'Some Internal Error');
    $id = $this->input->post('id');
    if (!empty($id)) {
      $session_id = ($this->session->userdata('logged_session')['id']);
      $this->db->where('id', $id);
      $this->db->update(
        'candidate_info',
        array('is_deleted' => 1, 'updated_by' => $session_id),
      );
      $response = array('status' => 200, 'msg' => 'Data Deleted Sucessfully');
    }
    echo json_encode($response);
  }
}
