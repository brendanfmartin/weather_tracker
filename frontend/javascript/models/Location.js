WT = WT || {};
WT.models = WT.models || {};

/**
 * Location Model.
 */
WT.models.Location = function () {
  "use strict";

  var _locationName = null,
    _locationDescription = null,
    _longitude = null,
    _latitude = null;

  this.getlocationName = function () {
    return _locationName;
  };

  this.setlocationName = function (locationName) {
    _locationName = locationName;
    return this;
  };

  this.getlocationDescription = function () {
    return _locationDescription;
  };

  this.setlocationDescription = function (locationDescription) {
    _locationDescription = locationDescription;
    return this;
  };

  this.getlongitude = function () {
    return _longitude;
  };

  this.setlongitude = function (longitude) {
    _longitude = longitude;
    return this;
  };

  this.getlatitude = function () {
    return _latitude;
  };

  this.setlatitude = function (latitude) {
    _latitude = latitude;
    return this;
  };
};