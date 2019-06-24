var mongoose = require("mongoose");
var Schema = mongoose.Schema;

var paymentsSchema = new Schema(
  {
    paymentstype: {
      type: String,
      required: true
    },
    creditcardttype:{
      type: String,
      required: true

    },
    nameoncard:{
      type: String,
      required: true
    },
    amount: {
      type: String,
      required: true
    },
    paymentdate: {
      type: Date,
      required: true
    }
  },
  {
    timestamps: true
  }
);
var payment = mongoose.model("payment", paymentsSchema);
module.exports = payment;
