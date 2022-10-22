@php
$i = 1;
@endphp
@foreach ($empleaves as $li)

<tr>
<td>{{ $i++ }}</td>
<td>{{ $li->emp_id }}</td>
<td>{{ $li->reason }}</td>
<td>{{ $li->from }}</td>
<td>{{ $li->to }}</td>
<td>{{ $li->leave_type }}</td>
<td>
<a href=""><i class="far fa-edit"></i></a>
<a href="#"><i class="fas fa-trash-alt"></i></a>
<a href=""><i class="fab fa-dashcube"></i></a>

</td>
</tr>
@endforeach