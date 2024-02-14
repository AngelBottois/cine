/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.{html,php}',
  './app/vista/*.{html,php}',
  './utiles/js/*.{html,js}',
],
  theme: {
    extend: {
      maxWidth: {
        'screen-xxl': '1600px',
        'screen-2xl': '1500px',
        'screen-xl': '1361px',
      },
      colors: {
        fondohf: '#020510',
        fondo: '#0A031C',
        azul: '#1A2C50',
        amarillo: '#FFBE00',
        pelis: '#1D1731',
        white: '#FFF',
        gray: 'rgba(255, 255, 255, 0.30)',
        gray2: 'rgba(255, 255, 255, 0.10)',
        blur: 'rgba(255, 255, 255, 0.2)',
        form: 'rgba(2, 5, 16, 0.70)',
        rosa: '#FF2C78',
      },
      backgroundImage: {
        'fondoImg': "url('../../img/front/fondoLogin.svg')",
        'lambo': "url('../../img/front/lambo.svg')",
        'guardianes': "url('../../img/front/guardianes.svg')",
        'sombra' : "url('../../img/front/sombra.svg')",
        'butaca' : "url('../../img/front/butaca.svg')"
      }
    },
    fontFamily: {
      'poppins': ['Poppins'],
    },
    fontSize:{
      precio: '60px',
      titulo: '50px',
      subtitulo: '40px',
      subtitulosmall: '30px',
      letra: '18px',
      letrasmall: '16px',
    },
    fontWidth:{
      normal: '400',
      bold: '700',
    },
    container: {
      center: true,
    },
    },
  plugins: [],
}

