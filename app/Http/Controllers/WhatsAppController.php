<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class WhatsAppController extends Controller
{
    //
    public function sendWhatsAppMessage()
    {
        $twilioSid = 'AC1ad27c534f99a70488afa5bcdc4db72c';
        $twilioToken = '74a5310151354f3b64c809a63140cfe5';
        $twilioWhatsAppNumber = '+17204106503';
        $recipientNumber = '+255758955814'; // Replace with the recipient's phone number in WhatsApp format (e.g., "whatsapp:+1234567890")
        $message = "From kefa Code hapa, acha kuzurura dar rudi kwenu 🚀";

        $twilio = new Client($twilioSid, $twilioToken);

        try {
            $twilio->messages->create(
                $recipientNumber,
                [
                    "from" => $twilioWhatsAppNumber,
                    "body" => $message,
                ]
            );

            return response()->json(['message' => 'WhatsApp message sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
