<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * the task reposityr instance
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * create a new controller instance
     *
     * @param TaskRepository $tasks
     * @return void
     */
    function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    /**
     * display a list of the user's task
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    /**
     * create new task
     *
     * @param Request $request
     * @return Response;
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 
            'name' => 'required|max:255'
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    /**
     * destroy the given task
     *
     * @param Request $request
     * @param Task $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('/tasks');
    }
}
