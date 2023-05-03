/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources./**/*.vue",
    ],
  theme: {
    colors: {
        transparent: 'transparent',
        current: 'current',
        'red-custom':{
            50:'#81030d', //dark
            100:'#d22a12', //medium dark
            150:'#f3320d', //medium light
            200:'#fb5115', //light
        },
        'yellow-custom':{
            50:'#b27106', //dark
            100:'#eba503',//medium dark
            150:'#fcc104',//medium light
            200:'#fde701',//light
        },
        'blue-custom':{
            50:'#094069', //dark
            100:'#0257d2',//medium dark
            150:'#046ce9',//medium light
            200:'#00b1fd',//light
        },
        'green-custom':{
            50:'#046e71', //dark
            100:'#00b87d',//medium dark
            150:'#00c586',//medium light
            200:'#00d29f',//light
        },
        'pink-custom':{
            50:'#860068', //dark
            100:'#d4009f',//medium dark
            150:'#da01a3',//medium light
            200:'#f100bd',//light
        },
        'purple-custom':{
            50:'#a10194', //dark
            100:'#b000ab',//medium
            200:'#b101b1',//light
        },
        'black-custom':{
            50:'#000001', //dark
            100:'#070a0b',//medium dark
            150:'#141414',//medium light
            200:'#22211f',//light
        }
    },
   extend: {},
  },
  plugins: [],
}

