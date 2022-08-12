<?php

/**
 * DateTools of class
 */

class Dates{

    public function __construct()
    {
        /*
         *  Setting the default Time Zone
         */
        date_default_timezone_set('PRC');
    }


    /*
     * The date was the week of the year
     * @param int $day
     * @return int
     */
    public static function weeks($day){
        $iDays = 7;
        $theday = getdate(strtotime($day));
        $wDay = 0 == $theday['wday'] ? $iDays : $theday['wday'];
        return ceil(($theday['yday'] +  ($iDays-$wDay)) / $iDays);
    }

    /*
     * The week from the week of the specified date to the present
     * @param int $begin
     * @return int
     */
    public static function getBeginWeek($begin){
        $res = intval((self::weeks(date('Y-m-d',time())) - self::weeks($begin) + 1) );
        return $res <= 0 ? 1 : $res;
    }


    /*
     * Generates the specified date range
     * @param int $start
     * @param int $end
     * @return array
     */
    public static function getDateRange($start,$end){
        $start = date('Y-m-d',strtotime($start));
        $end = date('Y-m-d',strtotime($end));
        $starttime = strtotime($start.' 00:00:01');
        $endtime = strtotime($end.' 00:00:01');
        $dateList = [];
        $dateList[] = date('Y-m-d',$starttime);
        $time = 3600*24;
        $bool = true;
        for($i=$time;$bool;$i+=$time){
            $starttime+=$time;
            if($starttime>=$endtime){
                $dateList[] = date('Y-m-d',$endtime);
                $bool = false;
            }else{
                $dateList[] = date('Y-m-d',$starttime);
            }
        }
        return $dateList;
    }

}
