<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use App\Models\Message;
use App\Mail\ReplyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class FlowerController extends Controller
{
    public function index()
    {
        $flowers = Flower::latest()->get();
        return view('flowers.index', compact('flowers'));
    }

    public function catalog()
    {
        $flowers = Flower::latest()->get();
        return view('flowers.catalog', compact('flowers'));
    }

    public function about()
    {
        return view('flowers.about');
    }

    public function contacts()
    {
        return view('flowers.contacts');
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('flowers.cart', compact('cart'));
    }

    public function addToCart(Flower $flower)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$flower->id])) {
            $cart[$flower->id]['quantity']++;
        } else {
            $cart[$flower->id] = [
                'id' => $flower->id,
                'name' => $flower->name,
                'price' => $flower->price,
                'image' => $flower->image,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Product added to cart');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Product removed from cart');
    }

    public function clearCart()
    {
        session()->forget('cart');

        return back()->with('success', 'Cart cleared');
    }

    public function admin()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $flowers = Flower::latest()->get();
        $messages = Message::latest()->get();

        return view('flowers.admin', compact('flowers', 'messages'));
    }

    public function messages()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $messages = Message::latest()->get();
        return view('flowers.messages', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('flowers', 'public');

        Flower::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $path
        ]);

        return redirect()->route('admin')->with('success', 'Product added successfully');
    }

    public function destroy(Flower $flower)
    {
        if ($flower->image) {
            Storage::disk('public')->delete($flower->image);
        }

        $flower->delete();

        return redirect()->route('admin')->with('success', 'Product deleted successfully');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return back()->with('success', 'Message sent successfully');
    }

    public function replyMessage(Request $request, Message $message)
    {
        $request->validate([
            'reply' => 'required'
        ]);

        try {
            Mail::to($message->email)->send(new ReplyMail($request->reply));
        } catch (\Exception $e) {
            return back()->with('error', 'Email limit reached. Try again later.');
        }

        return back()->with('success', 'Reply sent successfully');
    }

    public function adminLogin()
    {
        return view('flowers.admin-login');
    }

    public function adminLoginPost(Request $request)
    {
        if ($request->email === 'admin@blooma.kz' && $request->password === '12345') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin');
        }

        return back()->with('error', 'Wrong email or password');
    }

    public function adminLogout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }
}