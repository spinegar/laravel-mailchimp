<?php namespace Hugofirth\Mailchimp;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class MailchimpServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('hugofirth/mailchimp');
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->singleton('mailchimp',  function() {
            return new MCAPI(Config::get('mailchimp::apikey'));
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('mailchimp');
	}

}