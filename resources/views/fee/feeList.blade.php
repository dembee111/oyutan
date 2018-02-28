<table class="table table-hover table-striped table-condensed">
        <thead>
              <tr>
                      <th>#</th>
                      <th>Accountant</th>
                      <th>Stu.ID</th>
                      <th>Student Name</th>
                      <th>Transacted Date</th>
                      <th>Paid Amount</th>
              </tr>

      </thead>
      <tbody>
        @foreach($fees as $key => $fee)
        <tr>

             <td>{{ ++$key }}</td>
             <td>{{ $fee->name }}</td>
             <td>{{ $fee->student_id }}</td>
             <td>{{ $fee->first_name." ".$fee->last_name }}</td>
             <td>{{ $fee->transact_date }}</td>
             <td>{{ $fee->paid }}</td>
        </tr>
        @endforeach
      </tbody>
</table>
