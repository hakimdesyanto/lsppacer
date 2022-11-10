<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Ramsey\Uuid\Uuid;
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
    public function __construct()
    {
        $this->BaseModel = new BaseModel();
    }
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

    public function generate_menu($role_id, $url = '')
    {
        // dd($role_id);
        $menu_parent = $this->BaseModel->get_menu($role_id, '0');
        $html = '<ul class="metismenu" id="menu">';

        for ($i = 0; $i < count($menu_parent); $i++) {
            $sub_menu = $this->BaseModel->get_menu($role_id, $menu_parent[$i]['menu_id']);
            $has_sub_menu = count($sub_menu);

            if ($has_sub_menu == 0) {
                if ($i == 0) {
                    $html .= ' <li class="active"> ';
                } else {
                    $html .= ' <li> ';
                }
                $html .= '<a href="' . $menu_parent[$i]["menu_url"] . '">
                    <div class="parent-icon"><i class="' . $menu_parent[$i]["menu_icon_parent"] . '"></i>
                    </div>
                    <div class="menu-title">' . $menu_parent[$i]['menu_title'] . '</div>
                </a>
            </li>';
            } else {

                $html .= '<li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="' . $menu_parent[$i]["menu_icon_parent"] . '"></i></div>
                    <div class="menu-title">' . $menu_parent[$i]["menu_title"] . '</div>
                </a>';
            }
            /* BEGIN SUB MENU */
            if ($has_sub_menu > 0) {
                $html .= '<ul>';

                for ($j = 0; $j < count($sub_menu); $j++) {
                    $sub_submenu = $this->BaseModel->get_menu($role_id, $sub_menu[$j]['menu_id']);
                    if (count($sub_submenu) == 0) {
                        $html .= ' <li> <a href="' . $sub_menu[$j]["menu_url"] . '"><i class="bx bx-right-arrow-alt"></i>' . $sub_menu[$j]["menu_title"] . '</a></li>';
                    } else {
                        $html .= '<li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="' . $sub_menu[$j]["menu_icon_parent"] . '"></i></div>
                        <div class="menu-title">' . $sub_menu[$j]["menu_title"] . '</div>
                    </a>
                    <ul>';
                        for ($k = 0; $k < count($sub_submenu); $k++) {
                            $html .= '<li> <a href="' . $sub_submenu[$k]["menu_title"] . '"><i class="bx bx-right-arrow-alt"></i>' . $sub_submenu[$k]["menu_title"] . '</a></li>';
                        }
                        $html .= '</ul>
                    </li>';
                    }
                }
                $html .= '</ul>';
                $html .= '</li>';
            }
        }

        $html .= '</ul>';

        return $html;

        //dd($html);
    }

    public function get_uuid()
    {
        return str_replace("-", "", uuid::uuid4());
    }
}
