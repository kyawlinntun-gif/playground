<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleAssignsController extends Controller
{
    public function roleAssign(Request $request)
    {
        $usercheck = $request->user;
        $author = $request->author;
        $admin = $request->admin;

        if($usercheck || $author || $admin)
        {
            // $validator = Validator::make($request->all(), [
            //     'user_id' => 'required'
            // ]);

            $user = User::find($request->user_id);
            $user->roles()->detach();
            if($usercheck)
            {
                $role_user = Role::find(1);
                $user->roles()->attach($role_user);
            }
            if($author)
            {
                $role_author = Role::find(2);
                $user->roles()->attach($role_author);
            }
            if($admin)
            {
                $role_admin = Role::find(3);
                $user->roles()->attach($role_admin);
            }
            return redirect('dashboard')->with('success', 'Assign role was successfully created!');
        }
        else
        {
            return redirect('dashboard')->with('fail', 'One role must be needed to assign!');
        }
    }
}
