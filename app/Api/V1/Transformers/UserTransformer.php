<?php

namespace App\Api\V1\Transformers;


use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    //继承与transform的接口，然后实现transform函数，这里主要是用来设置返回的字段
    //具体说明地址:https://github.com/dingo/api/wiki/Transformers
    public function transform(User $user)
    {
        return [
            'name' => $user['name'],
            'password' => $user['password'],
            'email' => $user['email'],
        ];
    }
}