<div class="modal fade" id="choose-academic" role="dialog">
     <div class="modal-dialog modal-xs">

       <section class="panel panel-default">
         <header class="panel-heading">
           Choose Academic
         </header>
         <form action="#" class="form-horizontal" id="frm-view-class" method="POST">


           <div class="panel-body" style="border-bottom: 1px solid red;">
               <div class="form-group">

                 <div class="col-sm-6">
                   <label for="academic-year">Academic year</label>
                   <div class="input-group">
                     <select class="form-control" name="academic_id" id="academic_id">
                             <option value="">--------------</option>
                             @foreach($academics as $key =>$y)
                                <option value="{{ $y->academic_id }}">{{ $y->academic }}</option>
                             @endforeach
                     </select>
                     <div class="input-group-addon">

                       <span class="fa fa-plus" id="add-more-academic"></span>
                     </div>
                   </div>
                 </div>

                 {{------------------}}
                 <div class="col-sm-6">
                   <label for="program">Course</label>
                   <div class="input-group">
                     <select class="form-control" name="program_id" id="program_id">
                             <option value="">--------------</option>
                             @foreach($programs as $key =>$p)
                                <option value="{{ $p->program_id }}">{{ $p->program }}</option>
                             @endforeach
                     </select>
                     <div class="input-group-addon">

                       <span class="fa fa-plus" id="add-more-program"></span>
                     </div>
                   </div>
                 </div>


                   {{------------------}}
                   <div class="col-sm-6">
                     <label for="level">level</label>
                     <div class="input-group">
                       <select class="form-control" name="level_id" id="level_id">

                       </select>
                       <div class="input-group-addon">

                         <span class="fa fa-plus" id="add-more-level"></span>
                       </div>
                     </div>
                   </div>

                   {{------------------}}
                   <div class="col-sm-6">
                     <label for="shift">Shift</label>
                     <div class="input-group">
                       <select class="form-control" name="shift_id" id="shift_id">
                         <option value="">Сонгоно уу!</option>
                            @foreach($shift as $shf)
                                <option value="{{$shf->shift_id }}">{{ $shf->shift }}</option>
                            @endforeach
                       </select>
                       <div class="input-group-addon">

                         <span class="fa fa-plus" id="add-more-shift"></span>
                       </div>
                     </div>
                   </div>
                   {{------------------}}
                   <div class="col-sm-6">
                     <label for="time">Time</label>
                     <div class="input-group">
                       <select class="form-control" name="time_id" id="time_id">
                         <option value="">Сонгоно уу!</option>
                            @foreach($time as $term)
                                <option value="{{$term->time_id }}">{{ $term->time }}</option>
                           @endforeach
                       </select>

                       <div class="input-group-addon">

                         <span class="fa fa-plus" id="add-more-time"></span>
                       </div>
                     </div>
                   </div>
                   {{------------------}}
                   <div class="col-sm-3">
                     <label for="batch">Batch</label>
                     <div class="input-group">
                       <select class="form-control" name="batch_id" id="batch_id">
                         <option value="">Сонгоно уу!</option>
                            @foreach($batch as $batt)
                                <option value="{{$batt->batch_id }}">{{ $batt->batch }}</option>
                           @endforeach
                       </select>
                       <div class="input-group-addon">

                         <span class="fa fa-plus" id="add-more-batch"></span>
                       </div>
                     </div>
                   </div>

                   {{------------------}}
                   <div class="col-sm-3">
                     <label for="group">Group</label>
                     <div class="input-group">
                       <select class="form-control" name="group_id" id="group_id">
                         <option value="">Сонгоно уу!</option>
                            @foreach($group as $gol)
                                <option value="{{$gol->group_id }}">{{ $gol->group }}</option>
                           @endforeach
                       </select>
                       <div class="input-group-addon">

                         <span class="fa fa-plus" id="add-more-group"></span>
                       </div>
                     </div>
                   </div>


                      </div>
                   </div>


              </form>
              {{----------------------}}
            <div class="panel panel-default">
               <div class="panel-heading">Class Information</div>
               <div class="panel-body" id="add-class-info" style="overflow-y:auto; height:250px;">
               </div>
               </div>
       </section>


     </div>
</div>
