@extends('layouts.sidebar')

@section('content')

<div class="conatiner-fluid content-inner mt-n5 py-0">
  <div class="row">   


      <div class="col-lg-12">
          <div class="card   rounded">
             <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">  
  
                      <section class="text-gray-400">
                        <h2 class="mb-4 card-header"><i class="bi bi-person"> Edit User</i></h2>
                          <div class="card-body p-0 p-md-3">
                  
                        @foreach($user as $user)
                        <form action="{{ route('editUser', $user->id) }}" enctype="multipart/form-data" method="post">
                          @csrf
                              <div class="form-group col-lg-8">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-lg-8">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group col-lg-8">
                              <label>Password</label>
                              <input type="password" class="form-control" name="password" placeholder="Leave empty for no change">
                            </div>
                            
                            <div class="form-group col-lg-8">
                              <label>Logo</label>
                              <div class="mb-3">
                                <input type="file" class="form-control form-control-lg" name="image">
                            </div>
                            </div>
                            
                            <div class="form-group col-lg-8">
                              @if(file_exists(base_path(findAvatar($user->id))))
                              <img src="{{ url(findAvatar($user->id)) }}" class="bd-placeholder-img img-thumbnail" width="100" height="100" draggable="false">
                              @else
                              <img src="{{ asset('assets/linkstack/images/logo.svg') }}" class="bd-placeholder-img img-thumbnail" width="100" height="100" draggable="false">
                              @endif
                              @if(file_exists(base_path(findAvatar($user->id))))<br><a title="Remove icon" class="hvr-grow p-1 text-danger" style="padding-left:5px;" href="?delete"><i class="bi bi-trash-fill"></i> Delete</a>@endif
                              @if($_SERVER['QUERY_STRING'] === 'delete' and File::exists(base_path(findAvatar($user->id))))@php File::delete(base_path(findAvatar($user->id))); header("Location: ".url()->current()); die(); @endphp @endif
                          </div><br>
                            
                            <div class="form-group col-lg-8">
                              <label>Custom background</label>
                              <div class="mb-3">
                                <input type="file" class="form-control form-control-lg" name="background">
                            </div>
                            </div>
                            <div class="form-group col-lg-8">
                                @if(!file_exists(base_path('assets/img/background-img/'.findBackground($user->id))))<p><i>No image selected</i></p>@endif
                                <img style="width:95%;max-width:400px;argin-left:1rem!important;border-radius:5px;" src="@if(file_exists(base_path('assets/img/background-img/'.findBackground($user->id)))){{url('assets/img/background-img/'.findBackground($user->id))}}@else{{url('/assets/linkstack/images/themes/no-preview.png')}}@endif">
                                @if(file_exists(base_path('assets/img/background-img/'.findBackground($user->id))))<br><a title="Remove icon" class="hvr-grow p-1 text-danger" style="padding-left:5px;" href="?deleteB"><i class="bi bi-trash-fill"></i> Delete</a>@endif
                                @if($_SERVER['QUERY_STRING'] === 'deleteB' and File::exists(base_path('assets/img/background-img/'.findBackground($user->id))))@php File::delete(base_path('assets/img/background-img/'.findBackground($user->id))); header("Location: ".url()->current()); die(); @endphp @endif
                                <br>
                            </div><br>
                  
                            <!--<div class="form-group col-lg-8">
                              <label>Littlelink name </label>
                              <input type="text" class="form-control" name="littlelink_name" value="{{ $user->id }}">
                            </div>-->
                            
                            <div class="form-group col-lg-8">
                              <label>Page URL</label>
                              <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">{{ url('') }}/@</div>
                            </div>
                            <input type="text" class="form-control" name="littlelink_name" value="{{ $user->littlelink_name }}">
                          </div>
                        </div>
                            
                            <div class="form-group col-lg-8">
                              <label> Page description</label>
                              <textarea class="form-control" name="littlelink_description" rows="3">{{ $user->littlelink_description }}</textarea>
                            </div>
                            <div class="form-group col-lg-8">
                              <label for="exampleFormControlSelect1">Role</label>
                              <select class="form-control" name="role">
                                <option <?= ($user->role === strtolower('user')) ? 'selected' : '' ?>>user</option>
                                <option <?= ($user->role === strtolower('vip')) ? 'selected' : '' ?>>vip</option>
                                <option <?= ($user->role === strtolower('admin')) ? 'selected' : '' ?>>admin</option>
                              </select>
                            </div>
                            @endforeach
                            <button type="submit" class="mt-3 ml-3 btn btn-primary">Save</button>
                          </form>
                  
                            </div>
                  </section>
  
                    </div>
                </div>
             </div>
          </div>
       </div>


    </div>
  </div>

@endsection
