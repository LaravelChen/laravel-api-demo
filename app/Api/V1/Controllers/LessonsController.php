<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Transformers\LessonsTransformer;
use Dingo\Api\Routing\Helpers;
use App\Lesson;

class LessonsController extends Controller
{
    use Helpers;

    public function show_single_lesson($id)
    {
        $lesson = Lesson::findorFail($id);
        return $this->response->item($lesson, new LessonsTransformer());
    }
}
