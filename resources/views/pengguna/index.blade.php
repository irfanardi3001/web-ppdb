@extends('templates.admin')
@php
    $title = "Akses Pengguna Apps PPDB SMP Cempaka"; 
@endphp
@section('content')
<div class="table-responsive">
    <table class="table table-vcenter card-table">
      <thead>
        <tr>
          <th>id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th class="w-1"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data_pengguna as $pengguna)
        <tr>
            <td>{{$pengguna->id}}</td>
            <td>{{$pengguna->name}}</td>
            <td>{{$pengguna->email}}</td>
            <td>{{$pengguna->role}}</td>
            <td>
              <a href="{{route('pengguna.edit',$pengguna->id)}}">Edit</a>
            </td>
          </tr>            
        @endforeach
      </tbody>
    </table>
</div>
@endsection