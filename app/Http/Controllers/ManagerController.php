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

    public function index()
    {    

        // to get users with roles 
        $users=User::with('roles')->get();
    
        return view('manager.index')->with('users',$users);
    }


    




    public function edit(User $user,$id)
    {
        // dd($user::find($id));
        // dd($id);
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
        
        //  dd($request);
        UserRole::where("user_id",$id)->update(["role_id" => $request->roles[0]]);
        $user->find($id)->update([
            "name" =>$request->name,
            "email" =>$request->email
        ]);
        // dd($id);
       

        return redirect()->route('manager.index');
    }
   

    public function destroy(User $user, $id){
        // dd($id);
        // dd($user);
       
        $user->find($id)->delete();
        return redirect()->route('manager.index');

        
    }
}
        
        
    

