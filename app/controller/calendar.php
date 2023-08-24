<?php

class Calendar{

    private $year; // setting privete properties accessible for all class methods but only inside current class
    private $month;

    public function __construct()
    {
        // in this part I'm checking if:
        // POST request hasn't been set
        // POST request is empty
        // if one above id true - default value is set as current year and month taken from date() method
        // if one above is false - both class properties are set with request values
        !isset($_POST['year']) || empty($_POST['year']) ? $this->year = date('Y') : $this->year = $_POST['year'];
        !isset($_POST['month']) || empty($_POST['month']) ? $this->month = date('m') : $this->month = $_POST['month'];

    }

    public function index() // this method is called form index file right after class instatiation to initialise key properties 'year' and 'month'
    {
        $data = new stdClass(); // new clean object is initialised
        $data->monthName = self::getMonthList($this->month); //I'm calling method that provides me list of months in Polish language
        $data->year = $this->year; //adding year into the object
        $data->month = $this->month; // adding month into the object
        $data->firstDay = $this->checkIfSunday(date('w', strtotime(date($this->year.'-'.$this->month.'-01')))); //finding if first day of the month is Sunday
        $data->numberOfDays = date('t', strtotime(date($this->year.'-'.$this->month))); //checking how many days in chosen month
        $data->monthMap = $this->getMonthArray($data->firstDay, $data->numberOfDays); //setting array of arrays with month map in case of different approach to way how template could work
        return $data; //returnig ready to use object
    }

    public static function getMonthList($input = null) //static method can be easly accessible without instatiate whole class and can be reused whenever list of the months is required. Input parameter can be empty and has been prepared in purpouse. Methode can provide one month name based on array index for it - quick and clean
    {

        $year = array( //Just in case having problems with browser language settings, array with months names in required language is always good idea.
            'Rok','Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień'
        );
        // one more thing about month array - as you can see, first value isn't month name - array indexes starts with O and only purpouse to set months array this way was do not warrying about php method date() and providing  to it wrong number as a month representation, information that is used in this case to find detailed information about that month. 
        if(empty($input)){ // in case that input is empty method will return whole list
            return $year;
        }

        return $year[intval($input)]; // if input wasn't empty - requested month will be returned based on index number
    }


    function getMonthArray(int $firstDay, int $numberOfDays) //method that is preparing array of arrays with days that will be set in right order and right amount of weeks to simplify displaying data
    {
        $days = [];
        $daysMap=[];
        $days = range(1, $numberOfDays); // with known month length it array representation is initiated
        if($firstDay == 0) // if first month day is Sunday - initial day have to be reseted for each array representing each week - arrays indexes starts with... 0.
        {
            $firstDay = 7;
        }
        if($firstDay > 1) // if first day of the month isn't first day of the week we have fill up initial array wiht empty value in right amount
        {
            for ($a = 0; $a<$firstDay -1; $a++)
            {
            array_unshift($days, ''); // that is moving first day of the month into right position in our array
            }
        }

        $counter = 0; //setting counter that will be used to build and fill up week representation with days
        $index = 0; // setting counter for index represents number of the week in month map
        for($a = 0; $a<count($days); $a++) // looping through raw days array
        {
            if($counter > 6) //checking week length and resetting values for counter and index
            {
            $counter=0;
            $index ++;
            }
            $daysMap[$index][]=$days[$a]; // creating month map row
            $counter ++;
        }

        if(count(end($daysMap))<7){ //checking length of the last week in month map and if it's shorter than expected, fixing it.
            $left = (7 - count(end($daysMap)));
            for($a=0; $a < $left; $a++)
            {
            array_push($daysMap[count($daysMap)-1], '');
            }
        }
        return $daysMap;
    }

    public function checkIfSunday($input) //if first day of the month is sunday then it position in the week have to be set as 7 - in date() method it is set as 0 what can change how code responsible for preparing data to display work.
    {
        if($input==0)
        {
            return 7;
        }
        return $input;
    }
}