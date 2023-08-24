<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Auth\OAuthTokenCredential;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Faker\Provider\ar_EG\Payment;
use PayPal\Api\PaymentExecution;

class PaymentController extends Controller
{

    public function show(Course $course)
    {




        $userId = auth()->user()->id;

        // Crea una carpeta con el nombre del usuario si no existe
        $folderPath = "public/students/{$course->id}/{$userId}";
        if (!Storage::exists($folderPath)) {
            Storage::makeDirectory($folderPath);
        }

        $course->students()->attach($userId);

        return redirect()->route('courses.status', $course);
    }

    /* ESTO VA DENTRO DE WEBWOOKS CUANDO SE PASE A PRODUCCION */
    public function paymercado(Course $course, Request $request)
    {
        return $request->all();
    }
    /* ESTO VA DENTRO DE WEBWOOKS CUANDO SE PASE A PRODUCCION */

    public function checkout(Course $course)
    {
        return view('payment.checkout', compact('course'));
    }

    public function pay(Course $course)
    {
        $apiContext =  new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),
                config('services.paypal.client_secret')
            )
        );


        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($course->price->value);
        $amount->setCurrency('MXN');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.approved', $course))
            ->setCancelUrl(route('payment.checkout', $course));

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);





        try {
            $payment->create($apiContext);

            return redirect()->away($payment->getApprovalLink());
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
    }


    public function approved(Request $request, Course $course)
    {

        $apiContext =  new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),
                config('services.paypal.client_secret')
            )
        );



        $paymentId = $_GET['paymentId'];
        $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

        $execution = new \PayPal\Api\PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        $payment->execute($execution, $apiContext);

        $userId = auth()->user()->id;

        $folderPath = "public/students/{$course->id}/{$userId}";
        if (!Storage::exists($folderPath)) {
            Storage::makeDirectory($folderPath);
        }

        $course->students()->attach(auth()->user()->id);

        return redirect()->route('courses.status', $course);
    }
}
