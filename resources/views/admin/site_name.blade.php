@extends('admin.layout.master')
@section('content')
<!-- /.card-header -->



               <div class="card-body">
              <div  style="background:red;padding:10px;margin:0px;color:white;">
              <h4>

              </h4>
              </div>

               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th style="width: 10px">#</th>
                       <th>Site Name (part1)</th>
                       <th>Site Name (part2)</th>
                      <th>Actions</th>
                   </tr>
                 </thead>
                 <tbody>


                   <tr>
                     <td>1</td>

                       <form method="post" action="{{route('update_site_name')}}" enctype="multipart/form-data">
                         @csrf
                        <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text" value="{{$site_name->title}}" name="title"/></td>
                        <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:black" type="text" value="{{$site_name->details}}" name="details"/></td>

                       <input type="hidden" value="{{$site_name->id}}" name="id" />
                     <td>
                       <input type="submit" class="btn btn-success" value="UPDATE"/></a>
                       </form>
                       <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$site_name->id}}">DELETE</button>
                       <div class="modal fade" id="modal-danger{{$site_name->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">DELETE CONFIRMATION</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>are you sure you want to delete this? Site Information: {{$site_name->title}}</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">CLOSE</button>
              <a  href="{{route('delete_site_name',$site_name->id)}}" class="btn btn-outline-light">DELETE</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

                     </td>

                   </tr>


                 </tbody>
               </table>
             </div>
             <!-- /.card-body -->

           </div>


@endsection
