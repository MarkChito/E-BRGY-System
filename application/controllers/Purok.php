<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purok extends CI_Controller
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
        $data['purok'] = $this->purokModel->getPurok();

        $data['title'] = 'Purok Management';
        $this->base->load('default', 'purok/purok', $data);
    }

    public function save_purok()
    {

        $this->form_validation->set_rules('purok', 'Purok Name', 'required|trim|is_unique[purok.purok_name]');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            $data = array(
                'purok_name' => $this->input->post('purok'),
                'details' => $this->input->post('details')
            );

            $insert = $this->purokModel->save($data);

            if ($insert) {
                $log = array(
                    'activity' => 'Purok created: ' . $this->input->post('purok'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Purok has been save!');
            } else {
                $this->session->set_flashdata('errors', 'Purok not save!');
            }
        }

        redirect("purok", 'refresh');
    }

    public function update_purok()
    {

        $id = $this->input->post('id');

        $this->form_validation->set_rules('purok', 'Purok Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {


            $data = array(
                'purok_name' => $this->input->post('purok'),
                'details' => $this->input->post('details')
            );

            $update = $this->purokModel->update($data, $id);

            if ($update) {
                $log = array(
                    'activity' => 'Purok updated: ' . $this->input->post('purok'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);
                $this->session->set_flashdata('message', 'Purok has been updated!');
            } else {
                $this->session->set_flashdata('errors', 'No changes has been made!');
            }
        }

        redirect("purok", 'refresh');
    }

    public function delete($id)
    {

        $delete = $this->purokModel->delete($id);

        if ($delete) {
            $log = array(
                'activity' => 'Purok deleted: ' . $id,
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);
            $this->session->set_flashdata('errors', 'Purok has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect('purok', 'refresh');
    }
}
