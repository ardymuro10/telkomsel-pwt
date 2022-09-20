import telebot
import requests
import filters
import InlineKeyboardButton
import InlineKeyboardMarkup

bot = telebot.TeleBot('5353145241:AAHuSmz11UYTiHj7TCoIfGJ7WNzlJhzs1I0')

START_MESSAGE = "Selamat Datang di bot Pelayanan Desa Gumelem Wetan."
START_MESSAGE_BUTTONS = [
    [InlineKeyboardButton('Pelayanan Surat')]
]

@bot.on_message(filters.command('start') & filters.private)
def start(bot, message):
    text = START_MESSAGE
    reply_markup = InlineKeyboardMarkup(START_MESSAGE_BUTTONS)
    message.reply(
        text=text,
        reply_markup=reply_markup,
        disable_web_page_preview=True
    )

# # Menghandle Pesan /start
# @bot.message_handler(commands=['start'])
# def welcome(message):
#     # membalas pesan
#     bot.reply_to(message, 'Selamat Datang, @username di bot Pelayanan Desa Gumelem Wetan')

# while True:
#     try:
#         bot.polling()
#     except:
#         pass

#    bot.send_message(message.chat.id, "Selamat Datang di bot Pelayanan Desa Gumelem Wetan.")
