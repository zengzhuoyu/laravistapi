<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Lesson;
use App\Transformer\LessonTransformer;

class LessonController extends Controller
{
    
    //依赖注入
    protected $lessonTransformer;

    public function __construct(LessonTransformer $lessonTransformer)
    {
    	$this->lessonTransformer = $lessonTransformer;
    }

    public function index()
    {

    	$lessons = Lesson::all();
    	return \Response::json([
    		'status' => 'success',
    		'status_code' => 200,
    		'data' => $this->lessonTransformer->transformCollection($lessons->toArray())
    	]);    		
    }

    public function show($id)
    {
    	$lesson = Lesson::findOrFail($id);

    	return \Response::json([
    		'status' => 'success',
    		'status_code' => 200,
    		'data' => $this->lessonTransformer->transform($lesson)
    	]);    	
    }    

}
