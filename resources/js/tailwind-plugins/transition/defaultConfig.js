module.exports =  {
    transitionPrefix: '.transition',
    transitionVariants: [],
    transitionDuration: {
        'default': '.25s',
        'slower': '.75s',
        'slow': '.5s',
        'fast': '.15s',
        'faster': '.075s',
    },
    transitionProperty: {
        'default': 'all',
        'all': 'all',
        'none': 'none',
        'bg': 'background',
        'opacity': 'opacity',
        'color': 'color',
        'shadow': 'box-shadow',
    },
    transitionTimingFunction: {
        'default': 'linear',
        'linear': 'linear',
        'ease': 'ease',
        'ease-in': 'ease-in',
        'ease-out': 'ease-out',
        'ease-in-out': 'ease-in-out',
    },
    transitionDelay: {
        'default': '0',
        'long': '.2s',
        'longer': '.3s',
        'longest': '.4s',
        'none': '0s',
    },
};
