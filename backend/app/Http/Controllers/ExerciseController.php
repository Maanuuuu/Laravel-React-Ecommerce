<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ExerciseController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return[
            new Middleware('auth:sanctum', except: ['index', 'show']),
        ];
    }

    public function index()
    {
        $exercises = Exercise::all();
        return response()->json($exercises);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $user = $request->user();

            // Solo Admin con permiso puede crear en exercises
            if ($user->hasRole('admin') && $user->can('makeExercises')) {
                $fields = $request->validate([
                    'name' => 'required|string',
                    'description' => 'required|string',
                    'category' => 'required|string',
                    'muscle_group' => 'required|string',
                    'cover_image' => 'nullable|string',
                    'video_url' => 'nullable|string',
                ]);

                $exercise = $request->user()->exercises()->create($fields);
                return response()->json(["message" => "Ejercicio creado exitosamente.", "exercise" => $exercise], 201);
            }

            // Si no es admin, rechaza o redirige a custom_exercises
            return response()->json(['message' => 'No autorizado para crear ejercicios globales. Usa custom exercises.'], 403);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exercise = Exercise::find($id);
        if ($exercise) {
            return response()->json($exercise);
        } else {
            return response()->json(['message' => 'Exercise not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request->user();
        $exercise = Exercise::find($id);

        if (!$exercise) {
            return response()->json(['message' => 'Exercise not found'], 404);
        }

        // Solo Admin con permiso puede actualizar en exercises
        if ($user->hasRole('admin') && $user->can('makeExercises')) {
            $fields = $request->validate([
                'name' => 'sometimes|string',
                'description' => 'sometimes|string',
                'category' => 'sometimes|string',
                'muscle_group' => 'sometimes|string',
                'cover_image' => 'nullable|string',
                'video_url' => 'nullable|string',
            ]);

            $exercise->update($fields);
            return response()->json(["message" => "Ejercicio actualizado exitosamente.", "exercise" => $exercise], 200);
        }

        // Si no es admin, rechaza o redirige a custom_exercises
        return response()->json(['message' => 'No autorizado para actualizar ejercicios globales. Usa custom exercises.'], 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = request()->user();
        $exercise = Exercise::find($id);

        if (!$exercise) {
            return response()->json(['message' => 'Exercise not found'], 404);
        }

        // Solo Admin con permiso puede eliminar en exercises
        if ($user->hasRole('admin') && $user->can('makeExercises')) {
            $exercise->delete();
            return response()->json(['message' => 'Ejercicio eliminado exitosamente.'], 200);
        }

        // Si no es admin, rechaza o redirige a custom_exercises
        return response()->json(['message' => 'No autorizado para eliminar ejercicios globales. Usa custom exercises.'], 403);
    }
}
