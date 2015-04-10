<?php  namespace App\Lib\Date;

use Illuminate\Support\ServiceProvider;

class DateServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerDate();
    }

    private function registerDate()
    {
        $this->app->bind('date', function() {
            $formatterFr = $this->app()->make('App\Lib\Date\Formatters\FormatterFR');
            return new Date($formatterFr);
        });
    }
}