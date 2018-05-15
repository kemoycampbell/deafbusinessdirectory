<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/4/2018
 * Time: 5:15 PM
 */

namespace Dry\Controller\Home;


use Dry\Core\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function indexAction(Request $request)
    {
        $msg = "Welcome to Dry. The possibilities are limitless";
        $name = "Kemoy";

        return $this->render_template($request,array('name'=>$name,'msg'=>$msg));
    }
}