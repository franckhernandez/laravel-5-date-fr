<?php  namespace App\Lib\Date;

use Carbon\Carbon;
use App\Lib\Date\Formatters\FormatterFR;

class Date {

    private $formatterFR;

    public function __construct(FormatterFR $formatterFR) {
        // date_default_timezone_set('Europe/Paris');
        setlocale(LC_TIME, 'french');
        $this->formatterFR = $formatterFR;
    }

    public function format_fr(Carbon $dateTime) {
        return $dateTime->formatLocalized('%A %d %B %Y');
    }

    public function format_fr_full(Carbon $dateTime) {
//        return $dateTime->formatLocalized('%A %d %B %Y %H:%M:%S');
        return $dateTime->formatLocalized('%A %d %B %Y') . ' à ' . $dateTime->formatLocalized('%H:%M:%S');
    }

    public function hours(Carbon $time) {
        return $time->formatLocalized('%H:%M:%S');
    }

    public function diffForHumans(Carbon $dateTime) {
        $now = Carbon::parse(Carbon::now('Europe/Paris'));
        $diff = $now->diffForHumans($dateTime);
        return $this->formatterFR->format_diff_for_humans($diff);  // format to french
    }

    // format to english
        public function formatToEnglish($inputDate) {
            $pattern = "#^(\d{2})\D*(\d{2})\D*(\d{4})#";
            preg_match_all($pattern, $inputDate, $matches);

            if( ! $matches ) {
                return Carbon::now('Europe/Paris');
            }

            return $this->english_date($matches);
        }

        private function english_date($inputDates)
        {
            $year = $inputDates[3][0];
            $month = $inputDates[2][0];
            $day = $inputDates[1][0];
            return Carbon::createFromDate($year, $month, $day);
        }
    // End create date from input

    // format brut fr
        public function format_fr_input($dateTime) {
            return $dateTime->formatLocalized('%d / %m / %Y');
        }
}