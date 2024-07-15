<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;

use App\Models\DietaryRecommendation;
use App\Http\Requests\StoreDietaryRecommendationRequest;
use App\Http\Requests\UpdateDietaryRecommendationRequest;

class DietaryRecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Website.dietary.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDietaryRecommendationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDietaryRecommendationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DietaryRecommendation  $dietaryRecommendation
     * @return \Illuminate\Http\Response
     */
    public function show(DietaryRecommendation $dietaryRecommendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DietaryRecommendation  $dietaryRecommendation
     * @return \Illuminate\Http\Response
     */
    public function edit(DietaryRecommendation $dietaryRecommendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDietaryRecommendationRequest  $request
     * @param  \App\Models\DietaryRecommendation  $dietaryRecommendation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDietaryRecommendationRequest $request, DietaryRecommendation $dietaryRecommendation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DietaryRecommendation  $dietaryRecommendation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DietaryRecommendation $dietaryRecommendation)
    {
        //
    }
}
