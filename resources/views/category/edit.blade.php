@extends ('layouts.master')


@section ('content')

<div class="card uper">
    <div class="card-header" align='center'>
    <h3> Edit category Info: {{"' ".  $category->name . " '" }}</h3>
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


      <form method="post" action="{{route('category.update', $category->id)}}">
      @method('PATCH')
        {{ csrf_field() }}
        
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" value={{$category->name}} />
        </div>



        <div class="form-group">
          <label for="visible">visibility :</label>
          <select name="visible">
    <option name="visible" value="{{1-($category->visible)}}">{{1-($category->visible)}}</option> 
    <option name="visible" value="{{$category->visible}}" selected>{{$category->visible}}</option>
        </select>
        </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>

@endsection
                