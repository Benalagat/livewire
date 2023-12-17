<div>
    <form wire:submit="createUser" action="">
        <input wire:model="name" type="text" placeholder="name">
        @error('name')
            <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror
        <input wire:model="email" type="email" placeholder="email">
        @error('name')
            <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror
        <input wire:model="password" type="password" placeholder="password">
        @error('name')
            <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror
        <button> Create</button>
    </form>
    <hr>
    <hr>
    @foreach($users as $user)
        <h3>{{ $user->name }}</h3>
    @endforeach
    </hr>
    {{ $users->links() }}

</div>

