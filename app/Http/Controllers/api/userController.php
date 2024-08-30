<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'estatus' => 1,
            'data' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required'
        ]);    
        if ($validator->fails()) {
            return response()->json([
                'estatus' => 0,
                'mensaje' => $validator->errors()
            ]);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'estatus' => 1,
            'mensaje' => 'Registrado'
        ]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'estatus' => 0,
                'mensaje' => 'Usuario no encontrado'
            ]);
        }
        return response()->json([
            'estatus'=> 1,
            'data' => $user
        ]);
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
        if (!isset($required->name)) {
            return response()->json([
                'estatus' => 0,
                'data' => 'Falta el nombre'
            ]);
        }
        User::where('id',$id)->update([
            'name' => $request->name
        ]);
        return response()->json([
            'estatus' => 1,
            'data' => 'Actualizado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'estatus' => 0,
                'mensaje' => 'Usuario no encontrado'
            ]);
        }
        $user->delete();
        return response()->json([
            'estatus'=> 1,
            'mensaje' => 'Usuario eliminado'
        ]);
        }

        public function login(Request $request){
            $request->validate([
                'email'=> 'required|email',
                'password'=> 'required'
            ]);

            $user = User::where('email', "=", $request->email)->first();

            if (isset($user->id)){
                if (Hash::check($request->password,  $user->password)) {
                    $token = $user->createToken('auth_token')->plainTextToken;

                    return response()->json([
                        'estatus'=> 1,
                        'mensaje'=> 'Usuario correcto',
                        'access_token'=>$token,
                        'data'=>$user
                    ]);
                } else {
                    return response()->json([
                        'estatus'=> 0,
                        'mensaje'=> 'Contrasena es incorrecta'
                    ]);
                }
            }else {
                return response()->json([
                    'estatus'=> 0,
                    'mensaje'=> 'Usuario no encontrado'
                ]);
            }
        }
}
