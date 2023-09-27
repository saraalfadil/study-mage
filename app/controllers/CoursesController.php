<?php

class CoursesController extends \BaseController {

	/**
	 * Store a newly created course in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user_id = Input::get('user');
        $exam_id = Input::get('exam');
        $exam = Exam::find($exam_id);
        
        if(!empty($user_id) && !empty($exam_id)) {

        	$course_exists = Course::where("user_id", "=", $user_id)->where("exam_id", "=", $exam_id)->first();

        	if($course_exists) {
        		return Redirect::back()->with('message', 'You already have started this course.');
        	}

            $course = new Course;
            $course->user_id = $user_id;
            $course->exam_id = $exam_id;
            $course->status = '1';

            if($course->save()) {
            	foreach($exam->cards as $card) {
	            	$course_card = new CourseCard;
	            	$course_card->course_id = $course->id;
		            $course_card->card_id = $card->id;
		            $course_card->level = 1;
		            $course_card->studied = 0;
		            $course_card->save();
	            }
            }

        }
 
		return Redirect::to('courses/'.$course->id);
	}

	/**
	 * Display the specified course.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$course = Course::findOrFail($id);
		$course_cards = Course::find($id)->cards;
		$count = 0;
		$mastered = 0;
		$total = count($course_cards);
		foreach($course_cards as $card) {
			if($card->level == 1 || $card->readyToStudy()) {
				$count++;
			}
			if($card->level == 5) {
                $mastered++;
            }
		}

		return View::make('courses.show', compact('course', 'count', 'mastered'));
	}

	/**
	 * Remove the specified course from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Course::destroy($id)->with('message', 'Course Deleted!');

		return Redirect::route('dashboard');
	}

}
