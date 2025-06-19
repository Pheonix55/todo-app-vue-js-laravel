<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Throwable;

class TodoController extends Controller
{
    public function index()
    {
        $todo = Todo::latest()->paginate(10);
        return response()->json(['message' => 'Todos Fetched Successfully!', 'data' => $todo], 200);
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|unique:todos',
                'description' => 'required|string|max:255',
            ]);
            $todo = Todo::create([
                'name' => $request->name,
                'description' => $request->description
            ]);
            return response()->json(['message' => 'Todo Added successfully', 'data' => $todo], 200);
        } catch (Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
