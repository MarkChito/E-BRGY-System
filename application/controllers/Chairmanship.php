<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chairmanship extends CI_Controller
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
        $data['chair'] = $this->chairmanshipModel->getChairmanship();

        $data['title'] = 'Chairmanship Management';
        $this->base->load('default', 'chairmanship/chairmanship', $data);
    }

    public function save_chairmanship()
    {

        $this->form_validation->set_rules('chair', 'Chairmanship Name', 'required|trim|is_unique[chairmanship.title]');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            $data = array(
                'title' => $this->input->post('chair'),
            );

            $insert = $this->chairmanshipModel->save($data);

            if ($insert) {

                $log = array(
                    'activity' => 'Chairmanship created: ' . $this->input->post('chair'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Chairmanship has been save!');
            } else {
                $this->session->set_flashdata('errors', 'Chairmanship not save!');
            }
        }

        redirect("chairmanship", 'refresh');
    }

    public function update_chairmanship()
    {

        $id = $this->input->post('id');

        $this->form_validation->set_rules('chair', 'Chairmanship Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {


            $data = array(
                'title' => $this->input->post('chair')
            );

            $update = $this->chairmanshipModel->update($data, $id);

            if ($update) {

                $log = array(
                    'activity' => 'Chairmanship updated: ' . $this->input->post('chair'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Chairmanship has been updated!');
            } else {
                $this->session->set_flashdata('errors', 'No changes has been made!');
            }
        }

        redirect("chairmanship", 'refresh');
    }

    public function delete($id)
    {

        $delete = $this->chairmanshipModel->delete($id);

        if ($delete) {

            $log = array(
                'activity' => 'Chairmanship deleted: ' . $id,
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('errors', 'Chairmanship has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect('chairmanship', 'refresh');
    }
}
