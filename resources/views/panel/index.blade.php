@extends('layouts.sidebar')


@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">   
        
     <div class="col-lg-12">
        <div class="card   rounded">
            <div class="card-body">
               <div class="row">
                   <div class="col-sm-12">  

                    <h3 class="mb-4"><i class="bi bi-menu-up"></i> Dashboard</h3>

                            {{-- <!-- Section: Design Block -->
                            <section class="mb-3 text-gray-800 text-center shadow p-4 w-full">
                                <div class='font-weight-bold text-left'>Visitor analytics:</div>
                                <div class="d-flex flex-wrap justify-content-around">
                    
                                    <div class="p-2">
                                        <h3 class="text-primary"><strong>{{ $pageStats['visitors']['day']}}</strong></h3>
                                        <span class="text-muted">Today</span>
                    
                                    </div>
                    
                                    <div class="p-2">
                                        <h3 class="text-primary"><strong>{{ $pageStats['visitors']['week']}}</strong></h3>
                                        <span class="text-muted">Week</span>
                    
                    
                                    </div>
                    
                                    <div class="p-2">
                                        <h3 class="text-primary"><strong>{{ $pageStats['visitors']['month']}}</strong></h3>
                                        <span class="text-muted">Month</span>
                    
                    
                                    </div>
                                    <div class="p-2">
                                        <h3 class="text-primary"><strong>{{ $pageStats['visitors']['year']}}</strong></h3>
                                        <span class="text-muted">Year</span>
                    
                    
                                    </div>
                                    <div class="p-2">
                                        <h3 class="text-primary"><strong>{{ $pageStats['visitors']['all']}}</strong></h3>
                                        <span class="text-muted">All Time</span>
                    
                    
                                    </div>
                    
                                </div>
                            </section> --}}
                    
                    
                    
                            <section class="mb-3 text-center p-4 w-full">
                                <div class=" d-flex">
                    
                                    <div class='p-2 h6'><i class="bi bi-link"></i> Total Links: <span class='text-primary'>{{ $links }} </span></div>
                    
                                    <div class='p-2 h6'><i class="bi bi-eye"></i> Link Clicks: <span class='text-primary'>{{ $clicks }}</span></div>
                                </div>
                                <div class='text-center w-100'>
                                    <a href="{{ url('/studio/links') }}">View/Edit Links</a>
                    
                                </div>
                                <div class='w-100 text-left'>
                                    <h6><i class="bi bi-sort-up"></i> Top Links:</h6>
                    
                                                    @php $i = 0; @endphp
                    

                                                    <div class="bd-example" >
                                                        <ol class="list-group list-group-numbered" style="text-align: left;">
                                                          @foreach($toplinks as $link)
                                                            @php $linkName = str_replace('default ','',$link->name) @endphp
                                                            @php  $i++; @endphp
                                                      
                                                            @if($link->name !== "phone" && $link->name !== 'heading' && $link->button_id !== 96)
                                                              <li class="list-group-item d-flex justify-content-between align-items-start">
                                                                <div class="ms-2 me-auto text-truncate">
                                                                  <div class="fw-bold text-truncate">{{ $link->title }}</div>
                                                                  {{ $link->link }}
                                                                </div>
                                                                <span class="badge bg-primary rounded-pill p-2">{{ $link->click_number }} - clicks</span>
                                                              </li>
                                                            @endif
                                                          @endforeach
                                                        </ol>
                                                      </div>
                                                      



                            </section>

                   </div>
               </div>
            </div>
         </div>
        </div>

       <div class="col-lg-12">
          <div class="card   rounded">
             <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">  

@if(auth()->user()->role == 'admin' && !config('linkstack.single_user_mode'))
        <!-- Section: Design Block -->
        <section class="mb-3 text-gray-800 text-center p-4 w-full">
            <div class='font-weight-bold text-left h3'>Site statistics:</div><br>
            <div class="d-flex flex-wrap justify-content-around">

                <div class="p-2">
                    <h3 class="text-primary"><strong><i class="bi bi-share-fill"> {{ $siteLinks }} </i></strong></h3>
                    <span class="text-muted">Total links</span>
                </div>

                <div class="p-2">
                    <h3 class="text-primary"><strong><i class="bi bi-eye-fill"> {{ $siteClicks }} </i></strong></h3>
                    <span class="text-muted">Total clicks</span>
                </div>

                <div class="p-2">
                    <h3 class="text-primary"><strong><i class="bi bi bi-person-fill"> {{ $userNumber }}</i></strong></h3>
                    <span class="text-muted">Total users</span>
                </div>

            </div>
        </section>

                    </div>
                </div>
             </div>
          </div>
       </div>       
       
       <div class="col-lg-12">
        <div class="card   rounded">
           <div class="card-body">
              <div class="row">
                  <div class="col-sm-12">  

      <!-- Section: Design Block -->
      <section class="mb-3 text-gray-800 text-center p-4 w-full">
          <div class='font-weight-bold text-left h3'>Registrations:</div><br>
          <div class="d-flex flex-wrap justify-content-around">

              <div class="p-2">
                  <h3 class="text-primary"><strong> {{ $lastMonthCount }} </i></strong></h3>
                  <span class="text-muted">Last 30 days</span>
              </div>

              <div class="p-2">
                  <h3 class="text-primary"><strong> {{ $lastWeekCount }} </i></strong></h3>
                  <span class="text-muted">Last 7 days</span>
              </div>

              <div class="p-2">
                  <h3 class="text-primary"><strong> {{ $last24HrsCount }}</i></strong></h3>
                  <span class="text-muted">Last 24 hours</span>
              </div>

          </div>
      </section>

                  </div>
              </div>
           </div>
        </div>
     </div>   

     <div class="col-lg-12">
        <div class="card   rounded">
           <div class="card-body">
              <div class="row">
                  <div class="col-sm-12">  


      <!-- Section: Design Block -->
      <section class="mb-3 text-gray-800 text-center p-4 w-full">
          <div class='font-weight-bold text-left h3'>Active users:</div><br>
          <div class="d-flex flex-wrap justify-content-around">

              <div class="p-2">
                  <h3 class="text-primary"><strong> {{ $updatedLast30DaysCount }} </i></strong></h3>
                  <span class="text-muted">Last 30 days</span>
              </div>

              <div class="p-2">
                  <h3 class="text-primary"><strong> {{ $updatedLast7DaysCount }} </i></strong></h3>
                  <span class="text-muted">Last 7 days</span>
              </div>

              <div class="p-2">
                  <h3 class="text-primary"><strong> {{ $updatedLast24HrsCount }}</i></strong></h3>
                  <span class="text-muted">Last 24 hours</span>
              </div>

          </div>
      </section>
                  </div>
              </div>
           </div>
        </div>
     </div>   
     @endif

    </div>
    </div>
@endsection
