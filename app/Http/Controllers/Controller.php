<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function isUserAdmin()
    {
        if (request()->user()->hasRole('admin'))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    protected function isUserCommon()
    {
        if (request()->user()->hasRole('common'))
        {
            return true;
        }
        else
        {
            return false;
        }    	
    }

    public function notFound() 
    {
        return response()->json(['message' => 'not found'], 404);
    }

    public function notPermitted() 
    {
        return response()->json(['message' => 'not permitted'], 401);
    }    
}
