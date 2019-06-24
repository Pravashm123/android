var express = require("express");
var employee = require("../models/employee");
var verify = require("../verify");
var router = express.Router();

router
  .route("/")
  .get((req, res, next) => {
    employee
      .find({})
      .then(
        employee => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(employee);
        },
        err => next(err)
      )
      .catch(err => next(err));
  })
  .post((req, res, next) => {
    employee
      .create(req.body)
      .then(
        employee => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(employee);
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
    employee
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
    employee
      .findById(req.params.id)
      .then(
        employee => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(employee);
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
    employee
      .findByIdAndUpdate(
        req.params.id,
        { $set: req.body },
        { new: true, useFindAndModify: false }
      )
      .then(
        employee => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(employee);
        },
        err => next(err)
      )
      .catch(err => next(err));
  })
  .delete((req, res, next) => {
    employee
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
