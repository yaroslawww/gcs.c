module.exports = {
    methods: {
        /**
         * Translate the given key.
         */
        __(key, replace) {
            let translation = (window.appTranslations !== undefined && window.appTranslations[key])
                ? window.appTranslations[key]
                : key

            _.forEach(replace, (value, key) => {
                translation = translation.replace(':' + key, value)
            })

            return translation
        },
    },
}
