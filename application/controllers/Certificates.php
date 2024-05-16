<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Certificates extends CI_Controller
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

        $data['certs'] = $this->certificateModel->getCerts();

        $data['title'] = 'Manage Certificates';
        $this->base->load('default', 'certs/certificates', $data);
    }

    public function create_certificates()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }

        $data['title'] = 'Create Certificate';
        $this->base->load('default', 'certs/create_certs', $data);
    }

    public function edit_certificate($id)
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }
        $data['cert'] = $this->certificateModel->getCertinfo($id);

        $data['title'] = 'Edit Certificate';
        $this->base->load('default', 'certs/edit_certs', $data);
    }

    public function save_cert()
    {

        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('title', 'Certificate Title', 'required|trim');
        $this->form_validation->set_rules('salutation', 'Certificate Salutation', 'required|trim');
        $this->form_validation->set_rules('message', 'Certificate Content', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            if (empty($this->input->post('profileimg')) && !$this->upload->do_upload('img')) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'salutation' => $this->input->post('salutation'),
                    'content' => $this->input->post('message'),
                    'user' => $this->session->username,
                );
            } elseif (!empty($this->input->post('profileimg')) && !$this->upload->do_upload('img')) {
                $data = array(
                    'pic' => $this->input->post('profileimg'),
                    'title' => $this->input->post('title'),
                    'salutation' => $this->input->post('salutation'),
                    'content' => $this->input->post('message'),
                    'user' => $this->session->username,
                );
            } else {
                $file = $this->upload->data();
                //Resize and Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/uploads/' . $file['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['new_image'] = 'assets/uploads/' . $file['file_name'];

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = array(
                    'pic' => $file['file_name'],
                    'title' => $this->input->post('title'),
                    'salutation' => $this->input->post('salutation'),
                    'content' => $this->input->post('message'),
                    'user' => $this->session->username,
                );
            }

            $insert = $this->certificateModel->save($data);

            if ($insert) {

                $log = array(
                    'activity' => 'Certificate created: ' . $this->input->post('title'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Certificate has been created!');
            } else {
                $this->session->set_flashdata('errors', 'Certificate not created!');
            }
        }

        redirect("create_certificates", 'refresh');
    }

    public function update_cert()
    {
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $id = $this->input->post('id');
        $this->form_validation->set_rules('title', 'Certificate Title', 'required|trim');
        $this->form_validation->set_rules('salutation', 'Certificate Salutation', 'required|trim');
        $this->form_validation->set_rules('message', 'Certificate Content', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            if (empty($this->input->post('profileimg')) && !$this->upload->do_upload('editimg')) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'salutation' => $this->input->post('salutation'),
                    'content' => $this->input->post('message'),
                    'user' => $this->session->username,
                );
            } elseif (!empty($this->input->post('profileimg')) && !$this->upload->do_upload('editimg')) {
                $data = array(
                    'pic' => $this->input->post('profileimg'),
                    'title' => $this->input->post('title'),
                    'salutation' => $this->input->post('salutation'),
                    'content' => $this->input->post('message'),
                    'user' => $this->session->username,
                );
            } else {
                $file = $this->upload->data();
                //Resize and Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/uploads/' . $file['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['new_image'] = 'assets/uploads/' . $file['file_name'];

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = array(
                    'pic' => $file['file_name'],
                    'title' => $this->input->post('title'),
                    'salutation' => $this->input->post('salutation'),
                    'content' => $this->input->post('message'),
                    'user' => $this->session->username,
                );
            }

            $update = $this->certificateModel->update($data, $id);

            if ($update) {

                $log = array(
                    'activity' => 'Certificate updated: ' . $this->input->post('title'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Certificate has been updated!');
            } else {
                $this->session->set_flashdata('errors', 'No changes has been made!');
            }
        }

        redirect("edit_certificate/" . $id, 'refresh');
    }


    public function delete($id)
    {

        $delete = $this->certificateModel->delete($id);

        if ($delete) {

            $log = array(
                'activity' => 'Certificate deleted: ' . $id,
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('errors', 'Certificate has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect('certificates', 'refresh');
    }

    public function generate_cert($id)
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }
        $data['cert'] = $this->certificateModel->getCertinfo($id);

        $data['info'] = $this->settingsModel->brgy_info();
        $data['kagawad'] = $this->officialsModel->getkagawadOfficial();
        $data['selected_off'] = $this->officialsModel->getselectedOfficial();
        $data['captain'] = $this->officialsModel->getCaptain();

        $data['title'] = ucwords($data['cert']->title);
        $this->certificate_layout->load('certificate', 'certs/generate_cert', $data);
    }

    public function view_cert($id)
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }
        $data['cert'] = $this->certificateModel->getCertinfo($id);

        $data['info'] = $this->settingsModel->brgy_info();
        $data['kagawad'] = $this->officialsModel->getkagawadOfficial();
        $data['selected_off'] = $this->officialsModel->getselectedOfficial();
        $data['captain'] = $this->officialsModel->getCaptain();

        $data['title'] = ucwords($data['cert']->title);
        $this->certificate_layout->load('certificate', 'certs/generate_cert', $data);
    }
}
