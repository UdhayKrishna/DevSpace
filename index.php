<?php 

$request== file_get_contents("php://input");
$messages=[];
// Building Card
 array_push($messages, array(
    "type"=> "basic_card",
    "platform"=> "google",
    "title"=> "Card title",
    "subtitle"=> "card subtitle",
    "image"=>[
      "url"=>'https://www.apkmirror.com/wp-content/uploads/2016/07/577db70aecc56-384x384.png',
      "accessibility_text"=>'Mint'
      ],
      "formattedText"=> 'Text for card',
      "buttons"=> [
        [
          "title"=> "Help",
          "openUrlAction"=> [
            "url"=> "https://help.mint.com/"
            ]
          ]
        ]
      )
   );
  // Adding simple response (mandatory)
  array_push($messages, array(
     "type"=> "simple_response",
     "platform"=> "google",
     "textToSpeech"=> "Here is speech and additional msg for card"
    )
  );
  
  
  $response=array(
          "source" => $request["result"]["source"],
          "fulfillmentText" => "Speech for response",
          "fulfillmentMessages" => $messages,
          "outputContexts" => array()
      );
 echo json_encode($response);

?>