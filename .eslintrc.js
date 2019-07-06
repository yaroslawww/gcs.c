module.exports = {
    root: true,
    env: {
        node: true
    },
    'extends': [
        'eslint:recommended',
        'plugin:vue/recommended'
    ],
    rules: {
        "comma-dangle": [1, "always"],
        "semi": [1, "never"]
    },
    parserOptions: {
        parser: 'babel-eslint'
    }
};
