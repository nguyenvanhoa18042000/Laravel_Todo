<?php

namespace App\Http\Controllers\Frontend;
use App\Task; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        dd('hàm create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Task::all();
        $task = new Task();
        $task->name = $data[0]['name'];
        $task->content = $data[0]['content'];
        $task->deadline = $data[0]['deadline'];
        $task->status = 1;
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
         dd('hàm edit với id = '.$id);
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
        $url = $request->fulexUrl();
        dd($url);
        $task = Task::find($id);
        $task->name = 'Học Laravel 3';
        $task->status = 1;
        $task->save();
        //dd('hàm update với id = '.$id);
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
        dd('hàm complete với id = '.$id);
    }

    public function reComplete($id){
        dd('hàm làm lại với id = '.$id);
    }
}
