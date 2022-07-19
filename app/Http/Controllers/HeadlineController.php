<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Orhanerday\OpenAi\OpenAi;


class HeadlineController extends Controller
{
    //OpenAI GPT3 Engine names :
    private $engines = [
        "babbage" => "text-babbage-001",
        "curies" => "text-curie-001",
        "ada" => "text-ada-001",
        "davinci" => "text-davinci-002"
    ];

    //Put your OpenAI API Token !
    private $token = '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';


    public function index(Request $request){
        //prompt or you can say user input
        $prompt = "What is Laravel";

        //choose model !
        //Davinci is the most powerful engine
        $engine = $this->engines['davinci'];

        //max tokens you want as an output
        //1 token is almost 0.75 word
        $maxTokens = 1802;
        $open_ai = new OpenAi(env('OPEN_AI_API_KEY'));
        $response = $open_ai->complete([
            'engine' => 'davinci-instruct-beta-v3',
            'prompt' => $prompt,
            'temperature' => 0.7,
            'max_tokens' => $maxTokens,
            'top_p'=> 1,
            "best_of" => 1,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ]);

        dd($response);

        //Now check if the request was successful or not !
        //After checking print result !

        if($response->failed()){
            return "Request Failed !";
        }
        else{

            //OpenAI API result
            return $response['choices'][0]['text'];
        }

    }
    public function store(Request $request){
        //prompt or you can say user input
        $prompt = $request->search;


        //max tokens you want as an output
        //1 token is almost 0.75 word
        $maxTokens = 1802;
        $open_ai = new OpenAi(env('OPEN_AI_API_KEY'));
        $response = $open_ai->complete([
            'engine' => 'davinci-instruct-beta-v3',
            'prompt' => $prompt,
            'temperature' => 0.7,
            'max_tokens' => $maxTokens,
            'top_p'=> 1,
            "best_of" => 1,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ]);

        dd($response);
        return json_encode($response);

    }

    public function show(Request $request)
    {
        //prompt or you can say user input
        $prompt = $request->search;

        dd("this is user =>" .$prompt);
        //max tokens you want as an output
        //1 token is almost 0.75 word
        $maxTokens = 1802;
        $open_ai = new OpenAi(env('OPEN_AI_API_KEY'));
        $response = $open_ai->complete([
            'engine' => 'davinci-instruct-beta-v3',
            'prompt' => $prompt,
            'temperature' => 0.7,
            'max_tokens' => $maxTokens,
            'top_p'=> 1,
            "best_of" => 1,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ]);

        dd($response);
        return response()->json([
            'word' => $response]);
    }
}
