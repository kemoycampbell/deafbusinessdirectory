<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/30/18
 * Time: 9:45 PM
 */

namespace Dry\Controller\Register;


use Dry\Core\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    private $contex = array();
    public function indexAction(Request $request)
    {
        return $this->render_template($request);
    }

    private function verify_registration_form(Request $request):bool
    {

    }
}