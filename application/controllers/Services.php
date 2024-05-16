<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
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
        $data['services'] = $this->servicesModel->services();

        $data['title'] = 'Services Management';
        $this->base->load('default', 'services/manage', $data);
    }

    public function save()
    {
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('title', 'Services Title', 'required|trim');
        $this->form_validation->set_rules('req', 'Requirements', 'required|trim');
        $this->form_validation->set_rules('desc', 'Details', 'required|trim');
        $this->form_validation->set_rules('fees', 'Services Fee', 'required|trim');
        $this->form_validation->set_rules('phone', 'Mobile No', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('message', validation_errors());
        } else {

            if (!$this->upload->do_upload('code')) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('desc'),
                    'fees' => $this->input->post('fees'),
                    'phone' => $this->input->post('phone'),
                    'requires' => $this->input->post('req'),
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
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('desc'),
                    'fees' => $this->input->post('fees'),
                    'phone' => $this->input->post('phone'),
                    'requires' => $this->input->post('req'),
                    'qr_code' => $file['file_name'],
                );
            }


            $insert = $this->servicesModel->save($data);

            if ($insert) {
                $log = array(
                    'activity' => 'Services created: ' . $this->input->post('title'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Service has been created!');
            } else {
                $this->session->set_flashdata('errors', 'Service not save!');
            }
        }

        redirect("services", 'refresh');
    }

    public function update()
    {
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $id = $this->input->post('id');
        $this->form_validation->set_rules('title', 'Services Title', 'required|trim');
        $this->form_validation->set_rules('req', 'Requirements', 'required|trim');
        $this->form_validation->set_rules('desc', 'Details', 'required|trim');
        $this->form_validation->set_rules('fees', 'Services Fee', 'required|trim');
        $this->form_validation->set_rules('phone', 'Mobile No', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('message', validation_errors());
        } else {

            if (!$this->upload->do_upload('code')) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('desc'),
                    'fees' => $this->input->post('fees'),
                    'phone' => $this->input->post('phone'),
                    'requires' => $this->input->post('req'),
                    'status' => $this->input->post('status'),
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
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('desc'),
                    'fees' => $this->input->post('fees'),
                    'phone' => $this->input->post('phone'),
                    'requires' => $this->input->post('req'),
                    'qr_code' => $file['file_name'],
                    'status' => $this->input->post('status'),
                );
            }

            $update = $this->servicesModel->update($data, $id);

            if ($update) {
                $log = array(
                    'activity' => 'Services updated: ' . $this->input->post('title'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Service has been update!');
            } else {
                $this->session->set_flashdata('errors', 'No changes has been made!');
            }
        }
        redirect("services", 'refresh');
    }

    public function delete($id)
    {

        $delete = $this->servicesModel->delete($id);

        if ($delete) {
            $log = array(
                'activity' => 'Services deleted: ' . $id,
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('errors', 'Services has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect('services', 'refresh');
    }
}
