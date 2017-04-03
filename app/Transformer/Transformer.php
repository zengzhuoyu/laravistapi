<?php 

namespace App\Transformer;

abstract class Transformer{

    public function transformCollection($items)
    {	
    	return array_map([$this,'transform'],$items);
    }	

    //抽象方法不用写大括号
    public abstract function transform($item);
}

 ?>