<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'industrySector' => 'required|string|max:255',
            'incomeLevel' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string|max:255',
            'familySize' => 'required|integer',
            'tradingExperience' => 'required|string|max:255',
            'preferredProducts' => 'required|string|max:255',
            'communicationChannels' => 'required|array',
            'educationLevel' => 'required|string|max:255',
            'trainingNeeds' => 'required|string|max:255',
            'consentMarketing' => 'required|boolean',
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
            'industrySector' => $request->industrySector,
            'incomeLevel' => $request->incomeLevel,
            'age' => $request->age,
            'gender' => $request->gender,
            'familySize' => $request->familySize,
            'tradingExperience' => $request->tradingExperience,
            'preferredProducts' => $request->preferredProducts,
            'communicationChannels' => json_encode($request->communicationChannels),
            'educationLevel' => $request->educationLevel,
            'trainingNeeds' => $request->trainingNeeds,
            'consentMarketing' => $request->consentMarketing,
        ]);

        return response()->json(['message' => 'Trader registered successfully', 'user' => $user, 'trader' => $trader], 201);
    }
}
