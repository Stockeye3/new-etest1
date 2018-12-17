@extends ('layouts.master')


@section ('content')

<div class="card uper">
    <div class="card-header" align='center'>
        <h3> Edit Product {{"' ".  $product->name . " '" }}</h3>
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
    <form method="post" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
        @method('PATCH')
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" value={{$product->name}} />
        </div>
         <div class="form-group">
          <label for="name">Description:</label>
          <input type="text" class="form-control" name="description" value={{$product->description}} />
        </div>
        <div class="form-group">
          <label for="price">qty :</label>
          <input type="text" class="form-control" name="qty" value={{$product->qty}} />
        </div>
        <div class="form-group">
          <label for="price">Price :</label>
          <input type="text" class="form-control" name="price" value={{$product->price}} />
        </div>
         <div class="form-group">
         <select name="category_id">
             @foreach($categories as $category)
             @if($category->id == $product->category_id)
                <option name="category_id" value="{{$category->id}}" selected>{{$category->name}}</option>
             @else 
                <option name="category_id" value="{{$category->id}}" >{{$category->name}}</option>
             @endif
                @endforeach
         </select>
        </div>
        <div class="form-group">
          <label for="visible">visibility :</label>
          <select name="visible">
    <option name="visible" value="{{1-($product->visible)}}">{{1-($product->visible)}}</option> 
    <option name="visible" value="{{$product->visible}}" selected>{{$product->visible}}</option>
        </select>
        </div>
        <div class="form-group">
          <label for="photo">Photo:</label>
          <img class="pic-1" height='200' width='200' src="{{url('uploads/'.$product->filename)}}" >
          <input type="file" class="form-control" name="photo" />    
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>

@endsection