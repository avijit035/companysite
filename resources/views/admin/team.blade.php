@extends('admin.layout.master')
@section('content')
<!-- /.card-header -->
             <div class="card-body">
               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th style="width: 10px">#</th>

                     <th>Name (Team Member)</th>
                     <th>Details</th>
                     <th>Image</th>
                     <th>New Image</th>

                     <th>Actions</th>

                   </tr>
                 </thead>
                 <tbody>
                   <tr>
                     <td>#</td>
                     <form method="post" action="{{route('add_team')}}" enctype="multipart/form-data">
                       @csrf

                     <td><input style="width:100%;" type="text" name="name" /></td>
                     <td><input style="width:100%;" type="text" name="details" /></td>
                     <td></td>
                     <td><input style="width:100%;" type="file" name="new_image" /></td>

                     <td>
                       <input class="btn btn-success" type="submit" value="ADD"/>

                     </td>
                   </form>

                   </tr>
                    @foreach($teams as $team)
                   <tr>
                     <td>{{$team->id}}</td>

                       <form method="post" action="{{route('update_team')}}" enctype="multipart/form-data">
                         @csrf
                          <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text" value="{{$team->name}}" name="name"/></td>
                           <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text" value="{{$team->details}}" name="details"/></td>
                       <td><img  style="width:100px;" src="images/services/{{$team->image}}"></td>
                       <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="file" name="new_image"/></td>

                       <input type="hidden" value="{{$team->id}}" name="id" />


                     <td>
                       <input type="submit" class="btn btn-success" value="UPDATE"/></a>
                       </form>
                       <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$team->id}}">DELETE</button>
                       <div class="modal fade" id="modal-danger{{$team->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">DELETE CONFIRMATION</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>are you sure you want to delete this? Team Member: {{$team->name}}</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">CLOSE</button>
              <a  href="{{route('delete_team',$team->id)}}" class="btn btn-outline-light">DELETE</a>
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
                {{$teams->links()}}
               </ul>
             </div>
           </div>
@endsection
