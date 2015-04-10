<?php  namespace App\Lib\Date\Facade;

use Illuminate\Support\Facades\Facade;

class DateFacade extends Facade {
    protected static function getFacadeAccessor() { return 'App\lib\Date\date'; }
}