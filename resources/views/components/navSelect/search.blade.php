<div id="" class="input-group input_search_sechedules">
    <input type="text" class="form-control" placeholder="Search" wire:model="search" wire:keydown.enter='srch' >
    <div class="input-group-append">
        <button id="form-control" class="btn btn-light" type="submit"
        wire:click='srch'
        ><img src="{{Vite::image("magnifying-glass (2).png")}}" id="spaces2"  width="20px" ></button>
    </div>
</div>
