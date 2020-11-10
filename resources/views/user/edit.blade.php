@extends('dashboardTemplate.main')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
          @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @endif
          <div class="card">
            <div class="card-body">
              <h4 class="mb-4 text-primary">Edit Details</h4>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $c = 1;
                  @endphp
                  @foreach($data as $d)
                  <tr>
                    <th scope="row">{{$c}}</th>
                    <td>{{$d->band_song}}</td>
                    <td>{{$d->band_desc}}</td>
                    <td>{{$d->band_genre}}</td>
                    <td>{{$d->band_release}}</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#details{{$d->id}}">
                        Edit
                      </button>

                    </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="details{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-secondary" id="exampleModalLongTitle">{{$d->	band_song}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="text-center">
                            <img src="image/{{$d->image}}"  alt="{{$d->firstname}}">
                          </div>
                          <form method="post" action="{{url('/register-edit', $d->id)}}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <input type="text" class="form-control" hidden name="band_code" value="{{Auth::user()->band_id}}">
                                  
                                  <label >Band Song</label>
                                  <input type="text" class="form-control" name="band_song" value="{{$d->band_song}}">
                                </div>
                                <div class="form-group">
                                  <label >Description</label>
                                  <input type="text" class="form-control" name="band_desc" value="{{$d->band_desc}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Genre</label>
                                  <select class="form-control" name="band_genre" required>
                                    <option value="{{$d->band_genre}}">{{$d->band_genre}}</option>
                                    <option value="Rock">Rock</option>
                                    <option value="Pop Music">Pop Music</option>
                                    <option value="Metal">Metal</option>
                                    <option value="Blues">Blues</option>

                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Date Release</label>
                                  <input type="date" class="form-control" name="band_release" value="{{$d->band_release}}">
                                </div>
                                <div class="form-group">
                                  <label>Image</label>
                                  <input type="file" name="image" class="form-control" accept="image/*">
                                  <small>Not required </small>
                                </div>
                              </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary " name="button">Submit</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </form>

                      </div>
                    </div>
                  </div>
                  @php
                  $c++

                  @endphp
                  @endforeach




                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
