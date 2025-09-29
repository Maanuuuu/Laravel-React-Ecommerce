<?php

namespace App\Http\Controllers;

use App\Models\WorkoutPlans;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class WorkoutPlansController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return[
            new Middleware('auth:sanctum', except: ['index', 'userPlans']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // List all workout plans
        $workoutPlans = WorkoutPlans::all();
        return response()->json($workoutPlans);
    }

    public function userPlans($userId)
    {
        // List all workout plans for a specific user
        $workoutPlans = WorkoutPlans::where('user_id', $userId)->get();
        return response()->json($workoutPlans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);
        $workoutPlan = $request->user()->WorkoutPlans()->create($fields);
        return response()->json(['message' => 'Workout plan created successfully', "workout_plan" => $workoutPlan], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $workoutPlan = WorkoutPlans::find($id);
        if (!$workoutPlan) {
            return response()->json(['message' => 'Workout plan not found'], 404);
        }
        return response()->json($workoutPlan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $workoutPlan = WorkoutPlans::find($id);
        if (!$workoutPlan) {
            return response()->json(['message' => 'Workout plan not found'], 404);
        }
        
        
        if($request->user()->id !== $workoutPlan->user_id) {
            return response()->json(['message' => 'Unauthorized, you are not allowed to update this workout plan'], 403);
        }

        $fields = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'is_active' => 'sometimes|boolean',
        ]);

        $workoutPlan->update($fields);
        return response()->json(['message' => 'Workout plan updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workoutPlan = WorkoutPlans::find($id);
        if (!$workoutPlan) {
            return response()->json(['message' => 'Workout plan not found'], 404);
        }
        if(request()->user()->id !== $workoutPlan->user_id) {
            return response()->json(['message' => 'Unauthorized, you are not allowed to delete this workout plan'], 403);
        }
        $workoutPlan->delete();
        return response()->json(['message' => 'Workout plan deleted successfully']);
    }
}
