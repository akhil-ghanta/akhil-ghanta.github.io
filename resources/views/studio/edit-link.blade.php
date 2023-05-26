@extends('layouts.sidebar')

@section('content')

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">   
        
     <div class="col-lg-12">
        <div class="card   rounded">
            <div class="card-body">
               <div class="row">
                   <div class="col-sm-12">  
  
                    @push('sidebar-stylesheets')
                    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
                    @endpush
                    
                    <section class='text-gray-400'>
                    
                        <h3 class="card-header"><i class="bi bi-journal-plus"> @if($LinkID !== 0) Edit @else Add @endif Block</i></h3>
                    
                        <div class='card-body'>
                            <form action="{{ route('addLink') }}" method="post" id="my-form">
                                @method('POST')
                                @csrf
                                <input type='hidden' name='linkid' value="{{ $LinkID }}" />
                    
                                <div class="form-group col-lg-8 flex justify-around">
                                    {{-- <label class='font-weight-bold'>Blocks: </label> --}}
                                    <div class="btn-group shadow m-2">
                                        <button type="button" id='btnLinkType' class="btn btn-primary rounded-pill" title='Click to change link blocks' data-toggle="modal" data-target="#SelectLinkType">Select Block
                                            <span class="btn-inner">
                                                <i class="bi bi-window-plus"></i>
                                            </span>
                                        </button>{{infoIcon('Click for a list of available link blocks')}}
                                          
                    
                    
                                        {{-- <button type="button" class="dropdown-toggle border-0 border-left-1 px-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button> --}}
                                        {{-- <div class="dropdown-menu">
                                            @foreach ( $LinkTypes as $lt )
                                            <a data-typeid='{{$lt['id']}}' data-typename='{{$lt['title']}}' class="dropdown-item doSelectLinkType" href="#">
                                                <i class="{{$lt['icon']}}"></i> {{$lt['title']}}
                                            </a>
                    
                                            @endforeach
                                        </div> --}}
                                        <input type='hidden' name='linktype_id' value='{{$linkTypeID}}'>
                    
                                    </div>
                                </div>
                    
                                {{-- @include("components.pageitems.".$SelectedLinkType['typename']."-form", ['some' => 'data']) --}}
                    
                    
                                <div id='link_params' class='col-lg-8'></div>
                    
                    
                                <div class="d-flex align-items-center pt-4">
                                    <a class="btn btn-danger me-3" href="{{ url('studio/links') }}">Cancel</a>
                                    <button type="submit" class="btn btn-primary me-3">Save</button>
                                    <button type="button" class="btn btn-soft-primary me-3" onclick="submitFormWithParam('add_more')">Save and Add More</button>
                                    <script>
                                        function submitFormWithParam(paramValue) {
                                            // get the form element
                                            var form = document.getElementById("my-form");
                                            
                                            // check if all required fields are filled out
                                            var requiredFields = form.querySelectorAll("[required]");
                                            for (var i = 0; i < requiredFields.length; i++) {
                                                if (!requiredFields[i].value) {
                                                    alert("Please fill out all required fields.");
                                                    return false;
                                                }
                                            }
                                            
                                            // create a hidden input field with the parameter value
                                            var paramField = document.createElement("input");
                                            paramField.setAttribute("type", "hidden");
                                            paramField.setAttribute("name", "param");
                                            paramField.setAttribute("value", paramValue);
                                            // append the hidden input field to the form
                                            form.appendChild(paramField);
                                            // submit the form
                                            form.submit();
                                        }
                                        </script>
                                </div>                                
                    
                            </form>
                        </div>
                    </section>
                    <br><br>
                    {{-- <details>
                        <summary>More information</summary>
                        <pre style="color: grey;">
                    The 'Custom' button allows you to add a custom link, where the text on the button is determined with the link title set above.
                    The 'Custom_website' button functions similar to the Custom button, with the addition of a function that requests the favicon from the chosen URL and uses it as the button icon.
                    
                    The 'Space' button will be replaced with an empty space, so buttons could be visually separated into groups. Entering a number between 1-10 in the title section will change the empty space's distance.
                    The 'Heading' button will be replaced with a sub-heading, where the title defines the text on that heading.
                    </pre>
                    </details> --}}
                    
                    
                    
                    <!-- Modal -->
                    <style>.modal-title{color:#000!important;}</style>
                    <x-modal title="Select Block" id="SelectLinkType">
                    
                        <div class="d-flex flex-row  flex-wrap p-3">
                    
                            @php
                              $custom_order = [1, 2, 8, 6, 7, 3, 4, 5,];
                               $sorted = $LinkTypes->sortBy(function ($item) use ($custom_order) {
                                    return array_search($item['id'], $custom_order);
                             });
                            @endphp
                    
                            @foreach ($sorted as $lt)
                            <a href="#" data-dismiss="modal" data-typeid="{{$lt['id']}}" data-typename="{{$lt['title']}}" class="hvr-grow m-2 w-100 d-block doSelectLinkType">
                                <div class="rounded mb-3 shadow-lg">
                                    <div class="row g-0">
                                        <div class="col-auto bg-light d-flex align-items-center justify-content-center p-3">
                                            <i class="{{$lt['icon']}} text-primary h1 mb-0"></i>
                                        </div>
                                        <div class="col">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark mb-0">{{$lt['title']}}</h5>
                                                <p class="card-text text-muted">{{$lt['description']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                 
                            </a>                            
                            @endforeach
                    
                        </div>
                    
                        <x-slot name="buttons">
                            <button type="button" class="btn btn-gray" data-dismiss="modal">Close</button>
                        </x-slot>
                    
                    </x-modal>
  
                   </div>
               </div>
            </div>
         </div>
        </div>
        
      </div>
    </div>

@endsection

@push("sidebar-scripts")
<script>
$(function() {
    LoadLinkTypeParams($("input[name='linktype_id']").val() , $("input[name=linkid]").val());

    $('.doSelectLinkType').on('click', function() {
        $("input[name='linktype_id']").val($(this).data('typeid'));
        $("#btnLinkType").html($(this).data('typename'));

        LoadLinkTypeParams($(this).data('typeid'), $("input[name=linkid]").val());

        $('#SelectLinkType').modal('hide');
    });


    function LoadLinkTypeParams($TypeId, $LinkId) {
        var baseURL = <?php echo "\"" . url('') . "\""; ?>;
        $("#link_params").html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>').load(baseURL + `/studio/linkparamform_part/${$TypeId}/${$LinkId}`);

    }
});
</script>
@endpush
