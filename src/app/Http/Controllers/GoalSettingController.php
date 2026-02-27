<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoalSettingRequest;
use App\Models\WeightTarget;


class GoalSettingController extends Controller
{
    public function edit()
    {
        $weightTarget = auth()->user()->weightTarget;
        return view('goal_settings', compact('weightTarget'));
    }

    public function update(GoalSettingRequest $request)
    {
        WeightTarget::updateOrCreate(
            ['user_id' => auth()->id()],
            ['target_weight' => $request->target_weight]
        );

        return redirect('/weight_logs');
    }
}
