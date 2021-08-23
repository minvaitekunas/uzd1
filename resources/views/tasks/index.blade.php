@extends('layouts.app')
@section('content')
<div class="card-body">
    <form class="form-inline" action="{{ route('tasks.index') }}" method="GET">
        <select name="task_id" id="" class="form-control">
            <option value="" selected disabled>Pasirinkite statusą filtravimui:</option>
            @foreach ($statuses as $status)
            <option value="{{ $status->id }}" 
                @if($status->id == app('request')->input('name')) 
                    selected="selected" 
                @endif>{{ $status->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-success" href={{ route('tasks.index') }}>Rodyti visus</a>
    </form>
</div>
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th>Užduotis</th>
            <th>Aprašymas</th>
            <th>Sukurta</th>
            <th>Pabaigta</th>
            <th>Statusas</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->task_name }}</td>
            <td>{!! $task->task_description !!}</td>
            <td>{{ $task->created_at }}</td>
            <td>{{ $task->completed_at }}</td>
            <td>{{ $status->name }}</td>
            <td>
                <form action={{ route('tasks.destroy', $task->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('tasks.edit', $task->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('tasks.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection
