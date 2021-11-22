<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

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

    public $db = null;
	public $session = null;
	public $user = null;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

		$this->db = db_connect();
		$this->session = \Config\Services::session();

		$db_session = $this->db->table('ci_sessions')
			->select('user_id')
			->where('id', session_id())
			->get()
			->getRow();

        if (!empty($db_session) && !empty($db_session->user_id)) {
			$this->user = $this->db->table('users')
				->where('id', $db_session->user_id)
				->get()
				->getRow();
		}
    }

    public function menuMain()
    {
        $data = [
            'isGuest' => empty($this->user),
        ];
        return view('menu/menu_main_view', $data);
    }

    public function templateMain($data =[])
    {
        $data['menuMain'] = $this->menuMain();
        $data['fluid'] = empty($data['fluid']) ? '' : '-fluid';
        return view('templates/template_main', $data);
    }
}
