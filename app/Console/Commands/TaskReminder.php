<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TaskReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminder by email about task';

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
        $tasksFifteen = Task::whereBetween('reminder', [\Carbon\Carbon::now('Europe/Kiev')->second(0), \Carbon\Carbon::now('Europe/Kiev')->second(0)->addSeconds(59)])
            ->where('is_delete', '0')
            ->where('is_check', '0')
            ->get();

        $tasksNow = Task::whereBetween('due_date', [\Carbon\Carbon::now('Europe/Kiev')->second(0), \Carbon\Carbon::now('Europe/Kiev')->second(0)->addSeconds(59)])
            ->where('is_delete', '0')
            ->where('is_check', '0')
            ->get();

        $this->reminder($tasksFifteen, 'email.remindFifteen');

        $this->reminder($tasksNow, 'email.remindNow');

        $this->isOverdue();
    }

    private function isOverdue() {
        $tasks = Task::where('due_date', '<', \Carbon\Carbon::now('Europe/Kiev')->second(0))->get();

        foreach ($tasks as $task) {
            $task->update(['is_overdue' => '1']);
        }
    }

    private function reminder($tasks, $template) {
        foreach ($tasks as $task) {
            $this->sendReminderEmail($task, $template);
        }
    }

    private function sendReminderEmail($task, $template) {
        $user = User::where('id', $task->user_id)->first();

        Mail::send($template, ['task' => $task], function($message) use($user, $template) {
            $message->from('polikarpov_aj@groupbwt.com', 'Task list');
            $message->to($user->email, $user->name)->subject('Reminder email');
        });
    }
}
