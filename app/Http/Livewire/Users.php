<?php


namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
//use App\User;

class Users extends Component
{
    public $users, $name, $mobile,$address,$location,$area, $user_id;
    public $updateMode = false;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->mobile = '';
        $this->address = '';
        $this->location = '';
        $this->area = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'location' => 'required',
            'area' => 'required',
        ]);

        User::create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::where('id',$id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->mobile = $user->mobile;
        $this->address = $user->address;
        $this->location = $user->location;
        $this->area = $user->area;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'location' => 'required',
            'area' => 'required',
        ]);

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'mobile' => $this->mobile,
                'address' => $this->address,
                'location' => $this->location,
                'area' => $this->area,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            User::where('id',$id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }
}