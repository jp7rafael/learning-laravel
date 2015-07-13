<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;
    public static function wantsHtml()
    {
        $acceptable = \Request::getAcceptableContentTypes();

        return isset($acceptable[0]) && $acceptable[0] == 'text/html';
    }


    public function respondTo($formats)
    {
        if (isset($formats['html']) && Controller::wantsHtml()) {
            return $formats['html'];
        } else {
            return $formats['default'];
        }
    }
}
