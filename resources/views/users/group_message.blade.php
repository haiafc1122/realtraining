@extends('layouts.master')
@section('top_js')
    <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
@endsection
@section('add_css')
    <link rel="stylesheet" href="{{ asset('css/message.css') }}">
@endsection
@section('main')
    <div class="row"></div>
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">グループチャット</div>
                    <div class="panel-body">
                        <div id="textArea" class="row">
                            <div id="chatArea" class="col-lg-12" >
                                <div id="messages" class="messages" ></div>
                                <div id="type_notification"></div>
                            </div>

                            <div class="col-lg-12">
                                <form action="{{ route('send.message.to.group') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                                    <input type="hidden" name="user_name" value="{{ Auth::user()->name }}" >
                                    <textarea class="form-control msg" id="txtMessage" placeholder="入力..."></textarea>
                                    <br/>
                                    <input type="button" value="送信" class="btn btn-success send-msg">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('bottom_js')
    <script>
        var socket = io.connect('http://localhost:8890');
        var user_id = $("input[name='user_id']").val();
        $.ajax({
            url: '/getOldMessages',
            type: 'get',
            dataType: 'json',
            data: {is_public: 1},
            success: function(data) {
                $.each(data, function (k, message) {
                    if (message.sender.id == user_id){
                        $('#messages').prepend(
                            "<div class='wrap_messeage currentRoom' ><div class='message'>"+message.content+"</div><div class='username'>"+ ':' +message.sender.name+ "</div></div>"
                        );
                    } else {
                        $('#messages').prepend(
                            "<div class='wrap_messeage visitors' ><div class='username'>"+message.sender.name+ ':'+"</div><div class='message'>"+message.content+"</div></div>"
                        );
                    }

                });
                $('#messages')[0].scrollTop = $('#messages')[0].scrollHeight;
            },
            error: function(err) {
                alert('Can not load old messages');
            }
        });

        socket.on('message', function (data) {
            data = jQuery.parseJSON(data);
            if (data.user_id !== user_id){
                $("#messages").append( "<div class='wrap_messeage visitors' ><div class='username'>"+data.user_name+ ':'+"</div><div class='message'>"+data.message+"</div></div>" );
            }
            $('#messages')[0].scrollTop = $('#messages')[0].scrollHeight;

        });

        $(".send-msg").click(function(e){
            e.preventDefault();
            var user_id = $("input[name='user_id']").val();
            var user_name = $("input[name='user_name']").val();
            var msg = $("#txtMessage").val();
            var token = $("input[name='_token']").val();

            $("#messages").append( "<div class='wrap_messeage currentRoom' ><div class='message'>"+msg+"</div><div class='username'>"+ ':' +user_name+ "</div></div>" );
            $('#messages')[0].scrollTop = $('#messages')[0].scrollHeight;

            if(msg != ''){
                $.ajax({
                    type: "post",
                    url: '/sendMessage',
                    dataType: "json",
                    data: {'_token':token,'message':msg,'user_id':user_id, 'user_name':user_name},
                    success:function(data){
                        $(".msg").val('');
                    }
                });
            }else{
                alert("入力してから送信してください");
            }
        })

        socket.on('typing',function(){
            $('#type_notification').html('<div class="typing"><img width="50px" heigh="20px" src="../images/typing.gif">'+'誰が入力している</div>');
        });
        socket.on('stop typing',function(){
            $('#type_notification').html('');
        });
        $(document).ready(function() {
            $('#txtMessage').focusin(function () {
                socket.emit("i typing");
            });
            $('#txtMessage').focusout(function () {
                socket.emit("i stop typing");
            });
        });
    </script>
@endsection
