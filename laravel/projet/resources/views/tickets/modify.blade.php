@foreach ($infos as $data)
{{$data->id}}
{{$data->name}}
{{$data->titre}}
{{$data->commentaire}}
{{$data->created_at}}
{{$data->updated_at}}
</br>
@endforeach

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un commentaire</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Ajouter un commentaire
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('tickets/updating')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <textarea name="description" class="form-control" required=""></textarea>
          <input type="hidden" name="id" value="{{$infos[0]->id}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
