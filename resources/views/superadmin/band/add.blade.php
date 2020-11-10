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
              @endif
              @if(session('error'))
              <div class="alert alert-danger text-center" role="alert">
                {{session('error')}}
              </div>
              @endif
              <form action="{{url('superadmin/band-add')}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Band ID</label>
                      <input type="text" class="form-control" name="band_id" required  placeholder="Band ID">
                    </div>
                    <div class="form-group">
                      <label>Band Name</label>
                      <input type="text" class="form-control" name="band_name" required  placeholder="Band Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Band Scope</label>
                      <select class="form-control" name="band_scope" required>
                        <option value="">Choose Band Scope</option>
                        <option value="Local">Local</option>
                        <option value="International">International</option>

                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Band Email</label>
                      <input type="email" name="email" class="form-control" required placeholder="Band Email">
                    </div>
                    <div class="form-group">
                      <label>Band Password</label>
                      <input type="password" class="form-control" name="password" required placeholder="Band Password">
                    </div>
                  </div>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
