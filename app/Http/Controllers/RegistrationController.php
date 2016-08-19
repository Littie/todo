<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class RegistrationController extends Controller
{
    public function store() {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ];

        $data = Input::only('name', 'email', 'password', 'password_confirmation');

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }

        $confirmationCode = str_random(38);

        $this->sendConfirmationEmail($data, $confirmationCode);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'confirmation_code' => $confirmationCode,
        ]);

        return redirect('/login')
            ->with('confirmation', 'Check your email');
    }

    protected function confirm($confirmationCode) {
        if (!$confirmationCode) {
            throw new \Exception();
        }

        $user = User::whereConfirmationCode($confirmationCode)->first();

        if (!$user) {
            throw new \Exception();
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();
        return redirect('/');
    }

    protected function sendConfirmationEmail($data, $confirmationCode) {
        Mail::send('email.verify', ['confirmationCode' => $confirmationCode], function($message) use ($data) {
            $message->from('polikarpov_aj@groupbwt.com', 'Todo');
            $message->to(Input::get('email'), Input::get('name'))->subject('Verify your email address');
        });
    }
}
