<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
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
    public function support()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }

        $data['ticket'] = $this->settingsModel->getSupport();

        $data['title'] = 'System Support';
        $this->base->load('default', 'support/support', $data);
    }

    public function activity_logs()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'resident') {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }

        $data['logs'] = $this->settingsModel->getLogs();

        $data['title'] = 'Activity Logs';
        $this->base->load('default', 'activity_log.php', $data);
    }

    public function send_support()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim');
        $this->form_validation->set_rules('subject', 'Email Subject', 'required|trim');
        $this->form_validation->set_rules('message', 'Message', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'number' => $this->input->post('number'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message')
            );

            $insert = $this->settingsModel->send($data);

            if ($insert) {
                $log = array(
                    'activity' => 'Ticket created',
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Support has been sent!');
            } else {
                $this->session->set_flashdata('errors', 'Support not sent!');
            }
        }

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function delete($id)
    {

        $delete = $this->settingsModel->delete($id);

        if ($delete) {
            $log = array(
                'activity' => 'Ticket deleted: ' . $id,
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('errors', 'Support has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect('settings/support', 'refresh');
    }

    public function save_brgy_info()
    {

        $validator = array('success' => false, 'msg' => array());

        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('province', 'Province Name', 'required');
        $this->form_validation->set_rules('town', 'Town Name', 'required');
        $this->form_validation->set_rules('brgy', 'Barangay Name', 'required');
        $this->form_validation->set_rules('number', 'Contact Number', 'required');
        $this->form_validation->set_rules('email', 'Email Number', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {

            $validator['success'] = false;
            $validator['msg'] = validation_errors();
        } else {

            $city_logo     = $_FILES['city_logo']['name'];
            $brgy_logo     = $_FILES['brgy_logo']['name'];
            $db_image     = $_FILES['db_img']['name'];

            if (!empty($city_logo) && !empty($brgy_logo) && !empty($db_image)) {
                $this->upload->do_upload('brgy_logo');
                $a = $this->upload->data();
                $this->upload->do_upload('city_logo');
                $b = $this->upload->data();
                $this->upload->do_upload('db_img');
                $c = $this->upload->data();

                $data = array(
                    'province' => $this->input->post('province'),
                    'town' => $this->input->post('town'),
                    'brgy_name' => $this->input->post('brgy'),
                    'number' => $this->input->post('number'),
                    'email' => $this->input->post('email'),
                    'street' => $this->input->post('street'),
                    'purok' => $this->input->post('purok'),
                    'background' => $this->input->post('background'),
                    'starts' => $this->input->post('start'),
                    'end' => $this->input->post('end'),
                    'dashboard_text' => $this->input->post('db_msg'),
                    'dashboard_img' => $c['file_name'],
                    'city_logo' => $b['file_name'],
                    'brgy_logo' => $a['file_name']
                );
            } else if (!empty($city_logo) && !empty($brgy_logo) && empty($db_image)) {
                $this->upload->do_upload('brgy_logo');
                $a = $this->upload->data();
                $this->upload->do_upload('city_logo');
                $b = $this->upload->data();

                $data = array(
                    'province' => $this->input->post('province'),
                    'town' => $this->input->post('town'),
                    'brgy_name' => $this->input->post('brgy'),
                    'number' => $this->input->post('number'),
                    'email' => $this->input->post('email'),
                    'street' => $this->input->post('street'),
                    'purok' => $this->input->post('purok'),
                    'background' => $this->input->post('background'),
                    'starts' => $this->input->post('start'),
                    'end' => $this->input->post('end'),
                    'dashboard_text' => $this->input->post('db_msg'),
                    'city_logo' => $a['file_name'],
                    'brgy_logo' => $b['file_name']
                );
            } else if (!empty($city_logo) && empty($brgy_logo) && empty($db_image)) {
                $this->upload->do_upload('city_logo');
                $a = $this->upload->data();

                $data = array(
                    'province' => $this->input->post('province'),
                    'town' => $this->input->post('town'),
                    'brgy_name' => $this->input->post('brgy'),
                    'number' => $this->input->post('number'),
                    'email' => $this->input->post('email'),
                    'street' => $this->input->post('street'),
                    'purok' => $this->input->post('purok'),
                    'background' => $this->input->post('background'),
                    'starts' => $this->input->post('start'),
                    'end' => $this->input->post('end'),
                    'dashboard_text' => $this->input->post('db_msg'),
                    'city_logo' => $a['file_name'],
                );
            } else if (empty($city_logo) && empty($brgy_logo) && !empty($db_image)) {
                $this->upload->do_upload('db_img');
                $a = $this->upload->data();

                $data = array(
                    'province' => $this->input->post('province'),
                    'town' => $this->input->post('town'),
                    'brgy_name' => $this->input->post('brgy'),
                    'number' => $this->input->post('number'),
                    'email' => $this->input->post('email'),
                    'street' => $this->input->post('street'),
                    'purok' => $this->input->post('purok'),
                    'background' => $this->input->post('background'),
                    'starts' => $this->input->post('start'),
                    'end' => $this->input->post('end'),
                    'dashboard_text' => $this->input->post('db_msg'),
                    'dashboard_img' => $a['file_name'],
                );
            } else if (empty($city_logo) && !empty($brgy_logo) && !empty($db_image)) {
                $this->upload->do_upload('brgy_logo');
                $a = $this->upload->data();
                $this->upload->do_upload('db_img');
                $b = $this->upload->data();

                $data = array(
                    'province' => $this->input->post('province'),
                    'town' => $this->input->post('town'),
                    'brgy_name' => $this->input->post('brgy'),
                    'number' => $this->input->post('number'),
                    'email' => $this->input->post('email'),
                    'street' => $this->input->post('street'),
                    'purok' => $this->input->post('purok'),
                    'background' => $this->input->post('background'),
                    'starts' => $this->input->post('start'),
                    'end' => $this->input->post('end'),
                    'dashboard_text' => $this->input->post('db_msg'),
                    'dashboard_img' => $b['file_name'],
                    'brgy_logo' => $a['file_name']
                );
            } else if (empty($city_logo) && !empty($brgy_logo) && empty($db_image)) {
                $this->upload->do_upload('brgy_logo');
                $a = $this->upload->data();

                $data = array(
                    'province' => $this->input->post('province'),
                    'town' => $this->input->post('town'),
                    'brgy_name' => $this->input->post('brgy'),
                    'number' => $this->input->post('number'),
                    'email' => $this->input->post('email'),
                    'street' => $this->input->post('street'),
                    'purok' => $this->input->post('purok'),
                    'background' => $this->input->post('background'),
                    'starts' => $this->input->post('start'),
                    'end' => $this->input->post('end'),
                    'dashboard_text' => $this->input->post('db_msg'),
                    'brgy_logo' => $a['file_name'],
                );
            } else {

                $data = array(
                    'province' => $this->input->post('province'),
                    'town' => $this->input->post('town'),
                    'brgy_name' => $this->input->post('brgy'),
                    'number' => $this->input->post('number'),
                    'email' => $this->input->post('email'),
                    'street' => $this->input->post('street'),
                    'purok' => $this->input->post('purok'),
                    'background' => $this->input->post('background'),
                    'starts' => $this->input->post('start'),
                    'end' => $this->input->post('end'),
                    'dashboard_text' => $this->input->post('db_msg')
                );
            }

            $update = $this->settingsModel->save_brgy_info($data);

            if ($update) {
                $log = array(
                    'activity' => 'Barangay info updated',
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $validator['success'] = true;
                $validator['msg'] = 'Barangay Information has been updated!';
            } else {
                $validator['success'] = false;
                $validator['msg'] = 'No changes has been made!';
            }
        }

        echo json_encode($validator);
    }

    public function updateCertSettings()
    {

        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $flag     = $_FILES['flag']['name'];
        $motto     = $_FILES['motto']['name'];
        $sig     = $_FILES['signature']['name'];
        $watermark     = $_FILES['watermark']['name'];

        if (!empty($flag) && !empty($motto) && !empty($sig) && !empty($watermark)) {
            $this->upload->do_upload('flag');
            $a = $this->upload->data();
            $this->upload->do_upload('motto');
            $b = $this->upload->data();
            $this->upload->do_upload('signature');
            $c = $this->upload->data();
            $this->upload->do_upload('watermark');
            $d = $this->upload->data();

            $data = array(
                'flag' => $a['file_name'],
                'motto' => $b['file_name'],
                'signature' => $c['file_name'],
                'watermark' => $d['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (!empty($flag) && !empty($motto) && !empty($sig) && empty($watermark)) {
            $this->upload->do_upload('flag');
            $a = $this->upload->data();
            $this->upload->do_upload('motto');
            $b = $this->upload->data();
            $this->upload->do_upload('signature');
            $c = $this->upload->data();

            $data = array(
                'flag' => $a['file_name'],
                'motto' => $b['file_name'],
                'signature' => $c['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (!empty($flag) && !empty($motto) && empty($sig) && !empty($watermark)) {
            $this->upload->do_upload('flag');
            $a = $this->upload->data();
            $this->upload->do_upload('motto');
            $b = $this->upload->data();
            $this->upload->do_upload('watermark');
            $c = $this->upload->data();

            $data = array(
                'flag' => $a['file_name'],
                'motto' => $b['file_name'],
                'watermark' => $c['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (!empty($flag) && empty($motto) && !empty($sig) && !empty($watermark)) {
            $this->upload->do_upload('flag');
            $a = $this->upload->data();
            $this->upload->do_upload('signature');
            $b = $this->upload->data();
            $this->upload->do_upload('watermark');
            $c = $this->upload->data();

            $data = array(
                'flag' => $a['file_name'],
                'signature' => $b['file_name'],
                'watermark' => $c['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (empty($flag) && !empty($motto) && !empty($sig) && !empty($watermark)) {
            $this->upload->do_upload('motto');
            $a = $this->upload->data();
            $this->upload->do_upload('signature');
            $b = $this->upload->data();
            $this->upload->do_upload('watermark');
            $c = $this->upload->data();

            $data = array(
                'motto' => $a['file_name'],
                'signature' => $b['file_name'],
                'watermark' => $c['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (!empty($flag) && !empty($motto) && empty($sig) && empty($watermark)) {
            $this->upload->do_upload('flag');
            $a = $this->upload->data();
            $this->upload->do_upload('motto');
            $b = $this->upload->data();

            $data = array(
                'flag' => $a['file_name'],
                'motto' => $b['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (empty($flag) && empty($motto) && !empty($sig) && !empty($watermark)) {
            $this->upload->do_upload('signature');
            $a = $this->upload->data();
            $this->upload->do_upload('watermark');
            $b = $this->upload->data();

            $data = array(
                'signature' => $a['file_name'],
                'watermark' => $b['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (empty($flag) && !empty($motto) && empty($sig) && !empty($watermark)) {
            $this->upload->do_upload('motto');
            $a = $this->upload->data();
            $this->upload->do_upload('watermark');
            $b = $this->upload->data();

            $data = array(
                'motto' => $a['file_name'],
                'watermark' => $b['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (!empty($flag) && empty($motto) && empty($sig) && !empty($watermark)) {
            $this->upload->do_upload('flag');
            $a = $this->upload->data();
            $this->upload->do_upload('watermark');
            $b = $this->upload->data();

            $data = array(
                'flag' => $a['file_name'],
                'watermark' => $b['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (empty($flag) && !empty($motto) && !empty($sig) && empty($watermark)) {
            $this->upload->do_upload('motto');
            $a = $this->upload->data();
            $this->upload->do_upload('signature');
            $b = $this->upload->data();

            $data = array(
                'motto' => $a['file_name'],
                'signature' => $b['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (!empty($flag) && empty($motto) && !empty($sig) && empty($watermark)) {
            $this->upload->do_upload('flag');
            $a = $this->upload->data();
            $this->upload->do_upload('signature');
            $b = $this->upload->data();

            $data = array(
                'flag' => $a['file_name'],
                'signature' => $b['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (!empty($flag) && empty($motto) && empty($sig) && empty($watermark)) {
            $this->upload->do_upload('flag');
            $a = $this->upload->data();

            $data = array(
                'flag' => $a['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (empty($flag) && empty($motto) && empty($sig) && !empty($watermark)) {
            $this->upload->do_upload('watermark');
            $a = $this->upload->data();

            $data = array(
                'watermark' => $a['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (empty($flag) && empty($motto) && !empty($sig) && empty($watermark)) {
            $this->upload->do_upload('signature');
            $a = $this->upload->data();

            $data = array(
                'signature' => $a['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else if (empty($flag) && !empty($motto) && empty($sig) && empty($watermark)) {
            $this->upload->do_upload('motto');
            $a = $this->upload->data();

            $data = array(
                'motto' => $a['file_name'],
                'color_bg' => $this->input->post('color_bg')
            );
        } else {

            $data = array(
                'color_bg' => $this->input->post('color_bg')
            );
        }

        $update = $this->settingsModel->updateCertSetting($data);

        if ($update) {
            $log = array(
                'activity' => 'Ceritificate setting updated',
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);
            $this->session->set_flashdata('message', 'Certificate settings has been updated!');
        } else {
            $this->session->set_flashdata('errors', 'No changes has been made!');
        }

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function updateSystem()
    {

        $this->form_validation->set_rules('name', 'System Name', 'required|trim');
        $this->form_validation->set_rules('acronym', 'System Acronym', 'required|trim');
        $this->form_validation->set_rules('powered_b', 'Powered By', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            $data = array(
                'sname' => $this->input->post('name'),
                'acronym' => $this->input->post('acronym'),
                'powered_b' => $this->input->post('powered_b')
            );

            $update = $this->settingsModel->updateInfo($data);

            if ($update) {
                $log = array(
                    'activity' => 'System info updated',
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'System info has been save!');
            } else {
                $this->session->set_flashdata('errors', 'No changes has been made!');
            }
        }

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function changeIDbackground()
    {

        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $front     = $_FILES['front']['name'];
        $back     = $_FILES['back']['name'];

        if (!empty($front) && !empty($back)) {
            $this->upload->do_upload('front');
            $a = $this->upload->data();
            $this->upload->do_upload('back');
            $b = $this->upload->data();

            $data = array(
                'front' => $a['file_name'],
                'back' => $b['file_name'],
                'bg_color' => $this->input->post('bg_color')
            );
        } else if (!empty($front) && empty($back)) {
            $this->upload->do_upload('front');
            $a = $this->upload->data();

            $data = array(
                'front' => $a['file_name'],
                'bg_color' => $this->input->post('bg_color')
            );
        } else if (empty($flag) && !empty($back)) {
            $this->upload->do_upload('back');
            $a = $this->upload->data();

            $data = array(
                'back' => $a['file_name'],
                'bg_color' => $this->input->post('bg_color')
            );
        } else {

            $data = array(
                'bg_color' => $this->input->post('bg_color')
            );
        }

        $update = $this->settingsModel->updateID($data);

        if ($update) {
            $log = array(
                'activity' => 'Barangay ID updated',
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('message', 'Watermark for barangay ID  has been changed!');
        } else {
            $this->session->set_flashdata('errors', 'No changes has been made!');
        }

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function backup()
    {
        $log = array(
            'activity' => 'Backup generated',
            'user_id' => $this->session->id,
        );
        $this->settingsModel->insert_activity($log);

        $this->load->dbutil();

        $prefs = array(
            'format'      => 'zip',
            'filename'    => 'my_db_backup.sql'
        );

        $backup = $this->dbutil->backup($prefs);

        $db_name = 'backup-on-' . date("Y-m-d-H-i-s") . '.zip';
        $save = 'pathtobkfolder/' . $db_name;

        $this->load->helper('file');
        write_file($save, $backup);

        $this->load->helper('download');
        force_download($db_name, $backup);
    }

    public function restore()
    {

        $config['upload_path'] = './assets/backup/';
        $config['allowed_types'] = '*';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('backup_file')) {

            $this->session->set_flashdata('errors',  $this->upload->display_errors());
        } else {
            $file = $this->upload->data();

            $sql = file_get_contents('./assets/backup/' . $file['file_name']);
            $string_query = rtrim($sql, '\n;');
            $array_query = explode(';', $sql);

            foreach ($array_query as $query) {
                $this->db->query($query);
            }
            $this->session->set_flashdata('message', 'Database Restored!');
        }

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
}
