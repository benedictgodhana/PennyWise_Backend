<?php

namespace App\Http\Controllers;

use App\Models\FinancialLiteracyResource;
use Illuminate\Http\Request;

class FinancialLiteracyController extends Controller
{
    public function index()
    {
        try {
            $resources = FinancialLiteracyResource::all();
            return response()->json($resources);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch resources.'], 500);
        }
    }
}
