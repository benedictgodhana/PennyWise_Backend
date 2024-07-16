<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class TraderController extends Controller
{
    public function registerTrader(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'businessName' => 'required|string|max:255',
            'businessType' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string|max:255',
            'consentMarketing' => 'required|boolean',
            'phone' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create the trader
        $trader = Trader::create([
            'user_id' => $user->id,
            'businessName' => $request->businessName,
            'businessType' => $request->businessType,
            'age' => $request->age,
            'gender' => $request->gender,
            'consentMarketing' => $request->consentMarketing,
            'phone' => $request->phone
        ]);

        // Assign the 'trader' role to the user using Spatie
        $user->assignRole('trader');

        return response()->json(['message' => 'Trader registered successfully', 'user' => $user, 'trader' => $trader], 201);
    }
}
