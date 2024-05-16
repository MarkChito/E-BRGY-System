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
*/

class Home extends CI_Controller
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
        redirect('client');
    }
    public function client()
    {
        $data['info'] = $this->settingsModel->getbrgy_Info();

        $data['title'] = 'Home';

        $this->base->load('client', 'home/home', $data);
    }
    public function about()
    {
        $data['info'] = $this->settingsModel->getbrgy_Info();
        $data['officials'] = $this->officialsModel->getOfficials();
        $data['population'] = $this->dashboardModel->getTotalPopulation();

        $data['title'] = 'About the Barangay';

        $this->base->load('client', 'home/about', $data);
    }
    public function map()
    {
        $data['info'] = $this->settingsModel->getbrgy_Info();

        $data['title'] = 'Map of Barangay';

        $this->base->load('client', 'home/map', $data);
    }
    public function announcement()
    {
        $data['info'] = $this->settingsModel->getbrgy_Info();
        $data['announce'] = $this->dashboardModel->getAnnouncement();

        $data['title'] = 'Barangay Announcement';

        $this->base->load('client', 'home/announcement', $data);
    }
    public function profile()
    {
        if (!$this->session->logged_in || $this->session->role != 'resident') {
            //redirect them to the dasboard page
            redirect('client', 'refresh');
        }

        $data['res'] = $this->residentModel->getProfile($this->session->resident_id);

        $data['title'] = 'My Profile';

        $this->base->load('client', 'home/profile', $data);
    }
    public function resident($id)
    {
        $data['res'] = $this->residentModel->getProfile($id);

        $data['title'] = 'Residen Profile';

        $this->base->load('client', 'home/resident', $data);
    }
    public function services()
    {
        $data['services'] = $this->servicesModel->getActiveservices();

        $data['title'] = 'Services';

        $this->base->load('client', 'home/services', $data);
    }

    public function change_pass()
    {
        if (!$this->session->flashdata('username')) {
            //redirect them to the dasboard page
            redirect('client/login', 'refresh');
        }
        $data['info'] = $this->settingsModel->getbrgy_Info();
        $data['title'] = 'Change Password';

        $this->base->load('client', 'home/change_password', $data);
    }

    public function service_info($id)
    {
        $data['services'] = $this->servicesModel->getservice($id);

        $data['title'] =  $data['services']->title;

        $this->base->load('client', 'home/service_info', $data);
    }

    public function transactions()
    {
        $id = $this->session->resident_id;
        $data['trans'] = $this->requestModel->transactions($id);

        $data['title'] = 'My Transactions';

        $this->base->load('client', 'home/transaction', $data);
    }

    public function login()
    {
        if ($this->session->logged_in && $this->session->role == 'resident') {
            //redirect them to the dasboard page
            redirect('profile', 'refresh');
        }

        $data['info'] = $this->settingsModel->getbrgy_Info();

        $data['title'] = 'Login';

        $this->base->load('client', 'home/login', $data);
    }
    public function register()
    {
        if ($this->session->userdata('logged_in')) {
            //redirect them to the dasboard page
            redirect('profile', 'refresh');
        }

        $data['info'] = $this->settingsModel->getbrgy_Info();

        $data['title'] = 'Registration';

        $this->base->load('client', 'home/register', $data);
    }
}
