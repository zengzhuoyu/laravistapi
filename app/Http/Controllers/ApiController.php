<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    //设置状态码，默认为200
    protected $statusCode = 200;

    public function getStatusCode()
    {
    	return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
    	$this->statusCode = $statusCode;

    	return $this;
    }

    //404错误回应
    public function responseNotFound($message = 'Not Found')
    {
    	return $this->setStatusCode(404)->responseError($message);
    }

    //错误的回应
    public function responseError($message)
    {
   	return $this->response([
    		'status' => 'failed',
    		'errors' => [
	    		'status_code' => $this->getStatusCode(),
	    		'message' => $message
    		]
    	]);
    }

    //正确、错误的回应
    public function response($data)
    {
    	return \Response::json($data,$this->getStatusCode());
    }
}
