<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * @package    CodeIgniter
 * @author     EllisLab Dev Team (https://github.com/bcit-ci/CodeIgniter)
 * @copyright  Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @license    https://opensource.org/licenses/MIT  MIT License
 * @link       https://codeigniter.com
 * @since      Version 1.0.0
 * @filesource
 */

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 */
    define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

    switch (ENVIRONMENT)
    {
        case 'development':
            error_reporting(-1);
            ini_set('display_errors', 1);
        break;

        case 'testing':
        case 'production':
            ini_set('display_errors', 0);
            if (version_compare(PHP_VERSION, '5.3', '>='))
            {
                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
            }
            else
            {
                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE);
            }
        break;

        default:
            header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
            echo 'The application environment is not set correctly.';
            exit(1); // EXIT_ERROR
    }

/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 */
    $system_path = 'system';

/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 */
    $application_folder = 'application';

/*
 *---------------------------------------------------------------
 * VIEW FOLDER NAME
 *---------------------------------------------------------------
 */
    $view_folder = '';

/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER
 * --------------------------------------------------------------------
 */
    // No change required here for basic CodeIgniter app

// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

    // Set the current directory correctly for CLI requests
    if (defined('STDIN'))
    {
        chdir(dirname(__FILE__));
    }

    if (($_temp = realpath($system_path)) !== FALSE)
    {
        $system_path = $_temp.DIRECTORY_SEPARATOR;
    }
    else
    {
        // Ensure there's a trailing slash
        $system_path = strtr(
            rtrim($system_path, '/\\'),
            '/\\',
            DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
        ).DIRECTORY_SEPARATOR;
    }

    // Is the system path correct?
    if ( ! is_dir($system_path))
    {
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
        exit(3); // EXIT_CONFIG
    }

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
    // The name of THIS file
    define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

    // Path to the system folder
    define('BASEPATH', $system_path);

    // Path to the front controller (this file) directory
    define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

    // Name of the "system" folder
    define('SYSDIR', basename($system_path));

    // The path to the "application" folder
    if (is_dir($application_folder))
    {
        define('APPPATH', $application_folder.DIRECTORY_SEPARATOR);
    }
    else
    {
        if ( ! is_dir(BASEPATH.$application_folder.DIRECTORY_SEPARATOR))
        {
            header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
            echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
            exit(3); // EXIT_CONFIG
        }

        define('APPPATH', BASEPATH.$application_folder.DIRECTORY_SEPARATOR);
    }

    // The path to the "views" folder
    if ($view_folder !== '')
    {
        if (is_dir($view_folder))
        {
            define('VIEWPATH', $view_folder.DIRECTORY_SEPARATOR);
        }
        else if (is_dir(APPPATH.$view_folder.DIRECTORY_SEPARATOR))
        {
            define('VIEWPATH', APPPATH.$view_folder.DIRECTORY_SEPARATOR);
        }
        else if (is_dir(BASEPATH.$view_folder.DIRECTORY_SEPARATOR))
        {
            define('VIEWPATH', BASEPATH.$view_folder.DIRECTORY_SEPARATOR);
        }
        else
        {
            header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
            echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
            exit(3); // EXIT_CONFIG
        }
    }
    else
    {
        define('VIEWPATH', APPPATH.'views'.DIRECTORY_SEPARATOR);
    }

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 */
require_once BASEPATH.'core/CodeIgniter.php';
