@extends('admin.layout.master')
@section('content')
<!-- /.card-header -->
             <div class="card-body">
               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th style="width: 10px">#</th>
                     <th>Link</th>
                     <th>Title</th>
                     <th>Class</th>
                     <th>Icon Class</th>
                     <th>Actions</th>

                   </tr>
                 </thead>
                 <tbody>
                   <tr>
                     <td>#</td>
                     <form method="post" action="{{route('add_footer')}}">
                       @csrf
                     <td><input style="width:100%;" type="text" name="link" /></td>
                     <td><input style="width:100%;" type="text" name="title" /></td>
                     <td><input style="width:100%;" type="text" name="class" /></td>
                     <td><input style="width:100%;" type="text" name="icon_class" /></td>
                     <td>
                       <input class="btn btn-success" type="submit" value="ADD"/>

                     </td>
                   </form>

                   </tr>
                    @foreach($footers as $footer)
                   <tr>
                     <td>{{$footer->id}}</td>

                       <form method="post" action="{{route('update_footer')}}">
                         @csrf
                       <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text"  value="{{$footer->link}}" name="link"/></td>
                       <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text"  value="{{$footer->title}}" name="title"/></td>
                       <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text"  value="{{$footer->class}}" name="class"/></td>
                        
                       <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text"  value="{{$footer->icon_class}}" name="icon_class"/></td>
                       <input type="hidden" value="{{$footer->id}}" name="id" />


                     <td>
                       <input type="submit" class="btn btn-success" value="UPDATE"/></a>
                       </form>
                       <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$footer->id}}">DELETE</button>
                       <div class="modal fade" id="modal-danger{{$footer->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">DELETE CONFIRMATION</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>are you sure you want to delete this? Footer Title: {{$footer->title}}</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">CLOSE</button>
              <a  href="{{route('delete_footer',$footer->id)}}" class="btn btn-outline-light">DELETE</a>
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
                {{$footers->links()}}
               </ul>
             </div>
           </div>
@endsection
