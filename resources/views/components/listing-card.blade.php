
@props(['li'])
 <x-card class="flex gap-10 items-center justify-center" >
        
    
    
   <div>
       <!-- <img src="{{ $li->logo ? asset('storage/' . $li->logo) : asset('/images/logo.png') }}" class="h-24 w-24"> -->
     <img src="{{ $li->logo ? asset('storage/'. $li->logo) : asset('images/logo.png') }}" alt="" class="h-32 w-32">


  </div>
            <div class=" p-4 space-y-2 ">
                  <a href="/listing/{{ $li->id }}">Title: {{ $li->title }}</a> 
                    <h4>Company :{{ $li->company }}</h4>
                  
                
                  <h3>Tags: {{ $li->tags }}</h3>
                  <h3>Email: {{ $li->email }}</h3>
                  <h3>Website: {{ $li->website }}</h3>
                  <h3>Location: {{ $li->location }}</h3>
            </div>
           

     
</x-card>