<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PlanTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Plan\CreatePlanRequest;
use App\Models\Plan;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function index(): View
    {
        return view('admin.plan.index', [
            'plans' => Plan::all()
        ]);
    }

    public function create(): View
    {
        return view('admin.plan.create', [
            'planTypes' => PlanTypes::cases()
        ]);
    }

    public function store(CreatePlanRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        try {
            $plan = new Plan();
            $plan->title  = $validated['title'];
            $plan->type   = $validated['type'];
            $plan->factor = $validated['factor'];
            $plan->save();
            $route = 'admin.plans.index';
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
