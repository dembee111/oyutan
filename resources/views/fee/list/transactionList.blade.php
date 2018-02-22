<div class="accordion-body collapse" id="demo{{ $key }}">
      <table>
        <thead>
            <tr>
                    <th style="text-align:center;">#</th>
                    <th>Transaction Date</th>
                    <th>Cashier</th>
                    <th>Paid</th>
                    <th>Remark</th>
                    <th>Description</th>
                    <th style="text-align:center;">Action</th>
            </tr>
          </thead>

          <tbody>
             <tr>
                  <td>1</td>
                  <td>{{ date('Y-m-d') }}</td>
                  <td>user name</td>
                  <td>2312.22</td>
                  <td>USD</td>
                  <td>Complete</td>
                  <td style="text-align:center;width:112px;">
                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit" title="Edit"></i></a>
                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-trash-o" title="Delete"></i></a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-print" title="Print"></i></a>
                  </td>
             </tr>
           </tbody>
         </table>
       </div>
