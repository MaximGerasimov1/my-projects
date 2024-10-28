<aside>
    <!-- php if(!isset($_COOKIE['login'])): 
        <div class="info">
            <h2>Interesting facts</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis qui labore dolorem explicabo maiores molestias cumque illo nesciunt quidem recusandae.</p>
        </div>
        <img src="https://itproger.com/img/intensivs/node-js.svg" alt="picture in asedi part of website">
    php else:  -->
    <div class="info">
        <h2>Interesting facts</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis qui labore dolorem explicabo maiores molestias cumque illo nesciunt quidem recusandae.</p>
    </div>
    <img src="https://itproger.com/img/intensivs/node-js.svg" alt="picture in asedi part of website">

    <h2 id="block111">User Chat</h2>

    <div class="big_block"></div>

    <div id="this__block">
        <img src="/img/man.png" alt="picture of avatar" id="man_avatar">
        <input type="text" name="login" id="aside_login" value="<?= $_COOKIE['login'] ?>" disabled>
    </div>
    <input type="text" name="chat" id="chat" placeholder="Write a message" maxlength="255">
    <div class="error-mess" id="error-block"></div>
    <button type="submit" id="send_chat">Send message</button>


    <!-- php endif;  -->
    
</aside>