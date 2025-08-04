<?php

use Illuminate\Support\Facades\Route;

//added by me 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Task;

// // FAKE DATABASE START
// class Task
// {
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at
//     ) {
//     }
// }

// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),
//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),
//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),
//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     ),
// ];

// FAKE DATABASE END




Route::get('/tasks', function () {
    return view('index',[
    'tasks'=>  Task::all()
    ]);
    // return view('welcome');
    // return 'Main page';
})->name('tasks.index');


Route::get('tasks/create',function(){
    return view('create');
})->name('tasks.create');

Route::get('tasks/{id}', function($id)  {
    return view('show', [
        'task'=>  Task::findOrFail($id)
    ]);
})->name('tasks.show');


Route::get('/', function(){
    return redirect()->route('tasks.index');
});

Route::post('/tasks', function(Request $request){

//if everything is validated correctly, i will get a data array with my info inside
$data = $request->validate([
'title' => 'required|max:255',
'description'=>'required',
'long_description'=>'required',
]);

//we create a new task
$task = new Task;
$task->title = $data['title'];
$task->description = $data['description'];
$task->long_description = $data['long_description'];

//save changes to the database
$task->save();

return redirect()->route('tasks.show',['id' => $task->id]);

})->name('tasks.store');

