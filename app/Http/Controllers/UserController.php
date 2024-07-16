<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        // Log the incoming old password for debugging
        \Log::info('Old Password Attempt: ' . $request->old_password);

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['error' => 'Current password does not match'], 422);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['message' => 'Password updated successfully']);
    }
    
}
