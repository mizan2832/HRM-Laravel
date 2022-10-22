{{-- @php
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
@endforeach --}}