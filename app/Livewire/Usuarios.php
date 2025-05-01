<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Usuarios extends Component
{
    public $name, $email, $password, $phone, $message;
    public $users;
    public function mount()
    {
        $this->users = User::all();

    }

    public function createUser()
    {
        // dd('Method createUser called');
        // dd($this->name, $this->email, $this->password, $this->phone);

        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'nullable|string|max:15|regex:/^\+?[0-9]{7,15}$/',
        ]);
        
       $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'phone' => $this->phone,
        ]);
        $this->resetInputFields();
        $this->users = User::all();
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $this->users = User::all();
        session()->flash('message', 'Usuario eliminado exitosamente.');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->phone = '';
    }

    public function render()
    {
        return view('livewire.usuarios');
    }
}
