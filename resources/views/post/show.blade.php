<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-2xl mb-4">{{ $post->title }}</h1>


                {{-- User avatar --}}
                <div class="flex gap-4">
                    <x-user-avatar :user="$post->user" />
                    <div>
                        <x-follow-ctr :user="$post->user" class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user) }}" class="hover:underline">{{ $post->user->username }}</a>
                            @auth
                            &middot;
                            <button
                                x-text="following ? 'Unfollow' : 'Follow'"
                                :class="following ? 'text-red-600' : 'text-emerald-600'"
                                @click="follow()"
                            />
                            @endauth
                        </x-follow-ctr>
                        <div class="flex gap-2 text-sm text-gray-500">
                            {{ $post->readTime() }} min read
                            &middot;
                            {{ $post->created_at->format('M d, Y') }}
                        </div>
                    </div>

                </div>

                @if($post->user_id === Auth::id())
                    <div class="py-4 mt-4 border-t border-b border-gray-200">
                        <x-primary-button>
                            Edit Post
                        </x-primary-button>
                        <form class="inline-block" 
                            action="{{ route('post.destroy', $post) }}" 
                            method="post"
                            >
                            @csrf
                            @method('delete')
                            <x-danger-button>
                                Delete Post
                            </x-danger-button>
                        </form>
                    </div>
                @endif

                {{-- Clap Section --}}
                <x-clap-button :post="$post" />
                {{-- Post Content --}}
                <div class="mt-8">
                    <img src="{{ $post->imgUrl() }}" alt="{{ $post->title }}" class="w-full">
                </div>
                <div class="mt-4">
                    {{ $post->content }}
                </div>

                <div class="mt-8">
                    <span class="px-4 py-2 bg-gray-200 rounded-xl">
                        {{ $post->category->name }}
                    </span>
                </div>

                <x-clap-button :post="$post" />

            </div>
        </div>
    </div>
</x-app-layout>