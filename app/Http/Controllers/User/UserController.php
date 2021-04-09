<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user()
    {
        // $users = User::where('role', $role);
        $users = User::paginate(10);;
        return view('user.user', compact('users'));
    }

    /**
     * create user
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('User.showUser', compact('user'));
    }

    /**
     * edit form
     */
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('User.editUser', compact('user'));
    }

    /**
     * show add user form
     */
    public function addUser()
    {
        return view('user.addUser');
    }

    /**
     * create user
     */
    public function store(Request $data)
    {
        try 
        {
            $checkIfExist = DB::table('users')
            ->select('*') 
            ->where('email', '=', $data['email'])
            ->get();

        if (!$checkIfExist->isEmpty()) {
            return redirect()->back()->with(['errormsg', 'Failed! Duplicate enrties of employee']);
        }

        $aRes = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role'  => $data['role'],
            'password' => Hash::make('password'),
        ]);

    } catch (Illuminate\Database\QueryException $e){
        $errorCode = $e->errorInfo[1];

        return redirect()->back()->withErrors(['message', $errorCode]);
    }
    return redirect()->back()->with('message', 'Successfully Added!');

    }

     /**
     * update user
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role'  => 'required'
        ]);
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();

        if ($user->save()) {
            return redirect()->back()->with('message', 'Successfully Updated!');
        } else {
            return Redirect::back()->withErrors(['message', 'Failed to update data!']);
        }
    }

    /**
     * delete user
     */
    public function destroy($id)
    {
        $aRes = User::findOrFail($id);

        if ($aRes->delete()) {
            return redirect()->back()->with('message', '1 record has been deleted!');
        }
    }

    /**
     * change password
     */
    public function changePassword(Request $request, $id) 
    {
        $request->validate([
            'old_pw'=>'required',
            'new_pw'=>'required',
            'confirm_new_pw'  => 'required'
        ]);

        $aUser = User::findOrFail($id);

        if ($request->new_pw !== $request->confirm_new_pw) {
            return back()->withErrors('errormgs','invalid confirm new password');
        }

        if (Hash::check($request->old_pw, $aUser->password)) {

            $aUser->password = Hash::make($request->new_pw);
    
            if ($aUser->save()) {
                return redirect()->back()->with('success', 'Successfully updated!');
            }
        } else {
            return back()->withErrors('errormgs','Failed!');
        }
    }

    /**
     * show Change password form
     * 
     */
    public function showChangePassword()
    {
        
        $userId = Auth::user()->id;

        return view('user.changePassword', compact('userId'));
    }
}
