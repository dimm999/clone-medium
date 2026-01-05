@props(['user',
    'size' => 'w-12 h-12',
])

@if ($user->image)
    <img src="{{ $user->imgUrl() }}" alt="{{ $user->name }}" class="{{ $size }} rounded-full">
@else
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTM8DHhuej2UHjpwplhANUCt18PWBLFBtXfg&s"
        alt="{{ $user->name }}" class="{{ $size }} rounded-full">
@endif