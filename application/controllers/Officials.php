<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Officials extends CI_Controller
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

        $data['info'] = $this->settingsModel->getbrgy_Info();
        $data['officials'] = $this->officialsModel->getOfficials();
        $data['chair'] = $this->chairmanshipModel->getChairmanship();
        $data['pos'] = $this->positionModel->getPosition();

        $data['title'] = 'Barangay Officials';
        $this->base->load('default', 'official/officials', $data);
    }

    public function save_official()
    {

        $config['upload_path'] = 'assets/uploads/avatar/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim|is_unique[officials.name]');
        $this->form_validation->set_rules('chair', 'Chairmanship', 'required|trim');
        $this->form_validation->set_rules('position', 'Position', 'required|trim');
        $this->form_validation->set_rules('start', 'Term Start', 'required|trim');
        $this->form_validation->set_rules('end', 'Term End', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            if ($this->upload->do_upload('off_avatar')) {

                $file = $this->upload->data();
                //Resize and Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/uploads/avatar/' . $file['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['new_image'] = 'assets/uploads/avatar/' . $file['file_name'];

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = array(
                    'name' => $this->input->post('name'),
                    'chairmanship' => $this->input->post('chair'),
                    'position' => $this->input->post('position'),
                    'termstart' => $this->input->post('start'),
                    'termend' => $this->input->post('end'),
                    'status' => $this->input->post('status'),
                    'avatar' => $file['file_name'],
                );
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'chairmanship' => $this->input->post('chair'),
                    'position' => $this->input->post('position'),
                    'termstart' => $this->input->post('start'),
                    'termend' => $this->input->post('end'),
                    'status' => $this->input->post('status')
                );
            }

            $insert = $this->officialsModel->save($data);

            if ($insert) {

                $log = array(
                    'activity' => 'Official created: ' . $this->input->post('name'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Official has been save!');
            } else {
                $this->session->set_flashdata('errors', 'Official not save!');
            }
        }

        redirect("officials", 'refresh');
    }

    public function update_official()
    {

        $config['upload_path'] = 'assets/uploads/avatar/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $id = $this->input->post('id');

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('chair', 'Chairmanship', 'required|trim');
        $this->form_validation->set_rules('position', 'Position', 'required|trim');
        $this->form_validation->set_rules('start', 'Term Start', 'required|trim');
        $this->form_validation->set_rules('end', 'Term End', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            if ($this->upload->do_upload('off_avatar')) {

                $file = $this->upload->data();
                //Resize and Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/uploads/avatar/' . $file['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['new_image'] = 'assets/uploads/avatar/' . $file['file_name'];

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = array(
                    'name' => $this->input->post('name'),
                    'chairmanship' => $this->input->post('chair'),
                    'position' => $this->input->post('position'),
                    'termstart' => $this->input->post('start'),
                    'termend' => $this->input->post('end'),
                    'status' => $this->input->post('status'),
                    'avatar' => $file['file_name'],
                );
            } else {

                $data = array(
                    'name' => $this->input->post('name'),
                    'chairmanship' => $this->input->post('chair'),
                    'position' => $this->input->post('position'),
                    'termstart' => $this->input->post('start'),
                    'termend' => $this->input->post('end'),
                    'status' => $this->input->post('status')
                );
            }

            $update = $this->officialsModel->update($data, $id);

            if ($update) {

                $log = array(
                    'activity' => 'Official updated: ' . $this->input->post('name'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Official has been updated!');
            } else {
                $this->session->set_flashdata('errors', 'No changes has been made!');
            }
        }

        redirect("officials", 'refresh');
    }

    public function delete($id)
    {

        $delete = $this->officialsModel->delete($id);

        if ($delete) {
            $log = array(
                'activity' => 'Official deleted: ' . $id,
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('errors', 'Official has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect('officials', 'refresh');
    }
}
