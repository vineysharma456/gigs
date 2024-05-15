<x-layout>
    <x-card class="w-1/2 mx-auto mb-32">
        <form action="/listing/{{$listing->id}}" method="POST" class="mx-auto text-center w-72" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <header class="text-center text-black">
                <h2 class="text-2xl font-bold uppercase mb-1">Edit a Gig</h2>
                
            </header>

            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"  value="{{$listing->company}}"/>
                @error('company')
                    <p class="text-red-700 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Job title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{$listing->title}}" />
                @error('title')
                    <p class="text-red-700 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    placeholder="Example: Remote, Boston MA, etc"  value="{{$listing->location}}"/>
                @error('location')
                    <p class="text-red-700 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"  value="{{$listing->email}}" />
                @error('email')
                    <p class="text-red-700 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">Website/Application URL</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                    value="{{ $listing->website }}" />
                @error('website')
                    <p class="text-red-700 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">Tags (Comma Separated)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc" value="{{ $listing->tags }}" />
                @error('tags')
                    <p class="text-red-700 font-semibold">{{ $message }}</p>
                @enderror
            </div>

           
            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">Company Logo</label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
                @error('logo')
                    <p class="text-red-700 font-semibold">{{ $message }}</p>
                @enderror
            </div> 

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Job Description</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Include tasks, requirements, salary, etc">{{$listing->description}}</textarea>
                @error('description')
                    <p class="text-red-700 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-red-500 text-white rounded py-2 px-4 hover:bg-black">Update Gig</button>
            </div>
        </form>
    </x-card>
</x-layout>
