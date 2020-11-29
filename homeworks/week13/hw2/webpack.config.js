const path = require('path');
module.exports = {
    entry: './src//index.js',
    output: {
        filename: 'main.js',
        library: 'commentPlugin',
        path: path.resolve(__dirname, 'dist'),
    }
};