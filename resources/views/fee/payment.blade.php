@extends('layouts.master')
@section('content')
@include('fee.stylesheet.css-payment')
@include('fee.createFee')
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="col-md-3">
            <form action="{{ route('showStudentPayment') }}" class="search-payment" method="GET">
              <input class="form-control" name="student_id" value="{{ $student_id }}" placeholder="Student ID" type="text">
            </form>
          </div>
          <div class="col-md-3">
            <label class="eng-name">Name: <b class="student-name">{{ $status->first_name." ".$status->last_name }}</b></label>
          </div>
          <div class="col-md-3">
          </div>
          <div class="col-md-3" style="text-align: right;">
              <label class="date-invoice">Date : <b>{{ date('d-M-Y') }}</b></label>
            </div>
            <div class="col-md-3" style="text-align:right;">
              <label class="invoice-number">Receipt N<sup>0</sup>: <b>{{ sprintf('%05d', $receipt_id) }}</b></label>
            </div>
          </div>

            <form action="{{ count($readStudentFee) !=0 ? route('exstraPay') : route('savePayment') }}" method="POST" id="frmPayment">
              {{ csrf_field() }}
          <div class="panel-body">


            <table style="margin-top: -12px;">
              <caption class="academicDetail">
                {{ $status->program }} /
                Level-{{ $status->level }} /
                Shift-{{ $status->shift }} /
                Time-{{ $status->time }} /
                Batch-{{ $status->batch }} /
                Group-{{ $status->groups }}
              </caption>
              <thead>
                <tr>
                  <th>Program</th>
                  <th>Level</th>
                  <th>School Fee($)</th>
                  <th>Amount($)</th>
                  <th>Dis(%)</th>
                  <th>Paid($)</th>
                  <th>Amount Lack($)</th>

                </tr>
              </thead>

              <tr>
                <td>
                  <select id="program_id" name="program_id" class="d">
                    <option value="">--------------</option>
                    @foreach($programs as $key => $p)
                          <option value="{{ $p->program_id }}" {{ $p->program_id==$status->program_id?
                          'selected' : null }}>{{ $p->program }}</option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <select id="Level_ID" name="level_id" class="d">
                    <option value="">--------------</option>
                    @foreach($levels as $key => $l)
                          <option value="{{ $l->level_id }}" {{ $l->level_id==$status->level_id?
                          'selected' : null  }}>{{ $l->level }}</option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <div class="input-group">
                    <span class="input-group-addon create-fee" title="create fee" style="cursor:pointer;color:blue;
                    padding:0px 3px; border-right:none; ">($)</span>

                  <input type="text" name="fee" value="{{ $studentfee->amount or null }}" id="Fee" readonly="true">
                </div>
                  <input type="hidden" name="fee_id" value="{{ $studentfee->fee_id or null }}" id="FeeID">
                  <input type="hidden" name="student_id" value="{{ $student_id }}" id="StudentID">
                  <input type="hidden" name="level_id" value="{{ $status->level_id }}" id="LevelID">
                  <input type="hidden" name="user_id" value="{{ Auth::id() }}" id="UserID">
                  <input type="hidden" name="transact_date" value="{{ date('Y-m-d H:i:s')}}" id="TransacDate">
                  <input type="hidden" name="s_fee_id" value="{{ $transact->s_fee_id or null }}" id="s_fee_id">
                </td>
                <td>
                  <input type="text" name="amount" id="Amount" required class="d">
                </td>
                <td>
                  <input type="text" name="discount" id="Discount" class="d">
                </td>
                <td>
                  <input type="text" name="paid" id="Paid" required>
                </td>

                <td>
                  <input type="text" name="lack" id="Lack" disabled >
                </td>
              </tr>

            <thead>
              <tr>
                <th colspan="2">Remark</th>
                <th colspan="5">Description</th>
              </tr>
          </thead>

          <tbody>
            <tr>
              <td colspan="2">
                <input type="text" name="remark" id="remark">
              </td>
              <td colspan="5">
                <input type="text" name="description" id="description">
              </td>
            </tr>
          </tbody>

        </table>
      </div>
      <div class="panel-footer">
          <input type="submit" id="btn-go" name="btn-go" class="btn btn-default btn-payment"
          value="{{ count($readStudentFee)!=0 ? 'Exstra Pay' : 'Save' }}">
          @if (count($readStudentFee)!=0)
          <a href="{{ route('printInvoice',$receipt_id) }}" class="btn btn-default btn-sm" target="_blank" title="print"><i class="fa fa-print"></i></a>
          @endif
          <input type="button" onclick="this.form.reset()" class="btn btn-default btn-reset pull-right" value="Reset">

      </div>

    </form>


    </div>
    @if(count($readStudentFee)!=0)
              @include('fee.list.studentFeeList')
              <input type="hidden" value="0" id="disabled">
    @endif
  </div>
  @endsection
  @section('scripts')
        @include('fee.script.calculate')
        @include('fee.script.payment')
  @endsection
