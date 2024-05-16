<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blotter extends CI_Controller
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

        $data['blotter'] = $this->blotterModel->getBlotter();
        $data['active'] = $this->blotterModel->activeBlotter();
        $data['settled'] = $this->blotterModel->settledBlotter();
        $data['scheduled'] = $this->blotterModel->scheduledBlotter();
        $data['dismissed'] = $this->blotterModel->dismissedBlotter();
        $data['endorsed'] = $this->blotterModel->endorsedBlotter();

        $data['title'] = 'Blotter/Incident Complaint';
        $this->base->load('default', 'blotter/blotter', $data);
    }

    public function create_blotter()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }

        $data['title'] = 'Create Blotter ';
        $this->base->load('default', 'blotter/create_blotter', $data);
    }

    public function edit_blotter($case_no)
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }

        $data['blotter_info'] = $this->blotterModel->getBlotter_info($case_no);
        $data['complainants'] = $this->blotterModel->getComplainants($case_no);
        $data['settled'] = $this->blotterModel->getSettlement($case_no);

        $data['title'] = 'Update Blotter ';
        $this->base->load('default', 'blotter/update_blotter', $data);
    }

    public function save_blotter()
    {
        $validator = array('success' => false, 'msg' => array());

        $this->form_validation->set_rules('case_no', 'Case No', 'required|trim|is_unique[blotter.case_no]');
        $this->form_validation->set_rules('complainant[0]', 'Complainant Fullname', 'required|trim');
        $this->form_validation->set_rules('complainant_number[0]', 'Complainant Contact Nuber', 'required|trim');
        $this->form_validation->set_rules('complainant_age[0]', 'Complainant Age', 'required|trim');
        $this->form_validation->set_rules('complainant_address[0]', 'Complainant Address', 'required|trim');
        $this->form_validation->set_rules('respondent', 'Respondent Fullname', 'required|trim');
        $this->form_validation->set_rules('type', 'Blotter Type', 'required|trim');
        $this->form_validation->set_rules('date_happen', 'Date and Time of Incident', 'required|trim');
        $this->form_validation->set_rules('location', 'Incident Location', 'required|trim');
        $this->form_validation->set_rules('details', 'Narration of the Incident', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $validator['success'] = false;
            $validator['msg'] = validation_errors();
        } else {

            $data = array(
                'case_no' => $this->input->post('case_no'),
                'respondent' => $this->input->post('respondent'),
                'victim' => $this->input->post('victim'),
                'type' => $this->input->post('type'),
                'location' => $this->input->post('location'),
                'incident_date' => $this->input->post('date_happen'),
                'details' => $this->input->post('details'),
                'status' => $this->input->post('status'),
                'created_at' => $this->input->post('date_filed'),
            );

            $cnames = $this->input->post('complainant');
            $cid = $this->input->post('complainant_id');
            $cnumber = $this->input->post('complainant_number');
            $cgender = $this->input->post('gender');
            $cage = $this->input->post('complainant_age');
            $cremarks = $this->input->post('complainant_remarks');
            $caddress = $this->input->post('complainant_address');

            $complainant = array();

            foreach ($cnames as $index => $cname) {

                if ($cname != '') {
                    $complainant[] = array(
                        'case_no' => $this->input->post('case_no'),
                        'name' => $cname,
                        'national_id' => $cid[$index],
                        'number' => $cnumber[$index],
                        'gender' => $cgender[$index],
                        'age' => $cage[$index],
                        'remarks' => $cremarks[$index],
                        'address' => $caddress[$index],
                    );
                }
            }

            $settlement = array(
                'case_no' => $this->input->post('case_no'),
            );

            $insert = $this->blotterModel->save($data);
            $cinsert = $this->blotterModel->save_complainants($complainant);
            $this->blotterModel->save_settled($settlement);

            if ($insert && $cinsert) {
                $validator['success'] = true;
                $validator['msg'] = 'Blotter successfully added!';
            } else {
                $validator['success'] = false;
                $validator['msg'] = 'Something went wrong. Please contact the administrator';
            }
        }

        echo json_encode($validator);
    }

    public function update_blotter()
    {
        $validator = array('success' => false, 'msg' => array());

        $this->form_validation->set_rules('case_no', 'Case No', 'required|trim');
        $this->form_validation->set_rules('complainant[0]', 'Complainant Fullname', 'required|trim');
        $this->form_validation->set_rules('complainant_number[0]', 'Complainant Contact Nuber', 'required|trim');
        $this->form_validation->set_rules('complainant_age[0]', 'Complainant Age', 'required|trim');
        $this->form_validation->set_rules('complainant_address[0]', 'Complainant Address', 'required|trim');
        $this->form_validation->set_rules('respondent', 'Respondent Fullname', 'required|trim');
        $this->form_validation->set_rules('type', 'Blotter Type', 'required|trim');
        $this->form_validation->set_rules('date_happen', 'Date and Time of Incident', 'required|trim');
        $this->form_validation->set_rules('location', 'Incident Location', 'required|trim');
        $this->form_validation->set_rules('details', 'Narration of the Incident', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $validator['success'] = false;
            $validator['msg'] = validation_errors();
        } else {

            $data = array(
                'respondent' => $this->input->post('respondent'),
                'victim' => $this->input->post('victim'),
                'type' => $this->input->post('type'),
                'location' => $this->input->post('location'),
                'incident_date' => $this->input->post('date_happen'),
                'details' => $this->input->post('details'),
                'status' => $this->input->post('status'),
                'created_at' => $this->input->post('date_filed'),
            );

            $case_no = $this->input->post('case_no');
            $cnames = $this->input->post('complainant');
            $cid = $this->input->post('complainant_id');
            $cnumber = $this->input->post('complainant_number');
            $cgender = $this->input->post('gender');
            $cage = $this->input->post('complainant_age');
            $cremarks = $this->input->post('complainant_remarks');
            $caddress = $this->input->post('complainant_address');

            $complainant = array();

            foreach ($cnames as $index => $cname) {

                if ($cname != '') {
                    $complainant[] = array(
                        'case_no' => $case_no,
                        'name' => $cname,
                        'national_id' => $cid[$index],
                        'number' => $cnumber[$index],
                        'gender' => $cgender[$index],
                        'age' => $cage[$index],
                        'remarks' => $cremarks[$index],
                        'address' => $caddress[$index],
                    );
                }
            }

            $status = $this->input->post('status');

            $update = $this->blotterModel->update($data, $case_no);
            $cupdate = $this->blotterModel->update_complainants($complainant,  $case_no);

            if ($status == 'Settled') {
                $settlement = array(
                    'updates' => $this->input->post('settlement_updates'),
                    'date' => $this->input->post('settlement_date'),
                );
                $this->blotterModel->update_settle($settlement, $case_no);
            }


            if ($update || $cupdate) {

                $log = array(
                    'activity' => 'Blotter created: ' . $this->input->post('case_no'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $validator['success'] = true;
                $validator['msg'] = 'Blotter successfully updated!';
            } else {
                $validator['success'] = false;
                $validator['msg'] = 'No changes has been made!';
            }
        }

        echo json_encode($validator);
    }

    public function summon($case_no)
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }
        $data['blotter_info'] = $this->blotterModel->getBlotter_info($case_no);
        $data['summon'] = $this->blotterModel->getSummon($case_no);
        $data['complainants'] = $this->blotterModel->getComplainants($case_no);

        $data['title'] = 'Summon Management';
        $this->base->load('default', 'blotter/summon', $data);
    }

    public function save_summon()
    {
        $case_no = $this->input->post('case_no');

        $this->form_validation->set_rules('case_no', 'Case Number', 'required|trim');
        $this->form_validation->set_rules('updates', 'Summon Updates', 'required|trim');
        $this->form_validation->set_rules('number', 'Summon No.', 'required|trim');
        $this->form_validation->set_rules('date_summon', 'Summon Date and Time', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            $data = array(
                'case_no' => $this->input->post('case_no'),
                'blotter_update' => $this->input->post('updates'),
                'number' => $this->input->post('number'),
                'date' => $this->input->post('date_summon')
            );

            $insert = $this->blotterModel->save_summon($data);

            if ($insert) {
                $log = array(
                    'activity' => 'Summon created: ' . $this->input->post('case_no'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Summon has been added!');
            } else {
                $this->session->set_flashdata('errors', 'Summon not save!');
            }
        }

        redirect("blotter/summon/" . $case_no, 'refresh');
    }

    public function update_summon()
    {
        $id = $this->input->post('summon_id');
        $case_no = $this->input->post('case_no');

        $this->form_validation->set_rules('case_no', 'Case Number', 'required|trim');
        $this->form_validation->set_rules('updates', 'Summon Updates', 'required|trim');
        $this->form_validation->set_rules('number', 'Summon No.', 'required|trim');
        $this->form_validation->set_rules('date_summon', 'Summon Date and Time', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            $data = array(
                'case_no' => $this->input->post('case_no'),
                'blotter_update' => $this->input->post('updates'),
                'number' => $this->input->post('number'),
                'date' => $this->input->post('date_summon')
            );

            $insert = $this->blotterModel->update_summon($data, $id);

            if ($insert) {
                $log = array(
                    'activity' => 'Summon updated: ' . $this->input->post('case_no'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Summon has been updated!');
            } else {
                $this->session->set_flashdata('errors', 'No changes has been made!');
            }
        }

        redirect("blotter/summon/" . $case_no, 'refresh');
    }

    public function process_settlement()
    {
        $this->session->set_flashdata('reason', $this->input->post('reason'));
        $this->session->set_flashdata('official', $this->input->post('kagawad'));
        $this->session->set_flashdata('body', $this->input->post('body'));

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function process_summon()
    {
        $this->session->set_flashdata('reason', $this->input->post('reason'));
        $this->session->set_flashdata('official', $this->input->post('kagawad'));
        $this->session->set_flashdata('body', $this->input->post('body'));

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function generate_summon($case_no, $id)
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }
        $data['blotter_info'] = $this->blotterModel->getBlotter_info($case_no);
        $data['complainants'] = $this->blotterModel->getComplainants($case_no);
        $data['info'] = $this->settingsModel->brgy_info();
        $data['captain'] = $this->officialsModel->getCaptain();
        $data['settled'] = $this->blotterModel->getSettlement($case_no);
        $data['summon'] = $this->blotterModel->getSummonDetails($id);

        $data['title'] = 'Summon Generated Report';
        $this->base->load('default', 'blotter/generate_summon', $data);
    }

    public function generate_settlement_report($case_no)
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }
        $data['blotter_info'] = $this->blotterModel->getBlotter_info($case_no);
        $data['complainants'] = $this->blotterModel->getComplainants($case_no);
        $data['info'] = $this->settingsModel->brgy_info();
        $data['captain'] = $this->officialsModel->getCaptain();
        $data['settled'] = $this->blotterModel->getSettlement($case_no);


        $data['title'] = 'Amicable Settlement';
        $this->base->load('default', 'blotter/generate_settlement_report', $data);
    }
    public function generate_dismissed_report($case_no)
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }
        $data['blotter_info'] = $this->blotterModel->getBlotter_info($case_no);
        $data['complainants'] = $this->blotterModel->getComplainants($case_no);
        $data['info'] = $this->settingsModel->brgy_info();
        $data['captain'] = $this->officialsModel->getCaptain();


        $data['title'] = 'Dismissed Report';
        $this->base->load('default', 'blotter/generate_dismissed_report', $data);
    }
    public function generate_endorsed_report($case_no)
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }
        $data['blotter_info'] = $this->blotterModel->getBlotter_info($case_no);
        $data['complainants'] = $this->blotterModel->getComplainants($case_no);
        $data['info'] = $this->settingsModel->brgy_info();
        $data['captain'] = $this->officialsModel->getCaptain();


        $data['title'] = 'Endorsement Report';
        $this->base->load('default', 'blotter/generate_endorsed_report', $data);
    }

    public function delete($case)
    {

        $delete = $this->blotterModel->delete($case);

        if ($delete) {

            $log = array(
                'activity' => 'Blotter deleted: ' . $case,
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('errors', 'Blotter has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect('blotter', 'refresh');
    }

    public function delete_summon($case, $id)
    {

        $delete = $this->blotterModel->delete_summon($id);

        if ($delete) {

            $log = array(
                'activity' => 'Summon deleted: ' . $id,
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('errors', 'Summon has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect("blotter/summon/" . $case, 'refresh');
    }
}
