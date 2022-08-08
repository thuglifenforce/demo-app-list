<?php

namespace App\Http\Livewire;

use App\Models\Import;
use Livewire\Component;
use Livewire\WithPagination;

class ListClient extends Component
{

    use WithPagination;


    public $search ;
    public int $parpage = 20;
    public string $orderField = 'ressource';
    public string $orderDirection = 'ASC';

    // public int $count = 0;




    protected $queryString = [
        'search' => ['except' => ""],
        'orderField' => ['except' => "ressource"],
        'orderDirection' => ['except' => "ASC"],

    ];

    protected $listeners = [
        'userUpdated' => 'onUserUpdated'
    ];


    public function count()
    {
       $count = Import::where('nombre_de_personnes')->count();
    //    dd($count);

    }


    public function setOrderField(string $nom)
    {
        if ($nom == $this->orderField) {

            $this->orderDirection = $this->orderDirection == 'ASC' ? 'DESC' : 'ASC';

        }else{

            $this->orderField = $nom;
            $this->reset('orderDirection');
        }
    }


    public function updating($nom)
    {
        if ($nom == 'search' ) {
            $this->resetPage();
        }

    }

    public function onUserUpdated()
    {
        $this->resetPage();
    }

    public function render()
    {

        return view('livewire.list-client',[

            'imports' => Import::where('nom' , 'like', '%'.$this->search.'%')
                                ->orWhere('code_de_reservation' , 'like', '%'.$this->search.'%')
                                ->orderBy($this->orderField, $this->orderDirection)
                                ->paginate($this->parpage),

            'count' => Import::all()->sum('nombre_de_personnes')

        ]);

    }
}
