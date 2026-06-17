<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Mailsetting;

use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Force HTTPS scheme only in production/staging (not local)
        if (!$this->app->runningInConsole() && config('app.env') !== 'local') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('mailsettings')) {
                $mailsetting = Mailsetting::first();
                if ($mailsetting) {
                    $data = [
                        'driver' => $mailsetting->mail_transport,
                        'host' => $mailsetting->mail_host,
                        'port' => $mailsetting->mail_port,
                        'encryption' => $mailsetting->mail_encryption,
                        'username' => $mailsetting->mail_username,
                        'password' => $mailsetting->mail_password,
                        'from' => [
                            'address' => $mailsetting->mail_from,
                            'name' => 'FlinkTech' // Updated from LaravelStarter
                        ]
                    ];
                    \Illuminate\Support\Facades\Config::set('mail', $data);
                }
            }
        } catch (\Exception $e) {
            // Context: Database might not be ready or credentials invalid.
            // We silently ignore this to allow the app to boot, 
            // so we can at least show a proper error page or log it without crashing HTTP headers.
        }
    }
}
