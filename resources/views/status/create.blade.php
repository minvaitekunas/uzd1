@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Sukurkime statusą:</div>
               <div class="card-body">
                   <form action="{{ route('status.store') }}" method="POST">
                       @csrf
                       @if($errors->any())
                       <h4 style="color: red">{{$errors->first()}}</h4>
                       @endif
                       <div class="form-group">
                           <label>Pavadinimas: </label>
                           <input type="text" name="name" class="form-control">
                     
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
