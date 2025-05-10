<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'workspaceId' => 'required|exists:workspace,workspaceId',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
        ]);

        // Check workspace belongs to the user
        $workspace = Auth::user()->workspace()->findOrFail($request->workspaceId);

        $task = Task::create([
            'workspaceId' => $workspace->workspaceId,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'is_active' => true,
            'is_deleted' => false,
            'created_date' => now(),
            'modified_date' => now(),
        ]);

        return response()->json($task, 201);
    }
}
