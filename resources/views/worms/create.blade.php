<x-layouts.app>
    <x-navbar />
    <h1 class='text-5xl leading-relaxed tracking-wide font-bold text-center mt-5'>Create Your Profile!</h1>
    <form class='grid grid-cols-1 mx-32 mt-5 gap-5' action="{{ route('worms.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-2 gap-3">
        <x-file-input name='avatar' label='Avatar' accept='image/*' />
        <x-input name="name" label="Name" />
        <x-input name="species" label="Species" class='italic' />
        <x-input name="age" label="Age" type="number" max='5' min='5' />
        <x-input name="number_of_segments" label="Number of Segments" type="number" min='1' />
        <x-input name="number_of_hearts" label="Number of Hearts" type="number" min='1' />
        </div>
        <div class="grid grid-cols-2 gap-3">
            <x-textarea name="about_me" label="About Me" />
            <x-textarea name="habitat" label="Habitat" />
            <x-textarea name="hobbies" label="Hobbies" />
            <x-textarea name="graditude" label="Graditude" />
            <x-textarea name="passion" label="Passion" />
            <x-textarea name="ideal_match" label="Ideal Match" />
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</x-layouts.app>
