<?php

class StudyController extends BaseController {

    public function index($id)
    {   
        $course = Course::find($id);
        return View::make('courses.study', compact('course'));
    }

}