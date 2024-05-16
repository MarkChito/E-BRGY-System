<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
			redirect('client', 'refresh');
		}

		$data['population'] = $this->dashboardModel->getTotalPopulation();
		$data['voters'] = $this->dashboardModel->getVoters();
		$data['nonvoters'] = $this->dashboardModel->getnonVoters();
		$data['pwd'] = $this->dashboardModel->getPWD();
		$data['senior'] = $this->dashboardModel->getSenior();
		$data['blotter'] = $this->dashboardModel->getBlotter();
		$data['revenue'] = $this->dashboardModel->getRevenue();
		$data['permit'] = $this->dashboardModel->getPermit();
		$data['male'] = $this->dashboardModel->getMale();
		$data['female'] = $this->dashboardModel->getFemale();

		$data['announcement'] = $this->dashboardModel->getlatestAnnouncement();

		$data['info'] = $this->settingsModel->getbrgy_Info();
		$data['title'] = 'Dashboard';
		$this->base->load('default', 'dashboard', $data);
	}

	public function getWeeklyRevenue()
	{
		$validator = array('bar' => array(), 'ind' => array(), 'res' => array(), 'bus' => array(), 'oth' => array());

		$from = date('Y-m-d', strtotime("last Monday"));
		$to = date('Y-m-d', strtotime("next Friday"));

		$validator['bar'] = $this->dashboardModel->getBarangayRevenue($from, $to);
		$validator['ind'] = $this->dashboardModel->getIndigencyRevenue($from, $to);
		$validator['res'] = $this->dashboardModel->getResidencyRevenue($from, $to);
		$validator['bus'] = $this->dashboardModel->getBusinessRevenue($from, $to);
		$validator['oth'] = $this->dashboardModel->getOthersRevenue($from, $to);

		echo json_encode($validator);
	}

	public function getPopulation()
	{
		$validator = array('total' => array(), 'male' => array(), 'female' => array());

		$validator['total'] = $this->dashboardModel->getTotalPopulation();
		$validator['male'] = $this->dashboardModel->getTotalMale();
		$validator['female'] = $this->dashboardModel->getTotalFemale();

		echo json_encode($validator);
	}

	public function getCovid()
	{
		$validator = array('status' => array());

		$covid = $this->dashboardModel->getCovidStatus();

		$validator['status'] = $covid;

		echo json_encode($validator);
	}

	public function resident_info($state = '')
	{

		if ($state == 'non-voters') {
			$data['resident'] = $this->dashboardModel->getnonVoters();
			$data['title'] = 'Non-Voters Information';
			$data['state'] = $state;
			$this->base->load('default', 'resident/voters.php', $data);
		} else if ($state == 'senior') {
			$data['resident'] = $this->dashboardModel->getSenior();
			$data['title'] = 'Senior Citizen Information';
			$data['state'] = $state;
			$this->base->load('default', 'resident/senior.php', $data);
		} elseif ($state == 'pwd') {
			$data['resident'] = $this->dashboardModel->getPWD();
			$data['title'] = 'PWD Resident Information';
			$data['state'] = $state;
			$this->base->load('default', 'resident/senior.php', $data);
		} else {
			$data['resident'] = $this->dashboardModel->getVoters();
			$data['title'] = 'Voters Information';
			$data['state'] = $state;
			$this->base->load('default', 'resident/voters.php', $data);
		}
	}

	public function population()
	{

		$data['resident'] = $this->dashboardModel->getPopulation();
		$data['male'] = $this->dashboardModel->getMale();
		$data['female'] = $this->dashboardModel->getFemale();

		$data['title'] = 'Barangay Population';
		$this->base->load('default', 'resident/population', $data);
	}

	public function covidstatus()
	{

		$data['resident'] = $this->dashboardModel->getResCovid();
		$data['nega'] = $this->dashboardModel->getNegaCovid();
		$data['posi'] = $this->dashboardModel->getPosiCovid();
		$data['fully'] = $this->dashboardModel->getFullyCovid();
		$data['vac'] = $this->dashboardModel->getVacCovid();
		$data['fullyP'] = $this->dashboardModel->getFullPCovid();
		$data['vacP'] = $this->dashboardModel->getVacPCovid();

		$data['title'] = 'Resident COVID19 Status';
		$this->base->load('default', 'covid/covidstatus', $data);
	}

	public function covid_death()
	{
		if (!$this->session->userdata('logged_in')) {
			//redirect them to the dasboard page
			redirect('login', 'refresh');
		}


		$data['resident'] = $this->dashboardModel->getCovidDeaths();

		$data['title'] = 'Residents Covid19 Deaths';
		$this->base->load('default', 'covid/covid_deaths', $data);
	}

	public function purok_info()
	{
		$data['purok'] = $this->purokModel->getPurok();

		$data['title'] = 'Purok Information';
		$this->base->load('default', 'purok/purok_info', $data);
	}

	public function houses()
	{
		$data['house'] = $this->dashboardModel->getHouses();

		$data['title'] = 'Households Information';
		$this->base->load('default', 'houses/houses', $data);
	}

	public function house_info($num)
	{
		$data['members'] = $this->dashboardModel->getHouseInfo($num);

		$data['h_num'] = $num;
		$data['title'] = 'Family Members';
		$this->base->load('default', 'houses/house_info', $data);
	}

	public function delete_household($id)
	{

		$delete = $this->dashboardModel->delete_household($id);

		if ($delete) {

			$log = array(
				'activity' => 'Household deleted: ' . $id,
				'user_id' => $this->session->id,
			);
			$this->settingsModel->insert_activity($log);

			$this->session->set_flashdata('errors', 'Household has been deleted!');
		} else {
			$this->session->set_flashdata('errors', 'Something went wrong!');
		}
		redirect('houses', 'refresh');
	}

	public function precinct_info()
	{
		$data['precinct'] = $this->precinctModel->getPrecinct();

		$data['title'] = 'Precinct Information';
		$this->base->load('default', 'precinct/precinct_info', $data);
	}

	public function update_relation()
	{

		$id = $this->input->post('id');

		$this->form_validation->set_rules('relation', 'Relation', 'required|trim');

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('errors', validation_errors());
		} else {

			$data = array(
				'relation' => $this->input->post('relation')
			);

			$update = $this->dashboardModel->update_relation($data, $id);

			if ($update) {

				$log = array(
					'activity' => 'Family relation updated: ' . $this->input->post('relation'),
					'user_id' => $this->session->id,
				);
				$this->settingsModel->insert_activity($log);

				$this->session->set_flashdata('message', 'Relation has been updated!');
			} else {
				$this->session->set_flashdata('errors', 'No changes has been made!');
			}
		}

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function update_household()
	{

		$id = $this->input->post('id');

		$this->form_validation->set_rules('number', 'Household Number', 'required|trim');

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('errors', validation_errors());
		} else {

			$data = array(
				'number' => $this->input->post('number'),
				'info' => $this->input->post('details')
			);

			$update = $this->dashboardModel->update_household($data, $id);

			if ($update) {

				$log = array(
					'activity' => 'Household updated: ' . $this->input->post('number'),
					'user_id' => $this->session->id,
				);
				$this->settingsModel->insert_activity($log);

				$this->session->set_flashdata('message', 'Household number has been updated!');
			} else {
				$this->session->set_flashdata('errors', 'No changes has been made!');
			}
		}

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function error_page()
	{
		$this->load->view('404');
	}

	public function getvoters($state)
	{

		$list = $this->votersTableModel->get_datatables($state);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $res) {
			$no++;
			$row = array();
			if (preg_match('/data:image/i', $res->picture)) {
				$row[] = "<a href='" . site_url('generate_profile/') . $res->id . "'>
                <img width='30' height='30' class='img-circle' alt='user' 
                src='" . $res->picture . "'/></a> "
					. ucwords($res->lastname . ", " . $res->firstname . " " . $res->middlename);
			} elseif (!empty($res->picture)) {
				$row[] = "<a href='" . site_url('generate_profile/') . $res->id . "'>
                    <img width='30' height='30' class='img-circle' alt='user' 
                    src='" . site_url() . 'assets/uploads/resident_profile/' . $res->picture . "'/></a> "
					. ucwords($res->lastname . ", " . $res->firstname . " " . $res->middlename);
			} else {
				$row[] = "<a href='" . site_url('generate_profile/') . $res->id . "'>
                    <img width='30' height='30' class='img-circle' alt='user' 
                    src='" . site_url('assets/img/person.png') . "'/></a> "
					. ucwords($res->lastname . ", " . $res->firstname . " " . $res->middlename);
			}
			$row[] = date('F d, Y', strtotime($res->birthdate));
			$row[] = floor((time() - strtotime($res->birthdate)) / 31556926);
			$row[] = $res->civilstatus;
			$row[] = $res->gender;

			if ($state == 'pwd' || $state == 'senior') {
				$row[] = $res->pwd;
			} else {
				$row[] = $res->precinct;
			}

			$row[] = $res->voterstatus;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->votersTableModel->count_all($state),
			"recordsFiltered" => $this->votersTableModel->count_filtered($state),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function getcovidStats()
	{

		$list = $this->covidTableModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $res) {
			$no++;
			$row = array();
			if (preg_match('/data:image/i', $res->picture)) {
				$row[] = "<a href='" . site_url('generate_profile/') . $res->id . "'>
                <img width='30' height='30' class='img-circle' alt='user' 
                src='" . $res->picture . "'/></a> "
					. ucwords($res->lastname . ", " . $res->firstname . " " . $res->middlename);
			} elseif (!empty($res->picture)) {
				$row[] = "<a href='" . site_url('generate_profile/') . $res->id . "'>
                    <img width='30' height='30' class='img-circle' alt='user' 
                    src='" . site_url() . 'assets/uploads/resident_profile/' . $res->picture . "'/></a> "
					. ucwords($res->lastname . ", " . $res->firstname . " " . $res->middlename);
			} else {
				$row[] = "<a href='" . site_url('generate_profile/') . $res->id . "'>
                    <img width='30' height='30' class='img-circle' alt='user' 
                    src='" . site_url('assets/img/person.png') . "'/></a> "
					. ucwords($res->lastname . ", " . $res->firstname . " " . $res->middlename);
			}
			$row[] = floor((time() - strtotime($res->birthdate)) / 31556926);
			$row[] = $res->civilstatus;
			$row[] = $res->gender;
			$row[] = '<span class="label label-primary">' . $res->resident_type . '</span>';
			if ($res->status == 'Negative') {
				$row[] = '<span class="label label-success">' . $res->status . '</span>';
			} elseif ($res->status == 'Positive') {
				$row[] = '<span class="label label-danger">' . $res->status . '</span>';
			} elseif ($res->status == 'Fully Vaccinated') {
				$row[] = '<span class="label label-primary">' . $res->status . '</span>';
			} elseif ($res->status == 'Fully Vaccinated - Positive') {
				$row[] = '<span class="label label-danger">' . $res->status . '</span>';
			} elseif ($res->status == '1st Vaccine - Positive') {
				$row[] = '<span class="label label-danger">' . $res->status . '</span>';
			} else {
				$row[] = '<span class="label label-info">' . $res->status . '</span>';
			}
			$row[] = $res->remarks;
			$row[] = $res->address;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->covidTableModel->count_all(),
			"recordsFiltered" => $this->covidTableModel->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function getcovidDeaths()
	{

		$list = $this->covidDeathTableModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $res) {
			$no++;
			$row = array();
			if (preg_match('/data:image/i', $res->picture)) {
				$row[] = "<a href='" . site_url('generate_profile/') . $res->id . "'>
                <img width='30' height='30' class='img-circle' alt='user' 
                src='" . $res->picture . "'/></a> "
					. ucwords($res->lastname . ", " . $res->firstname . " " . $res->middlename);
			} elseif (!empty($res->picture)) {
				$row[] = "<a href='" . site_url('generate_profile/') . $res->id . "'>
                    <img width='30' height='30' class='img-circle' alt='user' 
                    src='" . site_url() . 'assets/uploads/resident_profile/' . $res->picture . "'/></a> "
					. ucwords($res->lastname . ", " . $res->firstname . " " . $res->middlename);
			} else {
				$row[] = "<a href='" . site_url('generate_profile/') . $res->id . "'>
                    <img width='30' height='30' class='img-circle' alt='user' 
                    src='" . site_url('assets/img/person.png') . "'/></a> "
					. ucwords($res->lastname . ", " . $res->firstname . " " . $res->middlename);
			}
			$row[] = floor((time() - strtotime($res->birthdate)) / 31556926);
			$row[] = $res->civilstatus;
			$row[] = $res->gender;
			$row[] = '<span class="label label-primary">' . $res->resident_type . '</span>';
			if ($res->status == 'Negative') {
				$row[] = '<span class="label label-success">' . $res->status . '</span>';
			} elseif ($res->status == 'Positive') {
				$row[] = '<span class="label label-danger">' . $res->status . '</span>';
			} elseif ($res->status == 'Fully Vaccinated') {
				$row[] = '<span class="label label-primary">' . $res->status . '</span>';
			} elseif ($res->status == 'Fully Vaccinated - Positive') {
				$row[] = '<span class="label label-danger">' . $res->status . '</span>';
			} elseif ($res->status == '1st Vaccine - Positive') {
				$row[] = '<span class="label label-danger">' . $res->status . '</span>';
			} else {
				$row[] = '<span class="label label-info">' . $res->status . '</span>';
			}
			$row[] = $res->remarks;
			$row[] = $res->r_remarks;
			$row[] = $res->address;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->covidDeathTableModel->count_all(),
			"recordsFiltered" => $this->covidDeathTableModel->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
}
