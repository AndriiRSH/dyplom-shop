<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Stripe\Checkout\Session;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    private $dataArray = [];

    public function finalorder()
    {
        return view('finalorder');
    }

    public function checkoutprice(Request $request)
    {
        // Отримання вибраного методу оплати з форми
        $paymentMethod = $request->input('payment-method');
        $dataArray = session('dataArray');
        dd($dataArray);
        // Виконання різних дій в залежності від обраного методу оплати
        if ($paymentMethod === 'checkmo') {
            $totalPrice = Cookie::get('cookieName');
            $order = new Order();
            $order->status = 'unpaid';
            $order->total_price = $totalPrice;
            $order->session_id = session()->getId();
            $order->save();
            dd($order);
            return redirect()->route('finalorder');
        } elseif ($paymentMethod === 'card') {
            return redirect()->route('session');
        }

    }

    public function checkout(Request $request)
    {
        foreach ($request->input('products') as $key => $value){
            $this->dataArray[$key] = $value;
        }
        session(['dataArray' => $this->dataArray]);
        $cookieValue = Cookie::get('cookieName');
        return view('stripe.payment', compact('cookieValue'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('home', compact('categories'));
    }

    public function products(Category $category)
    {
//        $products = $category->products()->get();
        $categories = Category::all();
        $products = $category->products()->paginate(6);
        return view('category.products', compact('products', 'categories'));
    }

    public function product($postId)
    {
        $product = Product::findOrFail($postId);
        $randomProduct = Product::inRandomOrder()->limit(4)->get();
        $categories = Category::all();
        return view('post.show', compact('product','categories', 'randomProduct'));
    }



    public function session(Request $request)
    {
        $cookieValue = Cookie::get('cookieName');

        \Stripe\Stripe::setApiKey(config('stripe.secret_api_key'));

        $session = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency'     => 'UAH',
                        'product_data' => [
                            'name' => 'До сплати:',
                        ],
                        'unit_amount'  => $cookieValue*100,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);
        return redirect()->away($session->url);
    }

    public function success()
{
    return "Works";
}

    public function webhook()
    {
        // Set your endpoint secret
        $endpointSecret = config('stripe.webhook_key');

        // Get the payload from the request
        $payload = @file_get_contents('php://input');
        $sigHeader = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;
//        dd($payload);
        try {
            // Verify the webhook signature
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sigHeader, $endpointSecret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }
        Log::error('tst');

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                // Payment successful

//                $userId = $event->data->object->customer;
//                User::where('stripe_customer_id', $userId)->update(['payment' => 1]);
//                $user = Auth::user();
//
//                if ($user) {
//                    $user->update(['payment' => 1]);
//                }

                $session = $event->data->object;

                $user = User::where('session_id', $session->id)->first();
                if ($user && $user->payment === 0) {
                    $user->payment = 1;
                    $user->save();
                }

                return response('Payment Successful');

            // Add additional cases for other event types if needed

            default:
                return response('');
        }
    }
//    public function checkout()
//    {
//        dd(1);
//        \Stripe\Stripe::setApiKey(config('stripe.secret_api_key'));
//
//        $products = Product::all();
//        $lienaItems = [];
//        $totalPrice = 0;
//        foreach ($products as $product){
//            $totalPrice += $product->price;
//            $lienaItems[] = [
//                    'price_data' => [
//                        'currency'     => 'gbp',
//                        'product_data' => [
//                            'name' => $product->name,
////                            'images' => [$poroduct->image]
//                        ],
//                        'unit_amount'  => $product->price * 100,
//                    ],
//                    'quantity'   => 1,
//            ];
//        }
//
//        $session = Session::create([
//            'line_items' => $lienaItems,
//            'mode'        => 'payment',
//            'success_url' => route('checkout.success', [], true)."?session_id={CHECKOUT_SESSION_ID}",
//            'cancel_url'  => route('checkout.cancel', [], true),
//        ]);
//
//        $order = new Order();
//        $order->status = 'unpaid';
//        $order->total_price = $totalPrice;
//        $order->session_id = $session->id;
//        $order->save();
//
//        return redirect()->away($session->url);
//    }
//
//    public function success(Request $request)
//    {
//        dd(1);
//        \Stripe\Stripe::setApiKey(config('stripe.secret_api_key'));
//        $sessionId = $request->get('session_id');
//
////        $customer = null;
//        try {
//            $session = \Stripe\Checkout\Session::retrieve($sessionId);
//            if (!$session){
//                throw new NotFoundHttpException;
//            }
//            $customer = \Stripe\Customer::retrieve($session->customer);
//            $order = Order::where('session_id', $session->id)->where('status', 'unpaid')->first();
//            if (!$order){
//                throw new NotFoundHttpException();
//            }
//            $order->status = 'paid';
//            $order->save();
//
////            return view()
//        }catch (\Exception $e){
//            throw new NotFoundHttpException();
//        }
//        $categories = Category::all();
//        return view('home', compact('categories'));
//    }

    public function cancel()
    {

    }

//    public function webhook()
//    {
//        // Set your endpoint secret
//        $endpointSecret = config('stripe.webhook_key');
//
//        // Get the payload from the request
//        $payload = @file_get_contents('php://input');
//        $sigHeader = $_SERVER['HTTP_STRIPE_SIGNATURE'];
//        $event = null;
////        dd($payload);
//        try {
//            // Verify the webhook signature
//            $event = \Stripe\Webhook::constructEvent(
//                $payload, $sigHeader, $endpointSecret
//            );
//        } catch (\UnexpectedValueException $e) {
//            // Invalid payload
//            return response('', 400);
//        } catch (\Stripe\Exception\SignatureVerificationException $e) {
//            // Invalid signature
//            return response('', 400);
//        }
//        Log::error('tst');
//        // Handle the event
//        switch ($event->type) {
//            case 'checkout.session.completed':
//                // Payment successful
//
////                $userId = $event->data->object->customer;
////                User::where('stripe_customer_id', $userId)->update(['payment' => 1]);
////                $user = Auth::user();
////
////                if ($user) {
////                    $user->update(['payment' => 1]);
////                }
//
//                $session = $event->data->object;
//
//                $user = User::where('session_id', $session->id)->first();
//                if ($user && $user->payment === 0) {
//                    $user->payment = 1;
//                    $user->save();
//                }
//
//                return response('Payment Successful');
//            // Add additional cases for other event types if needed
//
//            default:
//                return response('');
//        }
//    }

}
