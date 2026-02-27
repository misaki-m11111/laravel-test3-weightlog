<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreWeightLogRequest;
use App\Http\Requests\UpdateWeightLogRequest;

class WeightLogController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $weightLogs = $user->weightLogs()->latest()->paginate(8);
        $target = $user->weightTarget;

        return view('weight_logs.index', compact('weightLogs', 'target'));
    }

    public function create()
    {
        return view('weight_logs.create');
    }

    public function store(StoreWeightLogRequest $request)
    {
        auth()->user()->weightLogs()->create([
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect('/weight_logs');
    }

    public function search(Request $request)
    {
        $user = auth()->user();

        $query = $user->weightLogs()->latest('date');

        if ($request->from && $request->to) {
            $query->whereBetween('date', [$request->from, $request->to]);
        }

        $weightLogs = $query->paginate(8);

        $count = $weightLogs->total();

        $target = $user->weightTarget;

        return view('weight_logs.index', compact('weightLogs', 'count', 'target'));
    }

    public function show($id)
    {
        $user = auth()->user();

        $weightLog = $user->weightLogs()->findOrFail($id);

        return view('weight_logs.show', compact('weightLog'));
    }

    public function update(UpdateWeightLogRequest $request, $weightLogId)
    {
        $weightLog = auth()->user()->weightLogs()->findOrFail($weightLogId);

        $weightLog->update($request->validated());

        return redirect("/weight_logs");
    }

    public function destroy($id)
    {
        $user = auth()->user();

        $weightLog = $user->weightLogs()->findOrFail($id);

        $weightLog->delete();

        return redirect('/weight_logs');
    }
}
