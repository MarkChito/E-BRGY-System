<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property settingsModel $settingsModel 
 * @property base $base 
 * @property officialsModel $officialsModel 
 * @property dashboardModel $dashboardModel 
 * @property session $session 
 * @property residentModel $residentModel 
 * @property servicesModel $servicesModel 
 * @property requestModel $requestModel 
 * @property form_validation $form_validation 
 * @property input $input 
 * @property userModel $userModel 
 * @property upload $upload 
 * @property image_lib $image_lib 
 */

class Auth extends CI_Controller
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

        if ($this->session->userdata('logged_in') && $this->session->userdata('role') != 'resident') {
            //redirect them to the dasboard page
            redirect('dashboard', 'refresh');
        }

        $data['info'] = $this->settingsModel->getInfo();
        $data['title'] = 'Login';
        $this->load->view('login', $data);
    }

    public function loginSubmit()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            $data = array(
                'username' => $this->input->post('username'),
                'password' => sha1($this->input->post('password'))
            );

            $login = $this->userModel->login($data);

            if ($login) {

                $login_data = array(
                    'id' => $login['id'],
                    'username' => $login['username'],
                    'email' => $login['email'],
                    'role' => $login['user_type'],
                    'avatar' => $login['avatar'],
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($login_data);

                $log = array(
                    'activity' => 'User loggedin',
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('message', 'Welcome back, ' . $this->input->post('username') . '. You are successfully logged in!');
                redirect("dashboard", 'refresh');
            } else {

                $this->session->set_flashdata('errors', 'Username/Password is incorrect!');
            }
        }

        redirect("login", 'refresh');
    }

    public function loginRes()
    {
        $this->session->set_flashdata('success', 'danger');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('message', validation_errors());
        } else {

            $data = array(
                'username' => $this->input->post('username'),
                'password' => sha1($this->input->post('password'))
            );

            $login = $this->userModel->login($data);

            if ($login) {

                $login_data = array(
                    'id' => $login['id'],
                    'username' => $login['username'],
                    'role' => $login['user_type'],
                    'avatar' => $login['avatar'],
                    'resident_id' => $login['resident_id'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($login_data);

                $log = array(
                    'activity' => 'User loggedin',
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('success', 'success');
                $this->session->set_flashdata('message', 'Welcome back, ' . $this->input->post('username') . '. You are successfully logged in!');
                redirect("dashboard", 'refresh');
            } else {

                $this->session->set_flashdata('message', 'Username/Password is incorrect!');
            }
        }

        redirect("client/login", 'refresh');
    }

    public function users()
    {
        if (!$this->session->userdata('logged_in')) {
            //redirect them to the dasboard page
            redirect('login', 'refresh');
        }

        $data['users'] = $this->userModel->getUsers();

        $data['title'] = 'User Management';
        $this->base->load('default', 'user/users', $data);
    }

    public function register()
    {
        $this->session->set_flashdata('success', 'danger');

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('fname', 'Username', 'required|trim');
        $this->form_validation->set_rules('mname', 'Username', 'required|trim');
        $this->form_validation->set_rules('lname', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('conpassword', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', validation_errors());
        } else {
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
            );

            $checkRes = $this->userModel->getResID($data);

            if ($checkRes) {
                $checkUser = $this->userModel->checkUser($checkRes->id);
                if ($checkUser) {
                    $this->session->set_flashdata('message', 'Error! Resident already registered!');
                } else {
                    $userData = array(
                        'fname' => $this->input->post('fname'),
                        'lname' => $this->input->post('lname'),
                        'username' => $this->input->post('username'),
                        'password' => sha1($this->input->post('password')),
                        'user_type' => 'resident',
                        'resident_id' =>  $checkRes->id,
                        'birth' =>  $checkRes->birthdate,
                        'phone' =>  $checkRes->phone,
                        'email' =>  $checkRes->email,
                        'address' =>  $checkRes->address,
                        'avatar' =>  $checkRes->picture,
                    );

                    // $insert = $this->userModel->save($userData);

                    // if ($insert) {
                    //     $log = array(
                    //         'activity' => 'User Created: ' . $this->input->post('username'),
                    //         'user_id' => $this->session->id,
                    //     );

                    //     $this->settingsModel->insert_activity($log);

                    //     $this->session->set_flashdata('success', 'success');
                    //     $this->session->set_flashdata('message', 'Registered successfully. Please login!');

                    //     $this->session->unset_userdata("register_fname");
                    //     $this->session->unset_userdata("register_mname");
                    //     $this->session->unset_userdata("register_lname");
                    //     $this->session->unset_userdata("register_username");
                    //     $this->session->unset_userdata("register_password");
                    //     $this->session->unset_userdata("register_confirm_password");
                    // } else {
                    //     $this->session->set_flashdata('message', 'Something went wrong. Please try again!');
                    // }

                    echo json_encode($userData);
                }
            } else {
                $this->session->set_userdata("register_fname", $this->input->post('fname'));
                $this->session->set_userdata("register_mname", $this->input->post('mname'));
                $this->session->set_userdata("register_lname", $this->input->post('lname'));
                $this->session->set_userdata("register_username", $this->input->post('username'));
                $this->session->set_userdata("register_password", $this->input->post('password'));
                $this->session->set_userdata("register_confirm_password", $this->input->post('conpassword'));

                $this->session->set_flashdata('message', 'You are not registered resident. Please contact barangay officials!');
            }
        }

        // redirect("client/register", 'refresh');
    }

    public function createUser()
    {

        $validator = array('success' => false, 'msg' => array());

        $config['upload_path'] = 'assets/uploads/avatar/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('user_type', 'User Role', 'required');

        if (!empty($this->input->post('email'))) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        }

        if ($this->form_validation->run() == FALSE) {

            $validator['success'] = false;
            $validator['msg'] = validation_errors();
        } else {
            if (empty($this->input->post('profileimg')) && !$this->upload->do_upload('profile')) {
                $userData = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => sha1($this->input->post('password')),
                    'user_type' => $this->input->post('user_type'),
                );
            } else if (!empty($this->input->post('profileimg')) && !$this->upload->do_upload('profile')) {

                $userData = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => sha1($this->input->post('password')),
                    'user_type' => $this->input->post('user_type'),
                    'avatar' => $this->input->post('profile'),
                );
            } else {

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


                $userData = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => sha1($this->input->post('password')),
                    'user_type' => $this->input->post('user_type'),
                    'avatar' => $file['file_name'],
                );
            }

            $insert = $this->userModel->save($userData);

            if ($insert) {

                $log = array(
                    'activity' => 'User Created: ' . $this->input->post('username'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $validator['success'] = true;
                $validator['msg'] = 'User successfully added!';
            } else {
                $validator['success'] = false;
                $validator['msg'] = 'Something went wrong. Please contact the administrator';
            }
        }

        echo json_encode($validator);
    }

    public function changeResProfile()
    {
        $this->session->set_flashdata('success', 'danger');
        $config['upload_path'] = 'assets/uploads/resident_profile/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->form_validation->set_rules('id', 'Resident ID', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('message', validation_errors());
        } else {

            if ($this->upload->do_upload('profile')) {
                $file = $this->upload->data();
                //Resize and Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/uploads/resident_profile/' . $file['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['new_image'] = 'assets/uploads/resident_profile/' . $file['file_name'];

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();


                $userData = array(
                    'picture' => $file['file_name'],
                );

                $id = $this->input->post('id');

                $update = $this->residentModel->update($userData, $id);

                if ($update) {

                    $this->session->set_flashdata('success', 'success');
                    $this->session->set_flashdata('message', 'Profile has been updated!');
                } else {
                    $this->session->set_flashdata('message', 'Something went wrong. Please try again');
                }
            }
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function addsecurity()
    {
        $this->session->set_flashdata('success', 'success');
        $this->form_validation->set_rules('answer_1', 'Answer 1', 'required');
        $this->form_validation->set_rules('answer_2', 'Answer 2', 'required');
        $this->form_validation->set_rules('answer_3', 'Answer 3', 'required');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {
            $username = $this->session->username;

            $data = array(
                'resident_id' => $this->input->post('res_id'),
                'username' => $this->input->post('username'),
                'question_1' => $this->input->post('question_1'),
                'answer_1' => $this->input->post('answer_1'),
                'question_2' => $this->input->post('question_2'),
                'answer_2' => $this->input->post('answer_2'),
                'question_3' => $this->input->post('question_3'),
                'answer_3' => $this->input->post('answer_3')
            );

            $check = $this->userModel->checkSecurity($username);

            if (!empty($check)) {
                $this->userModel->updateSecurity($data, $username);
                $this->session->set_flashdata('message', 'Security question has been updated!');
            } else {
                $this->userModel->createSecurity($data);
                $this->session->set_flashdata('message', 'Security question has been set!');
            }
        }

        redirect("client/profile", 'refresh');
    }

    public function security_check()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('question_1', 'Question 1', 'required');
        $this->form_validation->set_rules('answer_1', 'Answer 1', 'required');
        $this->form_validation->set_rules('question_2', 'Question 2', 'required');
        $this->form_validation->set_rules('answer_2', 'Answer 2', 'required');
        $this->form_validation->set_rules('question_3', 'Question 3', 'required');
        $this->form_validation->set_rules('answer_3', 'Answer 3', 'required');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('errors', validation_errors());
        } else {

            $data = array(
                'username' => $this->input->post('username'),
                'question_1' => $this->input->post('question_1'),
                'answer_1' => $this->input->post('answer_1'),
                'question_2' => $this->input->post('question_2'),
                'answer_2' => $this->input->post('answer_2'),
                'question_3' => $this->input->post('question_3'),
                'answer_3' => $this->input->post('answer_3'),
            );

            $match = $this->userModel->matchsecurity($data);

            if ($match) {
                $this->session->set_flashdata('success', 'success');
                $this->session->set_flashdata('message', 'You can now reset your password!');
                $this->session->set_flashdata('username', $this->input->post('username'));
                $this->session->set_flashdata('user_id', $match->resident_id);
                redirect("client/change_password", 'refresh');
            } else {
                $this->session->set_flashdata('success', 'danger');
                $this->session->set_flashdata('message', 'Incorrect answer/s!');
            }
        }

        redirect("client/login", 'refresh');
    }

    public function update_profile()
    {

        $validator = array('success' => false, 'msg' => array());

        $config['upload_path'] = 'assets/uploads/avatar/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!empty($this->input->post('email'))) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        }

        if ($this->form_validation->run() == FALSE) {

            $validator['success'] = false;
            $validator['msg'] = validation_errors();
        } else {

            if (empty($this->input->post('profileimg')) && !$this->upload->do_upload('avatar')) {
                $userData = array(
                    'email' => $this->input->post('email'),
                );
            } else if (!empty($this->input->post('profileimg')) && !$this->upload->do_upload('avatar')) {

                $userData = array(
                    'email' => $this->input->post('email'),
                    'avatar' => $this->input->post('profileimg'),
                );
            } else {

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


                $userData = array(
                    'email' => $this->input->post('email'),
                    'avatar' => $file['file_name'],
                );
            }
            $id = $this->input->post('id');

            $update = $this->userModel->update($userData, $id);

            if ($update) {

                $log = array(
                    'activity' => 'User Updated',
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $validator['success'] = true;
                $validator['msg'] = 'Your profile has been updated!';

                $unset = array('email', 'avatar');
                $this->session->unset_userdata($unset);

                $data = array('id' => $id);
                $user = $this->userModel->login($data);

                $newset = array('email' => $user['email'], 'avatar' => $user['avatar']);
                $this->session->set_userdata($newset);
            } else {
                $validator['success'] = false;
                $validator['msg'] = 'No changes has been made!';
            }
        }

        echo json_encode($validator);
    }

    public function changePass()
    {

        $validator = array('success' => false, 'msg' => array());

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {

            $validator['success'] = false;
            $validator['msg'] = validation_errors();
        } else {

            $data = array(
                'password' => sha1($this->input->post('password'))
            );

            $id = $this->session->userdata('id');

            $update = $this->userModel->update($data, $id);

            if ($update) {

                $log = array(
                    'activity' => 'User password changed: ' . $this->input->post('username'),
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $validator['success'] = true;
                $validator['msg'] = 'Your password has been updated!';
            } else {
                $validator['success'] = false;
                $validator['msg'] = 'No changes has been made!';
            }
        }

        echo json_encode($validator);
    }

    public function resetResPass()
    {

        $this->session->set_flashdata('success', 'danger');

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('conpassword', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('message', validation_errors());
        } else {

            $data = array(
                'password' => sha1($this->input->post('password'))
            );

            $id = $this->input->post('user_id');

            $update = $this->userModel->updateresPas($data, $id);

            if ($update) {

                $this->session->set_flashdata('success', 'success');
                $this->session->set_flashdata('message', 'Password has been updated. Please login!');
                redirect("client/login", 'refresh');
            } else {
                $this->session->set_flashdata('message', 'No changes has been made!');
            }
        }
        $this->session->set_flashdata('username', $this->input->post('username'));
        $this->session->set_flashdata('user_id', $this->input->post('user_id'));
        redirect("client/change_password", 'refresh');
    }

    public function changeResPass()
    {

        $this->session->set_flashdata('success', 'danger');

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('conpassword', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('message', validation_errors());
        } else {

            $data = array(
                'password' => sha1($this->input->post('password'))
            );

            $id = $this->session->id;

            $update = $this->userModel->update($data, $id);

            if ($update) {

                $log = array(
                    'activity' => 'User password changed: ' . $id,
                    'user_id' => $this->session->id,
                );
                $this->settingsModel->insert_activity($log);

                $this->session->set_flashdata('success', 'success');
                $this->session->set_flashdata('message', 'Password has been updated!');
            } else {
                $this->session->set_flashdata('message', 'No changes has been made!');
            }
        }

        redirect("client/profile", 'refresh');
    }

    public function removeUser($id)
    {

        $delete = $this->userModel->delete($id);

        if ($delete) {

            $log = array(
                'activity' => 'User deleted: ' . $id,
                'user_id' => $this->session->id,
            );
            $this->settingsModel->insert_activity($log);

            $this->session->set_flashdata('errors', 'User has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect('user', 'refresh');
    }

    public function verify_otp()
    {
        $hashed_otp = $this->input->get("otp");
        $email = $this->input->get("email");

        $user_data = $this->userModel->checkUserEmail($email);

        if ($user_data) {
            if (md5($user_data->otp) != $hashed_otp) {
                $this->session->set_flashdata('success', 'danger');
                $this->session->set_flashdata('message', 'This link is already expired!');

                redirect(base_url() . "client/login");
            } else {
                $this->session->set_flashdata('success', 'success');
                $this->session->set_flashdata('message', 'You can now reset your password!');
                $this->session->set_flashdata('username', $user_data->username);
                $this->session->set_flashdata('user_id', $user_data->resident_id);

                redirect("client/change_password?otp_reset=true", 'refresh');
            }
        } else {
            $this->session->set_flashdata('success', 'danger');
            $this->session->set_flashdata('message', 'Link is already expired!');

            redirect(base_url() . "client/login");
        }

        redirect("client/login", 'refresh');
    }

    public function send_otp()
    {
        $email = $this->input->post("email");

        $response = false;

        $user_data = $this->userModel->checkUserEmail($email);

        $otp = mt_rand(100000, 999999);
        $hashed_otp = md5($otp);

        $data = array("otp" => $otp);

        $link = base_url() . "auth/verify_otp?otp=" . $hashed_otp . "&email=" . $email;

        if ($user_data) {
            $receipient_name = $user_data->fname . " " . $user_data->lname;
            $receipient_email = $email;
            $subject = "Password Reset Request";
            $message = "
                <h1>Password Reset Request</h1>
                <br>
                <p>To reset your password, please click the link below:</p>
                <p>
                    <a href='" . $link . "'>" . $link . "</a>
                </p>
                <br>
                <p>Here is your 6-digit OTP code: <b>" . $otp . "</b></p>
                <br>
                <br>
                <p>-- E-R:BTP SYSTEM --</p>
            ";
            $sender_name = "E-R:BTP SYSTEM Administrator";

            if (send_email($receipient_name, $receipient_email, $subject, $message, $sender_name)) {
                $this->userModel->updateOTP($data, $email);

                $this->session->set_flashdata('success', 'success');
                $this->session->set_flashdata('message', 'OTP has been sent to your email.');
            } else {
                $this->session->set_flashdata('success', 'danger');
                $this->session->set_flashdata('message', 'There is an error while processing your request.');
            }

            $response = true;
        }

        echo json_encode($response);
    }

    public function check_otp_number()
    {
        $otp_code = $this->input->post("otp_code");

        $user_data = $this->userModel->checkOTPCode($otp_code);

        $response = false;

        if ($user_data) {
            $data = array("otp" => 0);

            if ($this->userModel->updateOTP($data, $user_data->email) > 0) {
                $response = true;
            }
        }

        echo json_encode($response);
    }

    public function logout()
    {

        $log = array(
            'activity' => 'User logged out',
            'user_id' => $this->session->id,
        );
        $this->settingsModel->insert_activity($log);

        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect(site_url(), 'refresh');
    }
}
