<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['city'])->orderBy('id', 'DESC')->paginate(8);

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();

        return view('users.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "image" => 'mimes:jpeg,jpg,png',
            "name" => 'required|min:2',
            "city_id" => 'required|integer',
            "phone" => 'required|regex:/(0)[0-9]{9}/|unique:users',
            "national_id_image" => 'required|mimes:jpeg,jpg,png',
            "status" => 'required',
        ]);

        $imagePath = $request->file('image')->store('usersImages') ?: null;

        $nationalIdPath = $request->file('national_id_image')->store('nationalsIDS');

        $user = new User();

        $user->image = $imagePath;
        $user->name = $request->get('name');
        //$user->password = bcrypt($request->get('password'));
        $user->city_id = $request->get('city_id');
        $user->phone = $request->get('phone');
        $user->national_id_image = $nationalIdPath;
        $user->status = $request->get('status');

        $user->save();

        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $cities = City::all();
        $image = $user->image ? "http://rahtnaa-sd.com:8000/v2/uploads/" . $user->image : "https://redbanksmilesnj.com/wp-content/uploads/2015/11/female-avatar-placeholder-320x320.png";

        return view('users.show', ['user' => $user, 'cities' => $cities, 'image' => $image]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(User $user, Request $request)
    {

        $this->validate($request, [
            "name" => 'required|min:2',
            "city_id" => 'required|integer',
            "phone" => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'city_id' => $request->city_id,
            'phone' => $request->phone
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(User $user)
    {
        $user->delete();

        if(\request()->expectsJson()){
            return response(['message' =>'deleted successfully'],202);
        }

        return back();
    }

    public function activate($user_id){
        $user = User::where('id', $user_id)->first();

        $user->update([
            'status' => true
        ]);

        if(\request()->expectsJson()){
            return response(['message' =>$user],202);
        }

        return back();
    }

    public function inactivate($user_id){

        $user = User::where('id', $user_id)->first();

        $user->update([
            'status' => false
        ]);

        if(\request()->expectsJson()){
            return response(['message' =>'updated successfully'],202);
        }

        return back();
    }
}
