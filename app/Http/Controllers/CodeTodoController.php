<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CodeTodo;
use Illuminate\Support\Facades\DB;

class CodeTodoController extends Controller
{
    public function codeTodoHome(){
        $codeTodo = new CodeTodo();
        return view("codetodo", [
            "codeTodo" => $codeTodo
        ]);
    }
    public function codeTodoNew(Request $req){
        $codeTodo = new CodeTodo();
        $codeTodo->title = $req->title;
        $codeTodo->description = $req->description;
        $codeTodo->save();

        return back();
    }
    public function codeTodoEdit(Request $req, $codeTodoId){
        $codeTodo = CodeTodo::find($codeTodoId);
        $codeTodo->title = $req->title;
        $codeTodo->description = $req->description;
        $codeTodo->save();

        return back();
    }
    public function codeTodoComplete($codeTodoId){
        $codeTodo = CodeTodo::find($codeTodoId);
        $codeTodo->completed = true;
        $codeTodo->save();

        return back();
    }
    public function codeTodoDelete($codeTodoId){
        DB::table("code_todos")->where("id", $codeTodoId)->delete();

        return back();
    }
}
