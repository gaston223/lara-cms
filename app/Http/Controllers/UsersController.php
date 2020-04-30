<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UsersController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }


    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function makeAdmin(User $user)
    {
        $user->role='admin';

        $user->save();

        session()->flash('success', "Le role Admin a bien été atribuée à {$user->name}");

        return redirect(route('users.index'));
    }


}
