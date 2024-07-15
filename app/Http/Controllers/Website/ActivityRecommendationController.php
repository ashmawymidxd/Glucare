<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;

use App\Models\ActivityRecommendation;

use App\Http\Requests\StoreActivityRecommendationRequest;
use App\Http\Requests\UpdateActivityRecommendationRequest;

class ActivityRecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Website.activity.index');
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
     * @param  \App\Http\Requests\StoreActivityRecommendationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivityRecommendationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityRecommendation  $activityRecommendation
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityRecommendation $activityRecommendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivityRecommendation  $activityRecommendation
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivityRecommendation $activityRecommendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActivityRecommendationRequest  $request
     * @param  \App\Models\ActivityRecommendation  $activityRecommendation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivityRecommendationRequest $request, ActivityRecommendation $activityRecommendation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityRecommendation  $activityRecommendation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityRecommendation $activityRecommendation)
    {
        //
    }
}
