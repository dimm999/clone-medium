<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex">
                    {{-- Main Section --}}
                    <div class="flex-1">
                        <h1 class="text-5xl">{{ $user->name }}</h1>
                        <div>
                            @forelse ($posts as $p)
                                <x-post-item :post="$p" />
                            @empty
                                <div>
                                    <p class="text-center text-gray-400 py-16">No posts found.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    {{-- End Main Section --}}
                    {{-- Sidebar --}}
                    <x-follow-ctr :user="$user">
                        <x-user-avatar :user="$user" size="w-24 h-24" />
                        <h3>{{ $user->name }}</h3>
                        <p class="text-gray-500">
                            <span x-text="followersCount"></span>
                            followers
                        </p>
                        <p class="">
                            {{ $user->bio }}
                        </p>
                        @if(auth()->user() && auth()->user()->id !== $user->id)
                            <div class="mt-4">
                                <button class="rounded-full px-4 py-2 text-white"
                                    @click="follow()"
                                    x-text="following ? 'Unfollow' : 'Follow'" 
                                    :class="following ? 'bg-red-500' : 'bg-emerald-400'" 
                                />
                            </div>
                        @endif
                    </x-follow-ctr>
                    {{-- End Sidebar --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
