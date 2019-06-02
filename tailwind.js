const transitionPlugin = require('./resources/js/tailwind-plugins/transition/plugin')

module.exports = {
    theme: {
        screens: {
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: '1280px',
        },
        fontFamily: {
            body: ['Nunito', 'sans-serif'],
        },
        borderWidth: {
            default: '1px',
            '0': '0',
            '2': '2px',
            '4': '4px',
        },
        extend: {
            colors: {
                gray: {
                    100: '#f7fafc',
                    200: '#edf2f7',
                    300: '#e2e8f0',
                    400: '#cbd5e0',
                    500: '#a0aec0',
                    600: '#718096',
                    700: '#4a5568',
                    800: '#2d3748',
                    900: '#1a202c',
                },
                red: {
                    100: '#fff5f5',
                    200: '#fed7d7',
                    300: '#feb2b2',
                    400: '#fc8181',
                    500: '#f56565',
                    600: '#e53e3e',
                    700: '#c53030',
                    800: '#9b2c2c',
                    900: '#742a2a',
                },
                blue: {
                    100: '#ebf8ff',
                    200: '#bee3f8',
                    300: '#14a7d0',
                    400: '#1384ab',
                    500: '#194f67',
                    600: '#005577',
                    700: '#003c57',
                    800: '#033757',
                    900: '#252E39',
                },
                green: {
                    100: '#f0fff4',
                    200: '#c6f6d5',
                    300: '#9ae6b4',
                    400: '#68d391',
                    500: '#4aac9c',
                    600: '#38a169',
                    700: '#2f855a',
                    800: '#276749',
                    900: '#22543d',
                },
            },
            spacing: {
                '96': '24rem',
                '128': '32rem',
            }
        },
        boxShadow: {
            default: '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)',
            md: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
            lg: '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
            xl: '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
            '2xl': '0 25px 50px -12px rgba(0, 0, 0, 0.25)',
            inner: 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)',
            outline: 'rgba(255, 255, 225, 0.8) 0px 0 10px',
            'outline-error': 'rgba(245, 101, 101, 0.8) 0px 0 10px',
            none: 'none',
        },
    },
    plugins: [
        transitionPlugin()
    ]
}