@extends ('layouts.master')


@section ('content')

<div class="card uper">
    <div class="card-header" align='center'>
        <h3> Create new Product</h3>
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


      <form method="post" action="{{route('product.store')}}">
        {{ csrf_field() }}
        
        <div class="form-group">
          <label for="name">product Name:</label>
          <input type="text" class="form-control" name="name" />
        </div>
         <div class="form-group">
          <label for="description">description:</label>
          <input type="text" class="form-control" name="description"/>
        </div>
        <div class="form-group">
          <label for="qty">qty </label>
          <input type="text" class="form-control" name="qty" />
        </div>
                 <div class="form-group">
          <label for="price">Price :</label>
          <input type="text" class="form-control" name="price" />
        </div>

          <div class="form-group">
          <label for="photo">Photo link:</label>
          <input type="text" class="form-control" name="photo" />
        </div>


          <div class="form-group">
          <label for="category_id">category:</label>
          <select name="category_id">
    @foreach($categories as $category)
    <option name="category_id" value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
        </select>
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
                