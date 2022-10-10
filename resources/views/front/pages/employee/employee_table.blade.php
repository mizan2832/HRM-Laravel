<div class="container">
    <h2 style="text-align: center">Employee List</h2>

    <form class="form-inline">

      <label for="name" class="mr-sm-2">Name</label>
      <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter name" id="name">

      <label for="email" class="mr-sm-2">Email</label>
      <input type="email" class="form-control mb-2 mr-sm-2" placeholder="Enter email" id="email">

      <label for="number" class="mr-sm-2">Mobile</label>
      <input type="number" class="form-control mb-2 mr-sm-2" placeholder="Enter mobile" id="mobile">
{{--       
      <label for="select" class="mr-sm-2">Select</label>
      <select name="select" id="select" class="form-control mb-2 mr-sm-2">
        <option value="">Select option</option>
        <option value="department">Department</option>
        <option value="joining_date">Joining Date</option>
        <option value="section">Section</option>
        <option value="unit">Unit</option>
      </select> --}}

    </form>

    <table class="table table-bordered table-hover table-striped">
      <thead>
        <tr>
          <th>SI</th>
          <th>Name</th>
          <th>Department</th>
          <th>Email</th>
          <th>Salary</th>
          <th>Phone</th>
          <th>Action</th>
          
        </tr>
      </thead>
      <tbody>
        @php
            $i = 1;
        @endphp
      @foreach ($list as $item)
          
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->department }}</td>
          <td>{{ $item->email }}</td>
          <td>{{ $item->total_salary }}</td>
          <td>{{ $item->phone1 }}</td>
          <td>
            <a href="{{ route('employee.edit',$item->id) }}"><i class="far fa-edit"></i></a>
            <a href="#"><i class="fas fa-trash-alt"></i></a>
            <a href="{{ route('emp.details',$item->id) }}"><i class="fab fa-dashcube"></i></a>
          
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    <div class="">
      {!! $list->links() !!}
    </div>
  </div>