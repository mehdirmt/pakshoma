<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePlanRequest;
use App\Models\Plan;
use App\Models\SellType;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function create(): View
    {
        return view('admin.plan.create', [
            'sellTypes' => SellType::all()
        ]);
    }

    public function store(CreatePlanRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        try {
            $plan = new Plan();
            $plan->title        = $validated['title'];
            $plan->sell_type_id = $validated['type'];
            $plan->percent      = $validated['percent'];
            $plan->start_date   = $validated['start_date'];
            $plan->end_date     = $validated['end_date'];
            $plan->save();
            $route = 'admin.dashboard';
            $flash = [
                'type'    => 'success',
                'message' => 'store new plan success'
            ];
        } catch (Exception $e) {
            $route = 'admin.plans.create';
            $flash = [
                'type'    => 'failure',
                'message' => $e->getMessage()
            ];
        }

        return redirect()->route($route)->with('flash_message', $flash);
    }
}
