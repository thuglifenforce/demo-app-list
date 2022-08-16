<div class="container">
    

    <h1>Total d'usage attendu :{{ $count }} {{ $nombre}}</h1>
    <ul class="responsive-table">
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100 mb-3">
              <div class="searchbar">
                <input wire:model.debounce.500ms="search" class="search_input" type="text" name="" placeholder="Non ou code ...">
                <span class="search_icon"><i class="fas fa-search"></i></span>
              </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <div>
                @if ($errors)
                @foreach ($errors->all() as $error )
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">{{ Session::get('success')}}</div>
                @endif
                <form action="{{ route('delete') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('voulez vous supprimer la liste')" type="submit" class="btn btn--primary uppercase">Supprimer</button>
                </form>
            </div>

            <div>
                Nombre
                <select wire:model="parpage" id="par-page" class="custom-select w-auto">
                    @for ($i = 10; $i < 40; $i +=10) <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                </select>
                par page
            </div>
        </div>


        <li class="table-header">
            <div class="col col-1">#</div>
            <div class="col col-2" wire:click="setOrderField('ressource')">Activite</div>
            <div class="col col-3" wire:click="setOrderField('nom')">Nom</div>
            <div class="col col-4" wire:click="setOrderField('prenom')">prenom</div>
            <div class="col col-5" wire:click="setOrderField('heure_de_debut')">Heure</div>
            <div class="col col-6" wire:click="setOrderField('nombre_de_personnes')">Nombre</div>
            <div class="col col-7" wire:click="setOrderField('code_de_reservation')">Code</div>
            <div class="col col-8">Confirmation</div>
        </li>

        @foreach ($imports as $import)
        @if ($color = ($import->confirmer == 1) ? 'opacity: 0.4;': '#fff')
        <li class="table-row" style="{{ $color }}">
            <div class="col col-1" data-label="#">{{ $import->id }}</div>
            <div class="col col-2" data-label="Activite">{{ $import->ressource }}</div>
            <div class="col col-3" data-label="Nom">{{ $import->nom }}</div>
            <div class="col col-4" data-label="prenom">{{ $import->prenom }}</div>
            <div class="col col-5" data-label="Heure">{{ $import->heure_de_debut }}</div>
            <div class="col col-6" data-label="Nombre">{{ $import->nombre_de_personnes }}</div>
            <div class="col col-7" data-label="Code">{{ $import->code_de_reservation }}</div>

            <div class="col col-8" data-label="Confirmation">
                @livewire('toggle-button',[
                'model' => $import,
                'field' => 'confirmer',
                ],key($import->id))
            </div>

            @endif
            @endforeach
        </li>
    </ul>
    <div class="mb-5">
    {{ $imports->links('livewire.pagination') }}
    </div>



</div>


