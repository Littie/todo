<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Krucas\Notification\Facades\Notification;

class AdminController extends Controller
{
    private $count = '';

    public function __construct()
    {
        $this->middleware('role');

        $this->count = Auth::user()
            ->tasks
            ->where('is_delete', '0')
            ->where('is_check', '0')
            ->count();

        View::share('count', $this->count);
    }

    public function disableUser($id) {
        User::where('id', $id)->update(['is_delete' => '1']);

        Notification::success('User disabled');

        return back();
    }
    
    public function updateUser(Request $request, $id) {
        if ($request->button == 'Back') {
            return redirect('/users/all');
        }

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::find($id);
        $user->update(Input::only('name', 'email', 'role', 'password'));

        Notification::success('User updated');

        //todo: Здесь не хочет почему-то шифровать пароль
//        User::where('id', $id)->update(Input::only('name', 'email', 'role', 'password'));

        return back();
    }
    
    public function editUser($id) {
        $user = User::find($id);
        
        return view('admin.editUser', ['user' => $user]);
    }
    
    public function showUser($id) {
        $user = User::find($id);

        return view('admin.showUser', ['user' => $user]);
    }
    
    public function showDisabledUsers() {
        $users = User::where('is_delete', 1)->orderBy('created_at', 'desc')->get();
        
        return view('admin.restore', ['users' => $users]);
    }
    
    public function enableUser($id) {
        User::where('id', $id)->update(['is_delete' => 0]);
        
        Notification::success('User enabled');

        return back();
    }
    
    public function createUser() {
        return view('admin.createUser');
    }
    
    public function storeUser(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create(Input::only('name', 'email', 'role', 'password', 'confirmed'));

        Notification::success('User created');

        return back();
    }
    
    public function showUsers() {
        $users = User::where('is_delete', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.users', ['users' => $users]);
    }

    public function createCategory() {
        return view('admin.createCategory');
    }
    
    public function storeCategory(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:groups|max:15'
        ]);

        Group::create(Input::only('name'));

        Notification::success('Group created');

        return back();
    }
    
    public function index() {
        return view('admin.main');
    }
}
