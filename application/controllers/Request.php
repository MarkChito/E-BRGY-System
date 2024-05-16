<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
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
        $data['trans'] = $this->requestModel->transactions();

        $data['title'] = 'Requested Documents';
        $this->base->load('default', 'request/request', $data);
    }

    public function request_docs()
    {
        $this->form_validation->set_rules('date', 'Pickup Date', 'required|trim');
        $this->form_validation->set_rules('method', 'Payment Method', 'required|trim');
        $this->form_validation->set_rules('purpose', 'Purpose', 'required|trim');

        $this->session->set_flashdata('success', 'danger');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            $data = array(
                'payment_method' => $this->input->post('method'),
                'ref_no' => $this->input->post('ref'),
                'purpose' => $this->input->post('purpose'),
                'resident_id' => $this->session->resident_id,
                'service_id' => $this->input->post('service_id'),
                'date' => $this->input->post('date'),
            );

            $insert = $this->requestModel->save($data);

            if ($insert) {

                $log = array(
                    'activity' => 'Request created',
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('success', 'success');
                $this->session->set_flashdata('message', 'Applied successfully!');
            } else {
                $this->session->set_flashdata('message', 'Something went wrong. Please try again!');
            }
        }

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function addfiles()
    {
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
        $config['encrypt_name'] = TRUE;
        $config['max_size']    = '1000000';

        $this->load->library('upload', $config);

        $this->session->set_flashdata('success', 'danger');

        $id = $this->input->post('id');

        if (!$this->upload->do_upload('docs')) {
            $this->session->set_flashdata('message', 'Document/s not uploaded!');
        } else {
            $file = $this->upload->data();
            $data = array(
                'files' => $file['file_name'],
            );

            $insert = $this->requestModel->update_req($data, $id);
            if ($insert) {

                $log = array(
                    'activity' => 'Request created',
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('success', 'success');
                $this->session->set_flashdata('message', 'Certificate has been sent!');
            } else {
                $this->session->set_flashdata('message', 'Document/s not uploaded!');
            }
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function cancel($id)
    {
        $this->session->set_flashdata('success', 'danger');

        $data = array(
            'status' => 'Cancelled'
        );
        $cancel = $this->requestModel->update_req($data,  $id);

        if ($cancel) {
            $log = array(
                'activity' => 'Request cancelled',
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('message', 'Transaction has been cancelled!');
        } else {
            $this->session->set_flashdata('message', 'Something went wrong!');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
    public function received($id)
    {
        $this->session->set_flashdata('success', 'danger');

        $data = array(
            'status' => 'Recieved'
        );
        $received = $this->requestModel->update_req($data,  $id);

        if ($received) {

            $log = array(
                'activity' => 'Request received',
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);
            $this->session->set_flashdata('message', 'Documents has been recieved!');
        } else {
            $this->session->set_flashdata('message', 'Something went wrong!');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function update_req($id)
    {
        $validator = array('success' => false, 'msg' => array());
        $validator['success'] = false;
        $data = array(
            'status' => $this->input->post('status')
        );

        $update = $this->requestModel->update_req($data, $id);

        if ($update) {
            $log = array(
                'activity' => 'Request change status',
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $validator['success'] = true;
            $validator['msg'] = 'Request id ' . $this->input->post('status');
        } else {

            $validator['msg'] = 'Something went wrong!';
        }

        echo json_encode($validator);
    }

    public function fetch()
    {
        if (isset($_POST['view'])) {
            if ($_POST["view"] != '') {
                $this->requestModel->update_stat();
            }
            $result = $this->requestModel->getReq();

            $output = '';
            $output .= '
                <li>
                    <div class="drop-title">Notifications</div>
                </li>';


            if (count($result) > 0) {
                foreach ($result as $row) {
                    if (empty($row['picture'])) {
                        $src = site_url('assets/img/person.png');
                    } else {
                        $src = preg_match('/data:image/i', $row['picture']) ? $row['picture'] : site_url() . "assets/uploads/resident_profile/" . $row['picture'];
                    }

                    if ($row['status'] == 'Cancelled') {
                        $stat = '<small class="text-danger">' . $row['status'] . '</small>';
                    } elseif ($row['status'] == 'Pending') {
                        $stat = '<small class="text-warning">' . $row['status'] . '</small>';
                    } elseif ($row['status'] == 'Received') {
                        $stat = '<small class="text-success">' . $row['status'] . '</small>';
                    } else {
                        $stat = '<small class="text-primary">' . $row['status'] . '</small>';
                    }

                    $output .= '
                    <li>
                    <div class="message-center">
                        <small style="margin-left:20px; font-size:10px">' . date('M. d, Y h:i A', strtotime($row['timestamp'])) . '</small>
                        <a href="javascript:void(0);">
                        
                            <div class="user-img">
                                <img src="' . $src . '" alt="user" class="img-circle" width="30">
                                <span class="profile-status offline pull-right"></span>
                            </div>
                            <div class="mail-contnet">
                                <h5>' . ucwords($row['firstname'] . ' ' . $row['lastname']) . '</h5>
                                ' . $stat . '
                                <span class="mail-desc">' . $row['title'] . '</span>
                            </div> 
                        </a>
                    </div>
                </li>
              ';
                }
                $output .= '
                    <li>
                        <a class="text-center" href="' . site_url('request') . '">
                            <strong>See all request</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>';
            } else {
                $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
            }
            $count = $this->requestModel->getReqCount();
            $data = array(
                'notification' => $output,
                'unseen_notification'  => $count
            );
            echo json_encode($data);
        }
    }

    public function delete($id)
    {
        $this->session->set_flashdata('success', 'danger');
        $del = $this->requestModel->delete($id);

        if ($del) {

            $log = array(
                'activity' => 'Request deleted: ' . $id,
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('message', 'Request has been delete!');
        } else {
            $this->session->set_flashdata('message', 'Something went wrong!');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
}
