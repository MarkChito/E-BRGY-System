<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Announcement extends CI_Controller
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
        $data['announce'] = $this->announcementModel->getAnnouncement();

        $data['title'] = 'Announcement Management';
        $this->base->load('default', 'announcement/announcement', $data);
    }

    public function save_announcement()
    {

        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('what', 'Announcement Details', 'required|trim');
        $this->form_validation->set_rules('desc', 'Announcement Details', 'required|trim');
        $this->form_validation->set_rules('when', 'Date', 'required|trim');
        $this->form_validation->set_rules('where', 'Venue', 'required|trim');
        $this->form_validation->set_rules('who', 'Organizer Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            if ($this->upload->do_upload('file')) {
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
                    'what' => $this->input->post('what'),
                    'description' => $this->input->post('desc'),
                    'date' => $this->input->post('when'),
                    'venue' => $this->input->post('where'),
                    'who' => $this->input->post('who'),
                    'docs' => $file['file_name'],
                );
            } else {
                $data = array(
                    'what' => $this->input->post('what'),
                    'description' => $this->input->post('desc'),
                    'date' => $this->input->post('when'),
                    'venue' => $this->input->post('where'),
                    'who' => $this->input->post('who'),
                );
            }

            $insert = $this->announcementModel->save($data);

            if ($insert) {

                $log = array(
                    'activity' => 'Announcement created ' . $this->input->post('what'),
                    'user_id' => $this->session->id,
                );

                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Announcement has been created!');
            } else {
                $this->session->set_flashdata('errors', 'Announcement not save!');
            }
        }

        redirect("announcement", 'refresh');
    }

    public function update_announcement()
    {

        $id = $this->input->post('id');

        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('what', 'Announcement Details', 'required|trim');
        $this->form_validation->set_rules('desc', 'Announcement Details', 'required|trim');
        $this->form_validation->set_rules('when', 'Date', 'required|trim');
        $this->form_validation->set_rules('where', 'Venue', 'required|trim');
        $this->form_validation->set_rules('who', 'Organizer Name', 'required|trim');


        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            if ($this->upload->do_upload('file')) {
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
                    'what' => $this->input->post('what'),
                    'description' => $this->input->post('desc'),
                    'date' => $this->input->post('when'),
                    'venue' => $this->input->post('where'),
                    'who' => $this->input->post('who'),
                    'docs' => $file['file_name'],
                    'status' => $this->input->post('status'),
                );
            } else {
                $data = array(
                    'what' => $this->input->post('what'),
                    'description' => $this->input->post('desc'),
                    'date' => $this->input->post('when'),
                    'venue' => $this->input->post('where'),
                    'who' => $this->input->post('who'),
                    'status' => $this->input->post('status'),
                );
            }

            $update = $this->announcementModel->update($data, $id);

            if ($update) {
                $log = array(
                    'activity' => 'Announcement updated ' . $this->input->post('what'),
                    'user_id' => $this->session->id,
                );

                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Announcement has been updated!');
            } else {
                $this->session->set_flashdata('errors', 'No changes has been made!');
            }
        }

        redirect("announcement", 'refresh');
    }

    public function delete($id)
    {

        $delete = $this->announcementModel->delete($id);

        if ($delete) {

            $log = array(
                'activity' => 'Announcement deleted ' . $id,
                'user_id' => $this->session->id,
            );

            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('errors', 'Announcement has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect('announcement', 'refresh');
    }
}
