@extends('admin.layout.master')
@section('content')
<!-- /.card-header -->


               @foreach($siteinfos as $siteinfo)
               <div class="card-body">
              <div  style="background:red;padding:10px;margin:0px;color:white;">
              <h4>
                @php $name=null; @endphp
                @if($siteinfo->name=="partner") @php $name="Partners Info (Home)"; @endphp  @endif
                @if($siteinfo->name=="ask") @php $name="Ask Quote (Home[Before Footer])"; @endphp  @endif
                @if($siteinfo->name=="about_us") @php $name="About Us (Home)"; @endphp  @endif
                @if($siteinfo->name=="about") @php $name="Our Company Information (About Us)"; @endphp  @endif
                @if($siteinfo->name=="skill_info") @php $name="Skill Info (About us)"; @endphp  @endif
                @if($siteinfo->name=="services_left") @php $name="Service left part Banner (Services)"; @endphp  @endif
                @if($siteinfo->name=="services_right") @php $name="Service right part Banner (Services)"; @endphp  @endif
                @if($siteinfo->name=="map_url") @php $name="Map Url (Contact)"; @endphp  @endif
                @if($siteinfo->name=="message") @php $name="Send Message (Contact)"; @endphp  @endif
                @if($siteinfo->name=="portfolio_title") @php $name="Portfollio Title (Portfolio)"; @endphp  @endif

                {{$name}}
              </h4>
              </div>

               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th style="width: 10px">#</th>
                     @if($siteinfo->name=="partner" || $siteinfo->name=="ask" || $siteinfo->name=="about_us" || $siteinfo->name=="about" || $siteinfo->name=="skill_info" || $siteinfo->name=="message" ||$siteinfo->name=="portfolio_title" )
                      <th>Title</th>
                     @endif
                     @if(!($siteinfo->name=="map_url" || $siteinfo->name=="portfolio_title"))
                      <th>Details</th>
                     @endif
                     @if($siteinfo->name=="map_url")
                      <th>Google Map Url</th>
                     @endif
                     @if($siteinfo->name=="about_us" || $siteinfo->name=="about" || $siteinfo->name=="services_left" || $siteinfo->name=="services_right")
                      <th>Image</th>
                     @endif
                      <th>Actions</th>
                   </tr>
                 </thead>
                 <tbody>


                   <tr>
                     <td>{{$siteinfo->id}}</td>

                       <form method="post" action="{{route('update_siteinfo')}}" enctype="multipart/form-data">
                         @csrf
                         @if($siteinfo->name=="partner" || $siteinfo->name=="ask" || $siteinfo->name=="about_us" || $siteinfo->name=="about" || $siteinfo->name=="skill_info" || $siteinfo->name=="message" ||$siteinfo->name=="portfolio_title" )
                          <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text" value="{{$siteinfo->title}}" name="title"/></td>
                         @endif
                         @if(!($siteinfo->name=="portfolio_title"))
                          <td><input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="text" value="{{$siteinfo->details}}" name="details"/></td>
                         @endif
                         @if($siteinfo->name=="about_us" || $siteinfo->name=="about" || $siteinfo->name=="services_left" || $siteinfo->name=="services_right")
                         <td>
                           <img  style="width:100px;" src="images/{{$siteinfo->image}}">
                           <input style="width:100%;border:none;background:none;border-bottom:1px dashed green;color:green" type="file"  name="new_image"/>
                         </td>
                         @endif
                       <input type="hidden" value="{{$siteinfo->id}}" name="id" />
                     <td>
                       <input type="submit" class="btn btn-success" value="UPDATE"/></a>
                       </form>
                       <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$siteinfo->id}}">DELETE</button>
                       <div class="modal fade" id="modal-danger{{$siteinfo->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">DELETE CONFIRMATION</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>are you sure you want to delete this? Site Information: {{$siteinfo->name}}</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">CLOSE</button>
              <a  href="{{route('delete_siteinfo',$siteinfo->id)}}" class="btn btn-outline-light">DELETE</a>
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
 @endforeach
           </div>


@endsection
