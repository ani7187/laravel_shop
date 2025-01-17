<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return view('user.show', compact('user'));
    }
}
