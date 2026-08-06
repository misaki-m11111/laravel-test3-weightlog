<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Step1Request;
use App\Http\Requests\Step2Request;
use App\Models\WeightLog;

class RegisterController extends Controller
{
    public function showStep1()
    {
        return view('auth.register-step1');
    }

    public function storeStep1(Step1Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);

        return redirect('/register/step2');
    }

    public function showStep2()
    {
        return view('auth.register-step2');
    }

    public function storeStep2(Step2Request $request)
    {
        WeightTarget::create([
            'user_id' => auth()->id(),
            'weight'=> $request->weight,
            'target_weight' => $request->target_weight,
        ]);

        WeightLog::create([
            'user_id'=>auth()->id(),
            'weight'=>$request->weight,
            'date' => now()->toDateString(),
        ]);
        return redirect('/weight_logs');
    }
}
