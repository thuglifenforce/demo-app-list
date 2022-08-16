<?php

namespace App\Http\Livewire;

use App\Models\Import;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Model;

class ToggleButton extends Component
{

    use WithPagination;

    public Model $model;
    public string $field;
    public bool $isActive;
    public array $nombre = [];


    public function mount()
    {
        $this->isActive = (bool) $this->model->getAttribute($this->field);

    }

    public function updating($field, $value)
    {

        $this->model->setAttribute($this->field, $value)->save();
        $this->emit('userUpdated');

    }



    public function render()
    {
        return view('livewire.toggle-button');
    }
}
