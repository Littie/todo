<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\TaskRequest;
use App\Models\Group;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Krucas\Notification\Facades\Notification;

class TaskController extends Controller
{
    protected $count;

    public function __construct() {
        $this->middleware('users');
    }

    public function statistic($period) {
        return view('users.statistics', ['period' => $period]);
    }

    public function create() {
        $groups = Group::all();

        return view('users.create', ['groups' => $groups]);
    }
    
    public function showGroup($categories) {
        $groupID = Group::where('name', $categories)->first()->id;

        $tasks = Auth::user()->tasks()->active()->where('group_id', "$groupID")->paginate(5);

        $header = 'List of ' . $categories . ' category';

        $data = $this->getDataList($tasks, $header, 'Check', '/check');

        return view('users.groupTasks', $data);
    }

    public function restore($id) {
        $task = Task::find($id);

        if($task && Gate::allows('restore', $task)) {
            $task->update(['is_check' => '0']);
            
            Notification::success('Task restored');
        }

        return back();
    }

    public function showCompleted() {
        $tasks = Auth::user()->tasks()->checked()->paginate(5);

        $data = $this->getDataList($tasks, 'List of completed tasks', 'Restore', '/restore');

        return view('users.completedTasks', $data);
    }
    
    public function back() {
        return redirect('/');
    }
    
    public function check($id) {
        $task = Task::find($id);
        
        if($task && Gate::allows('check', $task)) {
            $task->update(['is_check' => '1']);
            Notification::success('Task checked');
        }

        return back();
    }

    public function show($id) {
        $task = Task::find($id);

        if ($task && Gate::allows('show', $task)) {
            return view('users.show', ['task' => $task]);
        }

        return back();
    }

    public function store(TaskRequest $request) {
        $task = Task::create($request->all());

        Notification::success('Task created');

        $this->setReminder($task);

        return back();
    }
    
    public function update(TaskRequest $request, $id) {
        $task = Task::find($id);
        
        $task->update($request->all());

        Notification::success('Task updated');

        if ($task->due_date > Carbon::now()) {
            $task->is_overdue = '0';
            $this->setReminder($task);
        } elseif ($task->due_date < Carbon::now()) {
            $task->is_overdue = '1';
        }
        
        return back();
    }

    public function edit($id) {
        $task = Task::find($id);
        $groups = Group::all();

        if ($task && Gate::allows('edit', $task)) {
            return view('users.edit', ['task' => $task, 'groups' => $groups]);
        }

        return back();

    }

    public function delete($id) {
        $task = Task::find($id);

        if ($task && Gate::allows('delete', $task)) {
            $task->update(['is_delete' => '1']);
            Notification::success('Task deleted');
        }
        
        return back();
    }

    public function index() {
        $tasks = Auth::user()->tasks()->active()->paginate(5);

        $data = $this->getDataList($tasks, 'List of tasks', 'Check', '/check');

        return view('users.tasks', $data);
    }

    public function getDataList($tasks, $header, $headers, $link) {
        return [
            'tasks'   => $tasks,
            'header'  => $header,
            'headers' => $this->getHeaders($headers),
            'links'   => $this->getLinks($link),
            'icons'   => $this->getIcons(),
        ];
    }

    private function setReminder($task) {
        $time = Carbon::createFromFormat('Y-m-d H:i:s', $task->due_date)->subMinutes(15)->toDateTimeString();
        $task->update(['reminder' => $time]);
    }
    
    public function getIcons() {
        return [
            'fa fa-list-alt', 'fa fa-pencil-square-o', 'fa fa-trash', 'fa fa-square-o'
        ];
    }

    public function getLinks($path) {
        return ['/show', '/edit', '/delete', $path];
    }

    public function getHeaders($header) {
        return ['N', 'Name', 'Category', 'Due date', 'Note', 'Edit', 'Delete', $header];
    }
}
