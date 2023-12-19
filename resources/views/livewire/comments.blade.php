<div class="w-12/12">

    <div class="w-12/12"></div>
    <div class="border rounded shadow-lg p-4 w-12/12 ring-offset-slate-50">
        <h1 class="text-3xl">Comments</h1>
        <div>
            @if (session()->has('message'))
            <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                {{ session('message') }}
            </div>
            @endif
        </div>
        <section>

        </section>
        <form class="my-2" wire:submit.prevent="addComment">
            <input type="file" wire:model="image">
            <div class="" style="">
                @if ($image)
                Photo Preview:
                <img src="{{ $image->temporaryUrl() }}" width="150">
                @error('image') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
                @endif

            </div>
            <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind." wire:model.debounce.500ms="comment">
            <div class="" style="">
                @error('comment') <span class="text-red-500 text-md">{{ $message }}</span> @enderror
            </div>
            {{-- <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind." wire:model.debounce.500ms="comment"> --}}
            <div class="py-2">
                <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
            </div>
        </form>
        <hr>

        @foreach($comments as $comment)
        <div class="rounded border shadow p-3 my-2">
            <div class="flex justify-between my-2">
                <div class="flex">
                    <p class="font-bold text-lg"> {{$comment->created_by}}</p>
                    <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">
                        {{ \Carbon\Carbon::parse($comment->date_post)->diffForHumans()}}
                    </p>
                </div>

                <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer" wire:click="remove({{ $comment->id }})"></i>

            </div>

            <div class="grid grid-rows-0 grid-flow-col gap-3">
                <div class="row-span-2 ...">
                    @if($comment->image)
                    <img src="{{ 'storage/'.$comment->image}}" width="100" />
                    @endif
                </div>
                <div class="col-span-2 ...">
                    {{$comment->body}}
                </div>
            </div>

        </div>
        @endforeach
        {{$comments->links()}}

    </div>
</div>
