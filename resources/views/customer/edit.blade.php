@extends ('layouts.master')


@section ('content')

<div class="card uper">
    <div class="card-header" align='center'>
        <h3> Edit Customer Info: {{"' ".  $customer->fname . " '" }}</h3>
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
      <form method="post" action="{{route('customer.update', $customer->id)}}">
        @method('PATCH')
        {{ csrf_field() }}
        <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" name="fname" value={{$customer->fname}} />
        </div>
         <div class="form-group">
          <label for="name">Last Name:</label>
          <input type="text" class="form-control" name="lname" value={{$customer->lname}} />
        </div>
        <div class="form-group">
          <label for="email">email :</label>
          <input type="text" class="form-control" name="email" value={{$customer->email}} />
        </div>
        <div class="form-group">
          <label for="phone">phone :</label>
          <input type="text" class="form-control" name="phone" value={{$customer->phone}} />
        </div>
         <div class="form-group">
          <label for="address">phone :</label>
          <input type="address" class="form-control" name="address" value={{$customer->address}} />
        </div>
        <div class="form-group">
          <label for="ban">Ban User :</label>
          <select name="ban">
        <?php 
              if ($customer->ban) {$s2='Ban User'; $s1='Unban User';}
              else { $s2='Unban User' ; $s1='Ban User';}
        ?>
    <option name="ban" value="{{1-($customer->ban)}}">{{$s1}}</option> 
    <option name="ban" value="{{$customer->ban}}" selected>{{$s2}}</option>
        </select>
        </div>
    
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>

@endsection
                
        
   
    
  
  