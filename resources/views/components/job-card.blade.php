@props(['job_list'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{$job_list->logo ? asset('storage/' . $job_list->logo) : asset('images/no-image.png')}}" alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/jobs/{{$job_list['id']}}">{{$job_list['title']}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$job_list['company']}}</div>

            <x-job-tags :tagsCsv="$job_list['tags']" />
            
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$job_list['location']}}
            </div>
        </div>
    </div>
 </x-card>