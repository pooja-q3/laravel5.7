<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
//use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;use Mail;

class UserController extends Controller {

    public function index(Request $request) {
        $users = User::orderBy('id', 'DESC')->paginate(5);

        return view('users.index', compact('users'))
                        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

//    public function index() {
//
//        $users = User::latest()->paginate(5); //User::all();
//        return View('users.index')->with('users', $users)->with('i', (request()->input('page', 1) - 1) * 5);
//    }

    public function show(User $user) { // in current $user it print user details and if we pass $id in argument then it will print id
        return View('users.show')->with('user', $user);
    }

    public function create() {
        $roles = Role::pluck('name', 'name')->all();

        return view('users.create', compact('roles'));
//        return View('users.create');
    }

    public function store(Request $request) {
//        $request->validate([
//            'name' =>'required|string',
//            'email' =>'required|unique:users|email|string',
//            'password'=>'required|min:5|confirmed'
//        ]);

        $messages = [
            'email.required' => 'We need to know your e-mail address!',
            'email.unique' => 'Email is already taken!',
        ];

        $rules = [
            'name' => 'required|string',
//            'email' => 'required|unique:users|email|string',
//            'password' => 'required|min:5|confirmed', //confirm password column name should be password_confirmation
            'mobile_number' => 'required',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
//        $validator = Validator::make($request->all(), [
//                    'name' => 'required|string',
//                    'email' => 'required|unique:users|email|string',
//                    'password' => 'required|min:5|confirmed'
//        ]);


        if ($validator->fails()) {
            return redirect('user/create')
                            ->withErrors($validator)
                            ->withInput();
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/uploads/';
            $file->move($destinationPath, $fileName);
            $input['image'] = $fileName;
        }

        $request->replace($input);
        $user = User::create($request->all());
        $user->assignRole($request->input('roles'));
        return redirect('user')->with('success', 'User created successfully.');
    }

    public function edit($id) {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
//        return View('users.edit')->with('user', $user);
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, User $user) {
        $messages = [
            'email.required' => 'We need to know your e-mail address!',
            'email.unique' => 'Email is already taken!',
        ];

        $rules = [
            'name' => 'required|string',
            'email' => [
                'required', 'string', 'email',
                Rule::unique('users')->ignore($user->id),
            ],
//            'email' => 'required|email|string|unique:users,email,' . $user->id,
            'password' => 'required|min:5|confirmed', //confirm password column name should be password_confirmation
            'mobile_number' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        Validator::make($request->all(), $rules, $messages)->validate();
//        $input = $request->all();
//        $input['password'] = Hash::make($input['password']);
//        $request->replace($input);
//        $user->update($request->all());
// OR
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/uploads/';
            $file->move($destinationPath, $fileName);
            $input['image'] = $fileName;
        }

        $user->update($input);

//        $email = $request->email;
//
//        // Send email
//        Mail::send('emails.email', ['email' => $email], function ($m) use ($user) {
//            $m->from('hello@qtech.com', 'Q3');
//            $m->to($user->email, $user->name)->subject('Update User');
//        });

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect('user')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect('user')->with('success', 'User deleted successfully');
//        return redirect()->route('user')->with('success', 'User deleted successfully');
    }

//    OR
    public function destroyajax($id) {
        User::find($id)->delete($id);
        return response()->json([
                    'success' => 'Record deleted successfully!'
        ]);
    }

}
