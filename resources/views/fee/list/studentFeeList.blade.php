<div class="panel panel-default" style="margin-top: -18px; ">
  <div class="panel-heading">Pay list</div>
  <div class="panel-body">

    <div class="table-responsive">

      <table style="border-collapse:collapse;" class="table-hover table-bordered" id="list-student-fee">

        <thead>

          <tr>
                  <th style="text-align: center;">N<sup>0</sup></th>
                  <th>Level</th>
                  <th style="text-align: center; ">Fee</th>
                  <th style="text-align: center; ">Amount</th>
                  <th style="text-align: center; ">Discount</th>
                  <th style="text-align: center; ">Paid</th>
                  <th style="text-align: center; ">Balance</th>
                  <th style="text-align: center; ">Action</th>
          </tr>
        </thead>

        <tbody id="tbody-student-fee">

          <tr data-id="" id="sfeeId">
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>

            <td style="text-align:center; width:115px;">
              <a href="#" class="btn btn-success btn-xs btn-sfee-edit" title="Edit"><i class="fa fa-edit"></i></a>

              <button type="button" class="btn btn-danger btn-xs btn-paid"><i class="fa fa-usd" title="Complete"></i></button>
              <button class="btn btn-primary btn-xs accordion-toggle" data-toggle="collapse" data-target="#demo1"
              title="Partial"><span class="fa fa-eye"></span></button>
            </td>

        </tr>
        <tr>
          <td colspan="9" class="hiddenRow">
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>
<div class="panel-footer" style="height:40px;">
</div>
