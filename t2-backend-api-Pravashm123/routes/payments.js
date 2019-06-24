var express = require("express");
var payments = require("../models/payments");
var verify = require("../verify");
var router = express.Router();

router
  .route("/")
  .get((req, res, next) => {
    payments
      .find({})
      .then(
        payments => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(payments);
        },
        err => next(err)
      )
      .catch(err => next(err));
  })
  .post((req, res, next) => {
    payments
      .create(req.body)
      .then(
        payments => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(payments);
        },
        err => next(err)
      )
      .catch(err => next(err));
  })
  .put((req, res, next) => {
    res.statusCode = 403;
    res.end("PUT operation not supported!");
  })
  .delete((req, res, next) => {
    payments
      .deleteMany({})
      .then(
        reply => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(reply);
        },
        err => next(err)
      )
      .catch(err => next(err));
  });

router
  .route("/:id")
  .get((req, res, next) => {
    payments
      .findById(req.params.id)
      .then(
        payments => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(payments);
        },
        err => next(err)
      )
      .catch(err => next(err));
  })
  .post((req, res, next) => {
    res.statusCode = 403;
    res.end("POST operation not supported!");
  })
  .put((req, res, next) => {
    payments
      .findByIdAndUpdate(
        req.params.id,
        { $set: req.body },
        { new: true, useFindAndModify: false }
      )
      .then(
        payments => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(payments);
        },
        err => next(err)
      )
      .catch(err => next(err));
  })
  .delete((req, res, next) => {
    payments
      .findByIdAndDelete(req.params.id)
      .then(
        reply => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(reply);
        },
        err => next(err)
      )
      .catch(err => next(err));
  });

module.exports = router;
