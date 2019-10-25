module.exports = {
  root: true,
  extends: [
    "standard"
  ],
  parser: "vue-eslint-parser",
  parserOptions: {
    parser: "babel-eslint",
    ecmaVersion: 6,
    sourceType: "module"
  },
  env: {
    es6: true,
    browser: true,
    commonjs: true
  }
}
