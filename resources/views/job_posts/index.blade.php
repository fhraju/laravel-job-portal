<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless (count($job_lists) == 0)
            
        @foreach ($job_lists as $job_list)
            <x-job-card :job_list="$job_list" />
        @endforeach
 
        @else
            <p>No Job post Found</p>
        @endunless
    </div>
    <div class="mt-6 p-4">
        {{$job_lists->links()}}
    </div>
</x-layout>
