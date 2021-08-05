<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Setting;
use Illuminate\Http\Request;
use File;
use Storage;
use Image;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $settings = Setting::all();
            // $offers_list = explode(",", $settings->where('name', 'Offers List')->first()->value);
            return view('settings.index', compact('settings'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $section)
    {

        try {
            $settings = Setting::all();
            if ($section == 'payments') {

                $unit_price = $settings->where('name', 'Unit Price')->first();
                $unit_price->update(['value' => $request->unit_price]);

                $username_poste = $settings->where('name', 'Username Poste')->first();
                $username_poste->update(['value' => $request->username_poste]);

                $password_poste = $settings->where('name', 'Password Poste')->first();
                $password_poste->update(['value' => $request->password_poste]);

                $order_registration_url_poste = $settings->where('name', 'Order Registration Url Poste')->first();
                $order_registration_url_poste->update(['value' => $request->order_registration_url_poste]);

                $order_status_url_poste = $settings->where('name', 'Order Status Url Poste')->first();
                $order_status_url_poste->update(['value' => $request->order_status_url_poste]);

                $offers_list = $settings->where('name', 'Offers List')->first();
                $new_offers_list = $request->offers_list;
                sort($new_offers_list, SORT_NUMERIC);
                $offers_list->update(['value' => implode(",", $new_offers_list)]);
                $destinationPath = 'data/settings/offers/';
                $img = imagecreatetruecolor(100, 40);
                // Create some colors
                $lightsky = imagecolorallocate($img, 135, 206, 250);
                $blue = imagecolorallocate($img, 25, 25, 112);
                foreach ($new_offers_list as $offer) {
                    imagefilledrectangle($img, 0, 0, 99, 39, $lightsky);
                    // The text to draw
                    imagestring($img, 5, 8, 12, $offer . ' Points', $blue);
                    imagesetthickness($img, 14);
                    // Using imagepng() results in clearer text compared with imagejpeg() 
                    imagepng($img, $destinationPath . $offer . '.png');

                    imagefilledrectangle($img, 0, 0, 99, 39, $lightsky);
                    // The text to draw
                    imagestring($img, 5, 48, 12, utf8_encode('نقطة') . $offer, $blue);
                    imagesetthickness($img, 14);
                    // Using imagepng() results in clearer text compared with imagejpeg() 
                    imagepng($img, $destinationPath . $offer . '_ar.png');
                }

                imagefilledrectangle($img, 0, 0, 99, 39, $lightsky);
                imagestring($img, 5, 12, 12, 'Others', $blue);
                imagesetthickness($img, 14);
                imagepng($img, $destinationPath . 'others_en.png');

                imagefilledrectangle($img, 0, 0, 99, 39, $lightsky);
                imagestring($img, 5, 12, 12, 'Autres', $blue);
                imagesetthickness($img, 14);
                imagepng($img, $destinationPath . 'others_fr.png');

                imagefilledrectangle($img, 0, 0, 99, 39, $lightsky);
                imagestring($img, 5, 48, 12, utf8_encode('نقطة'), $blue);
                imagesetthickness($img, 14);
                // Using imagepng() results in clearer text compared with imagejpeg() 
                imagepng($img, $destinationPath . 'others_ar.png');

                imagedestroy($img);
            } else if ($section == 'stamps') {

                $roundStampAr = $request->file('round_stamp_ar');
                if ($roundStampAr) {
                    $round_stamp_ar_file_path = $settings->where('name', 'File Path Of The Round Stamp AR')->first()->value;
                    $image_resize = Image::make($roundStampAr->getRealPath());
                    $image_resize->resize(300, 300);
                    $image_resize->save($round_stamp_ar_file_path);
                    // $image_resize->save(config('settings.ROUND_STAMP_AR_FILE_PATH'));
                }

                $roundStampEn = $request->file('round_stamp_en');
                if ($roundStampEn) {
                    $round_stamp_en_file_path = $settings->where('name', 'File Path Of The Round Stamp EN')->first()->value;
                    $image_resize = Image::make($roundStampEn->getRealPath());
                    $image_resize->resize(300, 300);
                    $image_resize->save($round_stamp_en_file_path);
                }
            } else if ($section == 'agce') {

                $originator_id = $settings->where('name', 'AGCE ORIGINATOR ID')->first();
                $originator_id->update(['value' => $request->originator_id]);
                if (isset($request->digital_signature_activation)) {
                    $digital_signature_activation = $settings->where('name', 'Activate Digital Signature')->first();
                    $digital_signature_activation->update(['value' => 'Yes']);
                } else {
                    $digital_signature_activation = $settings->where('name', 'Activate Digital Signature')->first();
                    $digital_signature_activation->update(['value' => 'No']);
                }

                $agce_ssl_cert_file_path = $settings->where('name', 'File Path Of The AGCE SSL Certificate')->first()->value;
                $agce_ssl_key_file_path = $settings->where('name', 'File Path Of The AGCE SSL Key')->first()->value;

                $file = $request->file('agce_ssl_cert_file');
                if ($file) {
                    Storage::disk('public')->put($agce_ssl_cert_file_path, file_get_contents($file));
                }
                $file = $request->file('agce_ssl_key_file');
                if ($file) {
                    Storage::disk('public')->put($agce_ssl_key_file_path, file_get_contents($file));
                }
            }





            return redirect()->route('settings.index')
                ->with('success', 'Account edited successfully.');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }

    public function word2uni($word)
    {
        $new_word = array();
        $char_type = array();
        $isolated_chars = array('ا', 'د', 'ذ', 'أ', 'آ', 'ر', 'ؤ', 'ء', 'ز', 'و', 'ى', 'ة');
        $all_chars = array(
            'ا' => array(
                'middle'        =>   '&#xFE8E;',
                'isolated'        =>   '&#xFE8D;'
            ),
            'ؤ' => array(
                'middle'        =>   '&#xFE85;',
                'isolated'        =>   '&#xFE86;'
            ),
            'ء' => array(
                'middle'        =>   '&#xFE80;',
                'isolated'        =>   '&#xFE80;'
            ),
            'أ' => array(
                'middle'        =>   '&#xFE84;',
                'isolated'        =>   '&#xFE83;'
            ),
            'آ' => array(
                'middle'        =>   '&#xFE82;',
                'isolated'        =>   '&#xFE81;'
            ),
            'ى' => array(
                'middle'        =>   '&#xFEF0;',
                'isolated'        =>   '&#xFEEF;'
            ),
            'ب' => array(
                'beginning'        =>   '&#xFE91;',
                'middle'        =>   '&#xFE92;',
                'end'            =>   '&#xFE90;',
                'isolated'        =>   '&#xFE8F;'
            ),
            'ت' => array(
                'beginning'        =>   '&#xFE97;',
                'middle'        =>   '&#xFE98;',
                'end'            =>   '&#xFE96;',
                'isolated'        =>   '&#xFE95;'
            ),
            'ث' => array(
                'beginning'        =>   '&#xFE9B;',
                'middle'        =>   '&#xFE9C;',
                'end'            =>   '&#xFE9A;',
                'isolated'        =>   '&#xFE99;'
            ),
            'ج' => array(
                'beginning'        =>   '&#xFE9F;',
                'middle'        =>   '&#xFEA0;',
                'end'            =>   '&#xFE9E;',
                'isolated'        =>   '&#xFE9D;'
            ),
            'ح' => array(
                'beginning'        =>   '&#xFEA3;',
                'middle'        =>   '&#xFEA4;',
                'end'            =>   '&#xFEA2;',
                'isolated'        =>   '&#xFEA1;'
            ),
            'خ' => array(
                'beginning'        =>   '&#xFEA7;',
                'middle'        =>   '&#xFEA8;',
                'end'            =>   '&#xFEA6;',
                'isolated'        =>   '&#xFEA5;'
            ),
            'د' => array(
                'middle'        =>   '&#xFEAA;',
                'isolated'        =>   '&#xFEA9;'
            ),
            'ذ' => array(
                'middle'        =>   '&#xFEAC;',
                'isolated'        =>   '&#xFEAB;'
            ),
            'ر' => array(
                'middle'        =>   '&#xFEAE;',
                'isolated'        =>   '&#xFEAD;'
            ),
            'ز' => array(
                'middle'        =>   '&#xFEB0;',
                'isolated'        =>   '&#xFEAF;'
            ),
            'س' => array(
                'beginning'        =>   '&#xFEB3;',
                'middle'        =>   '&#xFEB4;',
                'end'            =>   '&#xFEB2;',
                'isolated'        =>   '&#xFEB1;'
            ),
            'ش' => array(
                'beginning'        =>   '&#xFEB7;',
                'middle'        =>   '&#xFEB8;',
                'end'            =>   '&#xFEB6;',
                'isolated'        =>   '&#xFEB5;'
            ),
            'ص' => array(
                'beginning'        =>   '&#xFEBB;',
                'middle'        =>   '&#xFEBC;',
                'end'            =>   '&#xFEBA;',
                'isolated'        =>   '&#xFEB9;'
            ),
            'ض' => array(
                'beginning'        =>   '&#xFEBF;',
                'middle'        =>   '&#xFEC0;',
                'end'            =>   '&#xFEBE;',
                'isolated'        =>   '&#xFEBD;'
            ),
            'ط' => array(
                'beginning'        =>   '&#xFEC3;',
                'middle'        =>   '&#xFEC4;',
                'end'            =>   '&#xFEC2;',
                'isolated'        =>   '&#xFEC1;'
            ),
            'ظ' => array(
                'beginning'        =>   '&#xFEC7;',
                'middle'        =>   '&#xFEC8;',
                'end'            =>   '&#xFEC6;',
                'isolated'        =>   '&#xFEC5;'
            ),
            'ع' => array(
                'beginning'        =>   '&#xFECB;',
                'middle'        =>   '&#xFECC;',
                'end'            =>   '&#xFECA;',
                'isolated'        =>   '&#xFEC9;'
            ),
            'غ' => array(
                'beginning'        =>   '&#xFECF;',
                'middle'        =>   '&#xFED0;',
                'end'            =>   '&#xFECE;',
                'isolated'        =>   '&#xFECD;'
            ),
            'ف' => array(
                'beginning'        =>   '&#xFED3;',
                'middle'        =>   '&#xFED4;',
                'end'            =>   '&#xFED2;',
                'isolated'        =>   '&#xFED1;'
            ),
            'ق' => array(
                'beginning'        =>   '&#xFED7;',
                'middle'        =>   '&#xFED8;',
                'end'            =>   '&#xFED6;',
                'isolated'        =>   '&#xFED5;'
            ),
            'ك' => array(
                'beginning'        =>   '&#xFEDB;',
                'middle'        =>   '&#xFEDC;',
                'end'            =>   '&#xFEDA;',
                'isolated'        =>   '&#xFED9;'
            ),
            'ل' => array(
                'beginning'        =>   '&#xFEDF;',
                'middle'        =>   '&#xFEE0;',
                'end'            =>   '&#xFEDE;',
                'isolated'        =>   '&#xFEDD;'
            ),
            'م' => array(
                'beginning'        =>   '&#xFEE3;',
                'middle'        =>   '&#xFEE4;',
                'end'            =>   '&#xFEE2;',
                'isolated'        =>   '&#xFEE1;'
            ),
            'ن' => array(
                'beginning'        =>   '&#xFEE7;',
                'middle'        =>   '&#xFEE8;',
                'end'            =>   '&#xFEE6;',
                'isolated'        =>   '&#xFEE5;'
            ),
            'ه' => array(
                'beginning'        =>   '&#xFEEB;',
                'middle'        =>   '&#xFEEC;',
                'end'            =>   '&#xFEEA;',
                'isolated'        =>   '&#xFEE9;'
            ),
            'و' => array(
                'middle'        =>   '&#xFEEE;',
                'isolated'        =>   '&#xFEED;'
            ),
            'ي' => array(
                'beginning'        =>   '&#xFEF3;',
                'middle'        =>   '&#xFEF4;',
                'end'            =>   '&#xFEF2;',
                'isolated'        =>   '&#xFEF1;'
            ),
            'ئ' => array(
                'beginning'        =>   '&#xFE8B;',
                'middle'        =>   '&#xFE8C;',
                'end'            =>   '&#xFE8A;',
                'isolated'        =>   '&#xFE89;'
            ),
            'ة' => array(
                'middle'        =>   '&#xFE94;',
                'isolated'        =>   '&#xFE93;'
            )
        );
        if (in_array($word[0] . $word[1], $isolated_chars)) {
            $new_word[] = $all_chars[$word[0] . $word[1]]['isolated'];
            $char_type[] = 'not_normal';
        } else {
            $new_word[] = $all_chars[$word[0] . $word[1]]['beginning'];
            $char_type[] = 'normal';
        }
        if (strlen($word) > 4) {
            if ($char_type[0] == 'not_normal') {
                if (in_array($word[2] . $word[3], $isolated_chars)) {
                    $new_word[] = $all_chars[$word[2] . $word[3]]['isolated'];
                    $char_type[] = 'not_normal';
                } else {
                    $new_word[] = $all_chars[$word[2] . $word[3]]['beginning'];
                    $char_type[] = 'normal';
                }
            } else {
                $new_word[] = $all_chars[$word[2] . $word[3]]['middle'];
                $chars_statue[] = 'middle';
                if (in_array($word[2] . $word[3], $isolated_chars)) {
                    $char_type[] = 'not_normal';
                } else {
                    $char_type[] = 'normal';
                }
            }
            $x = 4;
        } else {
            $x = 2;
        }
        for ($x = 4; $x < (strlen($word) - 4); $x++) {
            if ($char_type[count($char_type) - 1] == 'not_normal' and $x % 2 == 0) {
                if (in_array($word[$x] . $word[$x + 1], $isolated_chars)) {
                    $new_word[] = $all_chars[$word[$x] . $word[$x + 1]]['isolated'];
                    $char_type[] = 'not_normal';
                } else {
                    $new_word[] = $all_chars[$word[$x] . $word[$x + 1]]['beginning'];
                    $char_type[] = 'normal';
                }
            } elseif ($char_type[count($char_type) - 1] == 'normal' and $x % 2 == 0) {
                if (in_array($word[$x] . $word[$x + 1], $isolated_chars)) {
                    $new_word[] = $all_chars[$word[$x] . $word[$x + 1]]['middle'];
                    $char_type[] = 'not_normal';
                } else {
                    $new_word[] = $all_chars[$word[$x] . $word[$x + 1]]['middle'];
                    $char_type[] = 'normal';
                }
            }
        }
        if (strlen($word) > 6) {
            if ($char_type[count($char_type) - 1] == 'not_normal') {
                if (in_array($word[$x] . $word[$x + 1], $isolated_chars)) {
                    $new_word[] = $all_chars[$word[$x] . $word[$x + 1]]['isolated'];
                    $char_type[] = 'not_normal';
                } else {
                    if ($word[strlen($word) - 2] . $word[strlen($word) - 1] == 'ء') {
                        $new_word[] = $all_chars[$word[$x] . $word[$x + 1]]['isolated'];
                        $char_type[] = 'normal';
                    } else {
                        $new_word[] = $all_chars[$word[$x] . $word[$x + 1]]['beginning'];
                        $char_type[] = 'normal';
                    }
                }
                $x += 2;
            } elseif ($char_type[count($char_type) - 1] == 'normal') {
                if (in_array($word[$x] . $word[$x + 1], $isolated_chars)) {
                    $new_word[] = $all_chars[$word[$x] . $word[$x + 1]]['middle'];
                    $char_type[] = 'not_normal';
                } else {
                    $new_word[] = $all_chars[$word[$x] . $word[$x + 1]]['middle'];
                    $char_type[] = 'normal';
                }
                $x += 2;
            }
        }
        if ($char_type[count($char_type) - 1] == 'not_normal') {
            if (in_array($word[$x] . $word[$x + 1], $isolated_chars)) {
                $new_word[] = $all_chars[$word[$x] . $word[$x + 1]]['isolated'];
            } else {
                $new_word[] = $all_chars[$word[$x] . $word[$x + 1]]['isolated'];
            }
        } else {
            if (in_array($word[$x] . $word[$x + 1], $isolated_chars)) {
                $new_word[] = $all_chars[$word[$x] . $word[$x + 1]]['middle'];
            } else {
                $new_word[] = $all_chars[$word[$x] . $word[$x + 1]]['end'];
            }
        }
        return implode('', array_reverse($new_word));
    }


    public function images()
    {
        //
        try {
            $settings = Setting::all();
            $certificate_template = $settings->where('name', 'Default Certificate Template')->first();
            $certificate_template = $certificate_template->value;
            return view('settings.certificates-images', compact('settings', 'certificate_template'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }
}
