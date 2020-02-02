<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){/*$this->middleware('auth');*/}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return view('users.index',['users' => User::latest()->paginate()]);        
        if($request){
            $query = trim($request->get('search'));
            $usr = User::where('name','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->paginate(5);

            return view('users.index',['users'=>$usr,'search'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create',['user'=>new User]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $fields = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        User::create($fields);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',['user'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',['user'=> $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $fields = request()->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user->update($fields);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
