<div class="holiday-body">
    <div class="row col-md-12">
        <div class="col-md-6">
            <table class="table table-hover holiday_t">
                <thead>
                  <tr>
                    <th>Holiday Name</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
               @foreach ($holidays as $day)
                <tr>
                   <td class="holi_name-{{$day->id}}">{{$day->name}}</td>
                   <td class="holi_date-{{$day->id}}">{{$day->from}}</td>
                   <td class="holi_date-{{$day->id}}">{{$day->to}}</td>
                   <td><a href="javascript:void(0)"  class="edit_holiday" data-id="{{ $day->id }}"><i class="far fa-edit"></i></a> <a href="javascript:void(0)" class='delete-holiday' data-id="{{ $day->id }}">  <i class="fas fa-trash-alt"></i></a> </td>
                </tr>
               @endforeach
                </tbody>
              </table>

        </div>
        <div class="col-md-6">
                <div class="form-group" >
                  <label class="control-label col-sm-3" for="holiday-name">Holiday name:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="holiday_name" placeholder="Enter holiday name" name="holiday-name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="date">From:</label>
                  <div class="col-sm-9">
                    <input type="date" class="date" id="from">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="date">To:</label>
                  <div class="col-sm-9">
                    <input type="date" class="date" id="to">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 d-flex  col-sm-10">
                    <button type="submit" id="add"  class="btn btn-primary mr-1  d-flex align-items-center justify-content-center">Add </button>
                    <button type="submit" id="refresh"  class="btn btn-primary  d-flex align-items-center justify-content-center">Refresh </button>
                    </div>
                </div>

             <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
             <input type="hidden" name="update" id="update_id">
        </div>
    </div>
</div>
