<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {
		case 'hi':
			$textToSpeech = "Hi, Nice to meet you";
			break;

		case 'bye':
			$textToSpeech = "Bye, good night";
			break;

		case 'anything':
			$textToSpeech = "Yes, you can type anything here.";
			break;
		
		default:
			$textToSpeech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}

	$response = new \stdClass();
	$response->fulfillmentText = $textToSpeech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>