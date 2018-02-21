<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic;
use App\Program;
use App\Level;
use App\Shift;
use App\Time;
use App\Batch;
use App\Group;
use App\MyClass;
use App\Student;
use App\Status;
use App\Fee;
use App\Transaction;
use App\StudentFee;
use App\ReceiptDetail;
use App\Receipt;

class FeeController extends Controller
{
    public function getPayment()
    {
      return view('fee.searchPayment');
    }
    public function student_status($studentId)

    {
      return Status::latest('statuses.status_id')
                  ->join('students','students.student_id','=','statuses.student_id')
                  ->join('classes','classes.class_id','=','statuses.class_id')
                  ->join('academics','academics.academic_id','=','classes.academic_id')
                  ->join('shifts','shifts.shift_id','=','classes.shift_id')
                  ->join('times','times.time_id','=','classes.time_id')
                  ->join('batches','batches.batch_id','=','classes.batch_id')
                  ->join('groups','groups.group_id','=','classes.group_id')
                  ->join('levels','levels.level_id','=','classes.level_id')
                  ->join('programs','programs.program_id','=','levels.program_id')
                  ->where('students.student_id',$studentId);
    }
      public function show_school_fee($level_id)

      {
          return  Fee::join('academics','academics.academic_id','=','fees.academic_id')
                     ->join('levels','levels.level_id','=','fees.level_id')
                     ->join('programs','programs.program_id','=','levels.program_id')
                     ->join('feetypes','feetypes.fee_type_id','=','fees.fee_type_id')
                     ->where('levels.level_id',$level_id)
                     ->orderby('fees.amount','DESC');

      }


    public function payment($viewName,$student_id)
    {

      $status = $this->student_status($student_id)->first();
      $programs = Program::where('program_id',$status->program_id)->get();
      $levels = Level::where('program_id',$status->program_id)->get();
      $studentfee = $this->show_school_fee($status->level_id)->first();
      $receipt_id = ReceiptDetail::where('student_id',$student_id)->max('receipt_id');

      return view($viewName, compact('programs','levels','status','studentfee'))->with('student_id',$student_id);
    }

    public function showStudentPayment(Request $request)
    {
       $student_id = $request->student_id;
       return $this->payment('fee.payment',$student_id);

    }
    public function goPayment($student_id)
    {
         return $this->payment('fee.payment',$student_id);
    }
}
