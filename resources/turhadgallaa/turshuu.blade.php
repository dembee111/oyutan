<script type="text/javascript">


window.Laravel = {!! json_encode([
		'csrfToken' => csrf_token(),
]) !!};
//=================================================

showClassInfo();

		//===============Date picker ===========================
		$('#start_date').datepicker({
					changeMonth:true,
					changeYear:true,
					dateFormat:'yy-mm-dd'
					})

					$('#end_date').datepicker({
					changeMonth:true,
					changeYear:true,
					dateFormat:'yy-mm-dd'
					})
					//======================================================
			 	 			$('#frm-create-class').on('submit',function(e){
			 	 				e.preventDefault();
			 	 				var data = $(this).serialize();
			 	 				var url = $(this).attr('action');
			 	 				$.post(url,data,function(data){
			 	 								showClassInfo(data.academic_id);

				 					});
			 	 						$(this).trigger('reset');
			 	 				});
			 	 //=====================================================

			 	 			function showClassInfo()
			 	 			 {
			 	 				 var data = $('#frm-create-class').serialize();


			 	 				 $.get("{{ route('showClassInformation') }}",data,function(data){
			 	 					 $('#add-class-info').empty().append(data);
			 	 					 MergeCommonRows($('#table-class-info'));
			 	 				 })
			 	 			 }



					//========левелийн dropdown дээр левелийн поргам харуулах js
					 $("#frm-create-class #program_id").on('change',function(e){
									 var program_id = $(this).val();
									 var level = $('#level_id')
									 $(level).empty();
									 $.get("{{ route('showLevel')}}",{program_id:program_id},function(data){

											 $.each(data,function(i,l){
													$(level).append($("<option/>",{
														value : l.level_id,
														text : l.level
													}));
											 });
										 showClassInfo();
									 });
					 });
					 //---------------------------------------------------**

					 //------------------------------------------------**

				$('#academic_id').on('change',function(e){
				 	showClassInfo()
				 })

				 $('#level_id').on('change',function(e){
				 	showClassInfo()
				 })
				 $('#shift_id').on('change',function(e){
				 	showClassInfo()
				 })
				 $('#time_id').on('change',function(e){
				 	showClassInfo()
				 })
				 $('#batch_id').on('change',function(e){
				 	showClassInfo()
				 })
				 $('#group_id').on('change',function(e){
				 	showClassInfo()
				 })

					 //================================================
					 $('#add-more-academic').on('click', function(){
								$('#academic-year-show').modal();
					 })




		//===============Group modal============================
		$('#frm-group-create').on('submit',function(e){
						e.preventDefault();
						var data =$(this).serialize();


						$.post("{{ route('createGroup') }}",data,function(data){
									$('#group_id').append($("<option/>",{
										value : data.group_id,
										text : data.groups
									}));
			});
			$(this).trigger("reset");
		})


			$('#add-more-group').on('click',function(e){
					 $('#group-show').modal('show');
			})


		//===============batch ийн modal===================
		$('#frm-batch-create').on('submit',function(e){
						e.preventDefault();
						var data =$(this).serialize();
						var batch = $('#batch_id');
						$(batch).empty();
						$.post("{{ route('createBatch')}}",data,function(data){
									$('#batch_id').append($("<option/>",{
										value : data.batch_id,
										text : data.batch
									}));
			});
			$(this).trigger('reset');
		});



		$('#add-more-batch').on('click', function(e){
				 $('#batch-show').modal('show');
		})
		//===============Цагийн хуваарын modal ============
		$('#frm-time-create').on('submit',function(e){
						e.preventDefault();
						var data =$(this).serialize();

						$.post("{{ route('createTime')}}",data,function(data){
									$('#time_id').append($("<option/>",{
										value : data.time_id,
										text : data.time
									}))
			})
			$(this).trigger('reset');
		})



		 //================================================
		$('#add-more-time').on('click', function(e){
				 $('#time-show').modal('show');
})

		//======academic oruulahad route
		$('.btn-save-academic').on('click',function(){
			 var academic = $('#new-academic').val();
			 $.post("{{ route('postInsertAcademic') }}",{academic:academic},function(data){

														$('#academic_id').append($("<option/>",{
															value : data.academic_id,
															text :  data.academic
														}))
													 $('#new-academic').val("");


			 });
		});


		//===============Шифт модал======================
		$('#frm-shift-create').on('submit',function(e){
						e.preventDefault();
						var data =$(this).serialize();
						var shift = $('#shift_id');
						$(shift).empty();
						$.post("{{ route('createShift')}}",data,function(data){
									$(shift).append($("<option/>",{
										value : data.shift_id,
										text : data.shift
									}))
			})
			$(this).trigger(" ")
		})
		//================================================
				$('#add-more-shift').on('click', function(){
						 $('#shift-show').modal('show');




			 })


		//================================================
		$('#add-more-level').on('click', function(){

					var programs = $('#program_id option');
					var program = $('#frm-level-create').find('#program_id');
					$(program).empty();
					$.each(programs, function(i,pro){
							 $(program).append($("<option/>",{
								 value:$(pro).val(),
								 text:$(pro).text(),
							 }));
					});

				 $('#level-show').modal('show');
		});
		//===============================================
		$('#frm-level-create').on('submit', function(e){
			e.preventDefault();
			var data = $(this).serialize();
			var url =$(this).attr('action');
			$.post(url,data, function(data){
							 $('#level_id').append($("<option/>",{
								 value : data.level_id,
								 text : data.level
							 }))
			})
		})




		//===============================================

		//=================================================
		//========academic data insert to DB for csrf
		$(document).ready(function(){
			$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	});
 //===========program zoriulsan route js
 $('#add-more-program').on('click',function(){
				$('#program-show').modal();
		})
