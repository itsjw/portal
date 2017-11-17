<?php

namespace App\Http\Controllers\Api\Users;

use App\Models\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Fetch all relevant username.
     *
     * @return mixed
     */
    public function index()
    {
        $search = request('username');

        return User::where('username', 'LIKE', "%$search%")
            ->take(5)
            ->pluck('username');
    }
}