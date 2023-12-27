<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
//    phpinfo();

    // Command to add a cron job
//    $cronCommand = "* * * * * php /home/unitechh/public_html/artisan schedule:run >> /dev/null 2>&1";
//
//// Escape the command for security
//    $escapedCronCommand = escapeshellarg($cronCommand);
//
//// Use the 'crontab' command to add the cron job
//    exec("echo $escapedCronCommand | crontab -", $output, $returnCode);
//
//    if ($returnCode === 0) {
//        echo "Cron job added successfully.";
//    } else {
//        echo "Failed to add cron job.";
//    }
});

