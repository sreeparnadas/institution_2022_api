<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\StudentCourseRegistration;

class FeesChargedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $student=StudentCourseRegistration::find($this->student_course_registration_id)->student;

        return [
            'StudentCourseRegistrationId'=>$this->student_course_registration_id,
            'FeesTotal'=>$this->fees_total,
            'student'=>$request
        ];
    }
}
