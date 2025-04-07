<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Exception\CardException;
use Exception;
use Carbon\Carbon;
use App\Models\Payment;
class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $plan = $request->query('plan', 'Premium');
        
        $planPrices = [
            'Básico' => 0,
            'Premium' => 3000, 
            'Platino' => 50000  
        ];
        return view('pay.checkout', [
            'plan' => $plan,
            'price' => $planPrices[$plan] ?? 34000,
            'formattedPrice' => number_format($planPrices[$plan] ?? 34000, 0, ',', '.')
        ]);
    }

    public function processPayment(Request $request): RedirectResponse
{
    $request->validate([
        'stripeToken' => 'required',
        'plan' => 'required|in:Básico,Premium,Platino',
    ]);

    $planPrices = [
        'Básico' => 0,
        'Premium' => 3400000,
        'Platino' => 5000000
    ];

    $selectedPlan = $request->plan;
    $amount = $planPrices[$selectedPlan];

    if ($amount == 0) {
       
        Payment::create([
            'purchase_amount' => 0,
            'payment_method' => 'Tarjeta Credito', 
            'payment_date' => Carbon::now(),
            'voucher_id' => null,
        ]);

        return redirect()->route('dashboard')->with(
            'success_message',
            'Plan Básico activado correctamente (gratuito)'
        );
    }

    Stripe::setApiKey(env('STRIPE_SECRET'));

    try {
        $charge = Charge::create([
            'amount' => $amount,
            'currency' => 'cop',
            'description' => 'Suscripción a plan '.$selectedPlan,
            'source' => $request->stripeToken,
        ]);

        
        Payment::create([
            'purchase_amount' => $amount / 1000, 
            'payment_method' => 'Tarjeta Credito', 
            'payment_date' => Carbon::now(),
            'voucher_id' => null,
        ]);

        return redirect()->route('dashboard')->with(
            'success_message',
            'Pago de $'.number_format($amount/100, 0, ',', '.').' COP procesado correctamente para el plan '.$selectedPlan
        );

    } catch (CardException $e) {
        return back()->with('error_message', $e->getMessage());
    } catch (Exception $e) {
        return back()->with(
            'error_message',
            'Ocurrió un error al procesar el pago. Por favor intenta nuevamente.'
        );
    }
}
}