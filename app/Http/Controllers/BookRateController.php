<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRate;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class BookRateController extends Controller
{
    public function ratings(){
        Session::put('page', 'ratings');
        $ratings = BookRate::with(['user', 'book'])->get()->toArray();
        // dd($ratings);

        return view('rate', compact('ratings'));

    }

    public function updateRatingStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            if($data['status'] == "Active"){
                $status= 0;
            }else{
                $status = 1;
            }

            BookRate::where('id', $data['rating_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'rating_id'=> $data['rating_id']]);
        }
    }
}
