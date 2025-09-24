<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
