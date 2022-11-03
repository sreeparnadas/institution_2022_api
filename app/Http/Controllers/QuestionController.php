<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends ApiController
{
    public function index()
    {
        $question= Question::get();
        return $this->successResponse(QuestionResource::collection($question));
    }
}
