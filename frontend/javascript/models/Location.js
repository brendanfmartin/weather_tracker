/*jslint indent: 2 */
var WT = WT || {};
WT.models = WT.models || {};

/**
 * Location Model.
 */
WT.models.Location = function () {
  'use strict';

  var id = null,
    locationName = null,
    longitude = null,
    latitude = null;

  this.getId = function () {
    return this.id;
  };

  this.setId = function (id) {
    this.id = id;
    return this;
  };

  this.getlocationName = function () {
    return this.locationName;
  };

  this.setlocationName = function (locationName) {
    this.locationName = locationName;
    return this;
  };

  this.getlongitude = function () {
    return this.longitude;
  };

  this.setlongitude = function (longitude) {
    this.longitude = longitude;
    return this;
  };

  this.getlatitude = function () {
    return this.latitude;
  };

  this.setlatitude = function (latitude) {
    this.latitude = latitude;
    return this;
  };
};