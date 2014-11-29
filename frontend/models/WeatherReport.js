WT = WT || {};
WT.models = WT.models || {};

/**
 * Weather Report Model.
 */
WT.models.WeatherReport = function () {
  "use strict";

  var _location = null,
    _forecastDate = null,
    _creationDate = null,
    _forecastedHigh = null,
    _forecastedLow = null,
    _precipitation = null,
    _createdAt = null,
    _updatedAt = null;

  this.getLocation = function () {
    return _location;
  };

  this.setLocation = function (location) {
    _location = location;
    return this;
  };

  this.getForecastDate = function () {
    return _forecastDate;
  };

  this.setForecastDate = function (forecastDate) {
    _forecastDate = forecastDate;
    return this;
  };

  this.getCreationDate = function () {
    return _creationDate;
  };

  this.setCreationDate = function (creationDate) {
    _creationDate = creationDate;
    return this;
  };

  this.getForecastedHigh = function () {
    return _forecastedHigh;
  };

  this.setForecastedHigh = function (forecastedHigh) {
    _forecastedHigh = forecastedHigh;
    return this;
  };

  this.getForecastedLow = function () {
    return _forecastedLow;
  };

  this.setForecastedLow = function (forecastedLow) {
    _forecastedLow = forecastedLow;
    return this;
  };

  this.getPrecipitation = function () {
    return _precipitation;
  };

  this.setPrecipitation = function (precipitation) {
    _precipitation = precipitation;
    return this;
  };

  this.getCreatedAt = function () {
    return _createdAt;
  };

  this.setCreatedAt = function (createdAt) {
    _createdAt = createdAt;
    return this;
  };

  this.getUpdatedAt = function () {
    return _updatedAt;
  };

  this.setUpdatedAt = function (updatedAt) {
    _updatedAt = updatedAt;
    return this;
  };
};