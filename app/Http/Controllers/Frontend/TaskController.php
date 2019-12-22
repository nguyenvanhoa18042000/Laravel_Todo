<?php

namespace App\Http\Controllers\Frontend;
use App\Task; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 // use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        $tasks = Task::orderBy('name', 'desc')->get();
        return view('home')->with([
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('font-end.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $content = $request->get('content');
        $deadline = $request->get('deadline');
        $status = $request->get('status');
        $priority = $request->get('priority');
        $task = new Task();
        $task->name = $name;
        $task->content = $content;
        $task->deadline = $deadline;
        $task->status = $status;
        $task->priority = $priority;
        $task->updated_at = null;
        $task->save(); 
        return redirect()->route('task.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('font-end.tasks.show')->with([
            'task' => $task
        ]);
        //dd('store');
        // $task = new Task();
        // $task->name = 'Học Laravel 2';
        // $task->status = 1;
        // $task->deadline = '2019-12-17 23:00:00';
        // $task->save();

        // Task::where('status', 0)
        //     ->update(['deadline' => '2019-12-30 23:00:00']);
        //$task = Task::find($id);
        //$task = Task::where('id', $id)->first();
        //$task = Task::findOrFail($id);//nếu vd ta muốn sai thì quay về trang chủ thì mh xử lí if else logic
        //dd($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = Task::all();
         $task = Task::find($id);
         return view('font-end.tasks.edit')->with([
            'tasks' => $tasks,
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $deadline = $request->get('deadline');
        $content = $request->get('content');
        $status = $request->get('status');
        $priority = $request->get('priority');
        $task = Task::find($id);
        $task->name = $name;
        $task->content = $content;
        $task->deadline = $deadline;
        $task->status = $status;
        $task->priority = $priority;
        $task->save();
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task.index');
    }

    public function complete($id){
        $task = Task::find($id);
        $task->status = 2;
        $task->save();
        return redirect()->route('task.index');
    }

    public function reComplete($id){
        $task = Task::find($id);
        $task->status = 1;
        $task->save();
        return redirect()->route('task.index');
    }
}
