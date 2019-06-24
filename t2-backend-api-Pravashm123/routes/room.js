var express = require("express");
var room = require("../models/room");
var verify = require("../verify");
var router = express.Router();

router
  .route("/")
  .get((req, res, next) => {
    room
      .find({})
      .then(
        room => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(room);
        },
        err => next(err)
      )
      .catch(err => next(err));
  })
  .post((req, res, next) => {
    room
      .create(req.body)
      .then(
        room => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(room);
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
    room
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
    room
      .findById(req.params.id)
      .then(
        room => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(room);
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
    room
      .findByIdAndUpdate(
        req.params.id,
        { $set: req.body },
        { new: true, useFindAndModify: false }
      )
      .then(
        room => {
          res.statusCode = 200;
          res.setHeader("Content-Type", "application/json");
          res.json(room);
        },
        err => next(err)
      )
      .catch(err => next(err));
  })
  .delete((req, res, next) => {
    room
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
