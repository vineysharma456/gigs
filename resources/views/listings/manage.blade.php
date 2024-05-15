<x-layout>
<x-card class="p-10 mx-auto">
    <header>
      <h1 class="text-3xl text-center font-bold my-6 uppercase">
        Manage Gigs
      </h1>
    </header>

    <table class=" my-16 mx-auto rounded-sm">
      <tbody >
        @unless($listings->isEmpty())
        @foreach($listings as $listing)
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <a href="/listings/{{$listing->id}}"> {{$listing->title}} </a>
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
          <a href="/listing/edit/{{$listing->id}}" class="bg-green-500 text-white p-4 font-bold rounded-xl">Edit</a>
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
           
          <form action="/listing/{{$listing->id}}" method="POST">
            @csrf
                <button type="submit"  class="bg-green-500 text-white p-4 font-bold rounded-xl">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
        @else
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <p class="text-center">No Listings Found</p>
          </td>
        </tr>
        @endunless

      </tbody>
    </table>
</x-card>

</x-layout>
