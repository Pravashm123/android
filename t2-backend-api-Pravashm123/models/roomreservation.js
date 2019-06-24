var mongoose = require("mongoose");
var Schema = mongoose.Schema;

var roomreservation = new Schema(
  {
    firstname: {
      type: String,
      required: true
    },
    middlename: {
      type: String,
      required: true
    },
    lastname: {
      type: String,
      required: true
    },
    roomtype: {
      type: String,
      required: true
    },
    contact: {
      type: String,
      required: true
    },
    reservedate: {
      type: String,
      required: true
    },
    amount:{
      type:String,
      required: true
    },
    email:{
      type:String,
      required: true
    }
  },
  {
    timestamps: true
  }
);
var roomreservations = mongoose.model("roomreservation", roomreservation);
module.exports = roomreservations;
