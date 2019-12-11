@extends('admin.layout.master')

@section('content')
<div class="card-body">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>Tag Name</th>
        <th>Actions</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>#</td>
        <form method="post" action="{{route('add_tag')}}">
          @csrf
        <td><input style="width:100%;" type="text" name="tag" /></td>
        <td>
          <input class="btn btn-success" type="submit" value="ADD"/>

        </td>
      </form>

      </tr>
       @foreach($tags as $tag)
      <tr>
        <td>{{$tag->id}}</td>
        <td>
          <form method="post" action="{{route('update_tag')}}">
            @csrf
          <input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text" name="tag" value="{{$tag->name}}" name="newcategory"/>
          <input type="hidden" value="{{$tag->id}}" name="id" />

        </td>
        <td>
          <input type="submit" class="btn btn-success" value="UPDATE"/></a>
          </form>
          <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$tag->id}}">DELETE</button>
          <div class="modal fade" id="modal-danger{{$tag->id}}">
<div class="modal-dialog">
<div class="modal-content bg-danger">
<div class="modal-header">
 <h4 class="modal-title">DELETE CONFIRMATION</h4>
 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
</div>
<div class="modal-body">
 <p>are you sure you want to delete this? Tag: {{$tag->name}}</p>
</div>
<div class="modal-footer justify-content-between">
 <button type="button" class="btn btn-outline-light" data-dismiss="modal">CLOSE</button>
 <a  href="{{route('delete_tag',$tag->id)}}" class="btn btn-outline-light">DELETE</a>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
        </td>

      </tr>
      @endforeach

    </tbody>
  </table>
</div>
<!-- /.card-body -->
<div class="card-footer clearfix">
  <ul class="pagination pagination-sm m-0 float-right">
   {{$tags->links()}}
  </ul>
</div>
</div>
<!-- /.card -->
@endsection