//======================================
$('.btn-save-program').on('click',function(){
	 var program = $('#program').val();
	 var description = $('#description').val();

	 $.post("{{ route('postInsertProgram')}}", {program:program,description:description},function(data){
							 $('#program_id').append($("<option/>",{
								 value : data.program_id,
								 text :  data.program
							 }));
							 $('#program').val("");
							 $('#description').val("");
	 });
});


//===================call class========================
function MergeCommonRows(table){
	var firstColumnBrakes = [];
	$.each(table.find('th'),function(i){
		var previous = null, cellToExtend = null, rowspan = 1;
		table.find("td:nth-child(" + i + ")").each(function(index, e){
			var jthis = $(this), content =jthis.text();
			if (previous == content && content !== "" && $.inArray(index, firstColumnBrakes) === -1){
				jthis.addClass('hidden');
				cellToExtend.attr("rowspan", (rowspan = rowspan+1));

			}else{
				if(1===1) firstColumnBrakes.push(index);
				rowspan = 1;
				previous = content;
				cellToExtend = jthis;
			}
		});
	});
	$('td.hidden').remove();
}









//===============Устгах ========================
 $(document).on('click','.del-class', function(e){
		 class_id = $(this).val();
		 $.post(" {{ route('deleteClass')}}",{class_id:class_id},function(data){
				 showClassInfo($('#academic_id').val());
		 })
 })
//===============засвар=========================
 $(document).on('click','#class-edit',function(data){
		var class_id = $(this).data('id');
		$.get("{{ route('editClass') }}",{class_id:class_id},function(data){
					 $('#academic_id').val(data.academic_id);
					 $('#level_id').val(data.level_id);
					 $('#shift_id').val(data.shift_id);
					 $('#time_id').val(data.time_id);
					 $('#group_id').val(data.group_id);
					 $('#batch_id').val(data.batch_id);
					 $('#start_date').val(data.start_date);
					 $('#end_date').val(data.end_date);
					 $('#class_id').val(data.class_id);
		})
 })

//==============================================
	 $('.btn-update-class').on('click',function(e){
		 e.preventDefault();
		 var data = $('#frm-create-class').serialize();
		 $.post("{{ route('updateClassInfo')}}",data,function(data){
			 showClassInfo(data.academic_id);
		 })
	 })
</script>



//-------------------------------------------------------------

public function showClassInformation(Request $request)
{



    if ($request->academic_id!="" && $request->program_id!="")
     {
       $filter = ['academics.academic_id'=>$request->academic_id];



     }
     if(
             $request->academic_id!="" &&
             $request->program_id!="" &&
             $request->level_id!="" &&
             $request->shift_id!="" &&
             $request->time_id!="" &&
             $request->batch_id!="" &&
             $request->group_id!="")
             {
               $filter = ['academics.academic_id'=>$request->academic_id,
                                  'programs.program_id'=>$request->program_id,
                                  'levels.level_id'=>$request->level_id,
                                  'shifts.shift_id'=>$request->shift_id,
                                  'times.time_id'=>$request->time_id,
                                  'batches.batch_id'=>$request->batch_id,
                                  'groups.group_id'=>$request->group_id];
               }

               $classes = $this->ClassInformation($filter)->get();
               return view('class.classInfo', compact('classes'));
}



//============================================
public function ClassInformation($filter)
{
return MyClass::join('academics','academics.academic_id','=','classes.academic_id')
                    ->join('levels','levels.level_id','=','classes.level_id')
                    ->join('programs','programs.program_id','=','levels.program_id')
                    ->join('shifts','shifts.shift_id','=','classes.shift_id')
                    ->join('times','times.time_id','=','classes.time_id')
                    ->join('batches','batches.batch_id','=','classes.batch_id')
                    ->join('groups','groups.group_id','=','classes.group_id')
                    ->where($filter)
                    ->orderBy('classes.class_id','DESC');


}
