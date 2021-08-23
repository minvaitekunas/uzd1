@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime užduoties informaciją</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label>Užduotis: </label>
                            <input type="text" name="task_name" class="form-control" value="{{ $task->task_name }}">
                        </div>
                        <div class="form-group">
                            <label>Aprašymas: </label>
                            <input id="mce"type="text" name="task_description" class="form-control" value="{{ $task->task_description }}"> 
                        </div>
                        <div class="form-group">
                            {{-- <label>Sukurta: </label>
                            <input type="text" name="created_at" class="form-control" value="{{ $task->created_at }}"> 
                        </div> --}}
                        <div class="form-group">
                            <label>Pabaigta: </label>
                            <input type="text" name="updated_at" class="form-control" value="{{ $task->updated_at }}"> 
                        </div>
                        <div class="form-group">
                            <label>Statusas: </label>
                            <select name="status_id" id="" class="form-control">
                                 <option value="" selected disabled>Pasirinkite statusą</option>
                                 @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" @if($status->id == $task->status_id) selected="selected" @endif>{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
