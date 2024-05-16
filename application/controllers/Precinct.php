<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Precinct extends CI_Controller
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
        $data['precinct'] = $this->precinctModel->getPrecinct();

        $data['title'] = 'Precinct Management';
        $this->base->load('default', 'precinct/precinct', $data);
    }

    public function save_precinct()
    {

        $this->form_validation->set_rules('precinct', 'Precinct Name', 'required|trim|is_unique[precinct.precinct_name]');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            $data = array(
                'precinct_name' => $this->input->post('precinct'),
                'details' => $this->input->post('details')
            );

            $insert = $this->precinctModel->save($data);

            if ($insert) {
                $log = array(
                    'activity' => 'Precinct created: ' . $this->input->post('precinct'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Precinct has been save!');
            } else {
                $this->session->set_flashdata('errors', 'Precinct not save!');
            }
        }

        redirect("precinct", 'refresh');
    }

    public function update_precinct()
    {

        $id = $this->input->post('id');

        $this->form_validation->set_rules('precinct', 'Precinct Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {


            $data = array(
                'precinct_name' => $this->input->post('precinct'),
                'details' => $this->input->post('details')
            );

            $update = $this->precinctModel->update($data, $id);

            if ($update) {
                $log = array(
                    'activity' => 'Precinct updated: ' . $this->input->post('precinct'),
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

        $delete = $this->precinctModel->delete($id);

        if ($delete) {
            $log = array(
                'activity' => 'Precinct deleted: ' . $id,
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('errors', 'Precinct has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect('precinct', 'refresh');
    }
}
