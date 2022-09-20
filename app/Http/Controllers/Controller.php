<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use mysqli;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function viewPostData()
	{
    	return view('request.post-data');
	}

	public function processPostData(Request $request)
	{
    	echo 'Nama: ' . $request->nama . '<br>';
    	echo 'Email: ' . $request->email;
	}

	public function processPostData2(Request $request)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal_input = date('Y-m-d H:i:s');
		$koneksi = mysqli_connect("localhost","pelaya12_gumelemwetan","Gumelem123.","pelaya12_pelayanansurat");
		$id_tele = $request->id_tele;
		$id_tele2 = $request->id_tele;
		$text = $request->text;
    	$cek = mysqli_query($koneksi,"SELECT * FROM user_session WHERE id_telegram='".$id_tele."'");

    	if(mysqli_num_rows($cek)>0){
		  	$ambil_data	= mysqli_fetch_array($cek);
		  	$cek_session = $ambil_data['num_session'];


		  	if($text == "/start"){
		  		$cekqu = mysqli_query($koneksi,"DELETE FROM user_session WHERE id_telegram='".$id_tele."'");
		  		$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan tekan /start kembali untuk memulai menu awal'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );

		  	}else{
                $cekop = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user_session WHERE id_telegram = '$id_tele2'"));
                $tablenya = "";
                if($cekop['num_session'] < 14){
                    $tablenya = "business_infos";

                }elseif($cekop['num_session'] > 13 && $cekop['num_session'] < 29){
                    $tablenya = "cover_letters";

                }elseif($cekop['num_session'] > 28 && $cekop['num_session'] < 35){
                    $tablenya = "mail_poors";

                }elseif($cekop['num_session'] > 34 && $cekop['num_session'] < 45){
                    $tablenya = "certificates";

                }elseif($cekop['num_session'] > 49 && $cekop['num_session'] < 53){
                    $tablenya = "mail_poors";

                }elseif($cekop['num_session'] == 55){
                    $tablenya = "cover_letters";

                }elseif($cekop['num_session'] > 59 && $cekop['num_session'] < 69){
                    $tablenya = "different_data";

                }elseif($cekop['num_session'] > 69 && $cekop['num_session'] < 72){
                    $tablenya = "public_complaints";

                }elseif($cekop['num_session'] > 72 && $cekop['num_session'] < 77){
                    $tablenya = "user_lists";
                }
		  		$cekcvbw = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM $tablenya WHERE telegram_id LIKE '%$id_tele%' ORDER BY id DESC"));
                if(!empty($cekcvbw['id'])){
                    $id_ori =$cekcvbw['id'];
                }


		  		switch ($cek_session) {
			  		case '1':
                    $koneksi = mysqli_connect("localhost","pelaya12_gumelemwetan","Gumelem123.","pelaya12_pelayanansurat");
                    $cek_pengguna = mysqli_query($koneksi,"SELECT * FROM user_lists WHERE telegram_id='$id_tele2'");
                    $gass = mysqli_num_rows($cek_pengguna);
                    if($gass<1){
                        $tambah_session = $cek_session+72;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");
                        $apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'User anda belum terdaftar, Silakan masukan nomor HP Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
                    }else{
                        //echo $cekqu;
                        if($text == "Pelayanan Surat"){
                            $tambah_session = $cek_session+1;
                            $cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");
                            echo "pilih_surat";
                        }elseif($text == "Aspirasi Masyarakat"){
                            $id_tele = $request->id_tele;
                            $id_tele2 = $request->id_tele;

                            mysqli_query($koneksi,"INSERT INTO public_complaints(id, telegram_id) VALUES (null,'$id_tele')");
                            mysqli_query($koneksi,"UPDATE user_session SET num_session='70' WHERE id_telegram='$id_tele2'");

                            $apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
                            $data = [
                                    'chat_id' => $id_tele2,
                                    'text' => 'Silakan masukan nama lengkap Anda'
                                    ];
                            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
                        }elseif($text == "Informasi Orang Meninggal"){
                            $id_tele = $request->id_tele;
                            $id_tele2 = $request->id_tele;

                            $querydeath = mysqli_query($koneksi,"SELECT * FROM death_people ORDER BY burial_date DESC");
                            $pesan_balikxc = "Berikut daftar 10 orang meninggal terbaru : \n| No | Nama | Tanggal Lahir | Tanggal Meninggal | Tempat Pemakaman |\n";
                                    $i = 1;
                                    while($oke = mysqli_fetch_array($querydeath))
                                    {
                                        if($i < 11){
                                            $pesan_balikxc .= "| ".$i.". | ".$oke['name']." | ".$oke['birth_date']." | ".$oke['burial_date']." | ".$oke['burial_place']." |\n";
                                            $i++;
                                        }
                                    }
                                    $pesan_balikxc .= "Untuk data yang lebih lengkap silahkan datang ke kantor Pemerintah Desa Gumelem Wetan. \nSilahkan tekan /start untuk memulai ulang menu.";

                            $apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
                            $data = [
                                    'chat_id' => $id_tele2,
                                    'text' => $pesan_balikxc
                                    ];
                            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
                            $cekqu = mysqli_query($koneksi,"DELETE FROM user_session WHERE id_telegram='".$id_tele."'");
                        }
                    }

			  			break;
			  		case '2':
			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			//echo $cekqu;
			  			echo "masukan_nama";
			  			break;

			  		case '3':
			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"INSERT INTO business_infos(id, telegram_id, name) VALUES (NULL,'$id_tele','$text')");
			  			//echo $cekqu;
			  			echo "nomor_ktp";
			  			break;

			  		case '4':

				  		if(strlen($text)<16){
				  			$pesan_balikxc = "No KTP yang dikirimkan tidak sesuai. Mohon kirimkan ulang NO KTP yang sesuai dengan format angka 16 digit.";
				  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
                            $data = [
                                    'chat_id' => $id_tele2,
                                    'text' => $pesan_balikxc
                                    ];
                            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );

				  		}else{
				  			$tambah_session = $cek_session+1;
				  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

				  			$cekqu2 = mysqli_query($koneksi,"UPDATE business_infos SET identity_number='$text' WHERE id='$id_ori'");
				  			//echo $cekqu;

				  			echo "kota_lahir";

				  		}

				  			break;

			  		case '5':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE business_infos SET birth_place='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "tanggal_lahir";
			  			break;

			  		case '6':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE business_infos SET birth_date='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "status_nikah";
			  			break;

			  		case '7':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE business_infos SET marriage_status='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "alamat";
			  			break;

			  		case '8':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE business_infos SET address='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "rtrw";
			  			break;

			  		case '9':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$ambilrtrw = explode("/", $text);
			  			$rt = $ambilrtrw[0];
			  			$rw = $ambilrtrw[1];

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE business_infos SET rt='$rt',rw='$rw' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "jenis_usaha";
			  			break;

			  		case '10':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE business_infos SET jenisusaha='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "jenis_barang";
			  			break;

			  		case '11':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE business_infos SET jenisbarang='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "tahun_mulai_usaha";
			  			break;

			  		case '12':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE business_infos SET mulaiusaha='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "alamat_usaha";
			  			break;

			  		case '13':

			  			$cekqu = mysqli_query($koneksi,"DELETE FROM user_session WHERE id_telegram='".$id_tele."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE business_infos SET lokasiusaha='$text' WHERE id='$id_ori'");
			  			$cekqu3 = mysqli_query($koneksi,"UPDATE business_infos SET created_at='$tanggal_input' WHERE id='$id_ori'");

                        //echo $cekqu;
			  			echo "close";
			  			break;

			  		case '14':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET name='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan nomor KTP Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;
			  		case '15':

			  		if(strlen($text)<16){
				  			$pesan_balikxc = "No KTP yang dikirimkan tidak sesuai. Mohon kirimkan ulang NO KTP yang sesuai dengan format angka 16 digit.";
				  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
                            $data = [
                                    'chat_id' => $id_tele2,
                                    'text' => $pesan_balikxc
                                    ];
                            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );

				  		}else{
				  			$tambah_session = $cek_session+1;
				  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

				  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET identity_number='$text' WHERE id='$id_ori'");
				  			//echo $cekqu;
				  			echo "ehhre";
				  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
							$data = [
	      						'chat_id' => $id_tele2,
	      						'text' => 'Silakan masukan jenis kelamin Anda (Laki-laki/Perempuan)'
	  							];
	  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );

				  		}
			  			break;

			  		case '16':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET gender='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan tempat lahir Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '17':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET birth_place='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan tanggal lahir Anda. Contoh : Tahun-Bulan-Hari (1999-10-01)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '18':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET birth_date='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan status kewarganegaraan Anda (WNI/WNA)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '19':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET nationality='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan agama Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '20':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET religion='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan status perkawinan Anda (Kawin/Belum Kawin/Cerai)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '21':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET marriage_status='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan pekerjaan Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '22':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET occupation='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan pendidikan terakhir Anda (SD/SLTP/SLTA/D1-3/S1-3)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '23':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET education='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan RT dan RW tempat tinggal Anda. Contoh : RT/RW (04/12)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '24':

			  			$text2 = explode("/", $text);
			  			$rt = $text2[0];
			  			$rw = $text2[1];
			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET rt='$rt',rw='$rw' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan alamat rumah Anda. Contoh : Dusun/Gerumbul sesuai KTP (Werak)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '25':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET address='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan keterangan bukti diri'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '26':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET proof_of_self='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan kebutuhan surat Anda '
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '27':

			  			$tambah_session = $cek_session+28;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET necessity='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan tanggal berlaku surat. Contoh : Tahun-Bulan-Hari (1999-10-01)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '28':

			  			//$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"DELETE FROM cover_letters WHERE id_telegram='".$id_tele."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET description='$text' WHERE id='$id_ori'");
                          $cekqu3 = mysqli_query($koneksi,"UPDATE cover_letters SET created_at='$tanggal_input' WHERE id='$id_ori'");

                        //echo $cekqu;
			  			//echo "close";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Terima kasih, data surat sudah terinput. Silakan datang ke kantor Pemerintah Desa Gumelem Wetan untuk pengambilan surat. Silahkan tekan /start untuk memulai ulang menu.'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '29':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE mail_poors SET name='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan nomor KTP Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '30':
			  			if(strlen($text)<16){
				  			$pesan_balikxc = "No KTP yang dikirimkan tidak sesuai. Mohon kirimkan ulang NO KTP yang sesuai dengan format angka 16 digit.";
				  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
                            $data = [
                                    'chat_id' => $id_tele2,
                                    'text' => $pesan_balikxc
                                    ];
                            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );

				  		}else{
				  			$tambah_session = $cek_session+1;
				  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

				  			$cekqu2 = mysqli_query($koneksi,"UPDATE mail_poors SET identity_number='$text' WHERE id='$id_ori'");
				  			//echo $cekqu;
				  			echo "ehhre";
				  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
							$data = [
	      						'chat_id' => $id_tele2,
	      						'text' => 'Silakan masukan jenis kelamin Anda (Laki-laki/Perempuan)'
	  							];
	  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data));
				  		}
			  			break;

			  		case '31':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE mail_poors SET gender='$text' WHERE id='$id_ori'");
			  			echo $id_tele."</br>";
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan tempat lahir Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '32':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE mail_poors SET birth_place='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan RT dan RW tempat tinggal Anda. Contoh : RT/RW (04/12)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '33':

			  			$text2 = explode("/", $text);
			  			$rt = $text2[0];
			  			$rw = $text2[1];
			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE mail_poors SET rt='$rt',rw='$rw' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan alamat rumah Anda. Contoh : Dusun/Gerumbul sesuai KTP (Werak)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '34':

			  			$tambah_session = $cek_session+16;
						$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");
			  			$cekqu2 = mysqli_query($koneksi,"UPDATE mail_poors SET address='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan tanggal lahir Anda. Contoh : Tahun-Bulan-Hari (1999-10-01)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '35':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE certificates SET name='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan nomor KTP Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '36':
			  		if(strlen($text)<16){
				  			$pesan_balikxc = "No KTP yang dikirimkan tidak sesuai. Mohon kirimkan ulang NO KTP yang sesuai dengan format angka 16 digit.";
				  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
                            $data = [
                                    'chat_id' => $id_tele2,
                                    'text' => $pesan_balikxc
                                    ];
                            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );

				  		}else{
				  			$tambah_session = $cek_session+1;
				  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

				  			$cekqu2 = mysqli_query($koneksi,"UPDATE certificates SET identity_number='$text' WHERE id='$id_ori'");
				  			//echo $cekqu;
				  			echo "ehhre";
				  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
							$data = [
	      						'chat_id' => $id_tele2,
	      						'text' => 'Silakan masukan tempat lahir Anda'
	  							];
	  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data));
				  		}
			  			break;

			  		case '37':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE certificates SET birth_place='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan tanggal lahir Anda. Contoh : Tahun-Bulan-Hari (1999-10-01)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '38':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE certificates SET birth_date='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan jenis kelamin Anda (Laki-laki/Perempuan)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '39':

			  			$tambah_session = $cek_session+2;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE certificates SET gender='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan status kewarganegaraan Anda (WNI/WNA)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '41':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE certificates SET nationality='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan agama Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '42':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE certificates SET religion='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan RT dan RW tempat tinggal Anda. Contoh : RT/RW (04/12)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '43':

			  			$text2 = explode("/", $text);
			  			$rt = $text2[0];
			  			$rw = $text2[1];
			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE certificates SET rt='$rt',rw='$rw' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan alamat rumah Anda. Contoh : Dusun/Gerumbul sesuai KTP (Werak)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		case '44':

			  			//$tambah_session = $cek_session+1;
			  			$cekqu2 = mysqli_query($koneksi,"UPDATE certificates SET address='$text' WHERE id='$id_ori'");
			  			$cekqu3 = mysqli_query($koneksi,"UPDATE certificates SET created_at='$tanggal_input' WHERE id='$id_ori'");

                        //echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Terima kasih, data surat sudah terinput. Silakan datang ke kantor Pemerintah Desa Gumelem Wetan untuk pengambilan surat. Silahkan tekan /start untuk memulai ulang menu.'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

					case '50':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE mail_poors SET birth_date='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan pekerjaan Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

					case '51':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE mail_poors SET occupation='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan kebutuhan surat Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

					case '52':

						$cekqu = mysqli_query($koneksi,"DELETE FROM user_session WHERE id_telegram='".$id_tele."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE mail_poors SET necessity='$text' WHERE id='$id_ori'");
			  			$cekqu3 = mysqli_query($koneksi,"UPDATE mail_poors SET created_at='$tanggal_input' WHERE id='$id_ori'");

                        //echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Terima kasih, data surat sudah terinput. Silakan datang ke kantor Pemerintah Desa Gumelem Wetan untuk pengambilan surat. Silahkan tekan /start untuk memulai ulang menu.'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

					case '55':

			  			$tambah_session = $cek_session-27;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE cover_letters SET valid_from='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan deskripsi sesuai kebutuhan surat Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '60':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE different_data SET name='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan nomor KTP Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '61':
                    	if(strlen($text)<16){
				  			$pesan_balikxc = "No KTP yang dikirimkan tidak sesuai. Mohon kirimkan ulang NO KTP yang sesuai dengan format angka 16 digit.";
				  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
                            $data = [
                                    'chat_id' => $id_tele2,
                                    'text' => $pesan_balikxc
                                    ];
                            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );

				  		}else{
				  			$tambah_session = $cek_session+1;
				  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

				  			$cekqu2 = mysqli_query($koneksi,"UPDATE different_data SET identity_number='$text' WHERE id='$id_ori'");
				  			//echo $cekqu;
				  			echo "ehhre".$id_tele;
				  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
							$data = [
	      						'chat_id' => $id_tele2,
	      						'text' => 'Silakan masukan jenis kelamin Anda, (Laki-laki/Perempuan)'
	  							];
	  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data));
				  		}
			  			break;

                    case '62':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE different_data SET gender='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan tempat lahir Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '63':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE different_data SET birth_place='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan tanggal lahir Anda. Contoh : Tahun-Bulan-Hari (1999-10-01)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '64':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE different_data SET birth_date='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan RT dan RW tempat tinggal Anda. Contoh : RT/RW (04/12)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '65':

			  			$text2 = explode("/", $text);
			  			$rt = $text2[0];
			  			$rw = $text2[1];
			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE different_data SET rt='$rt',rw='$rw' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan alamat rumah Anda. Contoh : Dusun/Gerumbul sesuai KTP (Werak)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '66':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE different_data SET address='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan keterangan dokumen Anda '
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '67':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE different_data SET document='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan nomor sesuai dengan keterangan dokumen Anda '
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '68':

			  			//$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"DELETE FROM cover_letters WHERE id_telegram='".$id_tele."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE different_data SET number='$text' WHERE id='$id_ori'");
                        $cekqu3 = mysqli_query($koneksi,"UPDATE different_data SET created_at='$tanggal_input' WHERE id='$id_ori'");

                        //echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Terima kasih, data surat sudah terinput. Silakan datang ke kantor Pemerintah Desa Gumelem Wetan untuk pengambilan surat. Silahkan tekan /start untuk memulai ulang menu.'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '70':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE public_complaints SET name='$text' WHERE id='$id_ori'");
			  			//echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan aspirasi Anda (Kritik/Saran/Inovasi)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '71':

			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"DELETE FROM user_session WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE public_complaints SET complaint='$text' WHERE id='$id_ori'");
                        $cekqu3 = mysqli_query($koneksi,"UPDATE public_complaints SET created_at='$tanggal_input' WHERE id='$id_ori'");

			  			//echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Terima kasih atas aspirasi yang Anda sampaikan. Silahkan tekan /start untuk memulai ulang menu.'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '73':
			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			mysqli_query($koneksi,"INSERT INTO user_lists(id, telegram_id, nohp) VALUES (null, '$id_tele2', '$text')")or die(mysqli_error($koneksi));
			  			//echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan nama lengkap Anda'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '74':
			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE user_lists SET name='$text' WHERE telegram_id='$id_tele2'");
			  			//echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan alamat rumah Anda. Contoh : Dusun/Gerumbul sesuai KTP (Werak)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '75':
			  			$tambah_session = $cek_session+1;
			  			$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='".$tambah_session."' WHERE id_telegram='".$id_tele2."'");

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE user_lists SET address='$text' WHERE telegram_id='$id_tele2'");
			  			//echo $cekqu;
			  			echo "ehhre".$id_tele;
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Silakan masukan RT dan RW tempat tinggal Anda. Contoh : RT/RW (04/12)'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

                    case '76':
                    	$cekqu = mysqli_query($koneksi,"UPDATE user_session SET num_session='1' WHERE id_telegram='".$id_tele2."'");
                        $text2 = explode("/", $text);
			  			$rt = $text2[0];
			  			$rw = $text2[1];

			  			$cekqu2 = mysqli_query($koneksi,"UPDATE user_lists SET rt='$rt',rw='$rw' WHERE telegram_id='$id_tele2'");
                        $cekqu3 = mysqli_query($koneksi,"UPDATE user_lists SET created_at='$tanggal_input' WHERE telegram_id='$id_tele2'");
			  			//echo $cekqu;
			  			echo "Pilih_Layn";
			  			$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
						$data = [
      						'chat_id' => $id_tele2,
      						'text' => 'Terimakasih, akun telah terdaftar'
  							];
  						$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
			  			break;

			  		default:
			  			echo "erere";
			  			$cekqu = mysqli_query($koneksi,"DELETE FROM user_session WHERE id_telegram='".$id_tele."'");
			  			break;
			  	}
		  	}

    	}else{
    		echo "TidakAda";
    		mysqli_query($koneksi,"INSERT INTO user_session(id_session, id_telegram, num_session) VALUES (null,'$id_tele','1')");
    	}
	}

	public function processPostData3(Request $request)
	{

		$koneksi = mysqli_connect("localhost","pelaya12_gumelemwetan","Gumelem123.","pelaya12_pelayanansurat");
		$id_tele = $request->id_tele;
		$id_tele2 = $request->id_tele;

		mysqli_query($koneksi,"INSERT INTO cover_letters(id, telegram_id) VALUES (null,'$id_tele')");
		mysqli_query($koneksi,"UPDATE user_session SET num_session='14' WHERE id_telegram='$id_tele2'");

		$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
		$data = [
      			'chat_id' => $id_tele2,
      			'text' => 'Silakan masukan nama lengkap Anda'
  				];
  		$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
	}

	public function processPostData4(Request $request)
	{
		$koneksi = mysqli_connect("localhost","pelaya12_gumelemwetan","Gumelem123.","pelaya12_pelayanansurat");
		$id_tele = $request->id_tele;
		$id_tele2 = $request->id_tele;

		mysqli_query($koneksi,"INSERT INTO mail_poors(id, telegram_id) VALUES (null,'$id_tele')");
		mysqli_query($koneksi,"UPDATE user_session SET num_session='29' WHERE id_telegram='$id_tele2'");

		$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
		$data = [
      			'chat_id' => $id_tele2,
      			'text' => 'Silakan masukan nama lengkap Anda'
  				];
  		$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
	}
	public function processPostData5(Request $request)
	{
		$koneksi = mysqli_connect("localhost","pelaya12_gumelemwetan","Gumelem123.","pelaya12_pelayanansurat");
		$id_tele = $request->id_tele;
		$id_tele2 = $request->id_tele;

		mysqli_query($koneksi,"INSERT INTO certificates(id, telegram_id) VALUES (null,'$id_tele')");
		mysqli_query($koneksi,"UPDATE user_session SET num_session='35' WHERE id_telegram='$id_tele2'");

		$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
		$data = [
      			'chat_id' => $id_tele2,
      			'text' => 'Silakan masukan nama lengkap Anda'
  				];
  		$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
	}
    public function processPostData6(Request $request)
	{
		$tam = "";
		$koneksi = mysqli_connect("localhost","pelaya12_gumelemwetan","Gumelem123.","pelaya12_pelayanansurat");
		$id_tele = $request->id_tele;
		$id_tele2 = $request->id_tele;

		mysqli_query($koneksi,"INSERT INTO different_data(id, telegram_id) VALUES (null,'$id_tele')");
		mysqli_query($koneksi,"UPDATE user_session SET num_session='60' WHERE id_telegram='$id_tele2'");

		$apiToken = "5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0";
		$data = [
      			'chat_id' => $id_tele2,
      			'text' => 'Silakan masukan nama lengkap Anda'
  				];
  		$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
	}

}
