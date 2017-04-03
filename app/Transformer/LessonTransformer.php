<?php 

namespace App\Transformer;

class LessonTransformer extends Transformer
{
    public function transform($lesson)
    {
	return [//api字段映射：不允许原始字段名返回、没有匹配的字段将被清除
		'title' => $lesson['title'],
		'content' => $lesson['body'],
		'is_free' => (boolean) $lesson['free']
	];
    }	
}

 ?>