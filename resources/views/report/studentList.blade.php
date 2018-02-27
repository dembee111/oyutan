@extends('layouts.master')
@section('content')

{{------------------------------}}
<div class="row">
  <div class="col-lg-12">
  <h3 class="page-header"><i class="fa fa-file-text-o"></i>Student list</h3>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
    <li><i class="icon_document_alt"></i>Reports / </li>
    <li><i class="fa fa-file-text-o"></i>Student</li>
  </ol>
</div>
</div>
{{--------------------------------}}

<div class="panel panel-default">
   <div class="panel-heading">
     <b><i class="fa fa-apple"></i>Student information</b>
       <a href="#" class="pull-right" id="show-class-info"><i class="fa fa-plus"></i></a>
     </div>
     <div class="panel-body" style="padding-bottom:4px;">
       <div class="show-student-info">

       </div>
       </div>
       </div>
       @include('class.classPopup')
       @endsection
       @section('scripts')
             @include('layouts.scripts.scriptClassPopup')
             <script type="text/javascript">
                  $(document).on('click','#class-edit',function(e){
                    e.preventDefault();
                    class_id = $(this).data('id');

                    $.get('{{ route("showStudentInfo") }}',{class_id:class_id},function(data){
                      $('.show-student-info').empty().append(data);
                    })

                  })
             </script>
       @endsection
