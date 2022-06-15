<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AdminMiddleware');
    }

    public function index()
    {

        $users = User::paginate(10);

        return view('admin.home', compact('users'));
    }

    public function update($user)
    {
        $user = User::find($user);
        if ($user->role == '1') {
            $user->role = 0;
        } else {
            $user->role = 1;
        }
        $user->save();

        return redirect()->route('admin');
    }
    public function delete($user)
    {
        $user = User::find($user);
        $user->delete();

        return redirect()->route('admin');
    }
}
