var express = require("express");
var roomreservation = require("../models/roomreservation");
var verify = require("../verify");
var router = express.Router();

router
  .route("/")
  .get((req, res, next) => {
    roomreservation
      .find({})
      .then(
        roomreservation => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(roomreservation);
        },
        err => next(err)
      )
      .catch(err => next(err));
  })
  .post((req, res, next) => {
    roomreservation
      .create(req.body)
      .then(
        roomreservation => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(roomreservation);
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
    roomreservation
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
    roomreservation
      .findById(req.params.id)
      .then(
        roomreservation => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(roomreservation);
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
    roomreservation
      .findByIdAndUpdate(
        req.params.id,
        { $set: req.body },
        { new: true, useFindAndModify: false }
      )
      .then(
        roomreservation => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(roomreservation);
        },
        err => next(err)
      )
      .catch(err => next(err));
  })
  .delete((req, res, next) => {
    roomreservation
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
