<?php

namespace App\Http\Controllers;

use App\Models\NikitoUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NikitoUserController extends Controller
{
     public function register(Request $request){
        $user=new NikitoUser();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);

        $user->save();

         // Loguear al usuario usando el guard 'nikitos_user'
         Auth::guard('nikitos_user')->login($user);

        return redirect()->route('pedido');
   }

   public function login(Request $request){


     
     $credentials = $request->validate([
        'name' => 'required|string',  
        'password' => 'required|string',
    ]);
 
  

    if (Auth::guard('nikitos_user')->attempt(['name' => $request->name, 'password' => $request->password])) {
        $user = Auth::guard('nikitos_user')->user();
        
        return redirect()->route('pedido');
    }
  

    

      return back()->withErrors([
        'name' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
      ]);
    }
 

   public function salir(Request $request){
        
     // Cerrar sesión con el guard 'nikitos_user'
     Auth::guard('nikitos_user')->logout();
     
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
   }

    public function destroy($user_id){
        $user = NikitoUser::find($user_id);
        $user->delete();
        return redirect()->route('home');
    }
      
}
