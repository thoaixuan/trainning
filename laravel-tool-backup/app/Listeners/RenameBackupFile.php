<?php

namespace App\Listeners;

use App\Events\BackupWasSuccessful;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RenameBackupFile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BackupWasSuccessful  $event
     * @return void
     */
    public function handle(BackupWasSuccessful $event)
    {
        $backup = $event->backup;

        // Get the current backup filename
        $currentFilename = $backup->zipName();

        // Create a new filename with your desired format
        $newFilename = 'backup_' . date('d-m-Y') . '.zip';

        // Rename the backup file
        $backup->renameFile($currentFilename, $newFilename);
    }
}
