<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Business extends CI_Controller
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
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }
        $data['permit'] = $this->businessModel->business();

        $data['title'] = 'Barangay Business Clearance';
        $this->base->load('default', 'business/resident_business', $data);
    }

    public function create_permit()
    {

        $validator = array('success' => false, 'msg' => array());

        $this->form_validation->set_rules('name', 'Business Name', 'required|trim');
        $this->form_validation->set_rules('owner1', 'Business Owner', 'required');
        $this->form_validation->set_rules('number', 'Business Number', 'required');
        $this->form_validation->set_rules('applied', 'Date Applied', 'required');
        $this->form_validation->set_rules('expired', 'Date Expired', 'required');
        $this->form_validation->set_rules('nature', 'Business Nature', 'required');
        $this->form_validation->set_rules('status', 'Permit Status', 'required');
        $this->form_validation->set_rules('baddress', 'Business Address', 'required');
        $this->form_validation->set_rules('oaddress', 'Owners Address', 'required');

        if ($this->form_validation->run() == FALSE) {

            $validator['success'] = false;
            $validator['msg'] = validation_errors();
        } else {
            $data = array(
                'b_name' => $this->input->post('name'),
                'owner1' => $this->input->post('owner1'),
                'nature' => $this->input->post('nature'),
                'status' => $this->input->post('status'),
                'expiration_date' => $this->input->post('expired'),
                'number' => $this->input->post('number'),
                'b_address' => $this->input->post('baddress'),
                'o_address' => $this->input->post('oaddress'),
                'remarks' => $this->input->post('remarks'),
                'created_at' => $this->input->post('applied'),
            );

            $insert = $this->businessModel->save($data);

            if ($insert) {
                $log = array(
                    'activity' => 'Business permit created: ' . $this->input->post('name'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $validator['success'] = true;
                $validator['msg'] = 'Business Permit has been created!';
            } else {
                $validator['success'] = false;
                $validator['msg'] = 'Something went wrong. Please contact the administrator';
            }
        }

        echo json_encode($validator);
    }

    public function update_permit()
    {

        $validator = array('success' => false, 'msg' => array());

        $this->form_validation->set_rules('name', 'Business Name', 'required|trim');
        $this->form_validation->set_rules('owner1', 'Business Owner', 'required');
        $this->form_validation->set_rules('number', 'Business Number', 'required');
        $this->form_validation->set_rules('applied', 'Date Applied', 'required');
        $this->form_validation->set_rules('expired', 'Date Expired', 'required');
        $this->form_validation->set_rules('nature', 'Business Nature', 'required');
        $this->form_validation->set_rules('status', 'Permit Status', 'required');
        $this->form_validation->set_rules('baddress', 'Business Address', 'required');
        $this->form_validation->set_rules('oaddress', 'Owners Address', 'required');

        if ($this->form_validation->run() == FALSE) {

            $validator['success'] = false;
            $validator['msg'] = validation_errors();
        } else {
            $data = array(
                'b_name' => $this->input->post('name'),
                'owner1' => $this->input->post('owner1'),
                'nature' => $this->input->post('nature'),
                'status' => $this->input->post('status'),
                'expiration_date' => $this->input->post('expired'),
                'number' => $this->input->post('number'),
                'b_address' => $this->input->post('baddress'),
                'o_address' => $this->input->post('oaddress'),
                'remarks' => $this->input->post('remarks'),
                'created_at' => $this->input->post('applied'),
            );
            $id = $this->input->post('id');

            $update = $this->businessModel->update($data, $id);

            if ($update) {

                $log = array(
                    'activity' => 'Business permit updated: ' . $this->input->post('name'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $validator['success'] = true;
                $validator['msg'] = 'Business Permit has been updated!';
            } else {
                $validator['success'] = false;
                $validator['msg'] = 'No changes has been made!';
            }
        }

        echo json_encode($validator);
    }

    public function generate_b_permit($id)
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }

        $data['permit'] = $this->businessModel->getBusiness($id);
        $data['info'] = $this->settingsModel->brgy_info();
        $data['kagawad'] = $this->officialsModel->getkagawadOfficial();
        $data['selected_off'] = $this->officialsModel->getselectedOfficial();
        $data['captain'] = $this->officialsModel->getCaptain();

        $data['title'] = 'Business Clearance';
        $this->certificate_layout->load('certificate', 'business/generate_permit', $data);
    }

    public function delete($id)
    {

        $delete = $this->businessModel->delete($id);

        if ($delete) {

            $log = array(
                'activity' => 'Business permit deleted: ' . $id,
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('errors', 'Business Permit has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect('business', 'refresh');
    }
}
