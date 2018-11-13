@extends ('layouts.master')


@section ('content')

<div class="card uper">
    <div class="card-header" align='center'>
        <h3> Create new Category</h3>
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


      <form method="post" action="{{route('category.store')}}">
        {{ csrf_field() }}
        
        <div class="form-group">
          <label for="name">category Name:</label>
          <input type="text" class="form-control" name="name" />
        </div>



         <div class="form-group">
          <label for="visible">visibility:</label>
          <select name="visible">
    <option name="visible" value="1">Visible</option>
    <option name="visible" value="0">Hidden</option>
        </select>
        </div>

    
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>

@endsection
                