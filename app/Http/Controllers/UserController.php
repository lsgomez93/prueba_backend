<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\User;
use PHPUnit\Framework\Constraint\Count;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $users = User::with('city')->get();

        return response()->json($users);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $user = new User($data);
        $user->save();

        return response()->json($user, 201);
    }

    //Este metodo retorna la cantidad de clientes por ciudad
     public function custumersByCity(){

        $custumersByCity = City::select('name')->withCount('users')->get();
        
        return response($custumersByCity);
     }

}
