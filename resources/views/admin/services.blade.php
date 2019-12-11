@extends('admin.layout.master')
@section('content')
<!-- /.card-header -->
             <div class="card-body">
               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th style="width: 10px">#</th>
                     <th>Service</th>
                     <th>details</th>
                     <th>Icon Class</th>
                     <th>Actions</th>

                   </tr>
                 </thead>
                 <tbody>
                   <tr>
                     <td>#</td>
                     <form method="post" action="{{route('add_service')}}">
                       @csrf
                     <td><input style="width:100%;" type="text" name="service" /></td>
                     <td><input style="width:100%;" type="text" name="details" /></td>
                     <td><input style="width:100%;" type="text" name="icon_class" /></td>
                     <td>
                       <input class="btn btn-success" type="submit" value="ADD"/>

                     </td>
                   </form>

                   </tr>
                    @foreach($services as $service)
                   <tr>
                     <td>{{$service->id}}</td>

                       <form method="post" action="{{route('update_service')}}">
                         @csrf
                       <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text"  value="{{$service->name}}" name="service"/></td>
                       <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text"  value="{{$service->details}}" name="details"/></td>
                       <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text"  value="{{$service->icon_class}}" name="icon_class"/></td>
                       <input type="hidden" value="{{$service->id}}" name="id" />


                     <td>
                       <input type="submit" class="btn btn-success" value="UPDATE"/></a>
                       </form>
                       <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$service->id}}">DELETE</button>
                       <div class="modal fade" id="modal-danger{{$service->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">DELETE CONFIRMATION</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>are you sure you want to delete this? Service: {{$service->name}}</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">CLOSE</button>
              <a  href="{{route('delete_service',$service->id)}}" class="btn btn-outline-light">DELETE</a>
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
                {{$services->links()}}
               </ul>
             </div>
           </div>
@endsection
