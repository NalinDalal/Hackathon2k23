var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index');
});
router.get('/categories', function(req, res, next) {
  res.render('categories');
});
router.get('/cart', function(req, res, next) {
  res.render('cart');
});
router.get('/orders', function(req, res, next) {
  res.render('orders');
});
router.get('/account', function(req, res, next) {
  res.render('account');
});
router.get('/signin', function(req, res, next) {
  res.render('signin');
});
router.get('/signup', function(req, res, next) {
  res.render('signup');
});
// Routing page for storing data
router.get('/data', function(req, res, next) {
  var store = req.query
  res.json(store)
});
router.get('/register', function(req, res, next) {
  var store = req.query
  res.json(store)
});
module.exports = router;
