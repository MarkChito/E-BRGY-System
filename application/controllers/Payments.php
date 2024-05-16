<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payments extends CI_Controller
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
        $data['revenue'] = $this->paymentsModel->getPayments();
        $data['trans'] = $this->paymentsModel->getDailyTrans();

        $data['title'] = 'Revenue Management';
        $this->base->load('default', 'payments/revenue', $data);
    }

    public function save_payments()
    {
        $this->form_validation->set_rules('amount', 'Amount to Pay', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {
            $data = array(
                'details' => $this->input->post('details'),
                'amount' => $this->input->post('amount'),
                'user' => $this->session->username,
                'recipient' => $this->input->post('rec_name'),
                'created_at' => date('Y-m-d')
            );
            $insert = $this->paymentsModel->save($data);

            if ($insert) {
                $this->session->set_flashdata('paid', 'Success');
                $this->session->set_flashdata('message', 'Payment is successfull. Print is enabled now!');
                $this->session->set_flashdata('gender', $this->input->post('gender'));
                $this->session->set_flashdata('date', $this->input->post('date_expired'));
                $this->session->set_flashdata('initials', $this->input->post('initial'));
                $this->session->set_flashdata('official', $this->input->post('official'));
                $this->session->set_flashdata('remarks', $this->input->post('remarks'));
                $this->session->set_flashdata('requestor', $this->input->post('requestor'));
                $this->session->set_flashdata('years', $this->input->post('years'));
                $this->session->set_flashdata('valid', $this->input->post('valid'));
                $this->session->set_flashdata('pic_on', $this->input->post('pic_on'));
                $this->session->set_flashdata('res_sig_on', $this->input->post('res_sig_on'));
                $this->session->set_flashdata('signature', $this->input->post('signature'));

                if (!empty($this->input->post('purpose'))) {
                    $this->session->set_flashdata('purpose', $this->input->post('purpose'));
                }

                $log = array(
                    'activity' => 'Payment created: ' . $this->input->post('purpose'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);
            } else {
                $this->session->set_flashdata('errors', 'Something went wrong!');
            }
        }

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function save_payments1()
    {

        $this->form_validation->set_rules('amount', 'Amount to Pay', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {
            $data = array(
                'details' => $this->input->post('details'),
                'purpose' => $this->input->post('purpose'),
                'amount' => $this->input->post('amount'),
                'user' => $this->session->username,
                'recipient' => $this->input->post('requestor'),
                'created_at' => date('Y-m-d')
            );
            $insert = $this->paymentsModel->save($data);

            if ($insert) {
                $this->session->set_flashdata('paid', 'Success');
                $this->session->set_flashdata('message', 'Payment is successfull. Print is enabled now!');
                $this->session->set_flashdata('purpose', $this->input->post('purpose'));
                $this->session->set_flashdata('initials', $this->input->post('initial'));
                $this->session->set_flashdata('official', $this->input->post('official'));
                $this->session->set_flashdata('remarks', $this->input->post('remarks'));
                $this->session->set_flashdata('valid', $this->input->post('valid'));
                $this->session->set_flashdata('pic_on', $this->input->post('pic_on'));
                $this->session->set_flashdata('res_sig_on', $this->input->post('res_sig_on'));
                $this->session->set_flashdata('signature', $this->input->post('signature'));

                $log = array(
                    'activity' => 'Payment created: ' . $this->input->post('purpose'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);
            } else {
                $this->session->set_flashdata('errors', 'Something went wrong!');
            }
        }

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function save_payments2()
    {

        $this->form_validation->set_rules('or', 'O.R No.', 'required|trim');
        $this->form_validation->set_rules('amount', 'Amount to Pay', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {
            $data = array(
                'details' => $this->input->post('details'),
                'purpose' => 'Business Permit',
                'amount' => $this->input->post('amount'),
                'user' => $this->session->username,
                'recipient' => $this->input->post('requestor'),
                'created_at' => date('Y-m-d')
            );
            $insert = $this->paymentsModel->save($data);

            if ($insert) {
                $this->session->set_flashdata('paid', 'Success');
                $this->session->set_flashdata('message', 'Payments is successfull.Print is enabled now!');
                $this->session->set_flashdata('initials', $this->input->post('initial'));
                $this->session->set_flashdata('official', $this->input->post('official'));
                $this->session->set_flashdata('remarks', $this->input->post('remarks'));
                $this->session->set_flashdata('amount', $this->input->post('amount'));
                $this->session->set_flashdata('or', $this->input->post('or'));
                $this->session->set_flashdata('signature', $this->input->post('signature'));

                $log = array(
                    'activity' => 'Payment created: Business Permit',
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);
            } else {
                $this->session->set_flashdata('errors', 'Something went wrong!');
            }
        }

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function save_id_payments()
    {

        $this->form_validation->set_rules('amount', 'Amount to Pay', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {
            $data = array(
                'details' => $this->input->post('details'),
                'purpose' => 'Barangay ID',
                'amount' => $this->input->post('amount'),
                'user' => $this->session->username,
                'recipient' => $this->input->post('rec_name'),
                'created_at' => date('Y-m-d')
            );
            $insert = $this->paymentsModel->save($data);

            if ($insert) {
                $this->session->set_flashdata('paid', 'Success');
                $this->session->set_flashdata('message', 'Payments is successfull. Print is enabled now!');
                $this->session->set_flashdata('name', $this->input->post('name'));
                $this->session->set_flashdata('number', $this->input->post('number'));
                $this->session->set_flashdata('address', $this->input->post('address'));
                $this->session->set_flashdata('signature', $this->input->post('signature'));
                $this->session->set_flashdata('watermark', $this->input->post('watermark'));

                $log = array(
                    'activity' => 'Payment created: Barangay ID',
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);
            } else {
                $this->session->set_flashdata('errors', 'Something went wrong!');
            }
        }

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
}
