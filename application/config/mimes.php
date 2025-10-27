<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

return array(
	// Images
	'gif'    => array('image/gif', 'image/x-gif'),
	'jpeg'   => array('image/jpeg', 'image/pjpeg'),
	'jpg'    => array('image/jpeg', 'image/pjpeg'),
	'jpe'    => array('image/jpeg', 'image/pjpeg'),
	'png'    => array('image/png', 'image/x-png'),
	'bmp'    => 'image/bmp',
	'ico'    => 'image/x-icon',
	'svg'    => array('image/svg+xml', 'application/octet-stream'),

	// Archives
	'zip'    => array('application/zip', 'application/x-zip', 'application/x-zip-compressed'),
	'rar'    => array('application/rar', 'application/x-rar-compressed'),

	// Documents
	'pdf'    => array('application/pdf', 'application/x-pdf'),
	'doc'    => array('application/msword', 'application/vnd.ms-office'),
	'docx'   => array('application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/zip'),
	'ppt'    => array('application/powerpoint', 'application/vnd.ms-powerpoint'),
	'pptx'   => array('application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/zip'),
	'xls'    => array('application/vnd.ms-excel', 'application/x-excel', 'application/x-msexcel'),
	'xlsx'   => array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip'),

	// Text
	'txt'    => 'text/plain',
	'csv'    => array('text/csv', 'application/csv', 'application/vnd.ms-excel'),

	// Audio/video (optional)
	'mp3'    => array('audio/mpeg', 'audio/mpg', 'audio/mpeg3', 'audio/mp3'),
	'mp4'    => array('video/mp4', 'audio/mp4'),
	'wav'    => array('audio/wav', 'audio/x-wav'),

	// Others (add as needed)
	'json'   => array('application/json', 'text/json')
);
