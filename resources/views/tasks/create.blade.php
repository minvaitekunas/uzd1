
@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Sukurkime užduotį:</div>
               <div class="card-body">
                   <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        @if($errors->any())
                        <h4 style="color: red">{{$errors->first()}}</h4>
                        @endif
                        <div class="form-group">
                            <label>Užduotis: </label>
                            <input type="text" name="task_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Aprašymas: </label>
                            <input type="text" id="mce" name="task_description" class="form-control"> 
                        </div>
                        {{-- <div class="form-group">
                            <label>Sukurta: </label>
                            <input type="data" name="created_at" class="form-control"> 
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Pabaigta: </label>
                            <input type="data" name="updated_at" class="form-control"> 
                        </div> --}}
                         <div class="form-group">
                            <label for="start">Pabaigti iki:</label>

                            <input type="date" id="start" name="trip-start"
                                value="2021-08-23"
                                min="2021-08-23" max="2021-12-31"> 
                        </div>
                        <div class="form-group">
                            <label>Statusas: </label>
                            <select name="status_id" id="" class="form-control">
                                 <option value="" selected disabled>Pasirinkite statusą</option>
                                 @foreach ($statuses as $status)
                                 <option value="{{ $status->id }}">{{ $status->name }}</option>
                                 @endforeach
                            </select>
                        </div>
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
