<x-app-layout>
    <!--banner-->
    <div class="px border row mb-3">
        <div class="col-sm-12">
            <div class="px-3 py-3">
                <h3 class="fw-bold text-center">Event Dashbord</h3>
            </div>
        </div>
    </div>
    <!--banner-->

    <div class="row">
        <div class="col-sm-3">
            <!--menu list-->
            @include('layouts.admin_side_menu')
             <!--menu list-->
        </div>
        <div class="col-sm-9">
            <!--content-->
            <div class="row">
                <div class="col-sm-4">
                       <!--page alert notice-->
                       @if(isset($edits))
                       <div class="alert alert-warning">
                           <span class='d-block mb-2'>You're currently in edit mode</span>
                           <a href="{{route('admin.opp')}}" class="btn btn-dark fw-bold">Create new event</a>
                       </div>
                       @endif
   
                       <!--post form-->
                       <div class="border px-3 py-3">
                           @if($errors->any())
                                   @foreach($errors->all() as $err)
                                   <div class='alert alert-danger'>
                                       {{$err}}
                                   </div>
                                   @endforeach
                           @endif
   
                           @if (session('status'))
                               <div class="alert alert-success">
                                   {{ session('status') }}
                               </div>
                           @endif

                    <!--post form-->
                        <h5 class='fw-bold mb-3'>Create Events</h5>
                        <form 
                            @if(isset($edits))
                                action="{{route('admin.update.ev', ['id'=> $edits[0]->id])}}" 
                            @else
                                action="{{route('admin.store.ev')}}" 
                            @endif

                         method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class='fw-bold'>Title</label>
                                <input type="text" name="title" class="form-control" 
                                value="{{ isset($edits[0]->title)? $edits[0]->title : old('title')}}"
                                placeholder="Enter title">
                            </div>
                            <div class="mb-3">
                                <label class='fw-bold'>Description</label>
                                <textarea name="description" class='d-block form-control' id="description">{{ isset($edits[0]->description)? $edits[0]->description : old('description')}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Location/venue</label>
                                <textarea name="location" class='d-block form-control' id="location">{{ isset($edits[0]->location)? $edits[0]->location : old('location')}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Event Date</label>
                                <input type="date" name="event_date" 
                                value="{{ isset($edits[0]->event_date)? $edits[0]->event_date : old('event_date')}}"
                                class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Reference URL</label>
                                <input type="text" name="reference" class="form-control" 
                                placeholder="Enter title"  value="{{ isset($edits[0]->source_url)? $edits[0]->source_url : old('reference')}}">
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Region</label>
                                <select class="form-select" name="region">
                                    <option selected="selected" disabled>Select Region</option>
                                    <option value="northern_africa">Northern Africa</option>
                                    <option value="eastern_africa">Eastern Africa</option>
                                    <option value="western_africa">Western  Africa</option>
                                    <option value="central_africa">Central Africa</option>
                                    <option value="southern_africa">Southern Africa</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class='fw-bold'>Country</label>
                                <select class="form-select" name="country">
                                    @include('layouts.countrylist')
                                </select>
                            </div>

                            <button class="btn btn-primary fw-bold w-100 d-block">Create Event</button>
                        </form>
                    </div>
                    <!---post form-->
                </div>
                <div class="col-sm-8">
                     <!--post content-->
                     <div class="row">
                        @foreach($ev_posts as $posts)
                            <div class='col-sm-12 mb-3'>
                            <div class='px-3 py-3 border rounded'>
                                <p class='fw-bold m-0 p-0'>{{$posts->title}}</p>
                                <p>{{$posts->description}}</p>
                                <ul>
                                    <li>{{$posts->region}}</li>
                                    <li>{{$posts->country}}</li>
                                </ul>
                                <a class='d-block text-decoration-none mb-3'
                                target="_blank"
                                 href='{{$posts->source_url}}'>{{$posts->source_url}}</a>
    
                                <ul class='list-inline'>
                                    <li class='list-inline-item'><a href='{{route('admin.edit.ev', ['id'=> $posts->id])}}'>Edit</a></li>
                                    <li class='list-inline-item'><a href='{{route('admin.delete.ev', ['id'=> $posts->id])}}'>Delete</a></li>
                                </ul>
                            </div>
                            </div>
                        @endforeach
    
                        <!--pagination-->
                        <div class="row">
                            <div class="col-sm-12">
                            {{$ev_posts->links()}}
                            </div>
                        </div>
                        <!--pagination-->
    
                        </div>
                        
                        <!--post content-->
                </div>
            </div>
            <!--content-->
        </div>
    </div>
</x-app-layout>
