<div class="attn-table pt-2">
    <table style="width: 100%" class="table table-hover table-responsive table-bordered">
      <thead>
        <th style="width:20%">Employee Name</th>
        <th style="width: 10%">From</th>
        <th style="width: 10%">To</th>
        <th style="width: 10%">Leave type</th>
        <th style="width: 10%">Reason</th>
        <th style="width: 10%">Action</th>
      </thead>
<tbody>
@foreach ($empleaves as $li)

<tr>
<td>{{$li->name}} ({{ $li->emp_id }})</td>
<td>{{ $li->from }}</td>
<td>{{ $li->to }}</td>
<td>{{ $li->leave_type }}</td>
<td>{{ $li->reason }}</td>
<td>
<a href=""><i class="far fa-edit"></i></a>
<a href="#"><i class="fas fa-trash-alt"></i></a>
<a href=""><i class="fab fa-dashcube"></i></a>

</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<div class="">
    {!! $empleaves->links() !!}
</div>