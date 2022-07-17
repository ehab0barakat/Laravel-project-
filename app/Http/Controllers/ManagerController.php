<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{

    // for all controller not specific action

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  function to changeStatus of user from   no active to active
    public function changeStatus(Request $request)

    {

        $user = User::findOrFail($request->id);
          // $user->status = $request->status;
        $user->isActive = $request->isActive;
        $user->save();

         if($user->save()){

            return response()->json(['success'=>'Status change successfully.']);

         }
         else{

            return response()->json(['fail'=>'Status change fail.']);
         }

         return ($request->id);


    }


    public function create()
    {

        return view('manager.create' , ["roles" => Role::all()]);
    }


    public function store(request $request ,User $user)
    {
        $user->create([
            "username" => $request->username  ,
            "name" => $request->name ,
            "email" => $request->email ,
            "password" => Hash::make($request->password),
            "isAdmin" => $request->roles == "1" ? "1" : "0" ,
        ]);

        UserRole::create([
            "role_id" => $request->roles[0] ,
            "user_id" => $user->where("username" ,$request->username)->first()->id ,
        ]);


        return  redirect()->route("manager.index");
    }




    public function index()
    {
        $users=User::with('roles')->get();
        return view('manager.index')->with('users',$users);
    }







    public function edit(User $user,$id)
    {

        $roles = Role::all();
        return view('manager.edit', [
            'user' => $user::find($id),
            'roles' => $roles


        ]);
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request ,$id)
    {

        // dd($request->all());

        UserRole::where("user_id",$id)->update(["role_id" => isset($request->isAdmin) ? "1" : "2"]);

        $user->find($id)->update([
            "name" =>$request->name,
            "email" =>$request->email,
            "username" =>$request->username,
            "isAdmin" => isset($request->isAdmin) ? "1" : "0" ,
            "isActive" => isset($request->isActive) ? "1" : "0" ,

        ]);

        return redirect()->route('manager.index');
    }


    public function destroy(User $user, $id){
        $user->find($id)->delete();
        return redirect()->route('manager.index');

    }
}




