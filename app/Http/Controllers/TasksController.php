<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;    // 追加
use App\User;    // 追加

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

            return view('tasks.index', ['tasks' => $tasks,]);
        }else {
            
            return view('welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (\Auth::check()) {
            $task = new Task;

            return view('tasks.create', [
                'task' => $task,
            ]);
        }else {
            return redirect('/');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' => 'required|max:10',
        ]);
        
        
        $request->user()->tasks()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);

/*
        $user_id=\Auth::id();
        $task = new Task;
        $task->user_id=$user_id;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();
*/
        return redirect('/');

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
        if(\Auth::id() !== $task->user_id){
            return redirect('/');
        }
        

        return view('tasks.show', [
            'task' => $task,
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $task = Task::find($id);
        if(\Auth::id() !== $task->user_id){
            return redirect('/');
        }
        


        return view('tasks.edit', [
            'task' => $task,
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
    
        $task = Task::find($id);
        if(\Auth::id() !== $task->user_id){
            return redirect('/');
        }
        
    
    
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' => 'required|max:10',
        ]);
/*        
        $task = Task::find($id);
        $task->user_id=\Auth::id();
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();
*/
        $request->user()->tasks()->where('id', $id)->update([
            'content' => $request->content,
            'status' => $request->status,
        ]);
        
        

        return redirect('/');
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
        if(\Auth::id() !== $task->user_id){
            return redirect('/');
        }


        $task->delete();

        return redirect('/');
    }
    
    
}
