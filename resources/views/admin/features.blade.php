@extends('admin.layout.master')
@section('content')
<!-- /.card-header -->
             <div class="card-body">
               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th style="width: 10px">#</th>
                     <th>Feature</th>
                     <th>details</th>
                     <th>Icon Class</th>
                     <th>Actions</th>

                   </tr>
                 </thead>
                 <tbody>
                   <tr>
                     <td>#</td>
                     <form method="post" action="{{route('add_feature')}}">
                       @csrf
                     <td><input style="width:100%;" type="text" name="feature" /></td>
                     <td><input style="width:100%;" type="text" name="details" /></td>
                     <td><input style="width:100%;" type="text" name="icon_class" /></td>
                     <td>
                       <input class="btn btn-success" type="submit" value="ADD"/>

                     </td>
                   </form>

                   </tr>
                    @foreach($features as $feature)
                   <tr>
                     <td>{{$feature->id}}</td>

                       <form method="post" action="{{route('update_feature')}}">
                         @csrf
                       <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text"  value="{{$feature->title}}" name="feature"/></td>
                       <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text"  value="{{$feature->details}}" name="details"/></td>
                       <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text"  value="{{$feature->icon_class}}" name="icon_class"/></td>
                       <input type="hidden" value="{{$feature->id}}" name="id" />


                     <td>
                       <input type="submit" class="btn btn-success" value="UPDATE"/></a>
                       </form>
                       <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$feature->id}}">DELETE</button>
                       <div class="modal fade" id="modal-danger{{$feature->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">DELETE CONFIRMATION</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>are you sure you want to delete this? Feature: {{$feature->title}}</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">CLOSE</button>
              <a  href="{{route('delete_feature',$feature->id)}}" class="btn btn-outline-light">DELETE</a>
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
                {{$features->links()}}
               </ul>
             </div>
           </div>
@endsection
