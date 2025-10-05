<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContractTerms;
use Illuminate\Http\Request;

class ContractTermsController extends Controller
{
    public function contractTerms(Request $request)
    {
        $terms = ContractTerms::where('status', 'active')->orderBy('sort')->get();

        return response()->json([
            'data' => $terms,
        ]);
    }



}
