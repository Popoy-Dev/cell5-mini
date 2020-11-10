@extends('dashboardTemplate.main')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
          @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
          @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @endif
          <div class="card">
            <div class="card-body">
              <h4 class="mb-4 text-primary">Registration Form</h4>
              <form method="post" action="{{url('register')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >Title</label>
                      <input type="text" class="form-control" name="band_song" placeholder="Title">
                      <input type="text" class="form-control" hidden name="band_code" value="{{Auth::user()->band_id}}">
                    </div>
                    <div class="form-group">
                      <label >Description</label>
                      <input type="text" class="form-control" name="band_desc" placeholder="Description">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Genre</label>
                      <select class="form-control" name="band_genre" required>
                        <option value="">Choose Band Genre</option>
                        <option value="Rock">Rock</option>
                        <option value="Pop Music">Pop Music</option>
                        <option value="Metal">Metal</option>
                        <option value="Blues">Blues</option>

                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Release Date</label>
                      <input type="date" class="form-control" name="band_release" placeholder="Release Date">
                    </div>
                    <div class="form-group">
                      <label>Song Image</label>
                      <input type="file" name="image" class="form-control" accept="image/*">
                      <small>Not required </small>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary " name="button">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
