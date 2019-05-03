@extends('admin.adminlayouts.submaster')
@section('title', 'Submitted Contacts')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Contacts</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">

      <div class="col-lg-12">
        <table class="table" id="contactform">
        <thead>
          <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email Id</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Tracking-No</th>
            <th>Created At</th>
          </tr>
         </thead>
         <tbody id="products-list" name="products-list">
           @foreach ($contacts as $contact)
            <tr id="contact{{$contact->id}}">
             <td>{{$contact->id}}</td>
             <td>{{$contact->firstname}}</td>
             <td>{{$contact->lastname}}</td>
             <td>{{$contact->email}}</td>
             <td>{{$contact->phone}}</td>
             <td>{{$contact->message}}</td>
             <td>{{$contact->tnumber}}</td>
             <td>{{ date('M-j-Y', strtotime($contact->created_at)) }}</td>

            </tr>
            @endforeach
        </tbody>
        </table>

      </div>

    </div>
  </div>
</div>

@stop
