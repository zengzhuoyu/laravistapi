<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Lesson;

class LessonController extends Controller
{
    public function index()
    {

    	$lessons = Lesson::all();
    	return \Response::json([
    		'status' => 'success',
    		'status_code' => 200,
    		'data' => $this->_transformCollection($lessons)
    	]);    		
    }

    public function show($id)
    {
    	$lesson = Lesson::findOrFail($id);

    	return \Response::json([
    		'status' => 'success',
    		'status_code' => 200,
    		'data' => $this->_transform($lesson)
    	]);    	
    }    

    private function _transformCollection($lessons)
    {	
    	return array_map([$this,'_transform'],$lessons->toArray());
    }

    private function _transform($lesson)
    {
	return [//api字段映射：不允许原始字段名返回、没有匹配的字段将被清除
		'title' => $lesson['title'],
		'content' => $lesson['body'],
		'is_free' => (boolean) $lesson['free']
	];
    }
}
