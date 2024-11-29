<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('make:admin {name} {email} {password}', function () {
    $name = $this->argument('name');
    $email = $this->argument('email');
    $password = $this->argument('password');

    $user = new User();
    $user->name = $name;
    $user->email = $email;
    $user->password = Hash::make($password);
    $user->role = 'admin';
    $user->save();

    $this->info("Admin user {$name} created successfully.");
});