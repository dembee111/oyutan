<script type="text/javascript">

       $('.create-fee').on('click',function(e){ $('#createFeeOpup').modal('show') });


       //-----------------Create fee----------------------

       $('#frmFee').on('submit',function(e){
         e.preventDefault();
         enableFormElement(this);
         var data =$(this).serialize();
         var url =$(this).attr('action');

         console.log(data)
       })

       //-------------------enable form element---------------

       function enableFormElement(frmName)
       {
         $.each($(frmName).find('input,select'),function(i,element){

              $(element).attr('disabled',false);
         })
       }

</script>
