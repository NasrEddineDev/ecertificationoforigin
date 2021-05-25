<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\State;
use App\Models\City;
use App\Models\Profile;
use File;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Gate::forUser($user)->allows('update-post', $post)) {
        // }
        // if (! Gate::allows('list-user')) {
        //     abort(403);
        // }
        $role = Role::all()->where('name', '==', 'user')->first();
        $users = User::all()->where('role_id', '!=', $role->id);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
        return view('users.create', compact('roles', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $profile = new Profile([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'agce_user_id' => $request->agce_user_id,
        ]);
        $signature = $request->file('signature');
        $round_stamp = $request->file('round_stamp');
        $square_stamp = $request->file('square_stamp');
        if ($signature && $round_stamp && $square_stamp) {
            $user = new User([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'city_id' => $request->city_id,
            ]);
            $user->save();

            $destinationPath = 'dri/' . $user->id . '/';
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, $mode = 0777, true, true);
            }

            $signatureFileName = $profile->firstname . '_' . $profile->lastname . '_signature.' . $signature->clientExtension();
            Storage::disk('public')->put($destinationPath . $signatureFileName, file_get_contents($signature));
            $profile->signature = $signatureFileName;


            $roundStampFileName = $profile->firstname . '_' . $profile->lastname . '_round_stamp.' . $round_stamp->clientExtension();
            Storage::disk('public')->put($destinationPath . $roundStampFileName, file_get_contents($round_stamp));
            $profile->round_stamp = $roundStampFileName;

            $squareStampFileName = $profile->firstname . '_' . $profile->lastname . '_square_stamp.' . $square_stamp->clientExtension();
            Storage::disk('public')->put($destinationPath . $squareStampFileName, file_get_contents($square_stamp));
            $profile->square_stamp = $squareStampFileName;

            $profile->save();
            $user->update(['profile_id' => $profile->id]);
        }
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::find($id);
        return view('users.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id = $request->input('role_id');
        $user->update();

        $user->profile->firstname = $request->firstname;
        $user->profile->lastname = $request->lastname;
        $user->profile->mobile = $request->mobile;
        $user->profile->gender = $request->gender;
        $user->profile->birthday = $request->birthday;
        $user->profile->address = $request->address;

        $destinationPath = 'dri/' . $user->id . '/';
        if (!file_exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }

        $signature = $request->file('signature');
        if ($signature) {
            $signatureFileName = $user->profile->firstname . '_' . $user->profile->lastname . '_signature.' . $signature->clientExtension();
            Storage::disk('public')->put($destinationPath . $signatureFileName, file_get_contents($signature));
            $user->profile->signature = $signatureFileName;
        }

        $round_stamp = $request->file('round_stamp');
        if ($round_stamp) {
            $roundStampFileName = $user->profile->firstname . '_' . $user->profile->lastname . ' _round_stamp.' . $round_stamp->clientExtension();
            Storage::disk('public')->put($destinationPath . $roundStampFileName, file_get_contents($round_stamp));
            $user->profile->round_stamp = $roundStampFileName;
        }

        $square_stamp = $request->file('square_stamp');
        if ($square_stamp) {
            $squareStampFileName = $user->profile->firstname . '_' . $user->profile->lastname . '_square_stamp.' . $square_stamp->clientExtension();
            Storage::disk('public')->put($destinationPath . $squareStampFileName, file_get_contents($square_stamp));
            $user->profile->square_stamp = $squareStampFileName;
        }
        $user->profile->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'message' => 'User deleted successfully'
            ], 200);
        }

        return response()->json([
            'message' => 'User not found'
        ], 200);
    }
}
