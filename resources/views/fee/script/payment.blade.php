<script type="text/javascript">

       $('.create-fee').on('click',function(e){ $('#createFeeOpup').modal('show') });


       //-----------------Create fee----------------------

       $('#frmFee').on('submit',function(e){
         e.preventDefault();
         enableFormElement(this);
         var data =$(this).serialize();
         var url =$(this).attr('action');
         $.post(url,data,function(data){
           location.reload();
         })

       })

       //-------------------enable form element---------------

       function enableFormElement(frmName)
       {
         $.each($(frmName).find('input,select'),function(i,element){

              $(element).attr('disabled',false);
         })
       }
       //-------------------------------------------------
       $('.btn-paid').on('click',function(e){
         e.preventDefault();
         s_fee_id = $(this).data('id-paid');
         balance = $(this).val();
         $.get("{{ route('pay') }}",{s_fee_id:s_fee_id},function(data){
                console.log(data);
         })
       })

</script>
