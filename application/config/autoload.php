<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'session', 'form_validation', 'email');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'form', 'file', 'security');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array(
    'User_model',
    'Customer_model',
    'Consultation_model',
    'Quote_model',
    'Lead_model'
);
