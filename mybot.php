<?php
// ob_start();
/**
 * Telegram Bot example.
 * @author Gabriele Grillo <gabry.grillo@alice.it>
 * https://github.com/Eleirbag89/TelegramBotPHP
 */

include("Telegram.php");

//Make var called BOT_TOKEN
if (empty(getenv('BOT_TOKEN'))){
$bot_id = "API_Token";
} else {
$bot_id = getenv('BOT_TOKEN');
}

// Instances the class
$telegram = new Telegram($bot_id);

// Take text and chat_id from the message
$text 			   = $telegram->Text();
$chat_id 		   = $telegram->ChatID();
$user_id		   = $telegram->UserID();
$username 		   = $telegram->Username();
$name 		  	   = $telegram->FirstName();
$family 		   = $telegram->LastName();
$fullName		   =  $name.' '.$family;

$message_id 	   = $telegram->MessageID(); 

$msgType = $telegram->getUpdateType();


if(strtolower($text) == '/start'){
    $web_app = (object)['url' => "https://harely-quinn.github.io/tg-webbot-open-webview/public/demo.html"];

	$option = array( 
		array(
			$telegram->buildWebAppInlineKeyboardButton("Click To Open", $web_app),
		)
	);

	$keyb = $telegram->buildInlineKeyBoard($option);

	$finishText = 'Show Me!';

	$content = array('chat_id' => $user_id, 'message_id' => $message_id, 'text' => $finishText, 'reply_markup' => $keyb);
	$telegram->sendMessage($content);
}
