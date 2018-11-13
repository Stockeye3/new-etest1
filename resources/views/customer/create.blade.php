@extends ('layouts.master')


@section ('content')

<div class="card uper">
    <div class="card-header" align='center'>
        <h3> Create New Customer </h3>
    </div>
    </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{route('customer.register')}}">
        {{ csrf_field() }}
        
        <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" name="fname" />
        </div>
         <div class="form-group">
          <label for="name">Last Name:</label>
          <input type="text" class="form-control" name="lname"/>
        </div>
        <div class="form-group">
          <label for="email">email :</label>
          <input type="text" class="form-control" name="email" />
        </div>
                 <div class="form-group">
          <label for="address">Password :</label>
          <input type="password" class="form-control" name="password" />
        </div>
        <div class="form-group">
          <label for="phone">phone :</label>
          <input type="text" class="form-control" name="phone"  />
        </div>
         <div class="form-group">
          <label for="address">address :</label>
          <input type="address" class="form-control" name="address" />
        </div>

    
        <button type="submit" class="btn btn-primary">Create Customer</button>
      </form>
  </div>
</div>

@endsection
                