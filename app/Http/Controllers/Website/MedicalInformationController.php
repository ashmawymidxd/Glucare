<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalInformation;
use Illuminate\Http\JsonResponse;

class MedicalInformationController extends Controller
{
    public function search($query)
    {
        // Implement search logic
        $results = MedicalInformation::where('title', 'like', '%' . $query . '%')->get();

        // Check if any results were found
        if ($results->isEmpty()) {
            // Return a response indicating no results found
            return response()->json([
                'status' => 'error',
                'message' => 'No results found for the given query.',
                'data' => []
            ], JsonResponse::HTTP_NOT_FOUND);
        }

        // Return the search results along with success status
        return response()->json([
            'status' => 'success',
            'message' => 'Results found for the given query.',
            'data' => $results
        ], JsonResponse::HTTP_OK);
    }
}