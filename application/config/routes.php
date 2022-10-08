<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['package'] = 'package/$1';
$route['sign-up'] = 'sign_up';
$route['terms-conditions'] = 'Terms_conditions';
$route['privacy-policy'] = 'privacy_policy';
$route['account-verify'] = 'account_verify';
// admin
$route['forgot-password'] = 'forgot_password';
$route['password-change'] = 'password_change';

$route['accounts-list'] = 'accounts_list';
$route['accounts-add'] = 'accounts_add';

