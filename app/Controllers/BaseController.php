<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\BaseModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    protected $db;
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */

    protected $session;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        $this->session = \Config\Services::session();

        $this->db = new BaseModel;
        date_default_timezone_set("Asia/Jakarta");
    }

    function array4selectoption($data, $selected = '', $insertempty = false)
    {
        $option = '';
        if ($insertempty) {
            $option = '<option value=""' . (($selected == '') ? ' selected' : '') . '>&nbsp;</option>';
        }
        $ok = false;
        foreach ($data as $key => $value) {
            $option = $option . '<option value="' . $key . '" ';
            if (($selected == $key) && ($ok == false)) {
                $option = $option . ' selected';
                $ok = true;
            }
            $option = $option . '>' . $value . '</option>';
        }
        return $option;
    }

    function getfinaldate($year, $month)
    {
        $gday = 28;
        $gdate = strtotime($year . "/" . $month . "/" . $gday);
        $gmonth = date("m", $gdate);
        while ($gmonth == $month) {
            $gdate = strtotime(date('Y-m-d', strtotime(date('Y-m-d', $gdate) . ' + 1 day')));
            $gmonth = date("m", $gdate);
        }
        $gdate = strtotime(date('Y-m-d', strtotime(date('Y-m-d', $gdate) . ' - 1 day')));
        return date('Y-m-d', $gdate);
    }

    function round_down($float, $mod = 0)
    {
        return floor($float * pow(10, $mod)) / pow(10, $mod);
    }

    function round_up($float, $mod)
    {
        return ceil($float * pow(10, $mod)) / pow(10, $mod);
    }

    function zerofill($num, $zerofill = 7)
    {
        return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
    }

    public function generate_menu()
    {
    }
}
