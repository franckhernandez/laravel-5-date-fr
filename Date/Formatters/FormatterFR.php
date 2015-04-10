<?php  namespace App\Lib\Date\Formatters;

class FormatterFR {

    public function format_diff_for_humans($str)
    {
        return $this->strReplace($str);
    }

    private function strReplace($str) {
        $search = array(
            'second after', 'seconds after',
            'minute after', 'minutes after',
            'hour after', 'hours after',
            'day after', 'days after',
            'month after', 'months after',
            'year after', 'years after'
        );
        $replace = array(
            'seconde', 'secondes',
            'minute', 'minutes',
            'heure', 'heures',
            'jour', 'jours',
            'mois', 'mois',
            'année', 'années'
        );
        return str_replace($search, $replace, $str);
    }
}