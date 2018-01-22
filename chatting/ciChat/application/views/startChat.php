<?php ob_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"    "http://www.w3.org/TR/html4/strict.dtd"    >
<html lang="en">
<head>
    <title>Gmail/Facebook Like Chat</title>
    <style type="text/css">
        .wrapper
        {
            width: 390px;
            margin: 100px auto;
            clear: both;
        }

        .head
        {
            float: left;
            display: block;
            width: 100%;
        }

        .box
        {
            float: left;
            width: 100%;
            background-color: #FFF3CE;
            padding: 5px;
            border: #FFC928 1px solid;
        }

        .chat
        {
            padding: 5px;
            background-color: #BFBFBF;
            border: 1px solid #333;
            float: left;
            margin-right: 10px;
            font-size: 10px;
        }
         small
        {
            font-size: 8px;
        }

        h2
        {
            margin:0;
            color: #333;
            float: left;
        }
        a
        {
            font-size: 12px;
            text-decoration: none;
        }
        #red
        {
            color: #f00;
            width: 100%;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="box">
            <div class="head">
                <h2>Login</h2>
            </div>
<!--
            <div class="chat">
                <a href="<?=base_url()?>welcome/chat/Bob/Robert">Chat(You with Robert)</a><br>
                Link: <input type="text" name="" readonly="readonly" value="<?=base_url()?>welcome/chat/Bob/Robert"><br>

                <small>Open in one browser</small>
            </div>
            <div class="chat">
                <a href="<?=base_url()?>welcome/chat/Robert/Bob">Chat(Robert with You)</a><br>
                Link: <input type="text" name="" readonly="readonly" value="<?=base_url()?>welcome/chat/Robert/Bob"><br>

                <small>Open in one browser</small>
            </div><br>
-->
            
            <form action="<?php echo base_url('welcome/login');?>" method="post">
                Name <input type="text" name="name" />
                <input type="submit" value="login"/>
            </form>

<!--            <div id="red">There could me more than one instance because someone else might also view this demo at same time.</div>-->
        </div>
    </div>
</body>
</html>
<?php ob_flush(); ?>
