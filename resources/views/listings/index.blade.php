<x-layout>
@include('partials._hero')
@include('partials._search')

<div class="grid mx-2 gap-12 mb-24 grid-cols-2 p-6">

@foreach($list as $li)
<x-listing-card :li="$li"/>

@endforeach
</div>
   
</x-layout>
