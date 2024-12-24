@extends('front.layouts.layout') @section('content')


<!-- Bootstrap Toggle CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Support</h1>
        </div>
    </div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard customer-dash">
@include('front.user.sidebar')

       <div class="col-md-9">
          <div class="row support-list">
          
<div class="container bootdey">
<a href="{{url('createTicket')}}" class="add-new-address"><span>+</span> Create Ticket</a>
<div class="email-app mb-4">
    <main class="inbox">

        <ul class="messages">
            @if(count($supportTickets)>0)
            @foreach($supportTickets as $value)
            <li class="message {{$value->is_read==0?'':'unread'}}">
                <a href="{{ route('ticketReply',$value->id)}}">
                    <div class="actions">
                        <span class="action"><i class="fa fa-square-o"></i></span>
                        <span class="action"><i class="fa fa-star-o"></i></span>
                    </div>
                    <div class="header">
                        <span class="from"># {{$value->ticket_id}}</span>
                        <span class="date">
                        <span class="fa fa-paper-clip"></span> {{$value->last_message_time}}</span>
                    </div>
                    <div class="title">
                    {{$value->ticket_subject}}
                    </div>
                    <div class="description">
                    {{$value->last_message}}
                    </div>
                </a>
            </li>
            
            @endforeach
            @endif
        </ul>
    </main>
</div>
</div>
                   
          </div>
       </div>
</div>




@endsection
