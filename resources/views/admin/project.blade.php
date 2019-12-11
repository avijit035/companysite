@extends('admin.layout.master')
@section('content')
<!-- /.card-header -->
             <div class="card-body">
               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th style="width: 10px">#</th>

                     <th>Title</th>
                     <th>Details</th>
                      <th>Image</th>
                   </tr>
                   <tr>
                        <td> </td>
                       <th>Link</th>
                     <th>Project Type</th>

                     <th>Actions</th>

                   </tr>
                 </thead>
                 <tbody>
                   <tr>
                     <td>#</td>
                     <form method="post" action="{{route('add_project')}}" enctype="multipart/form-data">
                       @csrf

                     <td><input style="width:100%;" type="text" name="title" placeholder="title" /></td>
                     <td><input style="width:100%;" type="text" name="details" placeholder="details" /></td>
                     <td><input style="width:100%;" type="file" name="new_image" /></td>
                   </tr>
                   <tr>

                     <td> </td>
                     <td><input style="width:100%;" type="text" name="link" placeholder="link"/></td>
                     <td>
                       @foreach($project_types as $ptype)
                      <input type="checkbox" name="type[]" value="{{$ptype->id}}" }}>{{$ptype->name}}
                     @endforeach
                     </td>

                     <td>
                       <input class="btn btn-success" type="submit" value="ADD"/>

                     </td>
                   </form>

                   </tr>
                    @foreach($projects as $project)
                   <tr>
                     <td>{{$project->id}}</td>

                       <form method="post" action="{{route('update_project')}}" enctype="multipart/form-data">
                         @csrf
                          <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text" value="{{$project->title}}" name="title" placeholder="title"/></td>
                           <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text" value="{{$project->details}}" name="details" placeholder="details"/></td>
                           <td><img  style="width:100px;" src="images/portfolio/recent/{{$project->image}}">
                           <input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="file" name="new_image"/></td>
                         </tr>
                         <tr>
                           <td> </td>

                       <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text" value="{{$project->link}}" name="link" placeholder="link"/></td>
                       <td>

                        @foreach($project_types as $ptype)
                        @php $a=0; @endphp
                      @foreach($project->project_type as $p)
                         @if($ptype->name==$p->name->name)
                           @php $a=1; @endphp
                         @endif
                      @endforeach
                       <input type="checkbox" name="type[]" value="{{$ptype->id}} " {{$a==1? 'checked':''}}>{{$ptype->name}}

                      @endforeach

                      </td>
                       <input type="hidden" value="{{$project->id}}" name="id" />


                     <td>
                       <input type="submit" class="btn btn-success" value="UPDATE"/></a>
                       </form>
                       <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$project->id}}">DELETE</button>
                       <div class="modal fade" id="modal-danger{{$project->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">DELETE CONFIRMATION</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>are you sure you want to delete this? Delete Project: {{$project->title}}</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">CLOSE</button>
              <a  href="{{route('delete_project',$project->id)}}" class="btn btn-outline-light">DELETE</a>
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
                {{$projects->links()}}
               </ul>
             </div>
           </div>
@endsection
