<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Position extends CI_Controller
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
        $data['position'] = $this->positionModel->getPosition();

        $data['title'] = 'Positions Management';
        $this->base->load('default', 'position/position', $data);
    }

    public function save_position()
    {

        $this->form_validation->set_rules('position', 'Position Name', 'required|trim|is_unique[position.position]');
        $this->form_validation->set_rules('order', 'Order', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            $data = array(
                'position' => $this->input->post('position'),
                'pos_order' => $this->input->post('order')
            );

            $insert = $this->positionModel->save($data);

            if ($insert) {

                $log = array(
                    'activity' => 'Position created: ' . $this->input->post('position'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Position has been save!');
            } else {
                $this->session->set_flashdata('errors', 'Position not save!');
            }
        }

        redirect("position", 'refresh');
    }

    public function update_position()
    {

        $id = $this->input->post('id');

        $this->form_validation->set_rules('position', 'Position Name', 'required|trim');
        $this->form_validation->set_rules('order', 'Order', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {


            $data = array(
                'position' => $this->input->post('position'),
                'pos_order' => $this->input->post('order')
            );

            $update = $this->positionModel->update($data, $id);

            if ($update) {

                $log = array(
                    'activity' => 'Position updated: ' . $this->input->post('position'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Position has been updated!');
            } else {
                $this->session->set_flashdata('errors', 'No changes has been made!');
            }
        }

        redirect("position", 'refresh');
    }

    public function delete($id)
    {

        $delete = $this->positionModel->delete($id);

        if ($delete) {

            $log = array(
                'activity' => 'Position deleted: ' . $id,
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('errors', 'Position has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect('position', 'refresh');
    }
}
