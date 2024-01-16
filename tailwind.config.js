/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.{html,php}',
    './app/views/*.{html,php}',
    './app/js/*.{html,js}'
  ],
  theme: {
    extend: {
      backgroundColor:{
        fond_black:'#020510',
        fond_transp:'#FFFFFF33',
        fond_black_2:'#020510B2',
        fond_inicio:'#1D1731',
        button_gray:'#FFFFFF4D',
        button_gray_2:'#FFFFFF1A',
        button_gray_3:'#FFFFFF66',
        button_gray_4:'#FFFFFF26',
        p_rose:'#FF2C78',
        p_rose_2:'#FF2C7880',
        fond_film:'#EBEBEB4D',
        button:'#8F8F8F66',
        shade_300:'rgba(189, 197, 212, 1)',
        checkbox_black:'rgba(2, 5, 16, 0.70)',
        royal_blue:'rgba(26, 44, 80, 1)',
        button_2:'rgba(255, 255, 255, 0.30)',
        button_3:'rgba(255, 255, 255, 0.10)',
        button_4:'rgba(246, 246, 246, 0.40)',
        menu_button:'#1D1731',
        gray:'rgba(235, 235, 235, 0.30)',
      },
      colors:{
        color_button:'#EEEEEE',
        color_button_2:'#CECECE',
        color_gray:'#9E9E9E',
        color_gray_2:'#D8D8D8',
        color_white:'#F0F0F0',
        color_white_2:'rgba(255, 255, 255, 0.9)',
        color_white_3:'rgba(255, 255, 255, 1)',
        color_white_4:'#F2F2F2',
        color_shade_900:'rgba(51, 51, 51, 1)',
        color_shade_700:'rgba(65, 74, 99, 1)',
        color_sky_blue:'rgba(17, 142, 234, 1)',
        checkbox_black:'rgba(2, 5, 16, 0.7)',
        sunshine_yellow:'rgba(255, 190, 0, 1)',
      },
      fontFamily:{
        'poppins':['Poppins'],
        'roboto':['Roboto'],
      },
      backgroundSize:{
        'personalized':'96rem'
      },
      height:{
        'personalized':'43rem',
        '87':'87px',
        '190':'190px',
        '265':'265px',
        '396':'396px',
        '466':'466px',
        '516':'516px',
        '620':'620px',
        '647':'647px',
        '684':'684.488px',
        
      },
      width:{
        '350':'350px',
        '415':'415px',
        '500':'500px',
        '590':'590px',
        '300':'300px',
        '653':'653px',
        '1000':'1395.871px',
        '1001':'1361px',
        '1361':'1361px',
        '1002':'1400.872px',
        '1500':'1500px',
      },
      margin:{
        'personalized':'33rem',
        '151':'151px',
      },
      borderColor:{
        gray:'rgba(143, 143, 143, 0.40)', 
        gray_factura:'#C4C4C4',
        gray_2:'rgba(220, 220, 220, 0.30)',
      }
    },
  },
  plugins: [],
}

