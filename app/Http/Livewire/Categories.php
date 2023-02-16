<?php


namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categorie;
//use App\User;

class Categories extends Component
{
    public $categories, $categoryname, $description,$categorytype, $categorie_id;
    public $updateMode = false;

    public function render()
    {
        $this->categories = Categorie::all();
        return view('livewire.categories');
    }

    private function resetInputFields(){
        $this->categoryname = '';
        $this->decription = '';
        $this->categorytype = '';
        
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'categoryname' => 'required',
            'description' => 'required',
            'categorytype' => 'required',
            
        ]);

        Categorie::create($validatedDate);

        session()->flash('message', 'Categories Created Successfully.');

        $this->resetInputFields();

        $this->emit('categorieStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $categorie = Categorie::where('id',$id)->first();
        $this->categorie_id = $id;
        $this->categoryname = $categorie->categoryname;
        $this->description = $categorie->description;
        $this->categorytype = $categorie->categorytype;
       
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'categoryname' => 'required',
            'description' => 'required',
            'categorytype' => 'required',
            
        ]);

        if ($this->categorie_id) {
            $categorie = Categorie::find($this->categorie_id);
            $categorie->update([
                'categoryname' => $this->categoryname,
                'description' => $this->description,
                'categorytype' => $this->categorytype,
               
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Categories Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            Categorie::where('id',$id)->delete();
            session()->flash('message', 'Categories Deleted Successfully.');
        }
    }
}
