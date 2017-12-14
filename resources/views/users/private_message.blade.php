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
    <div class="row" ></div>
    <div class="container spark-screen ">
        <div class="row privateMessage">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-admin">{{ request()->route('user') }}</div>
                    <div class="panel-body">
                        <div id="textArea" class="row">
                            <div id="chatArea" class="col-lg-12" >
                                <div id="messages" class="messages" ></div>
                                <div id="type_notification"></div>
                            </div>

                            <div class="col-lg-12">
                                <form action="{{ route('send.message') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="panel-footer">
                                        <div class="input-group">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                                            <input type="hidden" name="user_name" value="{{ Auth::user()->name }}" >
                                            <input type="text" class="form-control" id="txtMessage" placeholder="入力" required autofocus />
                                            <span class="input-group-btn">
                                                 <button class="btn waves-effect waves-light" type="submit" id="btnChat" >送信
                                                     <i class="material-icons right">send</i>
                                                 </button>
                                            </span>
                                        </div>
                                    </div>
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
        var user_name = $("input[name='user_name']").val();
        var receiverUser = '{{request()->route('user')}}';
        /*switch(supporter) {
            case "supporter1":
                supporter_id = "{{ config('settings.message.supporter1') }}";
                break;
            case "supporter2":
                supporter_id = "{{ config('settings.message.supporter2') }}";
                break;
            default:
                supporter_id = "{{ config('settings.message.supporter1') }}";
        }*/

        $.ajax({
            url: '/getOldMessages',
            type: 'get',
            dataType: 'json',
            data: {
                'is_public':0,
                'receiverUser':receiverUser,
                'user_id':user_id
            },
            success: function(data) {
                $.each(data, function (k, message) {
                    if (message.sender.id == user_id){
                        $('#messages').prepend(
                            "<div class='message my-message'>"+message.content+"</div>"
                        );
                    } else {
                        $('#messages').prepend(
                            "<div class='message'>"+message.content+"</div>"
                        );
                    }
                });
                $('#messages')[0].scrollTop = $('#messages')[0].scrollHeight;
            },
            error: function(err) {
                alert('古いメッセージを読み込めません');
            }
        });
        socket.emit('online');
        socket.emit('register_id', { user_id:user_id });

        socket.on('receive_message', function (data) {

            $("#messages").append( "<div class='message'>"+data.message+"</div>" );
            $('#messages')[0].scrollTop = $('#messages')[0].scrollHeight;

        });

        $("#btnChat").click(function(e){
            e.preventDefault();
            var msg = $("#txtMessage").val();
            var user_id = $("input[name='user_id']").val();
            var token = $("input[name='_token']").val();
            var receiverUser = '{{request()->route('user')}}';

            if(msg != ''){
                socket.emit('send_message',{
                    from:user_id,
                    to:receiverUser,
                    content:msg,
                    username:user_name
                });
                $("#messages").append( "<div class='message my-message'>"+msg+"</div>" );
            }
            $('#messages')[0].scrollTop = $('#messages')[0].scrollHeight;

            if(msg != ''){
                $.ajax({
                    type: "post",
                    url: '/sendMessage',
                    dataType: "json",
                    data: {
                        '_token':token,
                        'message':msg,
                        'user_id':user_id,
                        'receiverUser':receiverUser,
                        'is_public':0
                    },
                    success:function(data){
                        $("#txtMessage").val('');
                    }
                });
            }else{
                alert("入力してから送信してください");
            }
        });
    </script>
@endsection
