<?php

class Course extends \Eloquent {

	public static $rules = [];

	protected $fillable = [];

    /**
     * Retrieve status of course
     *
     * @var string
     */
    public function getStatusAttribute($value)
    {
    	return ($value == 1) ? 'Active' : 'Complete';
    }


    /**
     * Retrieve exam name of current course
     *
     * @var string
     */
    public function name()
    {
    	$exam = Exam::find($this->exam_id); 

    	return $exam->name;
    }

    /**
     * Retrieve course topics
     *
     * @var array
     */
    public function topics()
    {
        $exam = Exam::find($this->exam_id); 
        $topics = $exam->topics;
        $progress = ['201' => 40, '202' => 65, '203' => 10];
        $course_topics = [];
        
        foreach($topics as $topic) {
            $course_topics[] = array(
                'name' => $topic->name,
                'progress' => array_key_exists($topic->id, $progress) ? $progress[$topic->id] : 25,
            );
        }

        return $course_topics;
    }

    /**
     * Retrieve course cards
     *
     * @var array
     */
    public function cards()
    {
        return $this->hasMany('CourseCard');
        /*$card_id = $this->cards()->card_id;
        $card = Card::find($card_id);
        $topic_id = $card->topic_id;*/
    }


    /**
     * Retrieve course progress
     *
     * @var int
     */
    public function progress() 
    {   
        $cards = $this->cards;
        $total = count($cards);
        $count = 0;
        foreach($cards as $card) {
            if($card->level == 5) {
                $count++;
            } elseif($card->level == 4) {
                $count = $count + .75;
            } elseif($card->level == 3) {
                $count = $count + .5;
            } elseif($card->level == 2) {
                $count = $count + .25;
            }
        }
        $mastered = ($total != 0) ? $count/$total : 0;
        $progress = $mastered * 100;
        return $progress;
    }

    /**
     * Retrieve array of card count for each level
     *
     * @var array
     */
    public function levels() 
    {
        $L1 = $L2 = $L3 = $L4 = $L5 = 0;

        $cards = $this->cards;
        foreach($cards as $card) {
            $level = $card->level;
            switch($level) {
                case 1: 
                    $L1++;
                    break;
                case 2:
                    $L2++;
                    break;
                case 3:
                    $L3++;
                    break;
                case 4:
                    $L4++;
                    break;
                case 5:
                    $L5++;
                    break;
                default:
                $level = 0;
            }
        }

        $data = array($L1 , $L2 , $L3 , $L4 , $L5);
        return json_encode($data);
    }

}