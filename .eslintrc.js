module.exports = {
  env: {
    browser: true,
    es6: true,
    node: true,
    jest: true
  },
  "parser": "babel-eslint",
  extends: 'airbnb',
  globals: {
    Atomics: 'readonly',
    SharedArrayBuffer: 'readonly',
    'BigInt':true,
  },
  parserOptions: {
    ecmaFeatures: {
      jsx: true,
    },
    ecmaVersion: 2018,
  },
  plugins: [
    'react',
  ],
  rules: {
    'no-console': 'off',
    'no-tabs':'off',
    'linebreak-style': ["off", "windows"],
    "indent": ["off", 2],
  },
};
