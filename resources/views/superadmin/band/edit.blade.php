@extends('superadmin.layout.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          <div class="card">
            <div class="card-body">
              @if(session('success'))
              <div class="alert alert-success text-center" role="alert">
                {{session('success')}}
              </div>
              @endif()
              <h4>Edit Band Barangay</h4>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Band Id</th>
                    <th scope="col">Band Name</th>
                    <th scope="col">Scope</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i = 1;
                  @endphp
                  @foreach($data as $d)
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$d->band_id}}</td>
                    <td>{{$d->band_name}}</td>
                    <td>{{$d->band_scope}}</td>
                    <td>{{$d->email}}</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editBarangay{{$d->id}}">
                        Edit
                      </button>
                    </td>
                  </tr>
                  @php
                  $i++;
                  @endphp

                  <!-- Button trigger modal -->


                  <!-- Modal -->
                  <div class="modal fade" id="editBarangay{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Edit Barangay {{$d->name}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{url('superadmin/band-edit', $d->id)}}" method="post">
                            @method('put')
                            @csrf
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Band ID</label>
                                  <input type="text" class="form-control" name="band_id"  value="{{$d->band_id}}" >
                                </div>
                                <div class="form-group">
                                  <label>Band Name</label>
                                  <input type="text" class="form-control" name="band_name"  value="{{$d->band_name}}" >
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Band Scope</label>
                                  <select class="form-control" name="band_scope" required>
                                    @if($d->band_scope == 'Local')
                                      <option  value="Local" >Local</option>
                                      <option value="International">International</option>
                                    @else
                                      <option  value="International" >International</option>
                                      <option value="Local">Local</option>

                                    @endif

                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" name="email" class="form-control" value="{{$d->email}}">
                                </div>
                                <div class="form-group">
                                  <label>Password</label>
                                  <input type="text" class="form-control" name="password" value="{{$d->password}}">
                                </div>
                              </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save changes</button>

                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </form>

                      </div>
                    </div>
                  </div>
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
