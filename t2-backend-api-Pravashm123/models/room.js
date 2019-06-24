var mongoose = require("mongoose");
var Schema = mongoose.Schema;

var roomSchema = new Schema(
  {
    desc: {
      type: String,
      required: true
    },
    price: {
      type: String,
      required: true
    },
    bedtype: {
      type: String,
      required: true
    },
    image:{
      type:String,
      default:''
    },
    roomtype:{
      type:String,
      required: true
    }
  },
  {
    timestamps: true
  }
);
var Rooms = mongoose.model("Room", roomSchema);
module.exports = Rooms;
