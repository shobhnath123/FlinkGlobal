<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestAuth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-auth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing authentication...');
        
        $user = \App\Models\User::where('email', 'superadmin@admin.co')->first();
        
        if (!$user) {
            $this->error('User not found');
            return;
        }
        
        $this->info('User found: ' . $user->email);
        $this->info('Password hash: ' . $user->password);
        
        $credentials = [
            'email' => 'superadmin@admin.co',
            'password' => 'password'
        ];
        
        if (\Illuminate\Support\Facades\Auth::attempt($credentials)) {
            $this->info('Authentication successful!');
            $this->info('Authenticated user: ' . \Illuminate\Support\Facades\Auth::user()->email);
        } else {
            $this->error('Authentication failed!');
        }
    }
}
