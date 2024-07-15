<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function show()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Include trader details if necessary
        $traderDetails = $user->trader; // Adjust if your relationship is named differently

        // Return user data including trader details
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'trader' => $traderDetails->phone, // Assuming 'phone' is the column in the traders table
        ]);
    }

    public function getUserCount()
    {
        $userCount = User::count();

        return response()->json(['count' => $userCount], 200);
    }
}
