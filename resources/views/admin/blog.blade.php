@extends('admin.layout.master')
@section('content')
<!-- /.card-header -->
             <div class="card-body">
               
               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th style="width: 10px">#</th>

                     <th>Blog Title</th>
                     <th>Details</th>
                     <th>Image</th>
                   </tr><tr>
                     <th> </th>
                     <th>Category</th>
                     <th>Tag</th>


                     <th>Actions</th>

                   </tr>
                 </thead>
                 <tbody>
                   <tr>
                     <td>#</td>
                     <form method="post" action="{{route('add_blog')}}" enctype="multipart/form-data">
                       @csrf

                     <td><textarea style="width:100%;" type="text" name="title" ></textarea></td>
                     <td><textarea style="width:100%;" type="text" name="details" /></textarea></td>
                     <td><input style="width:100%;" type="file" name="new_image" /></td>
                       </tr><tr>
                         <td> </td>

                     <td>
                      @foreach($categories as $c)
                      <input type="checkbox" value="{{$c->name}}" name="category[]" />{{$c->name}}
                      @endforeach
                     </td>

                     <td>
                      @foreach($tags as $t)
                      <input type="checkbox" value="{{$t->name}}" name="tag[]"/>{{$t->name}}
                      @endforeach
                     </td>
                     <td>
                       <input class="btn btn-success" type="submit" value="ADD"/>

                     </td>
                   </form>

                   </tr>
                    @foreach($blogs as $blog)
                   <tr>
                     <td>{{$blog->id}}</td>

                       <form method="post" action="{{route('update_blog')}}" enctype="multipart/form-data">
                         @csrf
                          <td><textarea style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text"  name="title">{{$blog->title}}</textarea></td>
                           <td><textarea style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text"  name="details">{{$blog->details}}</textarea></td>
                           <td><img  style="width:100px;" src="images/blog/{{$blog->image}}">
                           <input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="file" name="new_image"/></td>
                            </tr><tr>
                              <td> </td>

                       <td>
                        @foreach($categories as $c)
                        @php $a=0; @endphp
                        @foreach($blog->category as $cat)
                          @if($cat->category==$c->name)
                          @php $a=1; @endphp
                          @endif
                        @endforeach
                        <input type="checkbox" value="{{$c->name}}" name="category[]" {{$a==1? 'checked':''}}/>{{$c->name}}
                        @endforeach
                       </td>

                       <td>
                        @foreach($tags as $t)
                        @php $a=0; @endphp
                        @foreach($blog->tag as $tag)
                          @if($tag->tag==$t->name)
                          @php $a=1; @endphp
                          @endif
                        @endforeach
                        <input type="checkbox" value="{{$t->name}}" name="tag[]" {{$a==1? 'checked':''}}/>{{$t->name}}
                        @endforeach
                       </td>
                       <input type="hidden" value="{{$blog->id}}" name="id" />


                     <td>
                       <input type="submit" class="btn btn-success" value="UPDATE"/></a>
                       </form>
                       <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$blog->id}}">DELETE</button>
                       <div class="modal fade" id="modal-danger{{$blog->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">DELETE CONFIRMATION</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>are you sure you want to delete this? Blog: {{$blog->title}}</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">CLOSE</button>
              <a  href="{{route('delete_blog',$blog->id)}}" class="btn btn-outline-light">DELETE</a>
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
                {{$blogs->links()}}
               </ul>
             </div>
           </div>
@endsection
