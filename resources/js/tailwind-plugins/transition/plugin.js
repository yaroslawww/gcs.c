const defaultConfig = require('./defaultConfig.js');

module.exports =  (options = {}) => ({ addUtilities, config: userConfig }) => {
    const config = (name) => {
        return (name in options)
            ? options[name]
            : userConfig(name, defaultConfig[name]);
    };

    const variants = config('transitionVariants');
    const prefix = config('transitionPrefix');

    const className = (key, modifier = '') => ('default' === key)
        ? prefix
        : `${prefix}${modifier}-${key}`;

    addUtilities({
        [className('default')]: {
            'transition-duration': config('transitionDuration')['default'],
            'transition-property': config('transitionProperty')['default'],
            'transition-timing-function': config('transitionTimingFunction')['default'],
            'transition-delay': config('transitionDelay')['default'],
        }
    })

    // Duration
    addUtilities(Object.entries(config('transitionDuration')).map(([key, value]) => {
        return ('default' === key) ? false : {
            [className(key)]: {
                'transition-duration': value,
            }
        };
    }), variants);

    // Property
    addUtilities(Object.entries(config('transitionProperty')).map(([key, value]) => {
        return ('default' === key) ? false : {
            [className(key, '-property')]: {
                'transition-property': value,
            }
        };
    }), variants);

    // Timing Function
    addUtilities(Object.entries(config('transitionTimingFunction')).map(([key, value]) => {
        return ('default' === key) ? false : {
            [className(key, '-timing')]: {
                'transition-timing-function': value,
            }
        };
    }), variants);

    // Delay
    addUtilities(Object.entries(config('transitionDelay')).map(([key, value]) => {
        return ('default' === key) ? false : {
            [className(key, '-delay')]: {
                'transition-delay': value,
            }
        };
    }), variants);
};