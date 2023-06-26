@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@livewire('user-management')

@livewireScripts
