<div>
    @include('livewire.create')
    @include('livewire.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
    @endif
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Location</th>
                <th>Area</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ucfirst ($value->name) }}</td>
                <td>{{ $value->mobile }}</td>
                <td>{{ $value->address }}</td>
                <td>{{ $value->location }}</td>
                <td>{{ $value->area }}</td>
                <td>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>