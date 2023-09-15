<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Category;
use App\Models\CourseCategory;
use App\Models\Follow;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Skill;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }
    public function addManger(Request $request)
    {

       // return $request->all();
        $request_model =  \App\Models\Request::find($request->id);
        // return $request_model;
        if (isset($request->name)) {
            if ($request->name == 0) {
                $request_model->{strtolower($request->type) . '_manager'} = 0;
                $request_model->{strtolower($request->type) . '_manager_note'} =$request->note;
                $request_model->{strtolower($request->type) . '_manager_name'} = __('site.not_agree');
                $request_model->{strtolower($request->type) . '_manager_date'} = Carbon::now();
            } elseif ($request->name == 1) {
                $request_model->{strtolower($request->type) . '_manager'} = 1;
                $request_model->{strtolower($request->type) . '_manager_note'} =$request->note;
                $request_model->{strtolower($request->type) . '_manager_name'} = __('site.agree');
                $request_model->{strtolower($request->type) . '_manager_date'} = Carbon::now();
            } elseif ($request->name == 2) {
                $request_model->{strtolower($request->type) . '_manager'} = 2;
                $request_model->{strtolower($request->type) . '_manager_note'} =$request->note;
                $request_model->{strtolower($request->type) . '_manager_name'} = __('site.not_competent');
                $request_model->{strtolower($request->type) . '_manager_date'} = Carbon::now();
            }

            $request_model->save();
        } else {
            $request_model->{strtolower($request->type) . '_manager'} = null;
            $request_model->{strtolower($request->type) . '_manager_name'} = null;
            $request_model->{strtolower($request->type) . '_manager_date'} = Carbon::now();
            $request_model->save();
        }

        return response()->json([
            'status' => true,
            'msg' => 'add',
        ]);
    }
    public function addNotes(Request $request)
    {
        $item =  \App\Models\Item::find($request->id);
        if (isset($request->name)) {
            $item->{strtolower($request->type)} = $request->name;
        }
        $item->save();
        return response()->json([
            'status' => true,
            'msg' => 'add',
        ]);
    }

    public function setLanguage($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function dashboard(Request $request)
    {
        $from_date = $request->get('from_date', false);
        $to_date = $request->get('to_date', false);



        return view('dashboard');
    }
    public function report()
    {
        return view('report');
    }
    public function payment(Request $request, $amount = 0.1)
    {
        //        $settings = Settings::find(1);
        //        if($request->con_val != null)
        //        {
        //            $amount = ($request->con_val  * $settings->commission_percentage) / 100;
        //        }[3:22 PM, 8/3/2022] نور الشريف: 5105105105105100
        //[3:22 PM, 8/3/2022] نور الشريف: 31/12
        //[3:22 PM, 8/3/2022] نور الشريف: 999
        $basURL = "https://digitalpayments.alrajhibank.com.sa/pg/payment/hosted.htm";
        $headers = array(
            'Content-type: application/json',
        );
        $response_url = "https://shareeki.net/api/success";
        $error_url = "https://shareeki.net/api/error";
        // List numbers 1 to 20
        $pages = range(1, 1000000);
        // Shuffle numbers
        shuffle($pages);
        // Get a page
        $page = array_shift($pages);
        $amount = round($amount, 1);
        // dd($amount);
        $obj = array(array(
            "amt" => $amount,
            "action" => "1", // 1 - Purchase , 4 - Pre-Authorization
            "password" => 'kf6CJ@R12@V7f!i',
            "id" => '2iZubJ0EJ9l00Ko',
            "currencyCode" => "682",
            "trackId" => "$page",
            "responseURL" => $response_url,
            "errorURL" => $error_url,
            "langid" => "ar",
        ));
        $order = json_encode($obj);
        $code = $this->encryption($order, '20204458918420204458918420204458');
        $decode = $this->decryption($code, '20204458918420204458918420204458');
        $tranData = array(array(
            //Mandatory Parameters
            "id" => '2iZubJ0EJ9l00Ko',
            "trandata" => $code,
            "responseURL" => $response_url,
            "errorURL" => $error_url,
            "langid" => "ar",
        ));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $basURL,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($tranData),
            CURLOPT_HTTPHEADER => $headers,
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return $err;
        } else {
            $result = json_decode($response, true);
            //      dd($result);
            if ($result[0]['status'] == '1') {
                $payment_id = substr($result[0]['result'], 0, 18);
                $url = 'https://digitalpayments.alrajhibank.com.sa/pg/payment/hosted.htm=' . $payment_id;
                //  $url = 'https://digitalpayments.alrajhibank.com.sa/pg/paymentpage.htm?PaymentID=' . $payment_id;

                return redirect()->to($url);
            } else {
                return redirect()->to($error_url);
            }
        }
    }
    function paymentStatus($entityId)
    {
        //        $url = env('HYBERPAY_URL') . "/{$id}/payment";
        //        $url .= "?entityId=" . $entityId;
        $url = 'https://digitalpayments.alrajhibank.com.sa/pg/payment/hosted.htm=' . $entityId;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer ' . env('HYBERPAY_Authorization')));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return json_decode($responseData, true);
    }


    public function encryption($str, $key)
    {
        $blocksize = openssl_cipher_iv_length("AES-256-CBC");
        $pad = $blocksize - (strlen($str) % $blocksize);
        $str = $str . str_repeat(chr($pad), $pad);
        $encrypted = openssl_encrypt($str, "AES-256-CBC", $key, OPENSSL_ZERO_PADDING, "PGKEYENCDECIVSPC");
        $encrypted = base64_decode($encrypted);
        $encrypted = unpack('C*', ($encrypted));
        $chars = array_map("chr", $encrypted);
        $bin = join($chars);
        $encrypted = bin2hex($bin);
        $encrypted = urlencode($encrypted);
        return $encrypted;
    }

    public function decryption($code, $key)
    {
        $string = hex2bin(trim($code));
        $code = unpack('C*', $string);
        $chars = array_map("chr", $code);
        $code = join($chars);
        $code = base64_encode($code);
        $decrypted = openssl_decrypt($code, "AES-256-CBC", $key, OPENSSL_ZERO_PADDING, "PGKEYENCDECIVSPC");
        $pad = ord($decrypted[strlen($decrypted) - 1]);
        if ($pad > strlen($decrypted)) {
            return false;
        }
        if (strspn($decrypted, chr($pad), strlen($decrypted) - $pad) != $pad) {
            return false;
        }
        return urldecode(substr($decrypted, 0, -1 * $pad));
    }
    public function statistics(Request $request)
    {
        $from_date = $request->get('from_date', false);
        $to_date = $request->get('to_date', false);



        $camps = Camp::withCount('followUp')->when($request->country_id, function ($q) use ($request) {
            return $q->where('country_id', $request->country_id);
        })
            ->orderBy('follow_up_count', 'desc')->get();
        foreach ($camps as $camp) {
            //            $city->setAttribute('country_name', $city->country->name);
            $drugsFollowUp = $camp->followUp()->where('type', 'drugsFollowUp');
            $financeFollowUp = $camp->followUp()->where('type', 'financeFollowUp');
            $mediaFollowUp = $camp->followUp()->where('type', 'mediaFollowUp');
            $adminFollowUp = $camp->followUp()->where('type', 'adminFollowUp');
            if ($from_date) {
                $drugsFollowUp = $drugsFollowUp->where('ending_date', '>=', $from_date);
                $financeFollowUp = $financeFollowUp->where('ending_date', '>=', $from_date);
                $mediaFollowUp = $mediaFollowUp->where('ending_date', '>=', $from_date);
                $adminFollowUp = $adminFollowUp->where('ending_date', '>=', $from_date);
            }
            if ($to_date) {
                $drugsFollowUp = $drugsFollowUp->where('ending_date', '<=', $to_date);
                $financeFollowUp = $financeFollowUp->where('ending_date', '<=', $to_date);
                $mediaFollowUp = $mediaFollowUp->where('ending_date', '<=', $to_date);
                $adminFollowUp = $adminFollowUp->where('ending_date', '<=', $to_date);
            }

            $camp->setAttribute('financeFollowUp', $financeFollowUp->count());
            $camp->setAttribute('drugsFollowUp', $drugsFollowUp->count());
            $camp->setAttribute('mediaFollowUp', $mediaFollowUp->count());
            $camp->setAttribute('adminFollowUp', $adminFollowUp->count());
        }
        return view('dashboard2', compact('camps'));
    }
}
