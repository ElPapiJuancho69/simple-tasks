<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    public function index()
    {
        
        $usuarios = User::all(); // Obtén todos los usuarios
        return view('users.index', compact('usuarios'));
    }
    
}
