@extends('front.layouts.layout') @section('content')
<style>
    #chatContainer {
    list-style: outside none none;
    margin: 0;
    padding: 0;
    max-height: 498px;
    overflow-y: scroll;
    background-color: #e5e5e3;
}
</style>
<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Customer Support</h1>
        </div>
    </div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard customer-dash">
    @include('front.user.sidebar')
    <div class="col-md-9">
        <div class="row message-list">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card m-0">
                        <!-- Row start -->
                        <div class="row no-gutters">
                            <div class="col-xl-12 col-lg-12 col-md-8 col-sm-12 col-12 message-list-right">
                                <div class="selected-user">
                                    <span># <span class="name">{{$ticket->ticket_id}}</span> [ {{$ticket->ticket_subject}} ]</span>
                                </div>
                                <div class="chat-container">
                                    <ul class="chat-box chatContainerScroll" id="chatContainer">
                                        @if($replylist->count() > 0)
                                        @foreach($replylist as $value)
                                            @if($value->sender_type==2)
                                        <li class="chat-left">
                                            <div class="chat-avatar">
                                                <img src="{{ url('/public') }}/front_assets/images/design2.png" alt="Admin" />
                                                <div class="chat-name">Admin</div>
                                            </div>
                                            <div class="chat-text">
                                               {{$value->detail_text}}
                                               <div class="chat-hour">{{$value->created_at}}</div>
                                            </div>
                                        </li>
                                        @else
                                        <li class="chat-right">
                                            <div class="chat-text">
                                            {{$value->detail_text}}
                                            <div class="chat-hour">{{$value->created_at}}</div>
                                            </div>
                                            <div class="chat-avatar">
                                                <img src="{{auth('user')->user()->profile_image==''?url('public/default.jpg'):url('public/admin/uploads/user',auth('user')->user()->profile_image)}}" alt="Customer" />
                                                <div class="chat-name">{{auth('user')->user()->first_name}}</div>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach
                                        @endif
                                    </ul>
                                    @if($ticket->is_closed==0)
                                    <form class="profile-input-form customer-profile-form" action="{{ url('/ticketReply/' .$ticket->id) }}" id="support_form" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="form-group mt-3 mb-0">
                                        <textarea class="form-control" rows="3" placeholder="Type your message here..." name="reply_text"></textarea>
                                    </div>
                                    <div class="chat-buttons mt-2 d-flex justify-content-end two-btn-send">
                                        <button class="btn btn-outline-success">Send</button>
                                    </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const chatContainer = document.getElementById('chatContainer');
        if (chatContainer) {
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
    });
</script>
            @endsection
