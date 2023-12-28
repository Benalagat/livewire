<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;
    // #[Rule('required|min:3|max:50')]
    public $name;
    public $search;
    public $editingTodoName;
    public $editingTodoID;
    public function create(){
        $rules = [
            'name' => 'required|min:3|max:50'
        ];
        $validate=$this->validateOnly('name', $rules);
        Todo::create($validate);
        $this->reset('name');
        session()->flash('success', 'saved');
    }
    public function toggle($todoID){
        $todo=Todo::find($todoID);
        $todo->completed= !$todo->completed;
        $todo->save();
    }
    public function edit($todoID){
        $this->editingTodoID=$todoID;
        $this->editingTodoName=Todo::find($todoID)->name;
    }
    public function cancelEdit(){
        $this->reset('editingTodoName','editingTodoID');
    }
    public function update(){
        $rules = [
            'editingTodoName' => 'required|min:3|max:50',
        ];
        $this->validateOnly('editingTodoName', $rules);
        Todo::find($this->editingTodoID)->update([
            'name'=>$this->editingTodoName
        ]);
        $this->cancelEdit();
    }
    public function delete($todoID){
        Todo::find($todoID)->delete();
    }
    public function render()
    {
        return view('livewire.todo-list',[
            'todos' =>Todo::latest()->where('name','like',"%{$this->search}%") ->paginate(5)
        ]);
    }
}
