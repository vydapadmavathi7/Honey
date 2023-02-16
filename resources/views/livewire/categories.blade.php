<div>
    @include('livewire.ccreate')
    @include('livewire.cupdate')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
    @endif
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>Id.</th>
                <th>Categoryame</th>
                <th>Description</th>
                <th>Categorytype</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ucfirst ($value->categoryname) }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->categorytype }}</td>
                
                <td>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>