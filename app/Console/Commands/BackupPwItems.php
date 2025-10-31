<?php

namespace App\Console\Commands;

use ZipArchive;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BackupPwItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:pwitems';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup pwitems daily';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info("Backup PwItems Cron Job running at " . now());

        $users = User::all();
        foreach ($users as $user) {
            $now = now();
            $filename = "Backups_" . $user->name . "_$now";
            $filename = str_replace(" ", "_", $filename);
            $zipFilePath = storage_path('app/private/' . $filename . '.zip');
            // $txtFilePath = storage_path('app/private/' . $filename . '.txt');

            $txtContent = "";
            foreach ($user->sites as $key => $site) {
                $index = $key + 1;
                $txtContent .= "[$index]: $site->name\n";

                foreach ($site->pwItems as $pwItem) {
                    $txtContent .= "USERNAME: $pwItem->username\tPASSWORD: $pwItem->password \n";
                }
                $txtContent .= "\n";
            }
            // Storage::disk('local')->put($filename, $txtContent);
            $zip = new ZipArchive;
            if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                $zip->setPassword($user->email);
                $zip->addFromString($filename . '.txt', $txtContent);
                $zip->setEncryptionName($filename . '.txt', ZipArchive::EM_AES_256);
                $zip->close();
            }
        }
        info("Backup PwItems Cron Job finish at " . now());
        // https://medium.com/@techsolutionstuff/laravel-11-cron-job-task-scheduling-example-b58da7687b38
    }
}
