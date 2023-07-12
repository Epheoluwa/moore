<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Validation\ValidationController;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function saveTask(Request $request, ValidationController $validationController)
    {
        $validator = $validationController->TaskValidation($request);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'team' => $request->team,
        ];

        try {
            Task::create($data);
            return back()->with('success', 'Task Created Successful');
        } catch (\Exception $e) {
            return back()->with('error', 'Unexpected error while creating Task');
        }
    }


    public function editTask(Request $request, $id, ValidationController $validationController)
    {
        $validator = $validationController->TaskUpdateValidation($request);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'team' => $request->team,
            'status' => $request->status,
        ];

        try {
            Task::where('id', $id)->update($data);
            return back()->with('success', 'Task Updated Successful');
        } catch (\Exception $e) {
            return back()->with('error', 'Unexpected error while creating Job');
        }
    }

    public function deletetask($id)
    {
        $job = Task::find($id);
        try {
            $job->delete();
            return back()->with('success', 'Task Deleted successful');
        } catch (\Exception $e) {
            return back()->with('error', 'Error While Deleting Job');
        }
    }
}
