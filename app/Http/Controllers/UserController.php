<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_view() {
        
        $users = User::with(['departmentBelongs', 'designationBelongs'])->get();

        return view('user.user_details', compact('users'));        
        
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::with(['departmentBelongs', 'designationBelongs'])
            ->where('Name', 'LIKE', "%{$query}%") 
            ->orWhereHas('departmentBelongs', function ($queryBuilder) use ($query) {
                $queryBuilder->where('Name', 'LIKE', "%{$query}%"); 
            })
            ->orWhereHas('designationBelongs', function ($queryBuilder) use ($query) {
                $queryBuilder->where('Name', 'LIKE', "%{$query}%"); 
            })
            ->get();

        return response()->json(['users' => $users]);
    }
}
