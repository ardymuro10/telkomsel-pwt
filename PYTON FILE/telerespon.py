import requests
import telebot
import logging
from telebot import types

bot = telebot.TeleBot('5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0')
#debug/log {
requests.logging.getLogger()
log = logging.getLogger('urllib3')
log.setLevel(logging.DEBUG)
#}

@bot.message_handler(func=lambda message: True)
def echo_all(message):
    print(message.text)
    with requests.Session() as connection: #request session
            connection.headers.update(
            {
                "Accept": "application/json",
                # "Content-Type": "text/html; charset=UTF-8",
                "User-Agent":"Chrome/89.0.4389.86 YaBrowser/21.3.0.740",
            }
        )
    if message.text == "/start" :

        id_chatnya = message.from_user.id
        url = 'https://pelayanan-gmlwetan.site/request/post-data2'
        myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
        print(id_chatnya)
        _ = connection.get("https://pelayanan-gmlwetan.site/login")
        response = connection.get('https://pelayanan-gmlwetan.site/login')
        print(response.status_code)
        x = connection.post(url, data = myobj)
        print(url)
        print(x.text)

        if(x.text == "TidakAda") : #kirim post session 1

            markup = types.ReplyKeyboardMarkup(row_width=2)
            itembtn1 = types.KeyboardButton('Pelayanan Surat')
            itembtn2 = types.KeyboardButton('Informasi Orang Meninggal')
            itembtn3 = types.KeyboardButton('Aspirasi Masyarakat')
            markup.add(itembtn1, itembtn2, itembtn3)

            bot.reply_to(message, "Silakan pilih menu",reply_markup=markup)
    elif message.text == "Surat Pengantar" :
        id_chatnya = message.from_user.id
        url = 'http://pelayanan-gmlwetan.site/request/post-data3'
        myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
        connection.post(url, data = myobj)
    elif message.text == "Surat Keterangan Miskin" :
        id_chatnya = message.from_user.id
        url = 'http://pelayanan-gmlwetan.site/request/post-data4'
        myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
        connection.post(url, data = myobj)
    elif message.text == "Surat Keterangan Domisili" :
        id_chatnya = message.from_user.id
        url = 'http://pelayanan-gmlwetan.site/request/post-data5'
        myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
        connection.post(url, data = myobj)
    elif message.text == "Surat Beda Data" :
        id_chatnya = message.from_user.id
        url = 'http://pelayanan-gmlwetan.site/request/post-data6'
        myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
        connection.post(url, data = myobj)
    else :
        id_chatnya = message.from_user.id
        url = 'http://pelayanan-gmlwetan.site/request/post-data2'
        myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
        x = connection.post(url, data = myobj)
        if(x.text == "pilih_surat") :

            url = 'http://pelayanan-gmlwetan.site/request/post-data2'
            myobj = {'id_tele': str(id_chatnya), 'text' : message.text}

            markup = types.ReplyKeyboardMarkup(row_width=2)
            itembtn1 = types.KeyboardButton('Surat Keterangan Usaha')
            itembtn2 = types.KeyboardButton('Surat Pengantar')
            itembtn3 = types.KeyboardButton('Surat Keterangan Miskin')
            itembtn4 = types.KeyboardButton('Surat Keterangan Domisili')
            itembtn5 = types.KeyboardButton('Surat Beda Data')
            markup.add(itembtn1, itembtn2, itembtn3, itembtn4, itembtn5)

            #kirim post session 1

            bot.reply_to(message, "Silakan pilih surat ",reply_markup=markup)
        elif(x.text == "masukan_nama") :
            url = 'http://pelayanan-gmlwetan.site/request/post-data2'
            myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
            bot.reply_to(message, "Silakan masukan nama lengkap Anda ")

        elif(x.text == "nomor_ktp") :
            url = 'http://pelayanan-gmlwetan.site/request/post-data2'
            myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
            bot.reply_to(message, "Silakan masukan nomor KTP Anda ")

        elif(x.text == "kota_lahir") :
            url = 'http://pelayanan-gmlwetan.site/request/post-data2'
            myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
            bot.reply_to(message, "Silakan masukan tempat lahir Anda ")

        elif(x.text == "tanggal_lahir") :
            url = 'http://pelayanan-gmlwetan.site/request/post-data2'
            myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
            bot.reply_to(message, "Silakan masukan tanggal lahir Anda. Contoh : Tahun-Bulan-Hari (1999-10-01) ")

        elif(x.text == "status_nikah") :
            url = 'http://pelayanan-gmlwetan.site/request/post-data2'
            myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
            bot.reply_to(message, "Silakan masukan status perkawinan Anda (Kawin/Belum Kawin/Cerai) ")

        elif(x.text == "alamat") :
            url = 'http://pelayanan-gmlwetan.site/request/post-data2'
            myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
            bot.reply_to(message, "Silakan masukan alamat rumah Anda. Contoh : Dusun/Gerumbul sesuai KTP (Werak) ")

        elif(x.text == "rtrw") :
            url = 'http://pelayanan-gmlwetan.site/request/post-data2'
            myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
            bot.reply_to(message, "Silakan masukan RT dan RW tempat tinggal Anda. Contoh : RT/RW (04/12) ")

        elif(x.text == "jenis_usaha") :
            url = 'http://pelayanan-gmlwetan.site/request/post-data2'
            myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
            bot.reply_to(message, "Silakan masukan jenis usaha Anda")

        elif(x.text == "jenis_barang") :
            url = 'http://pelayanan-gmlwetan.site/request/post-data2'
            myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
            bot.reply_to(message, "Silakan masukan jenis barang dari usaha Anda")

        elif(x.text == "tahun_mulai_usaha") :
            url = 'http://pelayanan-gmlwetan.site/request/post-data2'
            myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
            bot.reply_to(message, "Silakan masukan tahun Anda memulai usaha")

        elif(x.text == "alamat_usaha") :
            url = 'http://pelayanan-gmlwetan.site/request/post-data2'
            myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
            bot.reply_to(message, "Silakan masukan alamat usaha Anda")

        elif(x.text == "Pilih_Layn") :

            markup = types.ReplyKeyboardMarkup(row_width=2)
            itembtn1 = types.KeyboardButton('Pelayanan Surat')
            itembtn2 = types.KeyboardButton('Informasi Orang Meninggal')
            itembtn3 = types.KeyboardButton('Aspirasi Masyarakat')
            markup.add(itembtn1, itembtn2, itembtn3)

            #kirim post session 1

            bot.reply_to(message, "Silakan pilih menu",reply_markup=markup)

        elif(x.text == "close") :
            url = 'http://pelayanan-gmlwetan.site/request/post-data2'
            myobj = {'id_tele': str(id_chatnya), 'text' : message.text}
            bot.reply_to(message, "Terima kasih, data surat sudah terinput. Silakan datang ke kantor Pemerintah Desa Gumelem Wetan untuk pengambilan surat. Silahkan tekan /start untuk memulai ulang menu.")

while True:
    try:
        bot.polling()
    except:
        pass
