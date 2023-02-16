<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" wire:model="categorie_id">
                        <label for="exampleFormControlInput1">Categoryname</label>
                        <input type="text" class="form-control" wire:model="categoryname" id="exampleFormControlInput1" placeholder="Enter Categoryname">
                        @error('categoryname') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Desciption</label>
                        <input type="text" class="form-control" wire:model="description" id="exampleFormControlInput2"  placeholder="Enter Description">
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Categorytype</label>
                        <input type="text" class="form-control" wire:model="categorytype" id="exampleFormControlInput3"  placeholder="Enter Categorytype">
                        @error('categorytype') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-check">
<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
<label class="form-check-label" for="flexRadioDefault1">
Veg
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
<label class="form-check-label" for="flexRadioDefault2">
Non-veg
</label>
</div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
       </div>
    </div>
</div>