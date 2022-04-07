@if ($infos == null)
    <h1>Vous n'avez pas de tickets, souhaitez-vous en créer un ?</h1>
@else
<h1>Tickets de {{ $infos[0]->name }} :</h1>
<table>
@foreach ($infos as $data)
<tr>
<td>{{$data->id}}</td>
<td>{{$data->titre}}</td>
<td>{{$data->created_at}}</td>
<td>{{$data->updated_at}}</td>
<td>
<form method="post" action="{{url('tickets/modify/')}}">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <button type="submit">Modifier</button>
</form>
</td>
</tr>
@endforeach
</table>
@endif
