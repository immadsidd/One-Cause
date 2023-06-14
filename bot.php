
    <div class="container">
        <div class="chatbox">
            <div class="chatbox__support">
                <div class="chatbox__header">
                    <div class="chatbox__image--header">
                        <img src="image/assets/logo.png" width="50px"alt="image">
                    </div>
                    <div class="chatbox__content--header">
                        <h4 class="chatbox__heading--header">Chat support</h4>
                    </div>
                </div>
                <div class="chatbox__messages">
                    <div>
                    <div class="form">
                        <div class="messages__item messages__item--visitor">
                            <div class="msg-header">
                                <p>Hello there, how can I help you?</p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="chatbox__footer">
                    <div class="typing-field">
                        <div class="input-data">
                            <input id="data" type="text" placeholder="Type something here.." required>
                            <button id="send-btn">Send</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chatbox__button">
                <button class="button1">button</button>
            </div>
        </div>
    </div>

    <script src="js/Chat2.js"></script>
    <script>

        $(document).ready(function () {
            $(".input-data").keydown(function(e) {
             if(e.which == 13) {
    $value = $("#data").val();
                $msg = '<div class="messages__item messages__item--operator"><div class="msg-header"><p>' + $value + '</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text=' + $value,
                    success: function (result) {
                        $replay = '<div class="messages__item messages__item--visitor"><div class="msg-header"><p>' + result + '</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
  }
});
            $("#send-btn").on("click", function () {
                $value = $("#data").val();
                $msg = '<div class="messages__item messages__item--operator"><div class="msg-header"><p>' + $value + '</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text=' + $value,
                    success: function (result) {
                        $replay = '<div class="messages__item messages__item--visitor"><div class="msg-header"><p>' + result + '</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
