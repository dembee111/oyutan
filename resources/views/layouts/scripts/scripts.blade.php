
<script type="text/javascript">

window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
]) !!};
//=================================================
   showClassInfo($('#academic_id').val());

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
        })
          $(this).trigger('reset');
      })
      //==================================================
      function showClassInfo(academic_id)
      {
        $.get("{{ route('showClassInformation') }}",{academic_id:academic_id},function(data){

          $('#add-class-info').empty().append(data);
        })
      }

    //===============Group modal============================
    $('#frm-group-create').on('submit',function(e){
            e.preventDefault();
            var data =$(this).serialize();
            var group = $('#group_id');
            $(group).empty();
            $.post("{{ route('createGroup') }}",data,function(data){
                  $('#group_id').append($("<option/>",{
                    value : data.group_id,
                    text : data.group
                  }))
      })
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
                  }))
      })
      $(this).trigger('reset');
    })



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
                    }))
                 })

             })
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
               }))
          })

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


    //================================================
    $('#add-more-academic').on('click', function(){
         $('#academic-year-show').modal();
    })
    //===============================================
    //======academic oruulahad route
    $('.btn-save-academic').on('click',function(){
       var academic = $('#new-academic').val();
       $.post("{{ route('postInsertAcademic') }}",{academic:academic},function(data){

                            $('#academic_id').append($("<option/>",{
                              value : data.academic_id,
                              text :  data.academic
                            }))
                           $('#new-academic').val("");
                           //--40:20 sec

       })
    })
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
               }))
               $('#program').val("");
               $('#description').val("");
   })
})



</script>
