<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'dashboard/error_page';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/index';
$route['admin'] = 'auth/index';
$route['user'] = 'auth/users';
$route['user_save'] = 'auth/createUser';
$route['remove_user/(:num)'] = 'auth/removeUser/$1';

$route['brgy_info_save'] = 'settings/save_brgy_info';
$route['backup'] = 'settings/backup';
$route['restore'] = 'settings/restore';
$route['support'] = 'settings/support';
$route['activity_logs'] = 'settings/activity_logs';

$route['create_resident'] = 'resident/create_resident';
$route['edit_resident/(:num)'] = 'resident/edit_resident/$1';
$route['resident_certification'] = 'resident/brgy_cert';
$route['generate_profile/(:num)'] = 'resident/generate_profile/$1';
$route['generate_brgy_cert/(:num)'] = 'resident/generate_brgy_cert/$1';
$route['generate_indi_cert/(:num)'] = 'resident/generate_indi_cert/$1';
$route['generate_resi_cert/(:num)'] = 'resident/generate_resi_cert/$1';
$route['generate_id/(:num)'] = 'resident/generate_id/$1';

$route['generate_business_permit/(:num)'] = 'business/generate_b_permit/$1';

$route['summon/(:any)'] = 'blotter/summon/$1';
$route['generate_settlement_report/(:any)'] = 'blotter/generate_settlement_report/$1';
$route['generate_dismissed_report/(:any)'] = 'blotter/generate_dismissed_report/$1';
$route['generate_endorsed_report/(:any)'] = 'blotter/generate_endorsed_report/$1';
$route['generate_summon/(:any)/(:num)'] = 'blotter/generate_summon/$1/$2';

$route['create_certificates'] = 'certificates/create_certificates';
$route['edit_certificate/(:num)'] = 'certificates/edit_certificate/$1';
$route['generate_cert/(:num)'] = 'certificates/generate_cert/$1';
$route['view_cert/(:num)'] = 'certificates/view_cert/$1';

$route['dashboard'] = 'dashboard/index';
$route['resident_info/(:any)'] = 'dashboard/resident_info/$1';
$route['population'] = 'dashboard/population';

$route['purok_info'] = 'dashboard/purok_info';
$route['precinct_info'] = 'dashboard/precinct_info';
$route['houses'] = 'dashboard/houses';
$route['house_info/(:any)'] = 'dashboard/house_info/$1';

$route['create_blotter'] = 'blotter/create_blotter';
$route['edit_blotter/(:any)'] = 'blotter/edit_blotter/$1';

$route['covidstatus'] = 'dashboard/covidstatus';
$route['covid-deaths'] = 'dashboard/covid_death';

$route['request'] = 'request/index';

$route['services'] = 'services/index';

$route['client'] = 'home/client';
$route['client/about-us'] = 'home/about';
$route['client/map'] = 'home/map';
$route['client/announcement'] = 'home/announcement';
$route['client/register'] = 'home/register';
$route['client/login'] = 'home/login';
$route['client/profile'] = 'home/profile';
$route['client/services'] = 'home/services';
$route['client/services_info/(:num)'] = 'home/service_info/$1';
$route['client/transactions'] = 'home/transactions';
$route['client/change_password'] = 'home/change_pass';
$route['client/resident/(:num)'] = 'home/resident/$1';

$route['cancel/(:num)'] = 'request/cancel/$1';
$route['received/(:num)'] = 'request/received/$1';