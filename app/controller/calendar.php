<?php

class Calendar{

    private $year;
    private $month;

    public function __construct()
    {
        !isset($_POST['year']) || empty($_POST['year']) ? $this->year = date('Y') : $this->year = $_POST['year'];
        !isset($_POST['month']) || empty($_POST['month']) ? $this->month = date('m') : $this->month = $_POST['month'];

    }

    public function index()
    {
        $data = new stdClass();
        $data->monthName = self::getMonthList($this->month);
        $data->year = $this->year;
        $data->month = $this->month;
        $data->firstDay = $this->checkIfSunday(date('w', strtotime(date($this->year.'-'.$this->month.'-01'))));
        $data->numberOfDays = date('t', strtotime(date($this->year.'-'.$this->month)));
        $data->monthMap = $this->getMonthArray($data->firstDay, $data->numberOfDays);
        return $data;
    }

    public static function getMonthList($input = null)
    {

        $year = array(
            'Rok','Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień'
        );

        if(empty($input)){
            return $year;
        }

        return $year[intval($input)];
    }


    function getMonthArray(int $firstDay, int $numberOfDays)
    {
        $days = [];
        $daysMap=[];
        $days = range(1, $numberOfDays);
        if($firstDay == 0)
        {
            $firstDay = 7;
        }
        if($firstDay > 1)
        {
            for ($a = 0; $a<$firstDay -1; $a++)
            {
            array_unshift($days, '');
            }
        }

        $counter = 0;
        $index = 0;
        for($a = 0; $a<count($days); $a++)
        {
            if($counter > 6)
            {
            $counter=0;
            $index ++;
            }
            $daysMap[$index][]=$days[$a];
            $counter ++;
        }

        if(count(end($daysMap))<7){
            $left = (7 - count(end($daysMap)));
            for($a=0; $a < $left; $a++)
            {
            array_push($daysMap[count($daysMap)-1], '');
            }
        }
        return $daysMap;
    }

    public function checkIfSunday($input)
    {
        if($input==0)
        {
            return 7;
        }
        return $input;
    }
}