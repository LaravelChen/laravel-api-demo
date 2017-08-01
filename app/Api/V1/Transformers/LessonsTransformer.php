<?php

namespace App\Api\V1\Transformers;


use App\Lesson;
use League\Fractal\TransformerAbstract;

class LessonsTransformer extends TransformerAbstract
{
    //继承与transform的接口，然后实现transform函数，这里主要是用来设置返回的字段
    //具体说明地址:https://github.com/dingo/api/wiki/Transformers
    public function transform(Lesson $lesson)
    {
        return [
            'title' => $lesson['title'],
            'body' => $lesson['body'],
        ];
    }
}