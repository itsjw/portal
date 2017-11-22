<?php

namespace App\Console\Commands\Users;

use App\Models\User;
use App\Notifications\Users\MigratedNotification;
use Illuminate\Console\Command;

class SendImportNotice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:send-import-notice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inform all users that they were migrated to v3';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->notifyNow(new MigratedNotification($user));
        }
    }
}
