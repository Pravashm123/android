var express = require("express");
var expense = require("../models/expense");
var verify = require("../verify");
var router = express.Router();

router
  .route("/")
  .get((req, res, next) => {
    expense.find({})
      .then(
        expense => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(expense);
        },
        err => next(err)
      )
      .catch(err => next(err));
  })
  .post((req, res, next) => {
    expense
      .create(req.body)
      .then(
        expense => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(expense);
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
    expense
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
    expense
      .findById(req.params.id)
      .then(
        expense => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(expense);
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
    expense
      .findByIdAndUpdate(
        req.params.id,
        { $set: req.body },
        { new: true, useFindAndModify: false }
      )
      .then(
        expense => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(expense);
        },
        err => next(err)
      )
      .catch(err => next(err));
  })
  .delete((req, res, next) => {
    expense
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
